<?php
require_once '../config/db.class.php';

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
	public function __construct( $productID, $productName, $catID, $price, $quantity, $description, $picture ) {
		$this->productID   = $productID;
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

		$query = "INSERT INTO `product` (`productID`, `catID`, `productName`, `price`, `quantity`, `description`, `picture`) VALUES 
		('$this->productID', '$this->catID', '$this->productName', '$this->price', '$this->quantity', '$this->description', '$this->picture')";

		$res = $db->execute_query( $query );

		return $res;
	}

}