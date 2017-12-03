<?php 
require_once 'personclass.php';

class Employee extends Person {
	private $employeeID;
	private $department;

	public function __construct( $employeeName, $nationID, $dept ) {
		parent::__construct( $employeeName, $nationID );
		$this->department = $dept;
		$this->employeeID = $this->generateEmployeeID();
	}

	public function getEmployeeID() {
		return $this->employeeID;
	}

	public function getDepartment() {
		return $this->department;
	}

	public function setDepartment( $dept ) {
		$this->department = $dept;
	}

	final private function generateEmployeeID() {
		static $IDGen = 1;
		return $IDGen++;
	}	

}