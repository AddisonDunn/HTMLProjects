<html>
<body>
	<?php
		$maindb = new SQLite3('maindb');

		$stmt = $maindb->prepare("SELECT * from tab1 ORDER BY points");
		$result = $stmt->execute();
		$result->fetchArray();
		$x = 0;
		$names[0] = '';
		$points[0] = '';
		while($row=$result->fetchArray()) {
			 $names[$x] = $row['name'];
			 $points[$x] = $row['points'];
			 $x++;
		}
		for($i = 0; $i<sizeOf($names); $i++)
		{
			echo $names[$i]."'s total points so far in the 2014-2015 season: ".$points[$i].'</br>';
		}

	?>
</body>
</html>