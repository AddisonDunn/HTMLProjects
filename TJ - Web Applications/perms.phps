<html>
<body>
	Permutations of <?php echo $_POST["perm"]; ?>:<br>
	<?php
		$s = $_POST["perm"];
		$length = strlen($s);
		$arr = array();
		function perm($p, $s) {
			$n = strlen($s);
			global $arr;
			if($n==0) {
				array_push($arr, $p);
			}
			else {
				for($i = 0; $i<$n; $i++)
				{
					perm($p.substr($s, $i, 1), substr($s, 0, $i).substr($s, $i+1));
				}
			}
		}
		if($length>1)
		{
			if($length==2) {
				$s = substr($s, 1).substr($s, 0, 1);
				array_push($arr, $s);
			}
			else{
				perm('', $s);
			}
		}
		
		for($x=0; $x<sizeOf($arr); $x++){
			echo $arr[$x];
			echo("<br />");
		}
	?>
</body>
</html>