<?php
require_once realpath( './config/db.class.php' );

class Category {

	private $catID;
	private $catName;
	private $description;

	/**
	 * Category constructor.
	 */
	public function __construct( $catName, $description ) {
		$this->catName     = $catName;
		$this->description = $description;
	}

	public static function list_category() {
		$db = new DB();

		$query = "SELECT * FROM category";

		$res = $db->select_to_array( $query );

		return $res;
	}

}