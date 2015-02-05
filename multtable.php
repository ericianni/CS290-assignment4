<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
?>
<!DOCTYPE html>
<html>
<head>
	<title>multtable.php</title>
	<link rel="stylesheet" type="text/css" href="multtable.css">
</head>
<?php 
	
	$valid = true;
	if(isset($_GET['min-multiplicand']) === false) {
		echo "Missing parameter [min-multiplicand]<br />";
		$valid = false;
	} else {
		if((int)$_GET['min-multiplicand'] == NULL) {
			echo "[min-multiplicand] must be an integer<br />";
			$valid = false;
		} else {
			$minCand = $_GET['min-multiplicand'];
		}
	}
	
	if(isset($_GET['max-multiplicand']) === false) {
		echo "Missing parameter [max-multiplicand]<br />";
		$valid = false;
	} else {
		if((int)$_GET['max-multiplicand'] == NULL) {
			echo "[max-multiplicand] must be an integer<br />";
			$valid = false;
		} else {
			$maxCand = $_GET['max-multiplicand'];
		}
	}

	if(isset($_GET['min-multiplier']) == false) {
		echo "Missing parameter [min-multiplier]<br />";
		$valid = false;
	} else {
		if((int)$_GET['min-multiplier'] == NULL) {
			echo "[min-multiplier] must be an integer<br />";
			$valid = false;
		} else {
			$minMult = $_GET['min-multiplier'];
		}
	}
	
		if(isset($_GET['max-multiplier']) == false) {
		echo "Missing parameter [max-multiplier]<br />";
		$valid = false;
	} else {
		if((int)$_GET['max-multiplier'] == NULL) {
			echo "[max-multiplier] must be an integer<br />";
			$valid = false;
		} else {
			$maxMult = $_GET['max-multiplier'];
		}
	}
	if(!$valid) {
		echo "Can't proceed due to errors in input. See Above.<br />";
		exit();
	}

	if($minCand > $maxCand) {
		echo "min-multiplicand must be less than max-multiplicand <br />";
		$valid = false;
	}
	if($minMult > $maxMult) {
		echo "min-multiplier must be less than max-multiplier <br />";
		$valid = false;
	}

	if(!$valid) {
		echo "Can't proceed due to errors in input. See Above.<br />";
		exit();
	}
	echo "The Minimum Multiplicand is: ".$minCand."<br />";
	echo "The Maximum Multiplicand is: ".$maxCand."<br />";
	echo "The Minimum Multiplier is: ".$minMult."<br />";
	echo "The Maximum Multiplier is: ".$maxMult."<br />";



	echo "<table id='phpTable'>";
	echo "<thead>";
	echo "<tr>";
	for($row = 0; $row < $maxMult - $minMult + 2; $row++) {
		if($row === 0) {
			echo '<th></th>';
		}
		else {
			echo "<th>".($minMult + $row - 1)."</th>";
		}
	}
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	for($row = 0; $row < $maxCand - $minCand + 1; $row++) {
		echo "<tr>";
			for($col = 0; $col < $maxMult - $minMult + 2; $col++) {
				if($col === 0){
					echo "<th>".($minCand + $row)."</th>";
				} else {
					echo "<td>".($minCand + $row) * ($minMult + $col - 1)."</td>";
				}
			}
		echo "</tr>";
	}
	echo "</tbody></table>";

?>
</body>
</html>