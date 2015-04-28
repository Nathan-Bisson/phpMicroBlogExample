<?php
ob_start();
session_start();
require 'db_connect.php';

$query = "SELECT u.user_name, m.user_id, m.message_text, m.time_stamp FROM users AS u INNER JOIN messages AS m ON u.user_id = m.user_id";
//$query_name = "SELECT u.user_name, m.user_id FROM users AS u INNER JOIN messages AS m ON u.user_id = m.user_id";
$result = mysql_query($query);
if($result) {
	while($row = mysql_fetch_assoc($result)) {
		echo('<div class="messageDiv">');
		echo('<p class="messageSub">' . $row['message_text'] . '</p>');
		echo('<p class="messageDit">' . $row['time_stamp'] . '</p>');
		echo('<p class="messageDit">' . $row['user_name'] . '</p>');
		echo('</div>');
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
