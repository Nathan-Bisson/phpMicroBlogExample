<?php
$db_user = "root";
$db_pass = "root";
$db_host = "localhost";

$db_database = "micro_blog";

$db_handle = mysql_connect($db_host, $db_user, $db_pass) or die("Could not connect to database");

if (!mysql_connect($db_host, $db_user, $db_pass) || !mysql_select_db($db_database)) {
	die(mysql_error());
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>