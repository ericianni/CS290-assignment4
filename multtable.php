<?php
/**
 * This piece of code will display all errors and warnings
 */
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
	/**
	 * This program will receive a GET request and parse the arguments.
	 * It expects four: min-multicand, max-multicand, min-multiplier,
	 * max-multiplier. If any are missing it will display errors and 
	 * exit. If any are not integers it will display errors and exit.
	 * If either of the min's are larger than their respective max's
	 * it will display errors and exit. If the data is valid the program
	 * will create an html table and populate it with the multicands
	 * down the left side and multipliers along the top. The middle of
	 * the table will be populated with the products of each respective
	 * row and column combination.
	 */

	/**
	 * Will help determine when the code should stop based upon the
	 * validity of the input
	 * @var boolean
	 */
	$valid = true;
	if(isset($_GET['min-multiplicand']) === false) {
		echo "Missing parameter [min-multiplicand]<br />";
		/**
		 * The input is invalid so set to false
		 * @var boolean
		 */
		$valid = false;
	} else {
		if(!is_int($_GET['min-multiplicand'] + 0) || !is_numeric($_GET['min-multiplicand'])) {
			echo "[min-multiplicand] must be an integer<br />";
			/**
			 * The input is invalid so set to false
			 * @var boolean
			 */
			$valid = false;
		} else {
			/**
			 * assigns the min-multicand a value from the GET request
			 * @var [type]
			 */
			$minCand = $_GET['min-multiplicand'];
		}
	}
	
	if(isset($_GET['max-multiplicand']) === false) {
		echo "Missing parameter [max-multiplicand]<br />";
		/**
		 * The input is invalid so set to false
		 * @var boolean
		 */
		$valid = false;
	} else {
		if(!is_int($_GET['max-multiplicand'] + 0) || !is_numeric($_GET['max-multiplicand'])) {
			echo "[max-multiplicand] must be an integer<br />";
			/**
			 * The input is invalid so set to false
			 * @var boolean
			 */
			$valid = false;
		} else {
			/**
			 * assigns the max-multicand a value from the GET request
			 * @var [type]
			 */
			$maxCand = $_GET['max-multiplicand'];
		}
	}

	if(isset($_GET['min-multiplier']) == false) {
		echo "Missing parameter [min-multiplier]<br />";
		/**
		 * The input is invalid so set to false
		 * @var boolean
		 */
		$valid = false;
	} else {
		if(!is_int($_GET['min-multiplier'] + 0) || !is_numeric($_GET['min-multiplier'])) {
			echo "[min-multiplier] must be an integer<br />";
			/**
			 * The input is invalid so set to false
			 * @var boolean
			 */
			$valid = false;
		} else {
			/**
			 * assigns the min-multiplier a value from the GET request
			 * @var [type]
			 */
			$minMult = $_GET['min-multiplier'];
		}
	}
	
		if(isset($_GET['max-multiplier']) == false) {
		echo "Missing parameter [max-multiplier]<br />";
		/**
		 * The input is invalid so set to false
		 * @var boolean
		 */
		$valid = false;
	} else {
		if(!is_int($_GET['max-multiplier'] + 0) || !is_numeric($_GET['max-multiplier'])) {
			echo "[max-multiplier] must be an integer<br />";
			/**
			 * The input is invalid so set to false
			 * @var boolean
			 */
			$valid = false;
		} else {
			/**
			 * assigns the max-multiplier a value from the GET request
			 * @var [type]
			 */
			$maxMult = $_GET['max-multiplier'];
		}
	}
	if(!$valid) {
		echo "Can't proceed due to errors in input. See Above.<br />";
		exit();
	}

	if($minCand > $maxCand) {
		echo "min-multiplicand must be less than max-multiplicand <br />";
		/**
		 * The input is invalid so set to false
		 * @var boolean
		 */
		$valid = false;
	}
	if($minMult > $maxMult) {
		echo "min-multiplier must be less than max-multiplier <br />";
		/**
		 * The input is invalid so set to false
		 * @var boolean
		 */
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
	//creates the thead section of the table
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
	//creates the tbody section of the table
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