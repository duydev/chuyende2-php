<?php 
require_once 'helpers.php';

class User {

	private $username;
	private $userEmail;
	private $userID;
	private $status;

	public function __construct( $newUser, $email )	{
		$this->username = $newUser;
		$this->userEmail = $email;
		$this->status = 1;
		$this->userID = getNextUserID();
	}

	public function __destruct() {
		unset( $this->username );
		unset( $this->userEmail );
		unset( $this->userID );
		unset( $this->status );
	}

	public function getUserName() {
		return $this->username;
	}

	public function getUserEmail() {
		return $this->userEmail;
	}

	public function getUserID() {
		return $this->userID;
	}

	public function getStatus() {
		return $this->status;
	}

	public function setUserStatus( $input ) {
		if( in_array( $input , [0, 1]) ) {
			$this->status = $input;
			return true;
		}
		return false;
	}



}