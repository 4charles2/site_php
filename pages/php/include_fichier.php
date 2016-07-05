        <section id="include_fichier">
            <h1>Bout de code à inclure dans nos fichier</h1>
            <article>
                <a href="#include_BDD" >Include $BDD</a>
            </article>
            <h1>Include $BB</h1>
            <article>
                <p>Voici le code pour inserer une base de données dans sont code avec gestion des erreurs</p>
                <p><pre><code>try {
        $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf-8', 'root', '',
        array(PDO::ATTR_ERRMODE =&gt; PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e-&gt;getMessage());
    }</code></pre></p>
            </article>
        </section>
