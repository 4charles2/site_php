        <section id="image_gd2_bib">
            <h1><u>Présentation de la bibliothèque GD2 : </u></h1>
            <h3>Cette bibliothèque permet de créer des images</h3>
            <p><strong><u>Pour activer la bibliothèque :</u></strong></p> 
            <article>
                <p>Ce rendre dans le fichier /opt/lamp/etc/php.ini</p>
                <p>Rechercher ou ajouter la ligne extension=php_gd2.dll</p>
                <p>Pour une utilisation de Wamp sous linux</p> 
            </article>
            <p><strong><u>1. Le header :</u></strong></p>
            <article>
                <p>Pour indiquer au navigateur que l'ont envoie une image</P>
                <p><em><u>Fonction header :</u></em></p>
                <p><code>&lt;?php header("Content-type: image/png");?&gt;</code></p>
                <p>Remplacer png par le type de fichier image envoyé<p>
                <p>Le header doit être placé en tout début de code avant tout code html</p>
            </article>
                <p><strong><u>2. Créer une image vide en php :</u></strong></p>
            <article>
                <p>Prévenir le navigateur de l'envoie d'une image : <code>header("Content-type: image/png");</code></p>
               <p>Ont utilise la fonction <code>imagecreate(200,50);</code> 200 px de large et 50 px de haut.</p>
                <p>Le résultat de cette fonction et à mettre dans une variable</p>
                <p><code>$ma_variable = imagecreate(200,50);</code></p>
            </article>
        </section>
