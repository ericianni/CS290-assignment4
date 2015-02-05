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
	if(!isset($_SESSION['correct'])) {
		echo "A username must be entered. Click <a href=\"login.php\">here</a> to return to the login screen.";
	} else {
		echo "Return to <a href=\"content1.php\">content1.php</a>";
	}

?>
</body>
</html>

