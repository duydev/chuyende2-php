<?php
session_start();
if( ! empty( $_SESSION['user'] ) ) {
	// case loged in
	unset($_SESSION['user']);
	session_destroy();
}

header("Location: index.php");	