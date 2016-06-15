<?
	$reponse=mysql_query('SELECT * FROM minichat ORDER BY ID DESC LIMIT 0, 10')or die("Impossible de sélectionner la bdd : " . mysql_error()) ;
	echo "<p><u>Voici les dix derniers messages écrit : </u></p>";
        while ($donnees=mysql_fetch_array($reponse))
        {
          echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> :  ' . htmlspecialchars($donnees['message']) . '</p>';
        }

?>
