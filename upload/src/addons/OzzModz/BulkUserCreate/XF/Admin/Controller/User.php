<?php

namespace OzzModz\BulkUserCreate\XF\Admin\Controller;

use XF\Mvc\FormAction;
use XF\Mvc\ParameterBag;
use XF\PrintableException;

class User extends XFCP_User
{
	public function actionAddBulk()
	{
		$this->setSectionContext('ozzmodz_buc');

		$user = $this->getUserRepo()->setupBaseUser();

		/** @var \XF\Data\TimeZone $tzData */
		$tzData = $this->data('XF:TimeZone');

		/** @var \XF\Repository\Style $styleRepo */
		$styleRepo = $this->repository('XF:Style');

		/** @var \XF\Repository\Language $languageRepo */
		$languageRepo = $this->repository('XF:Language');

		/** @var \XF\Repository\UserGroup $userGroupRepo */
		$userGroupRepo = $this->repository('XF:UserGroup');

		$viewParams = [
			'user' => $user,
			'userGroups' => $userGroupRepo->getUserGroupTitlePairs(),
			'timeZones' => $tzData->getTimeZoneOptions(),
			'styleTree' => $styleRepo->getStyleTree(false),
			'languageTree' => $languageRepo->getLanguageTree(false),

			'usersAdded' => $this->filter('usersAdded', 'uint'),
			'errors' => $this->filter('errors', 'array-str'),
		];
		return $this->view('XF:User\AddBulk', 'ozzmodz_buc_add_users', $viewParams);
	}

	public function actionSaveBulk(ParameterBag $params)
	{
		$this->assertPostOnly();

		$input = $this->filter([
			'amount' => 'posint',
			'custom_usernames' => 'bool',
			'usernames' => 'str',
			'option_emails' => 'str',
			'emails' => 'str',
			'random_email_domain' => 'str',
			'custom_passwords' => 'bool',
			'passwords' => 'str'
		]);

		$amount = $input['amount'];

		if ($input['custom_usernames'])
		{
			$usernames = \XF\Util\Arr::stringToArray($input['usernames'], '/\r?\n/');
			if (count($usernames) < $amount)
			{
				throw $this->exception($this->error(
					\XF::phrase('ozzmodz_buc_field_x_entry_count_doesnt_match', [
						'field' => \XF::phrase('user_name')
					])
				));
			}
		}
		else
		{
			$usernames = [];
		}

		if ($input['option_emails'] == 'custom')
		{
			$emails = \XF\Util\Arr::stringToArray($input['emails'], '/\r?\n/');
			if (count($emails) < $amount)
			{
				throw $this->exception($this->error(
					\XF::phrase('ozzmodz_buc_field_x_entry_count_doesnt_match', [
						'field' => \XF::phrase('email')
					])
				));
			}
		}
		else
		{
			$emails = [];
		}

		if ($input['custom_passwords'])
		{
			$passwords = \XF\Util\Arr::stringToArray($input['passwords'], '/\r?\n/');
			$passwordCount = count($passwords);
			if ($passwordCount < $amount)
			{
				$lastPasswordId = array_keys($passwords)[$passwordCount - 1];
				for ($i = 0; $i < $amount; $i++)
				{
					$passwords[$passwordCount + $i] = $passwords[$lastPasswordId];
				}
			}
		}
		else
		{
			$passwords = [];
		}

		$errors = [];
		$usersAdded = 0;
		$failedRandomAttempts = 0;

		for ($i = 0; $i < $amount; $i++)
		{
			$user = $this->getUserRepo()->setupBaseUser();

			if (!isset($usernames[$i]))
			{
				$usernameLength = $this->options()->usernameLength;
				$randomName = $this->generateRandomUsername(
					$usernameLength['min'], $usernameLength['max'] ?? $user->getMaxLength('username')
				);

				if ($this->em()->findOne('XF:User', ['username' => $randomName]))
				{
					$randomName = substr($randomName, 0, $usernameLength['max'] - 4) . rand(0, date('Y'));
				}

				$regExp = $this->options()->usernameValidation['matchRegex'];
				if (!empty($regExp) && !preg_match($regExp, $randomName))
				{
					if ($failedRandomAttempts < 1000)
					{
						$i--;
					}

					$failedRandomAttempts++;
					continue;
				}
				else
				{
					$usernames[$i] = $randomName;
				}
			}

			$user->username = $usernames[$i];

			if (!isset($emails[$i]))
			{
				$domain = $input['option_emails'] == 'random' && $input['random_email_domain'] ? $input['random_email_domain'] : '@example.com';

				$emails[$i] = preg_replace(
					"/[^A-Za-z0-9.!?]/",
					'',
					transliterator_transliterate('Any-Latin; Latin-ASCII; Lower()', $usernames[$i])
				) . $domain;
			}

			$user->email = $emails[$i];

			if (!isset($passwords[$i]))
			{
				$passwords[$i] = $this->generateRandomPassword();
			}

			try
			{
				$this->userBulkSaveProcess($user, $passwords[$i])->run();
				$usersAdded++;
			} catch (PrintableException $e)
			{
				$errors[] = $e->getMessage();
			}
		}

		return $this->redirect($this->buildLink('users/add-bulk', null, [
			'usersAdded' => $usersAdded,
			'errors' => $errors
		]));
	}

	protected function generateRandomUsername($minLength = 4, $maxLength = null)
	{
		$generator = \Nubs\RandomNameGenerator\All::create();
		$generator->getName();

		return substr($generator->getName(), 0, rand($minLength, $maxLength));
	}

	protected function generateRandomPassword()
	{
		$password = \XF::generateRandomString(12);
		$password = strtr($password, [
			'I' => 'i',
			'l' => 'L',
			'0' => 'O',
			'o' => 'O'
		]);

		return trim($password, '_-');
	}

	protected function userBulkSaveProcess(\XF\Entity\User $user, $password)
	{
		$form = $this->formAction();

		$input = $this->filter([
			'user' => [
				'user_group_id' => 'uint',
				'secondary_group_ids' => 'array-uint',
				'user_state' => 'str',
				'security_lock' => 'str',
				'is_staff' => 'bool',
				'custom_title' => 'str',
				'message_count' => 'uint',
				'reaction_score' => 'int',
				'trophy_points' => 'uint',
				'style_id' => 'uint',
				'language_id' => 'uint',
				'timezone' => 'str',
				'visible' => 'bool',
				'activity_visible' => 'bool',
			],
			'option' => [
				'is_discouraged' => 'bool',
				'content_show_signature' => 'bool',
				'email_on_conversation' => 'uint',
				'creation_watch_state' => 'str',
				'interaction_watch_state' => 'str',
				'receive_admin_email' => 'bool',
				'show_dob_date' => 'bool',
				'show_dob_year' => 'bool'
			],
			'profile' => [
				'location' => 'str',
				'website' => 'str',
				'about' => 'str',
				'signature' => 'str'
			],
			'privacy' => [
				'allow_view_profile' => 'str',
				'allow_post_profile' => 'str',
				'allow_send_personal_conversation' => 'str',
				'allow_view_identities' => 'str',
				'allow_receive_news_feed' => 'str',
			],
			'dob_day' => 'uint',
			'dob_month' => 'uint',
			'dob_year' => 'uint',
			'disable_tfa' => 'bool',
			'enable_activity_summary_email' => 'bool',
			'username_change_invisible' => 'bool',
		]);

		$user->setOption('admin_edit', true);
		$user->setOption('insert_username_change_visible', $input['username_change_invisible'] ? false : true);
		$form->setup(function () use ($user, $input) {
			$user->toggleActivitySummaryEmail($input['enable_activity_summary_email']);
		});
		$form->basicEntitySave($user, $input['user']);

		$userOptions = $user->getRelationOrDefault('Option');
		$form->setupEntityInput($userOptions, $input['option']);

		/** @var \XF\Entity\UserProfile $userProfile */
		$userProfile = $user->getRelationOrDefault('Profile');
		$userProfile->setOption('admin_edit', true);
		$form->setupEntityInput($userProfile, $input['profile']);
		$form->setup(function () use ($userProfile, $input) {
			$userProfile->setDob($input['dob_day'], $input['dob_month'], $input['dob_year']);
		});
		$this->customFieldsSaveProcess($form, $userProfile);

		$userPrivacy = $user->getRelationOrDefault('Privacy');
		$form->setupEntityInput($userPrivacy, $input['privacy']);

		$form->validate(function (FormAction $form) use ($password) {
			if (!$password)
			{
				$form->logError(\XF::phrase('please_enter_valid_password'), 'password');
			}
		});

		/** @var \XF\Entity\UserAuth $userAuth */
		$userAuth = $user->getRelationOrDefault('Auth');
		$form->setup(function () use ($userAuth, $password) {
			$userAuth->setPassword($password);
		});

		return $form;
	}
}