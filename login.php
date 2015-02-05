<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

if(isset($_GET['action']) && $_GET['action'] == 'end') {
	session_start();
	session_unset();
	session_destroy();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>login.php</title>
</head>
<body>
	<form method="post" action="content1.php">
		Username: <input type="text" name="username" />
		<input type="submit" value="Login">
	</form>
</body>
</html>