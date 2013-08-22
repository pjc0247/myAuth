<?
/*
	app_token.php

	앱 관련 토큰을 발급/관리하는 코드
*/


function generateAppToken($db, $name){
	$id = md5(uniqid());
	$secret = md5(uniqid());
	
	$db->query("insert into app_token (name,app_id,app_secret) values (\"".$name."\",\"".$id."\",\"". $secret. "\");");

	return array($id, $secret);
}

function deleteAppToken($db, $id){
	$db->query("delete from app_token where app_id=\"".$app."\";");
}

function isValidAppToken($db, $id, $secret){
	$result = $db->query("select app_id,app_secret from app_token where app_id=\"".$id."\" and app_secret=\"".$secret."\";");

	$rows = $result->fetchArray();

	if(count($rows) == 1)
		return false;
	return true;
}

function getDataByAppToken($db, $id){
	$result = $db->query("select name,app_id,app_secret from app_token where app_id=\"".$id."\";");

	$rows = $result->fetchArray();

	if(count($rows) == 1)
		return false;

	return array($rows[0], $rows[2]);
}

?>