<?php
require_once realpath( './config/db.class.php' );

class Product {

	private $productID;
	private $productName;
	private $catID;
	private $price;
	private $quantity;
	private $description;
	private $picture;

	/**
	 * Product constructor.
	 *
	 * @param $productID
	 * @param $productName
	 * @param $catID
	 * @param $price
	 * @param $quantity
	 * @param $description
	 * @param $picture
	 */
	public function __construct( $productName, $catID, $price, $quantity, $description, $picture ) {
		$this->productName = $productName;
		$this->catID       = $catID;
		$this->price       = $price;
		$this->quantity    = $quantity;
		$this->description = $description;
		$this->picture     = $picture;
	}

	/**
	 * Save product.
	 *
	 * @return bool|mysqli_result
	 */
	public function save() {
		$db = new DB();

		$picture_tmp_name = $this->picture['tmp_name'];
		$picture_name     = 'uploads/' . time() . $this->picture['name'];

		// echo $picture_name; exit;

		if( ! move_uploaded_file( $picture_tmp_name , $picture_name ) ) {
			return false;
		}

		$query = "INSERT INTO `product` (`productID`, `catID`, `productName`, `price`, `quantity`, `description`, `picture`) VALUES 
		('$this->productID', '$this->catID', '$this->productName', '$this->price', '$this->quantity', '$this->description', '$picture_name')";

		$res = $db->execute_query( $query );

		return $res;
	}

	public static function list_products() {
		$db = new DB();

		$query = "SELECT * FROM product";

		$res = $db->select_to_array( $query );

		return $res;
	}

	public static function list_products_by_cat_id( $catID ) {
		$db = new DB();

		$query = "SELECT * FROM product WHERE catID=$catID";

		$res = $db->select_to_array( $query );

		return $res;
	}

}