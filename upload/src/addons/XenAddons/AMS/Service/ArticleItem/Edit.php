<?php

namespace XenAddons\AMS\Service\ArticleItem;

use XenAddons\AMS\Entity\ArticleItem;

class Edit extends \XF\Service\AbstractService
{
	use \XF\Service\ValidateAndSavableTrait;

	/**
	 * @var ArticleItem
	 */
	protected $articleItem;

	/**
	 * @var \XenAddons\AMS\Service\ArticleItem\Preparer
	 */
	protected $articleItemPreparer;
	
	protected $oldMessage;

	protected $performValidations = true;

	protected $logDelay;
	protected $logEdit = true;
	protected $logHistory = true;
	
	protected $alert = false;
	protected $alertReason = '';
	
	protected $postThreadUpdate = false;
	protected $postThreadUpdateMessage = '';

	public function __construct(\XF\App $app, ArticleItem $articleItem)
	{
		parent::__construct($app);
		$this->setArticleItem($articleItem);
	}
	
	public function setArticleItem(ArticleItem $articleItem)
	{
		$this->articleItem = $articleItem;
		$this->articleItemPreparer = $this->service('XenAddons\AMS:ArticleItem\Preparer', $this->articleItem);
	}

	public function getArticleItem()
	{
		return $this->articleItem;
	}
	
	public function setIsAutomated()
	{
		$this->setPerformValidations(false);
	}
	
	public function logDelay($logDelay)
	{
		$this->logDelay = $logDelay;
	}
	
	public function logEdit($logEdit)
	{
		$this->logEdit = $logEdit;
	}
	
	public function logHistory($logHistory)
	{
		$this->logHistory = $logHistory;
	}
	
	protected function setupEditHistory()
	{
		$articleItem = $this->articleItem;
	
		$articleItem->edit_count++;
	
		$options = $this->app->options();
		if ($options->editLogDisplay['enabled'] && $this->logEdit)
		{
			$delay = is_null($this->logDelay) ? $options->editLogDisplay['delay'] * 60 : $this->logDelay;
			if ($articleItem->publish_date + $delay <= \XF::$time)
			{
				$articleItem->last_edit_date = \XF::$time;
				$articleItem->last_edit_user_id = \XF::visitor()->user_id;
			}
		}
	
		if ($options->editHistory['enabled'] && $this->logHistory)
		{
			$this->oldMessage = $articleItem->message;
		}
	}
	
	public function getArticleItemPreparer()
	{
		return $this->articleItemPreparer;
	}

	public function setPerformValidations($perform)
	{
		$this->performValidations = (bool)$perform;
	}

	public function getPerformValidations()
	{
		return $this->performValidations;
	}

	public function setTitle($title)
	{
		$this->articleItem->title = $title;
	}

	public function setMessage($message, $format = true)
	{
		if (!$this->articleItem->isChanged('message'))
		{
			$this->setupEditHistory();
		}
		
		$this->setArticleReadTime($message);
		
		return $this->articleItemPreparer->setMessage($message, $format);
	}
	
	public function setArticleReadTime($message)
	{
		$article = $this->articleItem;
		
		$articleReadTime = 0;
	
		$strippedMessage = $this->app->stringFormatter()->stripBbCode($message, ['stripQuote' => true]);
		$strippedMessage = str_replace('[*]', ' ', $strippedMessage);
	
		$wordCount = $this->str_word_count_utf8($strippedMessage);
		
		// Need to include any visible article pages to calculate reading time for multi-page articles		
		if ($article->page_count)
		{
			$articlePages = $this->em()->getEmptyCollection();
			$articlePages = $article->Pages;			

			foreach ($articlePages AS $page)
			{
				if ($page->page_state == 'visible')
				{
					$strippedMessage = $this->app->stringFormatter()->stripBbCode($page->message, ['stripQuote' => true]);
					$strippedMessage = str_replace('[*]', ' ', $strippedMessage);
				
					$pageWordCount = $this->str_word_count_utf8($strippedMessage);
				
					$wordCount = $wordCount + $pageWordCount;
				}	
			}
		}
	
		$wordsPerMinute = $this->app->options()->xaAmsARSWordsPerMinute ? : 265;
	
		$articleReadTime = ceil($wordCount / $wordsPerMinute);
	
		$this->articleItem->article_read_time = $articleReadTime;
	}
	
	protected function str_word_count_utf8($message)
	{
		// ref: http://php.net/manual/de/function.str-word-count.php#107363
	
		return count(preg_split('~[^\p{L}\p{N}\']+~u', $message, -1, PREG_SPLIT_NO_EMPTY));
	}
	
	public function setAttachmentHash($hash)
	{
		$this->articleItemPreparer->setAttachmentHash($hash);
	}

	public function setPrefix($prefixId)
	{
		$this->articleItem->prefix_id = $prefixId;
	}
	
	public function setSticky($sticky)
	{
		$this->articleItem->sticky = $sticky;
	}
	
	public function setAuthorRating($authorRating)
	{
		$this->articleItem->author_rating = $authorRating;
	}	

	public function setCustomFields(array $customFields)
	{
		$articleItem = $this->articleItem;

		$editMode = $articleItem->getFieldEditMode();

		/** @var \XF\CustomField\Set $fieldSet */
		$fieldSet = $articleItem->custom_fields;
		$fieldDefinition = $fieldSet->getDefinitionSet()
			->filterEditable($fieldSet, $editMode)
			->filterOnly($articleItem->Category->field_cache);

		$customFieldsShown = array_keys($fieldDefinition->getFieldDefinitions());

		if ($customFieldsShown)
		{
			$fieldSet->bulkSet($customFields, $customFieldsShown, $editMode);
		}
	}
	
	public function setLocation($location)
	{
		$this->articleItem->location = $location;
	
		if ($location)
		{
			$this->setLocationData($location);
		}
		else
		{
			$this->articleItem->location_data = [];
		}
	}
	
	public function setLocationData($location)
	{
		/** @var \XenAddons\AMS\Repository\Article $articleRepo */
		$articleRepo = $this->repository('XenAddons\AMS:Article');
	
		$this->articleItem->location_data = $articleRepo->getLocationDataFromGoogleMapsGeocodingApi($location, 'edit');
	}

	public function setSendAlert($alert, $reason = null)
	{
		$this->alert = (bool)$alert;
		if ($reason !== null)
		{
			$this->alertReason = $reason;
		}
	}
	
	public function setPostThreadUpdate($postThreadUpdate, $postThreadUpdateMessage = null)
	{
		$this->postThreadUpdate = (bool)$postThreadUpdate;
		if ($postThreadUpdateMessage !== null)
		{
			$this->postThreadUpdateMessage = $postThreadUpdateMessage;
		}
		
		$articleItem = $this->articleItem;
		$articleItem->last_update = time();
	}

	public function checkForSpam()
	{
		if ($this->articleItem->article_state == 'visible' && \XF::visitor()->isSpamCheckRequired())
		{
			$this->articleItemPreparer->checkForSpam();
		}	
	}

	protected function finalSetup()
	{
	}

	protected function _validate()
	{
		$this->finalSetup();

		$articleItem = $this->articleItem;

		$articleItem->preSave();
		$errors = $articleItem->getErrors();

		if ($this->performValidations)
		{
			if (!$articleItem->prefix_id
				&& $articleItem->Category->require_prefix
				&& $articleItem->Category->getUsablePrefixes()
				&& !$articleItem->canMove()
			)
			{
				$errors[] = \XF::phraseDeferred('please_select_a_prefix');
			}
			
			if (
				!$articleItem->location
				&& $articleItem->Category->require_location
			)
			{
				$errors[] = \XF::phraseDeferred('xa_ams_please_set_location');
			}

			if (!$this->articleItemPreparer->validateFiles($coverImageError))
			{
				$errors[] = $coverImageError;
			}
			
			if ($articleItem->Category->require_original_source)
			{
				if ($articleItem->original_source['os_article_author'] == '')
				{
					$errors[] = \XF::phraseDeferred('xa_ams_original_source_article_author_required');
				}
			
				if ($articleItem->original_source['os_article_title'] == '')
				{
					$errors[] = \XF::phraseDeferred('xa_ams_original_source_article_title_required');
				}
				
				if ($articleItem->original_source['os_article_date'] == '' || $articleItem->original_source['os_article_date'] == 0)
				{
					$errors[] = \XF::phraseDeferred('xa_ams_original_source_article_date_required');
				}
			
				if ($articleItem->original_source['os_source_name'] == '')
				{
					$errors[] = \XF::phraseDeferred('xa_ams_original_source_name_required');
				}
			
				if ($articleItem->original_source['os_source_url'] == '')
				{
					$errors[] = \XF::phraseDeferred('xa_ams_original_source_url_required');
				}
			}
			
			if (isset($articleItem->original_source['os_source_url']) && $articleItem->original_source['os_source_url'])
			{
				$phraseKey = null;
				
				/** @var \XF\Validator\Url $urlValidator */
				$urlValidator = \XF::app()->validator('Url');
				$value = $urlValidator->coerceValue($articleItem->original_source['os_source_url']);
				
				
				if (!$urlValidator->isValid($value, $phraseKey))
				{
					$errors[] = \XF::phraseDeferred('please_enter_valid_url');
				}
			}	
		}

		return $errors;
	}

	protected function _save()
	{
		$articleItem = $this->articleItem;
		$visitor = \XF::visitor();
		
		$db = $this->db();
		$db->beginTransaction();
		
		$articleItem->save(true, false);
		
		$this->articleItemPreparer->afterUpdate();
		
		if ($this->oldMessage)
		{
			/** @var \XF\Repository\EditHistory $repo */
			$repo = $this->repository('XF:EditHistory');
			$repo->insertEditHistory('ams_article', $articleItem, $visitor, $this->oldMessage, $this->app->request()->getIp());
		}

		if ($this->postThreadUpdate  && $this->postThreadUpdateMessage)
		{
			$this->updateArticleThread();
		}
		
		if ($articleItem->isVisible() && $this->alert && $articleItem->user_id != \XF::visitor()->user_id)
		{
			/** @var \XenAddons\AMS\Repository\Article $articleRepo */
			$articleRepo = $this->repository('XenAddons\AMS:Article');
			$articleRepo->sendModeratorActionAlert($this->articleItem, 'edit', $this->alertReason);
		}

		$db->commit();
		
		return $articleItem;
	}
	
	public function sendNotifications()
	{
		if ($this->articleItem->isVisible())
		{
			/** @var \XenAddons\AMS\Service\ArticleItem\Notify $notifier */
			$notifier = $this->service('XenAddons\AMS:ArticleItem\Notify', $this->articleItem, 'update');
			$notifier->notifyAndEnqueue(3);
		}
	}
	
	protected function updateArticleThread()
	{
		$articleItem = $this->articleItem;
		$thread = $articleItem->Discussion;
		if (!$thread)
		{
			return;
		}
	
		$asUser = $articleItem->User ?: $this->repository('XF:User')->getGuestUser($articleItem->username);
	
		\XF::asVisitor($asUser, function() use ($thread)
		{
			$replier = $this->setupArticleThreadReply($thread);
			if ($replier && $replier->validate())
			{
				$existingLastPostDate = $replier->getThread()->last_post_date;
	
				$post = $replier->save();
				$this->afterArticleThreadReplied($post, $existingLastPostDate);
	
				\XF::runLater(function() use ($replier)
				{
					$replier->sendNotifications();
				});
			}
		});
	}
	
	protected function setupArticleThreadReply(\XF\Entity\Thread $thread)
	{
		/** @var \XF\Service\Thread\Replier $replier */
		$replier = $this->service('XF:Thread\Replier', $thread);
		$replier->setIsAutomated();
		$replier->setMessage($this->getThreadReplyMessage(), false);
	
		return $replier;
	}
	
	protected function getThreadReplyMessage()
	{
		$articleItem = $this->articleItem;
		
		$phrase = \XF::phrase('xa_ams_article_thread_update', [
			'title' => $articleItem->title_,
			'article_link' => $this->app->router('public')->buildLink('canonical:ams', $this->articleItem),
			'description' => $articleItem->description_,
			'username' => $articleItem->User ? $articleItem->User->username : $articleItem->username,
			'message' => $this->postThreadUpdateMessage	
		]);
	
		return $phrase->render('raw');
	}
	
	protected function afterArticleThreadReplied(\XF\Entity\Post $post, $existingLastPostDate)
	{
		$thread = $post->Thread;

		if (\XF::visitor()->user_id)
		{
			if ($post->Thread->getVisitorReadDate() >= $existingLastPostDate)
			{
				$this->repository('XF:Thread')->markThreadReadByVisitor($thread);
			}
		
			$this->repository('XF:ThreadWatch')->autoWatchThread($thread, \XF::visitor(), false);
		}
	}	
}