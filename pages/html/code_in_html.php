<!DOCTYPE html>
<html>
	<head>
		<title>Affiche du code</title>
        <?php include('../../header.php'); ?>
	</head>
	<body>
        <?php include("../../nav.php"); ?>
        <section>
            <h1><u>Afficher du code à l'utilisateur dans HTML : </u></h1>
            <article>
                <p>Pour afficher du code à l'utilisateur on remplace <code>&lt; et &gt; par &amplt et &ampgt</code></P> 
                <p>Pour afficher les symboles : <code>&amp; &quot;</code><p>
                <p>Ont écrit &ampamp = &amp; et &ampquot = &quot;sans le caractère _</p>
                <p>Ont peut utiliser la balise <code>&lt;pre&gt;&lt;code&gt;</code></p>
                <p>Voici un exemple :</p>
                <pre><code>&lt;pre&lt;code&gt;
                            &lt;img src='mon image.php' alt='mon image'/&gt;
                            &lt;h1&gt;Mon titre de page&lt;h1&gt;
                &lt;/pre&gt;&lt;/code&gt;</pre></code>
                <blockquote>Ou ont écrit &amplt et &ampgt au lieu des symboles &lt; et &gt;</br>
                        Pour afficher &amplt et &ampgt il faut faut mettre un amp derrire le &amp</br> 
                        les balises &lt;code&gt; indique au navigateur que l'on écrit du code 
                        les balises &lt;pre&gt; indique au navigateur de garder la mise en forme du code
                </blockquote>
            </article>
        </section>
    </body>
</html>

