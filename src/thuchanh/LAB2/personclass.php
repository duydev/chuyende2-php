<?php 

class Person
{

	private $name;
	private $nationID;

    public function __construct( $personName, $ID )
    {
        $this->name = strtolower( $personName );
        $this->nationID = $ID;
    }

    public function getName() {
    	return $this->name;
    }

    public function setName( $newName ) {
    	$this->name = strtoupper( $newName );
    }

    public function getNationID() {
    	return $this->nationID;
    }
    
}