<?
/*
	generate_app_token.php

	앱 토큰 발급받는 페이지.
*/

	include 'app_token.php';

	$name = $_GET["name"];

	$db = new SQLite3("token.db");

	$token = generateAppToken($db, $name);

	$db->close();

	echo "<b>App ID Generator </b><br><br>";
	echo "App Name : ".$name."<br><br>";

	echo "<table border=5>";

	echo "<tr><td>";
	echo "&nbsp;&nbsp;App ID";
	echo "</td><td>";
	echo "&nbsp;&nbsp;App Secret";
	echo "</td></tr>";

	echo "<tr><td>";
	echo $token[0];
	echo "</td><td>";
	echo $token[1];
	echo "</td></tr>";
	echo "</table>";
?>	

<br><br>
<a href="generate_app_token.php">
<input type="button" value="regenerate" />
</a>