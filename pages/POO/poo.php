<!DOCTYPE html>
<html>
	<head>
		<title>Programation Orienté Objet</title>
        <?php include('../../header.php'); ?>
	</head>
	<body>
        <?php include("../../nav.php"); ?>
        <section>
        <h1><u>Régle en POO Programation Orienté Objet :</u></h1>
            <article> 
                <p><a href="#encapsulation">Droit d'Accès et encapsulation</a></p>
            </article>
            <h1><u>Droits d'Accès et Encapsulation</u></h1>
            <article id="encapsulation">
                <h3><u>Droits d'Accès :</u></h3>
                    <blockquote>
                        <p>Il y a trois principaux droits d'accès :</p>
                        <ol>
                            <li>Public : </li><p>Tous le monde peut accéder à l'élément.</p>
                            <li>Private : </li><p>Personne(à part la classe elle-même) n'à le droit d'accéder à l'élément.</p>
                            <li>protected : </li><p>identique à private, sauf que l'élément ayant ce droit d'accès 
                            dans une classe mère sera accessible aussi dans les classes filles.</p>
                        </ol>
                    </blockquote>
                    <p>Toutes les variables d'une classe doit être private ou protected</p>
            </article>
        </section>
	</body>
</html>
