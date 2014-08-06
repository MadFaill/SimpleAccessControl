<?php
/**
 * Project: SimpleAccessControl
 * User: MadFaill
 * Date: 06.08.14
 * Time: 19:23
 * File: TestCase.php
 * Package: Tests
 *
 */
namespace Tests;

use Tests\Objects\User;
use Tests\Objects\Post;
use AccessControl\Enum\Role;
use AccessControl\Provider;
use AccessControl\Component\Group;

/**
 * Class        TestCase
 * @description None.
 *
 * @author      MadFaill
 * @copyright   MadFaill 06.08.14
 * @since       06.08.14
 * @version     0.01
 * @package     Tests
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
	private $user;
	private $posts = array();

	/** @var  Provider */
	private $acl;

	public function setUp()
	{
		$this->user = new User('Test', 1, Role::ROLE_USER);

		$perms_1 = array('edit.record'=>1);
		$perms_2 = array('delete.record'=>1);

		$group_1 = Group::createWithPermissions($perms_1);
		$group_2 = Group::createWithPermissions($perms_2);

		$this->user->addGroup($group_1);
		$this->user->addGroup($group_2);

		$this->posts['valid'] = new Post('valid', 1);
		$this->posts['invalid'] = new Post('invalid', 2);

		$this->acl = Provider::createForUser($this->user);
	}

	public function testGroup()
	{
		$can_edit = $this->acl->userCan('edit.record');
		$this->assertEquals($can_edit, true, "userCan(edit.record)");

		$can_publish = $this->acl->userCan('publish.record');
		$this->assertEquals($can_publish, false, "userCan(publish.record)");

		$can_delete = $this->acl->userCan('delete.record');
		$this->assertEquals($can_delete, true, "userCan(delete.record)");
	}

	public function testOwner()
	{
		$is_owner = $this->acl->ownerValidFor($this->posts['valid']);
		$this->assertEquals($is_owner, true, "ownerValidFor(this->posts['valid'])");

		$is_not_owner = $this->acl->ownerValidFor($this->posts['invalid']);
		$this->assertEquals($is_not_owner, false, "ownerValidFor(this->posts['invalid'])");
	}

	public function testRole()
	{
		$role_match = $this->acl->roleMatch(Role::ROLE_VISITOR);
		$this->assertEquals($role_match, true, "roleMatch(Role::ROLE_VISITOR)");

		$role_match = $this->acl->roleMatch(Role::ROLE_USER);
		$this->assertEquals($role_match, true, "roleMatch(Role::ROLE_USER)");

		$role_not_match = $this->acl->roleMatch(Role::ROLE_ROOT);
		$this->assertEquals($role_not_match, false, "roleMatch(Role::ROLE_ROOT)");
	}
}

// ---------------------------------------------------------------------------------------------------------------------
// > END TestCase < #
// --------------------------------------------------------------------------------------------------------------------- 