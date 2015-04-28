<?php
require 'db_connect.php';
//require 'session.php';

if(isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$password_hash = md5($password);
	
	if(!empty($username) && !empty($password)) {
		$query = mysql_query("SELECT *FROM users WHERE user_name='$username'");
			if(mysql_num_rows($query) > 0) {
				echo ('Username is taken!');
			}else{
				mysql_query("INSERT INTO users (user_name, user_hash) VALUES ('$username', '$password_hash')");
				echo('<script type="text/javascript">window.location = "index.php" </script>');
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
<title>Sign Up</title>
</head>

<body>
<div>
	<form action = 'signup.php' method="post" class="formBox">
    	Username: <input type="text" name="username">
        Password: <input type="password" name="password">
        <input type="submit" value="Sign up">
     </form>
     <form action="index.php">
     	<input type="submit" value="Cancel" class="downBtn">
     </form>   
</div>
<div>
<?php
include 'messages.php';
?>
</div>
</body>
</html>