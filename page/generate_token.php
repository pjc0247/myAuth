<?
/*
	login.php

	���� ��ū �߱޹޴� ������.
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

	// ��ȿ�� ���� ��ū���� �˻�
	if( isValidAppToken($db, $client_id,$client_secret) ){
		// �� ���� ��ū�� �߱�
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