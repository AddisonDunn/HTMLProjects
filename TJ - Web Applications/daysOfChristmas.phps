<?php
	$arr = array(
		1 => 'one',
		2 => 'two',
		3 => 'three',
		4 => 'four',
		5 => 'five',
		6 => 'six',
	);

	function printArr($a) {
		for($x = 1; $x<=sizeOf($a); $x++) {
			for($y = $x; $y>=1; $y--) {
				echo($a[$y]." ");
			}
			echo("<br />");
		}
	}

	printArr($arr);
?>