<?
/*
	token.php

	토큰을 발급/관리해주는 코드
*/



/*
	해당 uid에게 토큰을 발급해주는 함수
*/
function generateToken($db, $uid, $app){
	$token = md5(uniqid($uid+$app, true));
	
	$db->query("insert into token (id,token,app_id) values (\"".$uid."\",\"". $token. "\",\"".$app."\");");
	return $token;
}

/*
	해당 uid에 연결된 모든 토큰을 삭제하는 함수
*/
function deleteTokenByUid($db, $uid, $app){
	$db->query("delete from token where id=\"".$uid."\" and app_id=\"".$app."\";");
}
function deleteToken($db, $token){
	$db->query("delete from token where token=\"".$token."\";");
}

/*
	토큰과 uid가 일치하는지 검사하는 함수
*/
function checkToken($db, $uid, $app, $token){
	$result = $db->query("select id from token where id=\"".$uid."\" and token=\"".$token."\" and app_id=\"".$app."\";");

	$rows = $result->fetchArray();

	if(count($rows) == 1)
		return false;
	return true;
}

/*
	토큰으로부터 uid를 찾아오는 함수
*/
function getDataByToken($db, $token){
	$result = $db->query("select id,app_id from token where token=\"".$token."\";");

	$rows = $result->fetchArray();

	if(count($rows) == 1)
		return false;


	return array($rows[0], $rows[1]);
}

/*
	유효한 토큰인지 검사해주는 함수
*/
function isValidToken($db, $token){
	if(getDataByToken($db, $token) == false)
		return false;
	return true;
}

?>