<html>
<body>
	Permutations of <?php echo $_POST["perm"]; ?>:<br>
	<?php
		$s = $_POST["perm"];
		$length = strlen($s);
		$arr = array(
			$s
		);
		if($length>1)
		{
			$n = 1;
			for($i = $length-1; $i>1; $i--)
			{
				$n = $n*$i;
			}
			for($i=0; $i<$n; $i++) {
				if($i % 2 == 0) {
					for($x=0; $x<$length; $x++){
						$s = substr($s, 0, $x).substr($s, $x+1, 1).substr($s, $x, 1).substr($s, $x+2);
						array_push($arr, $s);
					}
					$s = substr($s, 1, 1).substr($s, 0, 1).substr($s, 2);
					array_push($arr, $s);
				} else {
					for($x=$length-1; $x>0; $x--){
						$s = substr($s, 0, $x-1).substr($s, $x, 1).substr($s, $x-1, 1).substr($s, $x+1, $length-($x+1));
						array_push($arr, $s);
					}
					$s = substr($s, 0, $length-2).substr($s, $length-1, 1).substr($s, $length-2, 1);
					array_push($arr, $s);
				}
			}
		}
		for($x=0; $x<sizeOf($arr); $x++){
			echo $arr[$x];
			echo("<br />");
		}
	?>
</body>
</html>