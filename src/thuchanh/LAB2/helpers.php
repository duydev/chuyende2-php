<?php 

function getNextUserID() {
	/** */
	static $userID = 1;
	return $userID++;
}