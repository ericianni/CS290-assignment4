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
	if(!$_POST && !$_GET) {
		$empty = array('TYPE' => '[GET|POST]', 'parameters' => null);
		echo json_encode($empty);
	} else {
		if(!$_POST) {
			$json = array('TYPE' => '[GET]', 'parameters' => $_GET);
			echo json_encode($json);
		} else {
			$json = array('TYPE' => '[POST]', 'parameters' => $_POST);
			echo json_encode($json);
		}
	}
?>
</body>
</html>