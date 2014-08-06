<?php
/**
 * Project: SimpleAccessControl
 * User: MadFaill
 * Date: 06.08.14
 * Time: 17:49
 * File: User.php
 * Package: AccessControl\Component
 *
 */
namespace AccessControl\Component;

/**
 * Class        User
 * @description None.
 *
 * @author      MadFaill
 * @copyright   MadFaill 06.08.14
 * @since       06.08.14
 * @version     0.01
 * @package     AccessControl\Component
 */
abstract class User
{
	/**
	 * @var Group
	 */
	private $groups = array();

	/**
	 * @return int
	 */
	abstract public function getId();

	/**
	 * @return int
	 */
	abstract public function getRole();

	/**
	 * Добавить к группе
	 *
	 * @param Group $group
	 */
	public function addGroup(Group $group)
	{
		$this->groups[] = $group;
	}

	/**
	 * Проверка доступа для конкретного действия
	 *
	 * @param $permission
	 * @return bool
	 */
	public function isPermittedFor($permission)
	{
		/** @var Group $group */
		foreach ($this->groups as $group) {
			if ($group->hasPermission($permission)) {
				return true;
			}
		}
		return false;
	}
}

// ---------------------------------------------------------------------------------------------------------------------
// > END User < #
// --------------------------------------------------------------------------------------------------------------------- 