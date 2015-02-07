<?php
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
if(isset($_SERVER['REQUEST_METHOD'])) {
	$type = $_SERVER['REQUEST_METHOD'];
	
	if(!$_POST && !$_GET && ($type == "GET" || $type == "POST")) {
		$empty = array('TYPE' => "[$type]", 'parameters' => null);
		echo json_encode($empty);
	} else {
		if($type == "GET") {
			$json = array('TYPE' => '[GET]', 'parameters' => $_GET);
			echo json_encode($json);
		} else {
			if($type == "POST") {
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