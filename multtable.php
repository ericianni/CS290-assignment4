<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Practice</title>
	<link rel="stylesheet" type="text/css" href="multtable.css">
</head>
<body>
<form action="multtable.php" method="get">
	What is the Minimum Multiplicand: <input type="number" name="min-multiplicand" value="" /><br />
	What is the Maximum Multiplicand: <input type="number" name="max-multiplicand" value="" /><br />
	What is the Minimum Multiplier: <input type="number" name="min-multiplier" value="" /><br />
	What is the Maximum Multiplier: <input type="number" name="max-multiplier" value="" /><br />
	<input type="submit" value="Submit" \>
</form>
<?php 
	
	$valid = true;
	$minCand = (int)$_GET['min-multiplicand'];
	$maxCand = (int)$_GET['max-multiplicand'];
	$minMult = (int)$_GET['min-multiplier'];
	$maxMult = (int)$_GET['max-multiplier'];

	echo "The Minimum Multiplicand is: ".$minCand."<br />";
	echo "The Maximum Multiplicand is: ".$maxCand."<br />";
	echo "The Minimum Multiplier is: ".$minMult."<br />";
	echo "The Maximum Multiplier is: ".$maxMult."<br />";

			echo gettype($minCand);
	if(gettype($minCand) != "integer") {

		echo "The Minimum Multiplicand must be an integer<br />";
		$valid = false;
	}

	if(gettype($maxCand) != "integer") {
		echo "The Maximum Multiplicand must be an integer<br />";
		$valid = false;
	}
	
	if(gettype($minMult) != "integer") {
		echo "The Minimum Multiplier must be an integer<br />";
		$valid = false;
	}

	if(gettype($maxMult) != "integer") {
		echo "The Minimum Multiplier must be an integer<br />";
		$valid = false;
	}

	if($minCand >= $maxCand) {
		echo "min-multiplicand not less than max-multiplicand<br />";
		$valid = false;
	}

	if($minMult >= $maxMult) {
		echo "min-multiplier not less than max-multiplier<br />";
		$valid = false;
	}

	if($minCand == NULL || $maxCand == NULL || $minMult == NULL || $maxMult == NULL) {
		
		if($minCand == NULL) {
			echo "Missing parameter [min-multiplicand]<br />";
		}
		if($maxCand == NULL) {
			echo "Missing parameter [min-multiplicand]<br />";
		}
		if($minMult == NULL) {
			echo "Missing parameter [min-multiplicand]<br />";
		}
		if($maxMult == NULL) {
			echo "Missing parameter [min-multiplicand]<br />";
		}
		$valid = false;
	}

	if($minCand >= $maxCand) {
		echo "min-multiplicand not less than max-multiplicand<br />";
		$valid = false;
	}
	if($minMult >= $maxMult) {
		echo "min-multiplier not less than max-multiplier<br />";
		$valid = false;
	}

	if($valid === false) {
		exit();
	}

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