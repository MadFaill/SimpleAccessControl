<?php
/**
 * Project: SimpleAccessControll
 * User: MadFaill
 * Date: 06.08.14
 * Time: 18:26
 * File: object-based.php
 *
 */

require __DIR__.'/../vendor/autoload.php';
require __DIR__."/cls/User.php";
require __DIR__."/cls/Post.php";

use AccessControl\Provider;
use AccessControl\Enum\Role;

$user = new User("Sergey", 1, Role::ROLE_USER);

$post1 = new Post('Sergey post', 1);
$post2 = new Post('other post', 2);


$acl = Provider::createForUser($user);

var_dump($user->getName(), $post1->getTitle(), $acl->ownerValidFor($post1));
print "------------- \r\n";
var_dump($user->getName(), $post2->getTitle(), $acl->ownerValidFor($post2));