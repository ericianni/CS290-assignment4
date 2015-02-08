<?php
/**
 * Starts the session and displays any errors/warnings
 */
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
/**
 * This program logs the number of visits of a logged in user. 
 * The user must log in from login.php before coming to this page.
 * If the user does not, he or she is redirected to login.php
 * If the user has logged in, the page will also show a link to 
 * content2.php. Even if the user navigates away through the link
 * to content2.php or another website, the session will remain open
 * until the user decides to log out.
 */

//Checks to see if the user has not been to the page before and if a user name
//has been entered
if(!isset($_SESSION['correct']) && (!$_POST || $_POST['username'] === "")){
	echo "A username must be entered. Click <a href=\"login.php\">here</a> to return to the login screen.";
} else {
	//Checks to see if the session is open
	if(session_status() == PHP_SESSION_ACTIVE) {
		//checks to see if there is a username and if so stores it
		if(isset($_POST['username'])) {
			$_SESSION['username'] = $_POST['username'];
		}
		//if the session has not been initialized with count set it
		if(!isset($_SESSION['count'])) {
			$_SESSION['count'] = 0;
			//correct is used to signal the program that the user has succesfully
			//logged in before
			$_SESSION['correct'] = true;
		}

		$_SESSION['count']++;
		echo "Hello $_SESSION[username] you have visted this page [$_SESSION[count]] times. Click <a href=\"login.php?action=end\">here</a> to log out.<br /><br />";
		echo "Here is a link to a very exciting page: <a href=\"content2.php\">content2.php</a>";
	}
}
?>
</body>
</html>
