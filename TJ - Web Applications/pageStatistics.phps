<html>
<body>
	<head>
		<title>Page Statistics!</title>
	</head>
	<?php
	//
		$t = date('H:i:s');
		$d = date("Y-m-d",time());
		echo('Time: '.$t.'<br>');
		echo('Date: '.$d.'<br>');

		$filename = 'stats.txt';
		if(file_exists($filename)) {
			$file = fopen($filename, 'r');
			if(flock($file, LOCK_EX))
			{
				$arr = json_decode(fgets($file), true);
				flock($file, LOCK_UN);
			}
			fclose($file);

			$oldv = $arr[1];
			$oldt = $arr[2];
			$oldd = $arr[3];

			$v = $oldv+1;
			echo('Number of visits: '.$v.'<br>');
			echo('Last time: '.$oldt.'<br>');
			echo('Last date: '.$oldd.'<br>');
		}
		else {
			$v = 1;
			echo('Number of visits: '.$v.'<br>');
			echo('Last time: '.$t.'<br>');
			echo('Last date: '.$d.'<br>');
		}
		
		$newArr = array(
			1 => $v,
			2 => $t,
			3 => $d,
		);

		$file = fopen($filename, 'w+');
		if(flock($file, LOCK_EX))
		{
			file_put_contents($filename, json_encode($newArr));
			flock($file, LOCK_UN);
		}
		fclose($file);

	?>
</body>
</html>