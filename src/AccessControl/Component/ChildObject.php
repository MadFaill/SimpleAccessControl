<?php
/**
 * Project: SimpleAccessControl
 * User: MadFaill
 * Date: 06.08.14
 * Time: 17:41
 * File: ChildObject.php
 * Package: AccessControl\Component
 *
 */

namespace AccessControl\Component;


interface ChildObject
{
	/**
	 * Возврат идентификатора пользователя-владельца
	 *
	 * @return int
	 */
	public function getOwnerId();
} 