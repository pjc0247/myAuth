<?
/*
	login.php

	유저 토큰 발급받는 페이지.
*/
	include 'pack.php';
	include 'token.php';
	include 'app_token.php';

	$status = 0;
	$msg = "";

	$client_id = $_GET["client_id"];
	$client_secret = $_GET["client_secret"];
	$uid = $_GET["user_id"];


	$db = new SQLite3("token.db");

	// 유효한 게임 토큰인지 검사
	if( isValidAppToken($db, $client_id,$client_secret) ){
		// 새 유저 토큰을 발급
		$token = generateToken($db, $uid, $client_id);

		$status = 0;
		$msg = $token;
	}
	else{
		$status = -1;
		$msg = "invalid app token";
	}

	$db->close();	

	echo RESULT($status, $msg);
?>