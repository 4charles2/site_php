<!DOCTYPE html>
<html>
	<head>
		<title>connexion à une base de donné</title>
        <?php include('../../header.php'); ?>
	</head>
	<body>
        <?php include("../../nav.php"); ?>
        <section>
            <h1>Bout de code à inclure dans nos fichier</h1>
            <article>
                <a href="#include_BDD" >Include $BDD</a>
            </article>
            <h1>Include $BB</h1>
            <article>
                <p>Voici le code pour inserer une base de données dans sont code avec gestion des erreurs</p>
                <p><pre><code>try {
        $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf-8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
            </article>
        </section>
	</body>
</html>
