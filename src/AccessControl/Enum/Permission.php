<?php
/**
 * Project: SimpleAccessControl
 * User: MadFaill
 * Date: 06.08.14
 * Time: 17:40
 * File: Permission.php
 * Package: AccessControl\Enum
 *
 */
namespace AccessControl\Enum;

/**
 * Class        Permission
 * @description None.
 *
 * @author      MadFaill
 * @copyright   MadFaill 06.08.14
 * @since       06.08.14
 * @version     0.01
 * @package     AccessControl\Enum
 */
abstract class Permission
{
	const GRANT = 'grant';
	const DENY  = 'deny';
}

// ---------------------------------------------------------------------------------------------------------------------
// > END Permission < #
// --------------------------------------------------------------------------------------------------------------------- 