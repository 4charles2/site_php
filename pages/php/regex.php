        <section>
            <h1><u>Voici une liste de REGEX prédéfinie :</u></h1>
            <p>Vous pouvez tester les codes grâces aux formulaires ! </p>
            <article>
                <ol>
                    <li>REGEX PCRE</li>
                        <ul>
                            <li><a href="#metacaractere">Les méta caractère</a></li><br />
                            <li><a href="#num_tel">Verif numero de Téléphone</a></li><br />
                            <li><a href="#email">Verif adresse Email</a></li>
                        </ul>
                    <li>REGEX POSIX</li>
                        <ul>
                            <li><a href="#sql">Regex avec SQL</a></li>
                        </ul>
                </ol>
            </article>
            <h1><u>Les symbôles PCRE et méta-caractères</u></h1>
            <article id="metacaractere">
                <table>
                    <thead>
                        <td colspan="2">Les méta-caractère :</td>
                    </thead>
                    <tr>
                        <th>Les symbôles</th>
                        <th>Signification</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <td>Délimitateur</td>
                    </tr>
                    <tr>
                        <th>|</th>
                        <td>Symbôle ou</td>
                    </tr>
                    <tr>
                        <th>^</th>
                        <td>Doit commencer par ...</td>
                    </tr>
                    <tr>
                        <th>$</th>
                        <td>Doit finir par ...</td>
                    </tr>
                    <tr>
                        <th>[ ]</th>
                        <td>Délimite une class de caractère</td>
                    </tr>
                    <tr>
                        <th>?</th>
                        <td>caractère précedent peut être 0 ou 1 fois</td>
                    </tr>
                    <tr>
                        <th>+</th>
                        <td>Doit être 1 fois présent à l'infini</td>
                    </tr>
                    <tr>
                        <th>*</th>
                        <td>Peut être présent 0 ou 1 ou infinie</td>
                    </tr>
                    <tr>
                        <th>( )</th>
                        <td>Permet de selectionner plusieur caractère</td>
                    </tr>
                    <tr>
                        <th>{ }</th>
                        <td>Répétion pour répéter nombre de fois {x}</td>
                    </tr>
                    <tr>
                        <th>\</th>
                        <td>Pour échapper un méta caractère</td>
                    </tr>
                    <tr>
                        <th>.</th>
                        <td>Indique tous les caractère sauf retour à la ligne pour cela option s après # de fermeture</td>
                    </tr>
                 </table>
            </article>
            <h1><u>Vérifier la syntaxe d'un numéro de téléphone :</u></h1>
            <article id="num_tel" >
                
            <p><?php
                if (isset($_POST['telephone']))
                {
                    $_POST['telephone'] = htmlspecialchars($_POST['telephone']);
                //Ont rend inofensif les balises html que le visiteur à pu rentrer
                                    }
            ?></p>
                <form method="post">
                    <p>
                        <label for="telephone">Votre numero de telephone ?</label>
                        <input id="telephone" name="telephone" /><br />
                        <input type="submit" value="Vérifier le numéro" />
                    </p>
                </form>
            <?php if(isset($_POST['telephone'])){
                echo "<hr />Voici la réponse : <br />";
                if (preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['telephone']))
                    {
                        echo'Le '.$_POST['telephone'].' est un numero <strong>valide</strong> !';
                    }
                    else
                        echo 'Le '.$_POST['telephone'].'n\'est pas valide, recommencer !';
                echo "<hr />";}
            ?>
             <p>Le code qui permet cela : <pre><code>
    &lt?php
        if (isset($_POST['telephone']))
        {
            $_POST['telephone'] = htmlspecialchars($_POST['telephone']);
    //Ont rend inofensif les balises html que le visiteur à pu rentrer
            echo "Voici la réponse : ";
            if (preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['telephone']))
            {
                echo'Le '.$_POST['telephone'].' est un numero &ltstrong&gtvalide&lt/strong&gt !';
            }
            else
                echo 'Le '.$_POST['telephone'].'n\'est pas valide, recommencer !';
        echo "&lthr /&gt";
        }
        ?&gt</code></pre> 
            </article>
            <h1><u>Vérifier une adresse Email :</u></h1>
            <article id="email">
                <p><?php
                    if (isset($_POST['email']))
                    { 
                        $_POST['email'] = htmlspecialchars($_POST['email']);
                        //Rend inofensif les balise html entrer par l'utilisateur
                   }
                ?></p>
                <form method="post" >
                    <p>
                        <label for="email" >Votre adresse Email :</label>
                        <input id="email" name="email" /><br />
                        <input type="submit" value="Vérifier l'adresse email" />
                    </p>
                </form>
                <?php
                    if(isset($_POST['email'])){
                        echo"<hr /> Voici la réponse :<br />";
                    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
                        {
                            echo 'L\'adresse email : '.$_POST['email'].' est <strong>Valide</strong>';
                        }
                        else
                            echo 'L\'adresse email : '.$_POST['email'].' n\'est pas valide';
                    echo "<hr />";
                    }
                ?>
                <p>Le code qui permet cela :</p>
                <pre><code>
    &lt?php
        if (isset($_POST['email']))
        { 
            $_POST['email'] = htmlspecialchars($_POST['email']);
    //Rend inofensif les balise html entrer par l'utilisateur
         }
         if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
         {
            echo 'L\'adresse email : '.$_POST['email'].' est &ltstrong&gtValide&lt/strong&gt';
         }
        else
            echo 'L\'adresse email : '.$_POST['email'].' n\'est pas valide';
        echo "&lthr /&gt";
    ?&gt</code></pre>
            </article>
            <h1><u>Utiliser REGEX dans requête SQL :</u></h1>
            <article id="sql">
                <p>Pour utiliser une REGEX dans sql ont utilise POSIX</p>
                <p>Les REGEX POSIX n'ont pas de délimiteur ni d'options.</p>
                <p>Il n'y à pas de classe abrégé comme \d</p>
                <p>Ont utilise le mot clé : REGEXP</p>
                <p>Exemple de requête : <br /><code>SELECT nom FROM visiteurs WHERE ip REGEXP '^84\.254(\.[0-9]{1,3}){2}$'</code></p>
                <blockquote>
                <p>Cette requête signifie : Sélectionne tous les noms de la table visiteurs dont l'IP commence par &lt&lt84.254&gt&gt et se termine par deux autres nombres de un à trois chiffre(s)(ex: 84.254.6.177)</p>
                </blockquote>
            </article>
        </section>
