<?php
/**
 * Project: SimpleAccessControl
 * User: MadFaill
 * Date: 06.08.14
 * Time: 18:06
 * File: role-based.php
 *
 */

require __DIR__.'/../tests/bootstrap.php';

use AccessControl\Provider;
use AccessControl\Enum\Role;
use Tests\Objects\User;


$user = new User("Sergey", 1, Role::ROLE_USER);

$acl = Provider::createForUser($user);

var_dump($user->getName(), 'Role::ROLE_ROOT', $acl->roleMatch(Role::ROLE_ROOT));
print "------------- \r\n";
var_dump($user->getName(), 'Role::ROLE_VISITOR', $acl->roleMatch(Role::ROLE_VISITOR));
print "------------- \r\n";
var_dump($user->getName(), 'Role::ROLE_USER', $acl->roleMatch(Role::ROLE_USER));