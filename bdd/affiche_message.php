<?
	echo "<p><u>Voici les dix derniers messages écrit : </u></p>";
        while ($donnees = $reponse->fetch())
        {
          echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> :  ' . htmlspecialchars($donnees['message']) . '</p>';
        }
          /*Requete pour envoyer les messages dans la base de données*/
          $req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
          $req->execute(array($_POST['pseudo'], $_POST['message']));
		$reponse->closeCursor();
?>
