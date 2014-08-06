<?php
/**
 * Project: SimpleAccessControll
 * User: MadFaill
 * Date: 06.08.14
 * Time: 18:09
 * File: User.php
 *
 */

use AccessControl\Component\User as ACUser;

/**
 * Class        User
 * @description None.
 *
 * @author      MadFaill
 * @copyright   MadFaill 06.08.14
 * @since       06.08.14
 * @version     0.01
 */
class User extends ACUser
{
	private $role;
	private $id;
	private $name;

	public function __construct($name, $id, $role)
	{
		$this->role = $role;
		$this->id   = $id;
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getRole()
	{
		return $this->role;
	}
}

// ---------------------------------------------------------------------------------------------------------------------
// > END User < #
// --------------------------------------------------------------------------------------------------------------------- 