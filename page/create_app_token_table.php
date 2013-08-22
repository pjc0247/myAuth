<?
	$db = new SQLite3("token.db");

	echo $db->query("create table app_token (name char(32), app_id char(32), app_secret char(32));");

	$db->close();
?>