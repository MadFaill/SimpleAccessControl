<?php
/**
 * Project: SimpleAccessControl
 * User: MadFaill
 * Date: 06.08.14
 * Time: 17:51
 * File: Provider.php
 * Package: AccessControl
 *
 */
namespace AccessControl;

use AccessControl\Enum\Permission;
use AccessControl\Component\User;
use AccessControl\Component\ChildObject;

/**
 * Class        Provider
 * @description None.
 *
 * @author      MadFaill
 * @copyright   MadFaill 06.08.14
 * @since       06.08.14
 * @version     0.01
 * @package     AccessControl
 */
class Provider
{
	/**
	 * @var User
	 */
	private $user;
	private $default_access = Permission::GRANT;

	final private function __construct() {}

	/**
	 * Именованый конструктор
	 *
	 * @param User $user
	 * @return Provider
	 */
	public static function createForUser(User $user)
	{
		$acl = new Provider;
		$acl->user = $user;
		return $acl;
	}

	/**
	 * Проверка по ролям
	 * Роли идут по возрастанию
	 * Чем выше число - тем круче роль
	 *
	 * @param $role
	 * @return bool
	 */
	public function roleMatch($role)
	{
		return $this->user->getRole() >= $role;
	}

	/**
	 * Проверка на владельца объекта
	 *
	 * @param ChildObject $object
	 * @return bool
	 */
	public function ownerValidFor(ChildObject $object)
	{
		return $this->user->getId() == $object->getOwnerId();
	}

	/**
	 * Проверка конкретной привелегии
	 *
	 * @param $action
	 * @return bool
	 */
	public function userCan($action)
	{
		return $this->user->isPermittedFor($action);
	}

	/**
	 * Политика по-умолчанию
	 * Либо все дозволено либо наоборот
	 *
	 * @param $access
	 */
	public function setDefaultAccess($access)
	{
		$this->default_access = $access;
	}

	/**
	 * Получение дефолтовой политики
	 *
	 * @return string
	 */
	public function getDefaultAccess()
	{
		return $this->default_access;
	}
}

// ---------------------------------------------------------------------------------------------------------------------
// > END Provider < #
// --------------------------------------------------------------------------------------------------------------------- 