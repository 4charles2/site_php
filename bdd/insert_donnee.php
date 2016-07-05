<?php
		  include("connexion.php");
          /*Requete pour envoyer les messages dans la base de données*/
          $pseudo=htmlspecialchars($_POST['pseudo']);
          $message=htmlspecialchars($_POST['message']);
		  array('pseudo' => $peudo, 'message' => $message);
		  if (isset($pseudo) AND (isset($message)))
		  {
			$bdd->exec('INSERT INTO minichat VALUES(\'\',\''.$pseudo.'\',\''.$message.'\',\''.date("Y-m-j").'\')');
			//or die("Impossible d'envoyez la requête : " . mysql_error());
			#Voir cette ligne pas accès aux variable
		  }
		#Retour sur la page du site internet
		#Faire en sorte que le visiteur revienne sur la page en cour et non sur l'index
		header('Location: ../index.php');
?>
