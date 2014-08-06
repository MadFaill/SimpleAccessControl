<?php
/**
 * Project: SimpleAccessControll
 * User: MadFaill
 * Date: 06.08.14
 * Time: 18:21
 * File: group-based.php
 *
 */

require __DIR__.'/../vendor/autoload.php';
require __DIR__."/cls/User.php";

use AccessControl\Provider;
use AccessControl\Enum\Role;
use AccessControl\Component\Group;

$permissions_list = array(
	'edit.post' => 1
);

$permissions_list_2 = array(
	'delete.post' => 1
);

$user = new User("Sergey", 1, Role::ROLE_USER);

$user->addGroup(Group::createWithPermissions($permissions_list));
$user->addGroup(Group::createWithPermissions($permissions_list_2));

$acl = Provider::createForUser($user);

var_dump($user->getName(), 'edit.post', $acl->userCan('edit.post'));
print "------------- \r\n";
var_dump($user->getName(), 'delete.post', $acl->userCan('delete.post'));
print "------------- \r\n";
var_dump($user->getName(), 'publish.post', $acl->userCan('publish.post'));