<?php
/**
 * Project: SimpleAccessControl
 * User: MadFaill
 * Date: 06.08.14
 * Time: 18:13
 * File: Post.php
 *
 */

namespace Tests\Objects;

use AccessControl\Component\ChildObject;

/**
 * Class        Post
 * @description None.
 *
 * @author      MadFaill
 * @copyright   MadFaill 06.08.14
 * @since       06.08.14
 * @version     0.01
 */
class Post implements ChildObject
{
	private $owner_id;
	private $title;

	public function __construct($title, $owner_id)
	{
		$this->title = $title;
		$this->owner_id = $owner_id;
	}

	public function getOwnerId()
	{
		return $this->owner_id;
	}

	public function getTitle()
	{
		return $this->title;
	}
}

// ---------------------------------------------------------------------------------------------------------------------
// > END Post < #
// --------------------------------------------------------------------------------------------------------------------- 