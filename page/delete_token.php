<?
	include 'pack.php';
	include 'token.php';

	$status = 0;
	$msg = "";

	$token = $_GET["token"];

	$db = new SQLite3("token.db");

	if( isValidToken($db, $token) ){
		deleteToken($db, $token);
	}
	else{
		$status = -1;
		$msg = "invalid token";
	}

	$db->close();

	echo RESULT($status, $msg);

?>