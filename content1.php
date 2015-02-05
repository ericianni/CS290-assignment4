<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

if(!isset($_SESSION['correct']) && (!$_POST || $_POST['username'] === "")){
	echo "A username must be entered. Click <a href=\"login.php\">here</a> to return to the login screen.";
} else {
	
	if(session_status() == PHP_SESSION_ACTIVE) {
		if(isset($_POST['username'])) {
			$_SESSION['username'] = $_POST['username'];
		}

		if(!isset($_SESSION['count'])) {
			$_SESSION['count'] = 0;
			$_SESSION['correct'] = true;
		}

		$_SESSION['count']++;
		echo "Hello $_SESSION[username] you have visted this page [$_SESSION[count]] times before. Click <a href=\"login.php?action=end\">here</a> to log out.<br /><br />";
		echo "Here is a link to a very exciting page: <a href=\"content2.php\">content2.php</a>";
	}
}
?>
</body>
</html>
