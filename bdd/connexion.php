<?php
	$host="sql.free.fr";
	$base="4charles2";
	$passe="Sihame1986";
	$link=mysql_connect($host,$base,$passe)or die("Impossible de se connecter : " . mysql_error());
	mysql_select_db($base, $link);
?>
