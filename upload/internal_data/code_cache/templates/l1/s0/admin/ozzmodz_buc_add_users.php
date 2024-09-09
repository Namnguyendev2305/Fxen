<?php
// FROM HASH: 25fcb58dbb5fb348afdcf0653116d75f
return array(
'macros' => array('privacy_select' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'name' => '!',
		'label' => '!',
		'user' => '!',
		'hideEveryone' => false,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = array(array(
		'value' => 'none',
		'label' => 'Nobody',
		'_type' => 'option',
	));
	if (!$__vars['hideEveryone']) {
		$__compilerTemp1[] = array(
			'value' => 'everyone',
			'label' => 'All visitors',
			'_type' => 'option',
		);
	}
	$__compilerTemp1[] = array(
		'value' => 'members',
		'label' => 'Members only',
		'_type' => 'option',
	);
	$__compilerTemp1[] = array(
		'value' => 'followed',
		'label' => 'People ' . ($__vars['user']['username'] ? $__templater->escape($__vars['user']['username']) : (('[' . 'User') . ']')) . ' follows',
		'_type' => 'option',
	);
	$__finalCompiled .= $__templater->formSelectRow(array(
		'name' => 'privacy[' . $__vars['name'] . ']',
		'value' => $__vars['user']['Privacy'][$__vars['name']],
	), $__compilerTemp1, array(
		'label' => $__templater->escape($__vars['label']),
	)) . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Bulk create new users');
	$__finalCompiled .= '

';
	if ($__vars['usersAdded']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--success blockMessage--iconic">' . 'Users added: ' . $__templater->escape($__vars['usersAdded']) . '' . '</div>
';
	}
	$__finalCompiled .= '

';
	if ($__vars['errors']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--error blockMessage--iconic">
		<ul>
			';
		if ($__templater->isTraversable($__vars['errors'])) {
			foreach ($__vars['errors'] AS $__vars['error']) {
				$__finalCompiled .= '
				<li>' . $__templater->escape($__vars['error']) . '</li>
			';
			}
		}
		$__finalCompiled .= '
		</ul>
	</div>
';
	}
	$__finalCompiled .= '

<div class="block">
	';
	$__compilerTemp1 = $__templater->mergeChoiceOptions(array(), $__vars['userGroups']);
	$__compilerTemp2 = $__templater->mergeChoiceOptions(array(), $__vars['userGroups']);
	$__compilerTemp3 = array(array(
		'value' => '0',
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'Use default style' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	$__compilerTemp4 = $__templater->method($__vars['styleTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp4)) {
		foreach ($__compilerTemp4 AS $__vars['treeEntry']) {
			$__compilerTemp3[] = array(
				'value' => $__vars['treeEntry']['record']['style_id'],
				'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp5 = array();
	$__compilerTemp6 = $__templater->method($__vars['languageTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp6)) {
		foreach ($__compilerTemp6 AS $__vars['treeEntry']) {
			$__compilerTemp5[] = array(
				'value' => $__vars['treeEntry']['record']['language_id'],
				'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . '
								' . $__templater->escape($__vars['treeEntry']['record']['title']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp7 = $__templater->mergeChoiceOptions(array(), $__vars['timeZones']);
	$__finalCompiled .= $__templater->form('
		<h2 class="block-tabHeader tabs hScroller" data-xf-init="tabs h-scroller" data-state="replace" role="tablist">
			<span class="hScroller-scroll">
				' . '
				<a class="tabs-tab is-active" role="tab" tabindex="0"
					id="user-details"
					aria-controls="user-details"
					href="' . $__templater->func('link', array('users/edit', $__vars['user'], ), true) . '#user-details">' . 'User details' . '</a>
				' . '
			</span>
		</h2>

		<ul class="tabPanes">
			' . '
			<li class="is-active" role="tabpanel" aria-labelledby="user-details">
				<div class="block-body">
					
					' . $__templater->formNumberBoxRow(array(
		'name' => 'amount',
		'min' => '1',
	), array(
		'label' => 'Add amount',
	)) . '
					
					' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'custom_usernames',
		'data-hide' => 'true',
		'label' => 'Use custom username list',
		'hint' => 'Otherwise will be used random generator',
		'_dependent' => array('
								' . $__templater->formTextArea(array(
		'name' => 'usernames',
		'autosize' => true,
	)) . '
								<dfn class="inputChoices-explain">' . 'List of usernames separated by new line' . '</dfn>
							'),
		'_type' => 'option',
	)), array(
		'label' => 'Username',
	)) . '

					' . $__templater->formRadioRow(array(
		'name' => 'option_emails',
	), array(array(
		'value' => 'random',
		'data-hide' => 'true',
		'selected' => true,
		'label' => 'Random',
		'_dependent' => array('
								' . $__templater->formTextBox(array(
		'name' => 'random_email_domain',
		'value' => '@example.com',
	)) . '
							'),
		'_type' => 'option',
	),
	array(
		'value' => 'custom',
		'data-hide' => 'true',
		'label' => 'Use custom email list',
		'_dependent' => array('
								' . $__templater->formTextArea(array(
		'name' => 'emails',
		'dir' => 'ltr',
		'autosize' => true,
	)) . '
								<dfn class="inputChoices-explain">' . 'List of emails separated by new line' . '</dfn>
							'),
		'_type' => 'option',
	)), array(
		'label' => 'Email',
	)) . '
					
					' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'custom_passwords',
		'data-hide' => 'true',
		'label' => 'Use custom password list',
		'hint' => 'Otherwise will be used random generator',
		'_dependent' => array('
								' . $__templater->formTextArea(array(
		'name' => 'passwords',
		'autosize' => true,
	)) . '
								<dfn class="inputChoices-explain">' . 'List of passwords separated by new line. If specified less than add amount, the last value will be used for not defined user. ' . '</dfn>
							'),
		'_type' => 'option',
	)), array(
		'label' => 'Password',
	)) . '

					<hr class="formRowSep" />

					' . $__templater->formSelectRow(array(
		'name' => 'user[user_group_id]',
		'value' => $__vars['user']['user_group_id'],
	), $__compilerTemp1, array(
		'label' => 'User group',
	)) . '

					' . $__templater->formCheckBoxRow(array(
		'name' => 'user[secondary_group_ids]',
		'value' => $__vars['user']['secondary_group_ids'],
		'listclass' => 'listColumns',
	), $__compilerTemp2, array(
		'label' => 'Secondary user groups',
	)) . '

					' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'user[is_staff]',
		'selected' => $__vars['user']['is_staff'],
		'label' => 'Display user as staff',
		'hint' => 'If selected, this user will be listed publicly as a staff member.',
		'_type' => 'option',
	)), array(
	)) . '

					' . $__templater->formSelectRow(array(
		'name' => 'user[user_state]',
		'value' => $__vars['user']['user_state'],
	), array(array(
		'value' => 'valid',
		'label' => 'Valid',
		'_type' => 'option',
	),
	array(
		'value' => 'email_confirm',
		'label' => 'Awaiting email confirmation',
		'_type' => 'option',
	),
	array(
		'value' => 'email_confirm_edit',
		'label' => 'Awaiting email confirmation (from edit)',
		'_type' => 'option',
	),
	array(
		'value' => 'email_bounce',
		'label' => 'Email invalid (bounced)',
		'_type' => 'option',
	),
	array(
		'value' => 'moderated',
		'label' => 'Awaiting approval',
		'_type' => 'option',
	),
	array(
		'value' => 'rejected',
		'label' => 'Rejected',
		'_type' => 'option',
	),
	array(
		'value' => 'disabled',
		'label' => 'Disabled',
		'_type' => 'option',
	)), array(
		'label' => 'User state',
		'explain' => '
							' . 'When in a user state other than \'' . 'Valid' . '\', users will receive permissions from the ' . (((('<a href="' . $__templater->func('link', array('user-groups/edit', array('user_group_id' => 1, 'title' => $__vars['userGroups']['1'], ), ), true)) . '" target="_blank">') . $__templater->escape($__vars['userGroups']['1'])) . '</a>') . ' group.' . '
						',
	)) . '

					' . $__templater->formSelectRow(array(
		'name' => 'user[security_lock]',
		'value' => $__vars['user']['security_lock'],
	), array(array(
		'value' => '',
		'label' => 'None',
		'_type' => 'option',
	),
	array(
		'value' => 'change',
		'label' => 'Locked' . $__vars['xf']['language']['label_separator'] . ' ' . 'User must change password',
		'_type' => 'option',
	),
	array(
		'value' => 'reset',
		'label' => 'Locked' . $__vars['xf']['language']['label_separator'] . ' ' . 'User must reset password',
		'_type' => 'option',
	)), array(
		'label' => 'Security lock',
		'explain' => '
							' . 'When security locking an account, you can either force a user to change their password or, if you suspect unauthorized access, you can force a user to reset their password (email address is required).' . '
						',
	)) . '

					<hr class="formRowSep" />

					' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'option[is_discouraged]',
		'selected' => $__vars['user']['Option']['is_discouraged'],
		'hint' => 'Discouraged users are subjected to annoying random delays and failures in system behavior, designed to \'encourage\' them to go away and troll some other site.',
		'label' => 'Discouraged',
		'_type' => 'option',
	)), array(
		'explain' => '<a href="' . $__templater->func('link', array('banning/discouraged-ips', ), true) . '">' . 'Alternatively, you may use IP-based discouragement.' . '</a>',
	)) . '
				</div>

				<h3 class="block-formSectionHeader">
					<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
						<span class="block-formSectionHeader-aligner">' . 'Personal details' . '</span>
					</span>
				</h3>
				<div class="block-body block-body--collapsible">
					' . $__templater->callMacro('public:helper_user_dob_edit', 'dob_edit', array(
		'dobData' => $__vars['user']['Profile'],
	), $__vars) . '

					<hr class="formRowSep" />

					' . $__templater->formTextBoxRow(array(
		'name' => 'profile[location]',
		'value' => $__vars['user']['Profile']['location_'],
	), array(
		'label' => 'Location',
	)) . '
					' . $__templater->formTextBoxRow(array(
		'name' => 'profile[website]',
		'value' => $__vars['user']['Profile']['website_'],
		'type' => 'url',
		'dir' => 'ltr',
	), array(
		'label' => 'Website',
	)) . '
					' . $__templater->callMacro('public:custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'users',
		'group' => 'personal',
		'set' => $__vars['user']['Profile']['custom_fields'],
		'editMode' => 'admin',
	), $__vars) . '
					' . $__templater->formTextAreaRow(array(
		'name' => 'profile[about]',
		'value' => $__vars['user']['Profile']['about_'],
		'autosize' => 'true',
	), array(
		'label' => 'About',
		'hint' => 'You may use BB code',
	)) . '
				</div>

				<h3 class="block-formSectionHeader">
					<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
						<span class="block-formSectionHeader-aligner">' . 'Profile info' . '</span>
					</span>
				</h3>
				<div class="block-body block-body--collapsible">
					' . $__templater->formTextBoxRow(array(
		'name' => 'user[custom_title]',
		'value' => $__vars['user']['custom_title_'],
		'maxlength' => $__templater->func('max_length', array($__vars['user'], 'custom_title', ), false),
	), array(
		'label' => 'Custom title',
	)) . '
					' . $__templater->formTextAreaRow(array(
		'name' => 'profile[signature]',
		'value' => $__vars['user']['Profile']['signature_'],
		'autosize' => 'true',
	), array(
		'label' => 'Signature',
		'hint' => 'You may use BB code',
	)) . '

					<hr class="formRowSep" />

					' . $__templater->formNumberBoxRow(array(
		'name' => 'user[message_count]',
		'value' => $__vars['user']['message_count'],
		'min' => '0',
	), array(
		'label' => 'Messages',
	)) . '
					' . $__templater->formNumberBoxRow(array(
		'name' => 'user[reaction_score]',
		'value' => $__vars['user']['reaction_score'],
	), array(
		'label' => 'Reaction score',
	)) . '
					' . $__templater->formNumberBoxRow(array(
		'name' => 'user[trophy_points]',
		'value' => $__vars['user']['trophy_points'],
		'min' => '0',
	), array(
		'label' => 'Trophy points',
	)) . '
				</div>

				<h3 class="block-formSectionHeader">
					<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
						<span class="block-formSectionHeader-aligner">' . 'Additional contact' . '</span>
					</span>
				</h3>
				<div class="block-body block-body--collapsible">
					' . $__templater->callMacro('public:custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'users',
		'group' => 'contact',
		'set' => $__vars['user']['Profile']['custom_fields'],
		'editMode' => 'admin',
	), $__vars) . '
				</div>

				<h3 class="block-formSectionHeader">
					<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
						<span class="block-formSectionHeader-aligner">' . 'Preferences' . '</span>
					</span>
				</h3>
				<div class="block-body block-body--collapsible">
					' . $__templater->formSelectRow(array(
		'name' => 'user[style_id]',
		'value' => $__vars['user']['style_id'],
	), $__compilerTemp3, array(
		'label' => 'Style',
	)) . '

					<hr class="formRowSep" />

					' . $__templater->formSelectRow(array(
		'name' => 'user[language_id]',
		'value' => $__vars['user']['language_id'],
	), $__compilerTemp5, array(
		'label' => 'Language',
	)) . '

					' . $__templater->formSelectRow(array(
		'name' => 'user[timezone]',
		'value' => $__vars['user']['timezone'],
	), $__compilerTemp7, array(
		'label' => 'Time zone',
	)) . '

					<hr class="formRowSep" />

					' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'option[content_show_signature]',
		'selected' => $__vars['user']['Option']['content_show_signature'],
		'label' => '
							' . 'Show signatures with messages',
		'_type' => 'option',
	),
	array(
		'name' => 'option[receive_admin_email]',
		'selected' => $__vars['user']['Option']['receive_admin_email'],
		'label' => '
							' . 'Receive news and update emails' . '
						',
		'_type' => 'option',
	),
	array(
		'name' => 'enable_activity_summary_email',
		'selected' => $__vars['user']['last_summary_email_date'] !== null,
		'label' => '
							' . 'Receive activity summary email' . '
						',
		'_type' => 'option',
	),
	array(
		'name' => 'option[email_on_conversation]',
		'selected' => $__vars['user']['Option']['email_on_conversation'],
		'label' => '
							' . 'Receive email when a new conversation message is received',
		'_type' => 'option',
	)), array(
	)) . '

					' . $__templater->formSelectRow(array(
		'name' => 'option[creation_watch_state]',
		'value' => $__vars['user']['Option']['creation_watch_state'],
	), array(array(
		'value' => 'watch_no_email',
		'label' => 'Yes',
		'_type' => 'option',
	),
	array(
		'value' => 'watch_email',
		'label' => 'Yes, with email',
		'_type' => 'option',
	),
	array(
		'value' => '',
		'label' => 'No',
		'_type' => 'option',
	)), array(
		'label' => 'Watch content on creation',
	)) . '

					' . $__templater->formSelectRow(array(
		'name' => 'option[interaction_watch_state]',
		'value' => $__vars['user']['Option']['interaction_watch_state'],
	), array(array(
		'value' => 'watch_no_email',
		'label' => 'Yes',
		'_type' => 'option',
	),
	array(
		'value' => 'watch_email',
		'label' => 'Yes, with email',
		'_type' => 'option',
	),
	array(
		'value' => '',
		'label' => 'No',
		'_type' => 'option',
	)), array(
		'label' => 'Watch content on interaction',
	)) . '

					' . $__templater->callMacro('public:custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'users',
		'group' => 'preferences',
		'set' => $__vars['user']['Profile']['custom_fields'],
		'editMode' => 'admin',
	), $__vars) . '
				</div>

				<h3 class="block-formSectionHeader">
					<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
						<span class="block-formSectionHeader-aligner">' . 'Privacy' . '</span>
					</span>
				</h3>
				<div class="block-body block-body--collapsible">
					' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'user[visible]',
		'selected' => $__vars['user']['visible'],
		'label' => 'Show online status',
		'_dependent' => array('
								' . $__templater->formCheckBox(array(
	), array(array(
		'name' => 'user[activity_visible]',
		'selected' => $__vars['user']['activity_visible'],
		'label' => '
										' . 'Show current activity' . '
									',
		'_type' => 'option',
	))) . '
							'),
		'_type' => 'option',
	),
	array(
		'name' => 'option[show_dob_date]',
		'selected' => $__vars['user']['Option']['show_dob_date'],
		'label' => '
							' . 'Show day and month of birth' . '
						',
		'_type' => 'option',
	),
	array(
		'name' => 'option[show_dob_year]',
		'selected' => $__vars['user']['Option']['show_dob_year'],
		'label' => '
							' . 'Show year of birth' . '
						',
		'_type' => 'option',
	)), array(
		'label' => 'General privacy',
	)) . '

					<hr class="formRowSep" />

					' . '
					' . $__templater->callMacro(null, 'privacy_select', array(
		'name' => 'allow_view_profile',
		'label' => 'View this user\'s profile page details',
		'user' => $__vars['user'],
	), $__vars) . '

					' . '
					' . $__templater->callMacro(null, 'privacy_select', array(
		'name' => 'allow_post_profile',
		'label' => 'Post messages on this user\'s profile page',
		'user' => $__vars['user'],
		'hideEveryone' => true,
	), $__vars) . '

					' . '
					' . $__templater->callMacro(null, 'privacy_select', array(
		'name' => 'allow_receive_news_feed',
		'label' => 'Receive this user\'s news feed',
		'user' => $__vars['user'],
	), $__vars) . '

					<hr class="formRowSep" />

					' . '
					' . $__templater->callMacro(null, 'privacy_select', array(
		'name' => 'allow_send_personal_conversation',
		'label' => 'Initiate conversations with this user',
		'user' => $__vars['user'],
		'hideEveryone' => true,
	), $__vars) . '

					' . '
					' . $__templater->callMacro(null, 'privacy_select', array(
		'name' => 'allow_view_identities',
		'label' => 'View this user\'s identities',
		'user' => $__vars['user'],
	), $__vars) . '
				</div>

				' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
			</li>
			' . '
		</ul>
	', array(
		'action' => $__templater->func('link', array('users/save-bulk', ), false),
		'ajax' => 'true',
		'class' => 'block-container',
		'novalidate' => 'novalidate',
	)) . '
</div>

';
	return $__finalCompiled;
}
);