<?php
require 'db_connect.php';
require 'session.php';

if(isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$password_hash = md5($password);
	
	if(!empty($username) && !empty($password)) {
		$query = "SELECT `user_id` FROM `users` WHERE `user_name`='$username' AND `user_hash`='$password_hash'";
		if($query_run = mysql_query($query)) {
			$query_num_rows = mysql_num_rows($query_run);
			if ($query_num_rows==0) {
				echo('invalid username or password');	
			} else if($query_num_rows == 1) {
				$user_id = mysql_result($query_run, 0, 'user_id');
				$_SESSION['user_id']=$user_id;
				$_SESSION['username']=$username;
				header('Location: index.php');
			}
		}
	} else {
		echo("You must enter a username and password");
	}
}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Log In</title>
</head>

<body>
<div id="banner">
	<form action = 'index.php' method="post">
    	Username: <input type="text"  name="username">
        Password: <input type="password" name="password">
        <input type="submit" value="Log in">
     </form>
     <form action = 'signup.php' method="post">
    	<input type="submit" value="Sign up">
     </form>
</div>
<div>
<?php
include 'messages.php';
?>
</div>
</body>
</html>