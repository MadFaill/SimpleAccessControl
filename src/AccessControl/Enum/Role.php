<?php
/**
 * Project: SimpleAccessControl
 * User: MadFaill
 * Date: 06.08.14
 * Time: 17:39
 * File: Role.php
 * Package: AccessControl\Enum
 *
 */
namespace AccessControl\Enum;

/**
 * Class        Role
 * @description None.
 *
 * @author      MadFaill
 * @copyright   MadFaill 06.08.14
 * @since       06.08.14
 * @version     0.01
 * @package     AccessControl\Enum
 */
abstract class Role
{
	const ROLE_VISITOR = 0;
	const ROLE_USER    = 1;
	const ROLE_ADMIN   = 90;
	const ROLE_ROOT    = 666;
}

// ---------------------------------------------------------------------------------------------------------------------
// > END Role < #
// --------------------------------------------------------------------------------------------------------------------- 