<?
/*
	token.php

	��ū�� �߱�/�������ִ� �ڵ�
*/



/*
	�ش� uid���� ��ū�� �߱����ִ� �Լ�
*/
function generateToken($db, $uid, $app){
	$token = md5(uniqid($uid+$app, true));
	
	$db->query("insert into token (id,token,app_id) values (\"".$uid."\",\"". $token. "\",\"".$app."\");");
	return $token;
}

/*
	�ش� uid�� ����� ��� ��ū�� �����ϴ� �Լ�
*/
function deleteTokenByUid($db, $uid, $app){
	$db->query("delete from token where id=\"".$uid."\" and app_id=\"".$app."\";");
}
function deleteToken($db, $token){
	$db->query("delete from token where token=\"".$token."\";");
}

/*
	��ū�� uid�� ��ġ�ϴ��� �˻��ϴ� �Լ�
*/
function checkToken($db, $uid, $app, $token){
	$result = $db->query("select id from token where id=\"".$uid."\" and token=\"".$token."\" and app_id=\"".$app."\";");

	$rows = $result->fetchArray();

	if(count($rows) == 1)
		return false;
	return true;
}

/*
	��ū���κ��� uid�� ã�ƿ��� �Լ�
*/
function getDataByToken($db, $token){
	$result = $db->query("select id,app_id from token where token=\"".$token."\";");

	$rows = $result->fetchArray();

	if(count($rows) == 1)
		return false;


	return array($rows[0], $rows[1]);
}

/*
	��ȿ�� ��ū���� �˻����ִ� �Լ�
*/
function isValidToken($db, $token){
	if(getDataByToken($db, $token) == false)
		return false;
	return true;
}

?>