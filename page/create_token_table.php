<?
	$db = new SQLite3("token.db");

	echo $db->query("create table token (id char(16), token char(32), app_id char(32));");

	$db->close();
?>