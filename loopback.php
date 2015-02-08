<?php
/**
 * This piece of code will display all errors and warnings.
 */
error_reporting(E_ALL);
ini_set('display_errors', 'On');
?>
<!DOCTYPE html>
<html>
<head>
	<title>loopback.php</title>
</head>
<body>
<?php
/**
 * This program will take a Server Request and handle it according to the following:
 * If the request method is not set the program will display so and stop.
 * If the request method is GET or POST but with zero parameters the program
 * will display the type of request with parameters as null.
 * If the request is a GET or POST with parameters the program will display the
 * type of request followed by the parameters arranged by key and value.
 * All displays are in JSON format for the requests.
 * Finally if the request method is not GET or POST the program will
 * display an error to the screen that states this program can only handle 
 * GET and POST and display the received request method.
 */
if(isset($_SERVER['REQUEST_METHOD'])) {
	/**
	 * Holds the type of request_method
	 * @var [type]
	 */
	$type = $_SERVER['REQUEST_METHOD'];
	
	if(!$_POST && !$_GET && ($type == "GET" || $type == "POST")) {
		/**
		 * is an array that will hold the information to be displayed
		 * in JSON format
		 * @var array
		 */
		$empty = array('TYPE' => "[$type]", 'parameters' => null);
		echo json_encode($empty);
	} else {
		if($type == "GET") {
			/**
			 * is an array that will hold the information to be displayed
		 	 * in JSON format
			 * @var array
			 */
			$json = array('TYPE' => '[GET]', 'parameters' => $_GET);
			echo json_encode($json);
		} else {
			if($type == "POST") {
				/**
				 * is an array that will hold the information to be displayed
			 	 * in JSON format
				 * @var array
				 */
				$json = array('TYPE' => '[POST]', 'parameters' => $_POST);
				echo json_encode($json);
			} else {
				echo "Expecting either POST or GET. Can't handle request type: $type";
			}
		}
	}
} else {
	echo "No Request Method detected, please try again.";
}
?>
</body>
</html>