<?
/*
	is_valid_token.php

*/
	include 'pack.php';
	include 'token.php';

	$token = $_GET["token"];

	$status = 0;
	$msg = "";

	$db = new SQLite3("token.db");

	if( isValidToken($db, $token) ){
	}
	else{
		$status = -1;
		$msg = "invalid token";
	}

	$db->close();

	echo RESULT($status, $msg);
?>