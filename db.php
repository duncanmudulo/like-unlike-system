<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "vote";

$conn = mysql_connect($host, $user, $password);
if(!$conn)
{
	echo "Unable to connect to database";
}
else
{
	mysql_select_db($db);
	
}

?>
