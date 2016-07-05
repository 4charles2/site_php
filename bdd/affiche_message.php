<?
	include('connexion.php');
	$reponse= $bdd->query('SELECT *, DATE_FORMAT(date_creation, "%d-%m-%Y") AS DATE FROM minichat ORDER BY ID DESC LIMIT 0, 10')or die("Impossible de sélectionner la bdd : " . mysql_error()) ;
	echo "<p><u>Voici les dix derniers messages écrit : </u></p>";
	echo"<fieldset id=\"show_mess\">";
        	while ($donnees = $reponse->fetch())
        	{
			echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '<br/>Le : ' . $donnees['DATE'] . '</strong><br/>'. htmlspecialchars($donnees['message']) . '</p>';
        	}
	echo "</fieldset>";
	$reponse->closeCursor();
?>
