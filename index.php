<?php
ob_start();
session_start();
require 'db_connect.php';
//require 'session.php';

if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
	header('Location: logout.php');
	//echo ("your logged in");
	//echo($_SESSION['username']);
} else {
	include 'login.php';
}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Microblog</title>
</head>

<body>
</body>
</html>