<?php
if(isset($_POST['btnLogout'])) {
	session_start();
	unset($_SESSION);
	session_destroy();
	session_write_close();
	header('Location: index.php');
die;
} elseif(isset($_POST['btnPost'])) {
	require 'db_connect.php';
	ob_start();
	session_start();
	$user_input = $_POST['textField'];
	$user_id = $_SESSION['user_id'];
	
	$query = "INSERT INTO messages (`message_text`, `user_id`) VALUES ('$user_input', '$user_id')";
	
	if(!empty($user_input)) {
		mysql_query("INSERT INTO messages (`message_text`, `user_id`) VALUES ('$user_input', '$user_id')");
	} else {
		echo("Please enter a message!");
	}
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
<div id="banner">
	<form action="logout.php" method="post">
    	<input type="submit" name="btnLogout" value="Logout">
    </form>
</div>
<div>
<?php
include 'messages.php';
?>
</div>
<div id="userInput">
	<form action="logout.php" method="post">
    	<input type="text" name="textField">
       <input type="submit" name="btnPost" value="Post">
    </form>
</div>
</body>
</html>