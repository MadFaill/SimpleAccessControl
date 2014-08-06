<?php
/**
 * Project: SimpleAccessControl
 * User: MadFaill
 * Date: 06.08.14
 * Time: 17:42
 * File: Group.php
 * Package: AccessControl\Component
 *
 */
namespace AccessControl\Component;

/**
 * Class        Group
 * @description None.
 *
 * @author      MadFaill
 * @copyright   MadFaill 06.08.14
 * @since       06.08.14
 * @version     0.01
 * @package     AccessControl\Component
 */
class Group
{
	private $permissions = array();
	final private function __construct() {}

	/**
	 * Создание объекта группы с правами
	 *
	 * @param array $permissions
	 * @return Group
	 */
	public static function createWithPermissions(array $permissions)
	{
		$group = new Group();
		$group->permissions = $permissions;
		return $group;
	}

	/**
	 * Добавить привелегию
	 *
	 * @param $permission
	 */
	public function addPermission($permission)
	{
		$this->permissions[$permission] = 1;
	}

	/**
	 * Список привелегий
	 *
	 * @return array
	 */
	public function getPermissions()
	{
		return $this->permissions;
	}

	/**
	 * Проверка на существование
	 *
	 * @param $permission
	 * @return bool
	 */
	public function hasPermission($permission)
	{
		return isset($this->permissions[$permission]);
	}
}

// ---------------------------------------------------------------------------------------------------------------------
// > END Group < #
// --------------------------------------------------------------------------------------------------------------------- 