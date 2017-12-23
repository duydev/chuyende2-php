<?php
require_once realpath( './config/db.class.php' );

class User {

	private $userID;
	private $userName;
	private $email;
	private $password;

	public function __construct( $uname, $uemail, $upass ) {
		$this->userName = $uname;
		$this->email    = $uemail;
		$this->password = $upass;
	}

	public function save()
	{
		$db = new DB();
		$conn = $db->connect();

		if( empty( $this->userName ) || empty( $this->email ) || empty( $this->password ) ) {
			return false;
		}

		$uname = mysqli_real_escape_string( $conn, $this->userName );
		$uemail = mysqli_real_escape_string( $conn, $this->email );
		$upass = md5( $this->password );

		$query = "INSERT INTO users(Username, Email, Password) VALUES ('". $uname ."','". $uemail ."','". $upass ."')";

		return $db->execute_query( $query );
	}

	public function checkLogin( $uname, $upass ) {
		$db = new DB();
		$conn = $db->connect();

		$query = "SELECT * FROM users WHERE Username = '". mysqli_real_escape_string( $conn, $uname ) ."' AND Password = '". md5( $upass ) ."'";

		return $db->execute_query( $query );
	}

}