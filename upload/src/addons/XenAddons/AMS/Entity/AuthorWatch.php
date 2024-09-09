<?php

namespace XenAddons\AMS\Entity;

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Structure;

/**
 * COLUMNS
 * @property int $user_id
 * @property int $author_id
 * @property string $notify_on
 * @property bool $send_alert
 * @property bool $send_email
 *
 * RELATIONS
 * @property \XF\Entity\User $Author
 * @property \XF\Entity\User $User
 */
class AuthorWatch extends Entity
{
	public static function getStructure(Structure $structure)
	{
		$structure->table = 'xf_xa_ams_author_watch';
		$structure->shortName = 'XenAddons\AMS:AuthorWatch';
		$structure->primaryKey = ['user_id', 'author_id'];
		$structure->columns = [
			'user_id' => ['type' => self::UINT, 'required' => true],
			'author_id' => ['type' => self::UINT, 'required' => true],
			'notify_on' => ['type' => self::STR, 'default' => '',
				'allowedValues' => ['', 'article']
			],
			'send_alert' => ['type' => self::BOOL, 'default' => false],
			'send_email' => ['type' => self::BOOL, 'default' => false]
		];
		$structure->getters = [];
		$structure->relations = [
			'Author' => [
				'entity' => 'XF:User',
				'type' => self::TO_ONE,
				'conditions' => [
					['user_id', '=', '$author_id'],
				],
				'primary' => true
			],
			'User' => [
				'entity' => 'XF:User',
				'type' => self::TO_ONE,
				'conditions' => 'user_id',
				'primary' => true
			],
		];

		return $structure;
	}
}