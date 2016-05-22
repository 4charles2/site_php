<!DOCTYPE html>
<html>
	<head>
		<title>parser BBcode</title>
        <?php include('../../header.php'); ?>
	</head>
	<body>
        <?php include("../../nav.php"); ?>
        <section>
            <h1><u>Parser BBcode pour forum sur site internet :</u></h1>
            <article>
                
        <p><?php
                if(isset($_POST['texte']))
                {
                    $texte = stripslashes($_POST['texte']);//On enlève les slashs qui se seraient ajoutés automatiquement
                    $texte = htmlspecialchars($texte);//On rend inoffensives les balises HTML que le visiteur a pu rentrer
                    $texte = nl2br($texte);//On créer des <br /> pour conserver les retours à la ligne
                    //Ont fait passer notre texte à la moulinette des regex
                    $texte = preg_replace('#\[b\](.+)\[/b\]#isU', '<strong>$1</strong>', $texte);
                    $texte = preg_replace('#\[i\](.+)\[/i\]#isU', '<em>$1</em>', $texte);
                    $texte = preg_replace('#\[color=(red|green|blue|yellow|purple|olive)\](.+)\[/color\]#isU', 
                        '<span style="color:$1">$2</span>', $texte);
                    $texte = preg_replace('#\[u](.+)\[/u\]#isU', '<u>$1</u>', $texte);
                    $texte = preg_replace('#\[img (.+) (.+)/\]#i', '<img src="$1" alt="$2" />', $texte); 
                    $texte = preg_replace('#http://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $texte);
                    //Et ont affiche le résultat
                }
            ?></p>
            <p>
            Bienvenue dans mon parser !<br />
            J'espère que vous saurez apprécier de voir tout ce code magique !!
            </p>
            <p>Amusez-vous à utiliser du bbCode. Tapez par exemple :</p>
            <blockquote style="font-size:0.8em">
                <p>
                Je suis [b]padawan[/b], j'ai [i]tout appris[/i] sur http://www.openclassrooms.com<br />
                Je vous [b][color=green]recommande[/color][/b] d'aller sur ce site, vous pourrez apprendre à faire ça [i][color=purple]vous aussi[/color][/i] !
                </p>
            </blockquote>
            <hr />
                <p>Dans ce bbcode voici pour l'instant les balise créer :</p>
                <blockquote>
                    <p>
                </blockquote>
                <form method="post">
                    <p>
                        <label for="texte">Votre message ?</label><br />
                        <textarea id="texte" name="texte" cols="50" rows="8"></textarea><br />
                        <input type="submit" value="Montre-moi toute la puissance des regex" />
                    </p>
                </form>
            </article>
            <?php if(isset($_POST['texte']))
                echo '<hr /><u>Voici le résultat :</u><br />'.$texte.'<br />'; ?>
            <br /><hr />
            <h1><u>Voici le code php qui permet cela :</u> </h1>
            <article>
<p><pre><code>&lt?php 
if(isset($_POST['texte']))
    {
    $texte = stripslashes($_POST['texte']);
//On enlève les slashs qui se seraient ajoutés automatiquement
    $texte = htmlspecialchars($texte);
//On rend inoffensives les balises HTML que le visiteur a pu rentrer
    $texte = nl2br($texte);//On créer des &ltbr /&gt pour conserver les retours à la ligne
//Ont fait passer notre texte à la moulinette des regex
    $texte = preg_replace('#\[b\](.+)\[/b\]#isU', '&ltstrong&gt$1&lt/strong&gt', $texte);
    $texte = preg_replace('#\[i\](.+)\[/i\]#isU', '&ltem&gt$1&lt/em&gt', $texte);
    $texte = preg_replace('#\[color=(red|green|blue|yellow|purple|olive)\](.+)\[/color\]#isU', 
                '&ltspan style="color:$1"&gt$2&lt/span&gt', $texte);
    $texte = preg_replace('#\[u](.+)\[/u\]#isU', '&ltu&gt$1&lt/u&gt', $texte);
    $texte = preg_replace('#\[img (.+) (.+)/\]#i', '&ltimg src="$1" alt="$2" /&gt', $texte); 
    $texte = preg_replace('#http://[a-z0-9._/-]+#i', '&lta href="$0"&gt$0&lt/a&gt', $texte);
        //Et ont affiche le résultat
        echo $texte.';
}?&gt</code></pre></p>
            </article>
        </section>
	</body>
</html>
