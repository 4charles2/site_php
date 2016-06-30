        <section>
            <h1><u>Méthodes POO pour PHP</u></h1>
            <article>
               <p>Les Méthodes spécial pour php prennent un double _ underscore</p>  
               <p>Exemple : __construct __destruct</p>
               <ul>
                    <li><a href="#__get">__get()</a></li>
                    <li><a href="#__set">__set()</a></li>
                    <li>__call()</li>
                    <li>__sleep()</li>
                    <li>__wakeup()</li>
                    <li><a href="#__construct">__construct()</a></li>
                    <li><a href="#__destruct">__destruct()</a></li>
               </ul>
            </article>
            <h1 id="__construct"><u>La méthode __construct() :</u></h1>
            <article >
               <p>Lorsque l'ont créer un objet avec new, PHP recherche la méthode __construct</p>
               <p>Si PHP ne trouve pas cette méthode alors il créé un objet vide.</p>
               <p>Le rôle de la méthode de construction et de créer un objet</p>
               <p>On peut par exemple s'en servir pour charger les données en BDD (Base de Donnée)</P>

               <p><u>Voici un exemple : </u></p><pre><code>
               <p><u>Pour l'appelé : </u><br />$membre = new Membre($idMembre);<br />//Mettre idMembre pour chargement de celui-ci</p>
               <u>La classe : </u><br />&lt;?php
               class Membre
               {
                    public function __construct($idMembre)
                    {
                        // Récupérer en base de données les infos du membre
                        // SELECT pseudo, email, signature, actif FROM membres WHERE id = ...
                        
                        //définir les variables avec les résultats de la base
                        $this-&amp;pseudo = $donnees['pseudo'];
                        $this-&amp;email = $donnees['email'];
                        // etc.
                    }
                    ....
                    ....
                    ....
                }
                ?&gt;</code></pre>
            </article>
            <h1 id="__destruct"><u>La méthode __destruct() :</u></h1>
            <article>
                <p>Peu utilisé car cette fonction est appelée automatiquement par PHP</p>
                <p>Elle est appelé lorsque l'environement dans lequel elle à été appelée se termine</p>
                <p>Pour l'appeler : unset($objet); //elle réalise toutes les opérations nécessaires pour mettre</p>
                <p>fin à la vie de l'objet. Par exemple la classe PDO s'en sert pour envoyer un message à la base de données &lt;&lt;Fin de la connexion&gt;&gt;</p>
                <p>Si plusieurs objets alors cette méthode sera appelé autant de fois qu'il y à d'objet</p>
            </article>
            <h1 id="__get"><u>Méthode __GET() : </u></h1>
            <article>
                  <p> Cette méthode est appelée lorsque l'on essaye d'accéder à un attribut qui n'existe pas ou auquel on n'a pas accès. Elle prend un paramètre : le nom de l'attribut auquel on a essayé d'accéder. Cette méthode peut retourner ce qu'elle veut (ce sera, en quelque sorte, la valeur de l'attribut inaccessible).</p>
                        <p>Permet de récupérer les valeurs de mes atributs (Variable dans l'objet)</p>
            </article>
            <h1 id="__set"><u>La méthode __set()</u></h1>
            <article>
                <p>Cette méthode est appelée lorsque l'on essaye d'assigner une valeur à un attribut auquel on n'a pas accès ou qui n'existe pas. Cette méthode prend deux paramètres : le premier est le nom de l'attribut auquel on a tenté d'assigner une valeur, le second paramètre est la valeur que l'on a tenté d'assigner à l'attribut. Cette méthode ne retourne rien. Vous pouvez simplement faire ce que bon vous semble !</p>
            </article>
        </section>
