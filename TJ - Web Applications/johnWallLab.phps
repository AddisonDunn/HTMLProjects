<html>
<body>
	<?php
		$s = shell_exec('curl http://www.basketball-reference.com/players/w/walljo01.html');
		preg_match('/<tr\s+class="full_table" id="totals\.2015">(.+?)<\/tr>/s', $s, $matches);
		preg_match('/(?<="right"\s>)[0-9]*(?=<\/td>\n<\/)/s', $matches[0], $pMatches);
		//echo 'John Wall Total Points in 2014-2015: '.$pMatches[0].'</br>';
		$jwPoints = $pMatches[0];

		$s = shell_exec('curl http://www.basketball-reference.com/players/p/paulch01.html');
		preg_match('/<tr\s+class="full_table" id="totals\.2015">(.+?)<\/tr>/s', $s, $matches);
		preg_match('/(?<="right"\s>)[0-9]*(?=<\/td>\n<\/)/s', $matches[0], $pMatches);
		$cpPoints = $pMatches[0];

		$s = shell_exec('curl http://www.basketball-reference.com/players/r/rondora01.html');
		preg_match('/<tr\s+class="full_table" id="totals\.2015">(.+?)<\/tr>/s', $s, $matches);
		preg_match('/(?<="right"\s>)[0-9]*(?=<\/td>\n<\/)/s', $matches[0], $pMatches);
		$rrPoints = $pMatches[0];

		$maindb = new SQLite3('maindb');
		$maindb->exec("UPDATE tab1 SET points = ".$jwPoints." WHERE name = 'John Wall';");
		$maindb->exec("UPDATE tab1 SET points = ".$cpPoints." WHERE name = 'Chris Paul';");
		$maindb->exec("UPDATE tab1 SET points = ".$rrPoints." WHERE name = 'Rajon Rondo';");
	?>
</body>
</html>

<!-- $stmt = $db->prepare('SELECT speed FROM tb1 ORDER BY speed');
$result = $stmt->execute();
while($row=$result->fetchArray()) {
	PRAGMA table_info
}
$row['speed']; -->