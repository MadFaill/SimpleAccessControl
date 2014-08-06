<?php
/**
 * Project: SimpleAccessControl
 * User: MadFaill
 * Date: 06.08.14
 * Time: 19:20
 * File: bootstrap.php
 *
 */

$loader = require __DIR__ . "/../vendor/autoload.php";
$loader->addPsr4('Tests\\', __DIR__.'/Tests');

date_default_timezone_set('UTC');