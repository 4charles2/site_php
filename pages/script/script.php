<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php include('../../header.php'); ?>
    </head>
    <body>
    <?php include('../../nav.php'); ?>
    <section>
        <h1><u>Utilisation se script Shell</u></h1>
        <article>
            <ol>
                <li><a href="#variable">Manpulation de variable</a></li>
                <li><a href="#renommer_fichier">Rennommer des fichier</a></li>
                <li><a href="#longueur_string">Calculer la longueur d'une chaine de caractère</a></li>
                <li><a href="#defaut_valeur_variable">Retourner une valeur par defaut si variable non definie</a></li>
                <li><a href="#calcul_arithmetique">Effectuer des calculs arithemétique</a></li>
				<li><a href="#invocation_commande">Sortie standart d'une commande dans une variable</a></li>
				<li><a href="#porte_variable">Les portées de variable</a></li>
				<li><a href="#argument">Utilisation des arguments</a></li>
				<li><a href="#tableau">Declarer et utiliser des tableaux</a></li>
				<li><a href="#eval_">La commande eval_</a></li>
				<li><a href="#espace_disk">Espace disk restant pour le home directory</a></li>
				<li><a href="#papeline">Les papelines pour les commandes</a></li>
				<li><a href="#return_false">Retourner une valeur false ou true pour tester des scripts ou ...</a></li>
				<li><a href="#fg_bg">Mettre en arrière plan background bg et au premier plan fg forgeground </a></li>
				<li><a href="#commande_compose">Composé des commandes en un seul bloc avec { } ou  ( )</a></li>
				<li><a href="#redirection_entre_sortie_standart">Le redirection des entrées, sorties standart et sortie d'erreur</a></li>
				<li><a href="#commande_silencieuse">Rendre une commande silencieuse</a></li>
				<li><a href="#ftp">Utilisé le protocol ftp</a></li>
				<li><a href="#condition_if">Utilisation des structures if_then_elif_then_else_fi</a></li>
				<li><a href="#condition_case">Utilisation des structures case expression in esac</a></li>
				<li><a href="#uname">La commande uname pour des informations sur la machine</a></li>
				<li><a href="#boucle">Les boucles de répétition while_do_done et until_do_done</a></li>
				<li><a href="#for_do">La boucle for_do_done</a></li>
				<li><a href="#select">La boucle de selection select_do_done</a></li>
				<li><a href="#fonction">Les fonctions dans un script</a></li>
            </ol>
        </article>
    </section>
	<section id="argument">
		<h1><u>Utiliser les arguments dans un script</u></h1>
		<article>
			<p>Pour accéder aux argument</p>
			<table>
				<thead>
					<tr>
						<th>Symbole pour acceder aux argument</th>
						<th>Fonctionnalité du symbôle</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>$0</td>
						<td>Indique le nom du script</td>
					</tr>
					<tr>
						<td>$1 jusqu'à $9</td>
						<td>Contient respectivement l'argument 1 pour $1 et argument 9 pour $9.</br>Pour les arguments situé après la 9 place</br>On delimite ${10} sinon sa sera l'argument 1 suivie de 0</td>
					</tr>
					<tr>
						<td>$#</td>
						<td>Contient le nombre d'argument sans compter l'argument $0</td>
					</tr>
					<tr>
						<td>$*</td>
						<td>Permet de selectionné tous les arguments OBSELETE</br>Si un argument contient des espaces alors scinder en plusieurs argument</br>Même si celui-ci est entouré de ""</td>
					</tr>
					<tr>
						<td>$@</td>
						<td>Même utilisation que $* sauf que si un argument est entre " " alors il est toujours consideré comme un seul argument</br>Utiliser "$@" afin de conserver parfaitement le style</td>
					</tr>
				</tbody>
			</table>
			<p>SI on appel les arguments se seront les arguments passer à la fonction qui seront visible pas ceux passé au script</p>
			<p>C'est la que le symbôle $@ ou $* peut être utile afin de passer les arguments passer au script à la fonction</p>
			<p><strong>Prefere $@ pour conserver les arguments avec la même syntaxe</strong></p>
			<p><u>Pour effectuer une initialisation de l'argument $1 par exemple</u></p>
			<p>Il n'est pas possible de faire 1=valeur. On peut utiliser la commande set </p>
			<p>De la manière suivante : <code>set A B C</code></p>
			<p>Va affecter respectivement la valeur A a $1 et B a $2 et C a $3</p>
			<p>Si j'affiche les arguments $1 $2 $3 <code>&gt;echo $1 $2 $3</code> Voici le resultat : <code>&gt;A B C</code></p>
			<p><strong>Atention ! set agit sur l'enssemble des arguments</strong></p>
			<p>Exemple si l'argument $4 était défini avant l'appel de set il ne sera plus disponible ensuite puisqu'il n'est pas defini de nouveau avec set</p>
			<p><u>On peut modifier la position initiale de l'enssemble des arguments avec la commande shift</u></p>
			<p>Le paramètre $0 n'est pas concerné par cette commande</p>
			<table>
				<thead>
					<tr>
						<th>Argument</th>
						<th>Avant utilisation de Shift</th>
						<th>Après utilisation de Shift</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>$0</td>
						<td>./mon_script</td>
						<td>./mon_script</td>
					</tr>
					<tr>
						<td>$1</td>
						<td>azerty</td>
						<td>uiop</td>
					</tr>
					<tr>
						<td>$2</td>
						<td>uiop</td>
						<td>qsdf ghi</td>
					</tr>
					<tr>
						<td>$3</td>
						<td>qsdf ghi</td>
						<td>(vide)</td>
					</tr>
				</tbody>
			</table>
			<p><strong>Si on spécifie un nombre apres la commande shift exemple <code>&gt;shift 3</code></strong></p>
			<p>Alors l'argument $1 sera égal à l'argument $3 et $2 sera égal à $4</p>
			<p><u>>Exemple d'utilisation de shift pour lire tous les arguments possible existant</u></p>
			<p><pre><code>&gt;while [ -n $1 ] ; do</br>	&gt;echo $1</br>	&gt;shift</br>&gt;done</code></pre></p>
			<p>La boucle lit tous les arguments jusqu'à ce que $1 soit NULL</p>
			<p><u>Autre exemple de lecture des arguments</u></p>
			<p><pre><code>&gt;while [ $# -ne 0 ] ; do</br>	&gt;echo $1</br>	&gt;shift</br>&gt;done</code></pre></p>
			<p>La boucle va continuer tant que $# n'est pas égal à zéro</p>
		</article>
	</section>
    <section id="variable">
		<article>
		<ol>
			<li><a href="#affectation_tmp">Affectation d'une variable temporaire</a></li>
			<li><a href="#variable_arthmetique">Declarer une variable arithmetique</a></li>
			<li><a href="#variable_lecture_seul">Modifier une variable pour qu'elle ne soit disponible qu'en lecture seul</a></li>
			<li><a href="#sous_chaine">extraction de sous-chaine</a></li>
		</ol>
		</article>
		<h1 id="affectation_tmp"><u>Affectation temporaire d'une variable pour l'utilisation d'une commande</u></h1>
		<article>
			<p>Si une variable GLOBAL ou local reçoit une affectation alors qu'une commande est utilisé sur la même ligne la valeur de la variable n'est valide que jusqu'à la fin de l'éxecution de la ligne</p>
			<p>Si vous rappelez la variable ultérieurement elle aura gardé sa valeur d'origine</p>
			<p>Exemple de code : <pre><code>&gt;echo $LANG</br>&gt;fr_FR</br>&gt;date</br>&gt;dim oct 7 08:55:51 CEST 2007</br>&gt;$LANG=en_US date</br>&gt;Sun Oct 7 08:55:54 CEST 2007</br>&gt;echo $LANG</br>&gt;fr_FR</code></pre></p>
			<p>On verifie la valeur de $LANG et on voit qu'elle est réglé sur fr_FR (Français) on affiche ensuite la date du jour au format français</p>
			<p>Ensuite on affecte la valeur en_US à la variable GLOBAL $LANG suivi de la commande date. Se qui va afficher la date au format englais</p>
			<p>On revérifie la valeur de $LANG après l'execution de la commande date et on voit que la valeur n'a pas changé elle toujours sur fr_FR</p>
			<p><strong>Comme l'affectation est suivie de la commande date la variable $LANG à pris la valeur en_US temprairement le temps de l'execution de date</strong></p>
			<p>Si elle n'avait pas été suivie d'une commande la variable $LANG aurait gardé la valeur en_US</p>
		</article>
		<h1 id="variable_lecture_seul"><u>Modifier le droit d'une variable pour qu'elle soit disponible en lecture seul</u></h1>
		<article>
			<p>On peut modifier les accès possible à une variable</p>
			<p>L'option -r de la commande declare fige une variable pour qu'elle ne soit disponible plus qu'en lecture seul</p>
			<p>Se droit d'accès en lecture seul ne concerne que le processus en cour d'execution</p>
			<p>Même un processus fils pourra la modifier dans son exécution</p>
			<p><strong><u>BASH definie par defaut des variable en lecture seul</u></strong></p>
			<ul>
				<li>EUID</li>
				<li>PPID</li>
				<li>UID</li>
			</ul>
			<p>Ces trois variables sont déclaré en lecture seul declare -ri</p>
			<p>-r pour lecture seul et i pour arithmetique</p>
		</article>
		<h1 id="variable_arthmetique"><u>Declarer une variable arithmetique</u></h1>
		<article>
			<p>Ont peut déclarer une variable arithmetique avec la declaration <strong><code>declare -i variable</code></strong></p>
			<p>Il alors possible de faire des opérations avec exemple : <code>variable=4+4 donnera echo variable comme resultat 8</code></p>
			<p>Au lieu de renvoyez litéralement 4+4</p>
		</article>
        <h1 id="sous_chaine"><u>Manipulation de variable dans les scripts SHELL</u></h1>
        <article>
            <p>Pour déclarer une variable : nom=valeur</p>
            <p>Pour utiliser une variable dans <em>echo</em> par exemple on utlise le signe $</p>
            <p><u>Exemple de manipulation de variable : </u></p>
            <ul>
                <li>pour delimiter le nom d'une variable lors de l'utilisation de caractète suplementaire</br>
                ont peut utiliser les accolodes ${variable}</li>
                <li>Si l'ont souhaite séparer les variables avec des caractères interdit dans le nom des </br>
                variable ont les séparées avec les symboles interdit</br>
                Exemple de caractère : @ . -</li>
                <li>Sinon On peut entourer les caractère des "texte"$variable</li>
            </ul>
            <p>D'autres options directe de manipulation des variables existent</p>
            <p>On peut par extraire une sous chaine dans une varible avec l'opérateur ${ }</p>
            <p><pre><code>
    &gt;variable=ABCDEFGHIJKLMNOPQRSTUVWXYZ
    &gt;echo ${variable:5:2} #Donera comme résultat FG Soit après la 5 lettre et les 2 suivante
    &gt;FG
    &gt;echo ${variable:20} #Affichera les 6 dernieres lettre de ma variable elle en contient 26
    &gt;UVWXYZ</code></pre>
    Les : fonctionne dans les shells récent et sa portabilité n'est pas garantie</p>
               <p>Le caractere # fonctionne comme les : mais possede plus d'option et une meilleur portabilite</br>
               <h3><u>Le signe # pour prefixe et ## pour PREFIXE le plus long</u></h3>
               il permet l'extraction de sous chaine defini ${variable#motif}</p>
            <p><u>Fonctionne avec les options suivantes :</u></p>
            <ol>
                <li>* n'importe quel chaine</li>
                <li>? n'importe quel caractère</li>
                <li>\ caractère d'échappement</li>
                <li>[ ] regex</li>
            </ol>
                <p>L'operateur # enleve le plus court prefixe correspondant au motif</p>
                <table>
                    <thead>
                    <tr>
                        <th>variable = </th>
                        <th>AZERTYUIOPAZERTYUIOP</th>
                        <th>Explications</th>
                    <tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>${variable#AZE}</td>
                            <td>RTYUIOPAZERTYUIOP</td>
                            <td>Enleve les trois premier caractere</td>
                        </tr>
                        <tr>
                            <td>${variable#*T}</td>
                            <td>YUIOPAZERTYUIOP</td>
                            <td>Parcour la chaine jusqu'a trouver T</td>
                        </tr>
                        <tr>
                            <td>${variable#*[MNOP]}</td>
                            <td>PAZERTYUIOP</td>
                            <td>Parcour la chaine jusqu'à trouver un caractere corespondant</br>
                            ici O</td>
                        </tr>
                        <tr>
                            <td>${variable#*}</td>
                            <td>AZERTYUIOPAZERTYUIOP</td>
                            <td>N'enleve rien car * ne précise aucun caractère</td>
                        </tr>
                    </tbody>
                </table>
                <p>On peut Mettre ## deux diese pour ne pas s'arete a la premiere occurence mais a la plus éloigné</p>
                <p>Pour éliminé le plus long préfixe</p>
                <p>Démonstration avec les mêmes exemples que dans le tableau sauf qu'il y à deux ##</p>
                <table>
                    <thead>
                    <tr>
                        <th>variable = </th>
                        <th>AZERTYUIOPAZERTYUIOP</th>
                        <th>Explications</th>
                    <tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>${variable##AZE}</td>
                            <td>RTYUIOPAZERTYUIOP</td>
                            <td>Change rien ne peut enlever que les premier caractere</td>
                        </tr>
                        <tr>
                            <td>${variable##*T}</td>
                            <td>YUIOP</td>
                            <td>enleve le prefixe à partir du dernier T trouvé</td>
                        </tr>
                        <tr>
                            <td>${variable##*[MNOP]}</td>
                            <td></td>
                            <td>Enleve tout car la chaine se termine par un P</br>
                            derniere occurence de l'intervale</td>
                        </tr>
                        <tr>
                            <td>${variable##*}</td>
                            <td></td>
                            <td>Inverse de tout à l'heure enleve tout</td>
                        </tr>
                    </tbody>
                </table>
                <p>Symètriquement l'opérateur % et %% fonctionne comme # et ## mais enleve a partir de la fin</p>
                <h3><u>Le signe % pour le sufixe et %% pour le plus long SUFIXE</u></h3>
                <p>Enleve le sufixe</p>
                <p><strong>l'etoile se place a la fin du motif</strong></p>
                <h4><u>Depuis bash 2 on peut effctuer une recherche et un remplacement</u></h4>
                <ol>
                    <li>${variable/motif/remplacement}</li>
                    <li>${variable//motif/remplacement}</li>
                </ol>
                <p>Dans la premiere expression on remplace la premiere occurence</p>
                <p>Dans la deuxieme expression on remplace toutes les occurences</p>
           </article>
    </section>
    <section id="renommer_fichier">
        <h1><u>Exemple de script qui rennome des fichiers ! Aussi bien le contenu que le nom du fichier</u></h1>
        <article>
			<p><u>Script qui met le contenu d'un fichier en majuscule ou en minuscule donné en paramètre</u></p>
			<p>Le script suivant va mettre tous le contenu du fichier en minuscule</p>
			<p><pre><code>&gt;while [ -n "$1" ]; do</br>	&gt;content=$(tr [a-z] [A-Z]) &lt; $1)</br>	&gt;echo "$content" &gt; $1</br>	&gt;shift</br>&gt;done</code></pre></p>
			<p>Le script suivant va mettre tous le contenu du fichier en Majuscule</p>
			<p><pre><code>&gt;while [ -n "$1" ]; do</br>	&gt;content=$(tr [A-Z] [a-z])&lt; $1)</br>	&gt;echo "$content" &gt; $1</br>	&gt;shift</br>&gt;done</code></pre></p>
			<p><u>Mettre le nom d'un fichier en MAJUSCULE ou minuscule</u></p>
			<p>Ce script va mettre le nom du fichier transmit en argument en Majuscule sans toucher à l'extention</p>
			<p><pre><code>&gt;while [ -n "$1" ]; do</br>	&gt;suffixe=${1#*.}</br>	&gt;mv $1 $(echo ${1%%.*} | tr [A-Z] [a-z]).$suffixe</br>	&gt;shift</br>&gt;done</code></pre></p>
			<p>Ce code va mettre le nom du fichier en minuscule</p>
			<p><pre><code>&gt;while [ -n "$1" ]; do</br>	&gt;suffixe=${1#*.}</br>	&gt;mv $1 $(echo ${1%%.*} | tr [a-z] [A-Z]).$suffixe</br>	&gt;shift</br>&gt;done</code></pre></p>
			<p><u>La ligne suivante rennomer tous les fichiers du répertoire courant qui ont l'extention .TGZ en .tar.gz</u></p>
            <p><pre><code>for i in *.TGZ ; do mv $i ${i%.*}tar.gz ; done</code></pre></p>
            <p>Ici on mais dans la variable i les fichier .TGZ et on utilise la commande mv pour la rennomer </br>
            en selectionant la partie du nom de la variable qui nous interesse puis on ajoute tar.gz a la fin</p>
        </article>
    </section>
    <section id="longueur_string">
        <h1><u>Calculer la longueur d'une chaine de caractère</u></h1>
        <article>
        <p>l'opérateur $ nous permet de calculer la longueur d'une chaine de caractere</p>
        <p><u>Voici un exemple :</u><pre><code>&gt;variable=azertyuiop</br>&gt;echo "La variable est composée de ${#variable} caracteres"</br>&gt;La variable est composée de 10 caracteres</code></pre></p>
        </article>
    </section>
    <section id="defaut_valeur_variable">
        <h1><u>Retourner une valeur par défaut si une variable est non définie ou inexistante</u></h1>
        <article>
            <p><u>Exemple :</u><pre><code>&gt;var=coucou</br>&gt;echo ${var:-defaut}</br>&gt;coucou</br>&gt;variable=</br>&gt;echo ${variable:-defaut}</br>&gt;defaut</br>&gt;echo ${inexistante:-defaut}</br>&gt;defaut</code></pre></p>
            <p>Ici on retourne la valeur defaut quand la variable n'est pas initialise ou existante</p>
            <p>Sa ne modifie pas ou ne créer pas la variable</p>
            <p><u>Autre exemple avec cette une attribution de la valeur à la variable ou une création si celle-ci n'éxiste pas</u></p>
            <p><pre><code>&gt;var=coucou</br>&gt;echo ${var:=defaut}</br>&gt;coucou</br>&gt;variable=</br>&gt;echo ${variable:=defaut}</br>&gt;defaut</br>&gt;echo ${inexistante:=defaut}</br>&gt;defaut</code></pre></p>
            <p><u>Autre exemple pour afficher un message dans le cas la variable n'est pas definei sans affecter la variable</u></p>
            <p><pre><code>&gt;: ${variable:?"n'ont definie"}</br>&gt;echo variable = $variable</br>&gt;variable = n'ont definie</code></pre></p>
            <p>Si je rapelle la variable ultérieurement elle n'existera toujours pas pas comme avec le signe =</p>
            <p>Si aucun message n'est précisé <code>echo ${variable:?}</code> C'est le shell qui en fournira un par defaut</p>
            <p><u>Modifer la valeur d'une variable si celle-ci et declarer et non vide sinon renvoyer null</u></p>
            <p>Avec le signe +</br> <code>&gt;variable=4</br>&gt;echo ${variable:+2}</br>&gt;2</code></p>
            <p>Ici le shell renvera la valeur 2 puisque la variable est bien definie et initialise a 4</p>
            <p>Si la variable n'existait pas ou qu'elle n'avait pas été initialisé alors le résultat aurai été null</p>
            <p><strong>Les quatre modificateurs précédents considèrent au même titre les variables indéfinies et</br>
                les variables contenant une chaîne vide.</strong></br>
                Il existe quatre modificateurs similaires qui</br>
                n’agissent que si la variable est vraiment indéfinie ;</br> il s’agit de ${ - } , ${ = } , ${ ? } , et ${ + }</p>
        </article>
    </section>
    <section id="calcul_arithmetique">
        <h1><u>Effectuer des calculs arithmetique</u></h1>
        <article>
            <p>Pour effectuer des calculs arithmetique de nombre entier</p>
            <p>Pour les calculs arithmetique voici la construction : $((calcul)) d'autre parenthèse peuvent être utilisées dans le calcul</p>
            <p>Les opérateurs arithmétiques disponibles sont les mêmes que dans la plupart des langages </br>de programmation : <strong>+ , - , * , et /</strong> pour les quatre opérations de base ; <strong>%</strong> pour le modulo ;</br></br>
            <strong>&lt;&lt; et &gt;&gt; </strong>pour les décalages binaires à gauche et à droite <strong> &amp; , | , et ^ </strong></br>pour les opérateurs
            binaires ; Et, Ou et Ou Exclusif ; et finalement <strong>~</strong> pour la négation binaire. Les opérateurs peuvent être regroupés entre parenthèses pour des questions de priorité.</br> On peut
            placer des blancs (espaces) à volonté pour améliorer la lisibilité du code.</p>
            <p><u>Liste des opérateurs arithmétique :</u></p>
            <ul>
                <li>+ - / * % addition, soustraction, division, multiplication, modulo</li>
                <li>&lt;&lt; et &gt;&gt; pour les decalages binaire</li>
                <li>&amp; et | et ^ qui signifie <strong>ET OU OU EXCLUSIF </strong>pour les opérateurs binaires</li>
            </ul>
            <p>Une constante numérique et considérer comme log10 par defaut.</p>
            <p> Si elle commence par 0 , elle est considérée comme étant octale (base 8), et par 0x comme hexadécimale (base 16).
                On peut aussi employer une représentation particulière base#nombre où l’on précise expli
                citement la base employée (jusqu’à 36 au maximum). Cela peut servir surtout pour
                manipuler des données binaires</p>
        <p>Il arrive que les données numériques d’un calcul provienne d’un programme externe ou
        d’une saisie de l’utilisateur, et rien ne garantit qu’elles ne commenceront pas par un zéro,
        même si elles sont en décimal. Supposons que l’utilisateur remplisse la variable x=010 , le
        calcul $(($x+1)) renverrait le résultat (décimal) 9 , car le shell interpréterait le contenu de
        x comme une valeur octale. Pour éviter ceci, on peut forcer l’interprétation en décimal
        avec $((10#$x+1)) . Ceci est utile lorsqu’on récupère des nombres provenant de fichiers
        formatés avec des colonnes de chiffres complétés à gauche par des zéros.</p>
            <p><u>Exemple de code pour des calculs arithmetique : </u></p>
            <p><pre><code>&gt;echo $((2 * (4 + (10/2)) - 1))</br>&gt;17</br>&gt;echo $((7%3))</br>&gt;1</code></pre></p>
            <p><u>Calcul dans le lequel il est spécifié que c'est une valeur de base 2 : </u></p>
            <p><pre><code>&gt;masque=2#000110</br>&gt;capteur=2#001010</br>&gt;echo $(($masque &amp; $capteur))</br>&gt;2</br>&gt;echo $(($masque | $capteur))</br>&gt;14</br>&gt;echo $(($masque ^ $capteur))
&gt;12</br>&gt;echo $(($masque &amp;&amp; 2))</br>&gt;12
            </code></pre></p>
			<p><u>Les variables qui se trouve dans la structure de calcul se diffèrament selon qu'il y est l"opérateur $ ou pas</u></p>
			<p>Exemple : <pre><code>&gt;a=1+2</br>&gt;echo $(($a*2))</br>&gt;5</br>&gt;echo $((a*2))</br>&gt;6</code></pre></p>
			<p>Dans cette exemple on voit la diffèrences entre le résultat avec et sans le $</p>
			<p>Avec le signe $ la variable et placé littéralement alors que la variable sans le signe $ retourne la resultat de l'expression qu'elle contient</p>
			<p>Voici le deroulement de la première opération : <code>1+2*2 = 5</code> Alors que dans la deuxième opération le déroulement est : <code>(1+2)*2 = 6</code></p>
			<p>Il n'y à pas de parenthèse placé mais l'opération est éffectué en amont</p>
			<p><strong>Affectation possible <code> echo $((b=4+2*3))</code></strong></p>
			<p><strong>Les affectations peuvent aussi se faire avec les raccourcis <code>+= , -= , *= , /= , &lt;&lt;= , &gt;&gt;= , &= , |= , ^= .</code></strong></p>
			<p><u>Les conditions avec la structure $(( ))</u></p>
			<p>La structure $(( )) peut également servir à vérifier des conditions arithmétiques. Les
opérateurs de comparaison renvoient la valeur 1 pour indiquer qu’une condition est véri-
fiée, et 0 sinon. Il s’agit des comparaisons classiques &lt; , &lt;= , &gt;= , &gt; , ainsi que == pour
l’égalité et != pour la différence. Les conditions peuvent être associées par un Et Logique
&amp;&amp; ou un Ou Logique || , ou encore être niées avec ! .</p>
			<p>Exemple de condition :
            <pre><code>&gt;echo $(((25 + 2) &amp; 28))</br>&gt;1</br>&gt;echo $(((12 + 4) == 17))</br>&gt;0</br>&gt;echo $(((1 == 1) &amp;&amp; (2 &amp; 3)))</br>&gt;1</code></pre></p>
			<p><u>Voici un petit script qui affiche le calendrier de l'année prochaine</u></p>
			<p><code>&gt;cal $(($(date +%Y)+1))</code>
			</article>
    </section>
	<section id="invocation_commande">
		<h1><u>Placer la sortie standart d'une commande dans une variable</u></h1>
		<article>
			<p>La commande qui se trouve entre les parenthèses est exécutée, et tout ce qu’elle a
			écrit sur sa sortie standard est capturé et placé à son emplacement sur la ligne de
			commande</p>
			<p><code>&gt;variable=$(ls -l)</code></p>
			<p>L'exemple précédent placcera le résultat de la commande ls dans la variable. Les caractères de saut de ligne qui
			se trouvent à la fin de la chaîne sont éliminés, mais ceux qui sont rencontrés dans le cours
			de la chaîne sont conservésommande qui se trouve entre les parenthèses est exécutée, et tout ce qu’elle a
			écrit sur sa sortie standard est capturé et placé à son emplacement sur la ligne de
			commande</p>
			<p>Pour afficher le résultat précedent avec les saut de ligne et autre placer la variable entre "" </p>
			<p>Sinon le resultat sera affiché brut</p>
			<p>Démonstration : </br><code>&gt;echo "$variable"</code></p>
		</article>
	</section>
	<section id="porte_variable">
		<h1><u>Les diffèrentes portées de variable</u></h1>
		<article>
			<p>Une variable définie sans aucune autre précision et disponible dans tous le processus en cour</p>
			<p>Elles seront alors disponible en lecture et en écriture</p>
			<p>Si ont declare une variable en local elle sera disponible alors uniquement au children de la fonction et en elle même jusqu'à la fin de son execution </p>
			<p>Elle ne sera pas disponible pour les processus parent</p>
			<p>On notera, toutefois, que le comportement des variables locales n’est pas tout à fait le
			même que dans d’autres langages de programmation. On peut constater que, dans les
			scripts shell, le masquage d’une variable globale par une variable locale concerne aussi
			les sous-fonctions qui peuvent être appelées à partir de la routine en question.</p>
			<p>Pour qu'une Variable soit disponible depuis tous les processus ont l'exporte avec le mot clé <strong>export</strong></p>
		</article>
	</section>
	<section id="tableau">
		<h1><u>Déclarer des tableaux et les utiliser dans un script</u></h1>
		<article>
			<p>LA limite de taille d'un tableau correspond a la limite de taille de la mémoire du pc</p>
			<p><strong>Les tableau ne fonctionne pas avec les Shells purement POSIX comme DASH</strong></p>
			<p>Pour invoquer un tableau <code>&gt;tableau[i]=valeur</code></p>
			<p>Pour consulter la valeur d'un tableau : <code>&gt;${tableau[i]}</code></p>
			<p>Exemple de manipulation : <pre><code>&gt;echo ${tableau[@]} ou &gt;echo ${tableau[*]}</code></pre></p>
			<p>Renvoie la liste de toutes les valeurs du tableau</p>
			<p>Pour avoir la longueur du ie element : <code>&gt;echo ${#tableau[i]}</code></p>
			<p>Alors que <code>&gt;echo ${#tableau[@]} ou &gt;echo ${tableau[*]}</code></p>
			<p>Renverra le nombre d'element du tableau</p>
		</article>
	</section>
	<section id="eval_">
		<h1><u>Utilisation de la commande eval</u></h1>
		<article>
			<p>Shell est un langage interpreté, il n'est pas compilé</p>
			<p>Cela permet de construire une expression de toutes pièce</br>et de l'évaluer comme s'il s'agissait d'un morceau du programme en cours d'execution</p>
			<p>Exemple : <pre><code>&gt;A="contenu de A"</br>&gt;B="A = \$A"</br>&gt;echo $B</br>&gt;A = $A</br>&gt;eval echo $B</br>&gt;A = contenu de A</code></pre></p>
			<p>Le contenu de A n'est pas enregistrer dans la variable B</p>
			<p>Si on modifie la variable A et que l'ont reconsulte la variable B avec eval, c'est alors le contenu modifié de A qui sera visible</p>
			<p>Exemple on modifie $A : <pre><code>&gt;A="nouveau contenu"</br>&gt;eval echo $B</br>&gt;A = nouveau contenu</code></pre></p>
		</article>
	</section>
	<section id="espace_disck">
		<h1><u>Script qui indique l'espace encore libre pour le repertoire de home de l'utilisateur connecté</u></h1>
		<article>
			<p>On va utiliser la commande df afin d'obtenir des stats sur le disque</p>
			<p>Puis grâce aux commande sed, cut et tail on affine notre recherche afin d'afficher le résultat voulu</p>
			<p><code>&gt;df -k . | tail -1 | sed "s/  */ /g" | cut -d " " -f 4</br>&gt;98456678</code></p>
			<p>L'option -K affiche le resultat en kilo octet tail selectionne une ligne(option -1) en partant de la fin, et sed remplace les double espaces par un simple espace et cut selectionne le champ 4 celui de l'espace restant dans le resultat de la commande de df</p>
			<p>Si l'on souhaite on peut afficher le résultat en Mo. Il nous suffit de placer l'option --block-size=1000K pour 1000kilo octet (1 bloc = 1Mo) Par default un bloc = 1000ko</p>
			<p>Pareil pour les Giga octets avec l'option --block-size=1000000K (1 block = 1 Go) ! Option pour la commande <strong>df</strong></p>
			<p>Exemple qui affiche la place libre sur le disque pour le home en Giga bite : </br><code>&gt;df -block--size=1000000K . | tail -1 | sed "s/  */ /g" | cut -d " " -f 4</br>&gt;98</code></p>
			<p>Il reste 98 Go de libre pour le répertoire home de l'utilisateur connecté</p>
		</article>
	</section>
	<section id="papeline">
		<h1><u>La combinaison de commande entre leur sortie et leur entrée standart ce fait via des PIPELINE</u></h1>
		<article>
			<p><u>Voici la liste des Pipeline disponible :</u></p>
			<table>
				<thead>
					<tr>
						<th>Pipeline</th>
						<th>Connexion</th>
						<th>Détails</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>;</td>
						<td>séquencement</td>
						<td>La seconde opération ne commence qu'a la fin de la première. Le point virgule peut être remplacé par un retour chariot, se qui correspond à la représentation habituellement dans les scripts</td>
					</tr>
					<tr>
						<td>&amp;</td>
						<td>Parallelisme</td>
						<td>La première action et lancé en arrière plan en simultané avec la seconde commande. ELle n'ont pas d'interactions entre elles</td>
					</tr>
					<tr>
						<td>&amp;&amp;</td>
						<td>Dépandence</td>
						<td>La seconde dépendance ne s'éxecute que si la première renvoie un code de retour null. Se qui par convention signifie un succès de l'execution</td>
					</tr>
					<tr>
						<td>||</td>
						<td>Alternative</td>
						<td>La seconde dépendance ne s'éxecute que si la première renvoie un code de retour non null. Se qui par convention signifie un échec de l'execution</td>
					</tr>
				</tbody>
			</table>
		</article>
			<h3><u>Comportement des papelines après une coupure volontaire d'interuption de commande</u></h3>
		<article>
			<p>Lorsque qu'il y a un signal d'interuption d'execution avec crtl + C notament le résultat diverge selon les SHELL en cours</p>
			<p>Un exemple lorsque que l'ont coupe l'execution de sleep dans un papeline</p>
			<p><code>&gt;echo debut ; sleep 20 ; echo fin</br>&gt;debut</br>&gt;Je coupe l'execution de sleep avec ctrl c</br>&gt;fin</code></p>
			<p>On voit que dans ce cas la echo echo qui affiche le message fin s'éxecute correctement</p>
			<p>Se comportement peut varier selon la version du SHELL utilisé</p>
			<p>Lorsqu'une commande est interompu volontairement avec bash interactif la commande reçoit le signal SIGINT ce qui tue la commande</p>
			<p>Elle est inihiler et la commande suivante  s'éxecute corectement</p>
			<p>Exemple : <strong>Sur mon pc si je coupe la commande sleep avec Ctrl C la commande suivante ne s'éxecute pas</strong></p>
			<p>Si on coupe l'éxecution de commande inscrit dans un script alors c'est l'éxecution du script complet qui est arrêté</p>
			<p>Avec le pipeline Parallelisme</p>
			<p>Les commandes étant indépandament lance dans diffèrents processus l'interuption d'une commande n'entraine pas la coupure des autre</p>
			<p><strong>Ramennez un processus au premier plan avec la commande fg</strong></p>
		</article>
			<h3><u>Gerer les processus en arrière plan</u></h3>
			<article>
				<p>Pour envoyer le signal SIGTTOU à un processus qui esseye de venir écrire sur le terminal en avant plan</p>
				<p>Ce signal indique au precessus de ne pas venir écrire et il se met en pause</p>
				<p>On peut alors le réveiller ultérieurment avec fg</p>
				<p><em>Pour avoir ce comportement il faut activer l'option avec la commande stty et l'option tostop</em></p>
				<p>Pour remetre stty dans état d'origine option -tostop</p>
			</article>
	</section>
	<section id="return_false">
		<h1><u>Commande qui permet de transmetre un retour false sur la sortie standart du shell</u></h1>
		<article>
			<p>Très pratique pour tester des scripts la commande false ou true permet de renvoyer une valeur sur la sortie standart</p>
			<p>Exemple : <code>echo text &amp;&amp; true &amp;&amp; echo deuxiemetxt</code></p>
			<p>Si la premiere commande renvoie bien true alors la troisieme commande s'executera également puisque le pipeline renverra true grâce à la commande true</p>
			<p>Si j'écrit la même ligne avec false  <code>&gt;echo txt &amp;&amp; false &amp;&amp; echo txtDeux</code></p>
			<p>Le premier text sera alors affiché mais jamais le deuxieme puisque le pipeline renvera false. La troisième commande ne s'éxecutera jamais</p>
		</article>
	</section>
	<section id="fg_bg">
		<h1><u>Mettre un processus en arrière plan ou au premier plan avec les commandes fg et bg (forgeground et background)</u></h1>
		<article>
			<h4><u>La commande <strong>fg : </strong></u></h4>
			<p>La commande fg ramene un processus au premier plan en lui envoyant le signal SIGCONT qui relance l'éxecution</p>
			<h4><u>La commande <strong>bg : </strong></u></h4>
			<p>La commande bg place un processus en arrière plan Utilisé en générale pour les processus suspendu l'execution se relance (en arrière plan)</p>
		</article>
	</section>
	<section id="commande_compose">
		<h1><u>Afin de gérer les dépandanses et priorité d'éxecution des commandes</u></h1>
		<article>
			<p>Il est possible de faire un groupe de commande en un bloc</p>
			<p>Grâce au accolade { }</p>
			<p>Exemple de ligne de commande : <code>&gt;ping -c 1 $host || { echo "$host n’est pas accessible" ; exit 1 }</code></p>
			<p>Dans cette ligne de code on à regrouper les commandes echo et exit 1. SI on ne l'avait pas fait la commande exit 1 s'éxecuterai même si la premier commande avait réussi alors que la elle ne s'éxecute que si la premiere commande à échoué comme echo</p>
			<p><strong>Les espaces sont obligatoire entre les accolades et les commandes</strong></p>
			<p>Les accolades permettent également de retourné un code éxecution global pour d'autre pipeline</p>
		</article>
		<h1><u>éxecuter un groupe de commande dans un sous-shell </u></h1>
		<article>
			<p>Si l'ont souhaite éxecuter un groupe de commande dans un sous-shell on utilise les parenthèses</p>
			<p>Cette fois les parenthèses peuvent être collé aux commandes</p>
			<p>Exemple de code : <code>&gt;A=1 ; B=2 ; export A</br>&gt;echo Sh1 $A $B; (echo Sh2 $A $B; A=3; B=4) ; echo Sh1 $A $B</br>&gt;Sh1 1 2</br>&gt;Sh2 1 2</br>&gt;Sh1 1 2</code></p>
			<p>Ici on peut voir que malgré les initialisations de $A et $B dans les parenthèses leur valeur ne change pas dans la commande suivante qui n'est plus entre parenthèse et donc pas éxecuté par le même shell</p>
			<p>La partie se lance dans un sous-shell indépandament des autres</p>
		</article>
		<h3><u>Utilisation des deux types { } ( ) de commandes composé</u></h3>
		<article>
			<p><u>Les deux types de commandes composé retourne le code d'éxecution du groupe de commande</u></p>
			<p>Code 0 si toutes les commandes se  sont éxecuté correctement</p>
			<p><u>Portée des variables modifié pendant un processus</u></p>
			<p>Si l'ont modifie une variable et que l'ont souahite la réutiliser utltérieurement il faut se trouver dans le même shell</p>
			<p>Toutes les commandes situé entre parenthèse peuvent avoir accès aux même variables puisque éxecuté dans le même processus</p>
			<p>Exemple de code : <code>&gt;echo "Mon message" | read VAR ; echo "VAR = $VAR"</br>&gt;</code></p>
			<p>Dans cette ligne le résultat sera vide car la variable $VAR a été initialisé dans un autre processus puisque ; sépare les commandes</p>
			<p>Alors que avec cette ligne : <code>&gt;echo "Mon message" | (read VAR ; echo "VAR = $VAR")</br>&gt;Mon message</code></p>
			<p>Maintenant grâce aux parenthèses nous avons accès à la variable puisque les deux commandes read et echo sont éxecuté dans le même Shell</p>
			<p><strong>Dans certain shell comme Ksh execute la derniere commande d'un pipeline dans le shell père et les variables peuvent être disponible</strong></p>
		</article>
	</section>
	<section id="redirection_entre_sortie_standart">
		<h1><u>Les redirections des entrées et sorties standart</u></h1>
		<article>
			<p>Très utilies les redirections des entrées et sorties standart</p>
			<p>Il y à le pipe | qui relie directement la sortie standart du premier argument à la l'entré standart du deuxieme argument</p>
			<p> Pour envoyé le contenu d'un fichier en entré standart d'une commande opérateur </p>
			<p>Exemple : <code>&gt;read LIGNE &lt; fichier.txt</br>&gt;1er ligne du fichier</code></p>
			<p>Redirigé la sortie standart d'une commande dans un fichier avec  &gt; ou &gt;&gt;</p>
			<p>l'opérateur &gt; permet d'envoyez la sortie standart dans le fichier en écrasant le contenu déjà existant et créer le fichier si il n'existe pas</p>
			<p>l'opérateur &gt;&gt;Permet d'envoyez la sortie standart dans le fichier en ajoutant à la fin du contenu déjà éxistant</p>
			<p><u>La sortie d'erreur : </u></p>
			<p>Pour redirigé la sortie standart d'erreur c'est l'opérateur 2&gt;</p>
			<p>Exemple de code : </br><code>&gt;find / -name passwd 2&gt;/dev/null</br>&gt;Ne renverra que les lignes ok les lignes d'erreur comme acces refusé seront envoyé vers /dev/null</code></p>
			<p>Sans la redirection de la sortie d'erreur dans /dev/null une multitude de message d'erreur serait venu poluer la sortie standart (Dans le terminal)</p>
			<p>Pour redirigé les deux sortie erreur et standart dans le même fichier ou sur un pipe</p>
			<p>Opérateur 2&gt;&amp;1 effectue une copie de la sortie standart sur la sortie d'erreur</p>
			<p>Attention seul une copie est effectué si une redirection et effectué ultérieurement sur la sortie standart cela ne concernera pas la sortie d'erreur</p>
			<p>En général en place cette redirection à la fin après toutes les autres redirection</p>
			<p>Les diffèrentes sortie ne fonctionne pas pareils la sortie standart utilise un buffer fonctionnant ligne par ligne sauf en cas de redirection vers un fichier qui dans ce cas envoie des blocs brute</p>
			<p><u>Fonctionnement des buffers : </u></p>
			<p>Exemple avec le code : </br><code>&gt;grep snmp /etc/* &gt; fichier 2&gt;&amp;1 #La sortie standard et la sortie d'erreur sera envoyé dans le fichier</code></p>
			<p>Dans cette exemple la commande grep en retourne pas beaucoup de résultat et sont donc tous stockés dans le buffer jusqu'à la fin de l'éxécution de la commande</p>
			<p>La sortie standard ne possède pas de buffer les messages d'erreur sont donc écrit instantanement dans le fichier</p>
			<p>Le résultat dans le fichier affichera en premier les messages d'erreurs puis à la fin le buffer de sortie standard sera copier</p>
			<p>Par contre avec cette exemple : <code></br>&gt;grep root /etc/* 2&gt;&amp;1</br>&gt;#La sortie d'erreur et la sortie standard seront envoyé dans le fichier</code></p>
			<p>Ici le cas est diffèrent car les résultats de la commande seront plus élevés. Le buffer sera rempli à plusieurs reprise</p>
		</article>
		<h1 id="commande_silencieuse"><u>Rendre l'éxécution d'une commande silencieuse</u></h1>
		<article>
			<p>Envoyer la sortie d'erreur et standard vers /dev/null avec une redirection 2&gt;&amp;1 /dev/null</p>
			<p><strong>Il existe un raccourci de 2&gt;&amp;1 qui et &amp;&gt;fichier</strong>
			<p>Exemple de commande : <code></br>&gt;grep root &amp;&gt;/etc/null</code></p>
			<p>Ne renverra rien car les deux sorties (erreur et standard) sont envoyé vers /dev/null</p>
			<p><u>Beaucoup plus court que : </u><code></br>&gt;grep root &gt; /etc/null 2&gt;&amp;1	#Pour  les deux sorties vers /dev/null</code></p>
		</article>
		<h1 id="redirection_avancee"><u>Les redirections avancées</u></h1>
		<article>
			<p>Il faut bien comprendre que les opérateurs de redirection se compose ainsi n&gt;&amp;m</p>
			<p>n et m représente des files descripteurs représenté par défaut avec 0 entrée standard, 1 sortie standard, 2 sortie d'erreur</p>
			<p>Il est possible de rediriger tous les files descripteur</p>
			<p>Exemple pour redirigé (duplique) la sortie standard sur la sortie d'erreur le contraire de 2&gt;&amp;1</p>
			<p><code>&gt;grep root /etc/* &gt;&amp;2</code></p>
			<p>Ont peut ouvrir un descripteur en lecture et en écriture grâce aux opérateur &gt; &lt;</p>
			<p>Mais aussi fermer un file descripteur avec n&gt;&amp;-</p>
			<p>Le descripteur ainsi fermer ne sera plus disponible</p>
		</article>
	</section>
	<section id="ftp">
		<h1><u>Utilisé le protocol ftp dans ses scripts</u></h1>
		<article>
			<p>Il n'est pas possible de redirigé l' entrée standart de la commande ftp</p>
			<p>Il faut créer un fichier avec les informations de connexions</p>
			<p>Se fichier sera .netrc <strong>Atention fichier avec droit restrictif seul le propriétaire doit pouvoir le lire</strong></p>
			<p>La commande open de ftp ira chercher si un document .netrc existe et s'en servira pour se connecté (Identifiant et Mot de pass)</p>
			<p>Il ne doit y avoir que ces informations dans le fichiers</p>
			<p><u>Tableau récapitulatif des commandes de base pour se connecté à un hôte distant via ftp et récupérer des fichiers</u></p>
			<table>
				<thead>
					<tr>
						<th>Commande</th>
						<th>Utilisation</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>open</td>
						<td>Se connecté à une machine distante en vérifiant si fichier .netrc existe pour identifiant et mot de passe</td>
					</tr>
					<tr>
						<td>bin</td>
						<td>Ne sert que dans rare cas mais très utiles afin de gérer les erreurs avec l'interpretation des \n \t</td>
					</tr>
					<tr>
						<td>prompt</td>
						<td>Indique à ftp de ne pas demander de confirmation à chaque fichier lors du telechargement</td>
					</tr>
					<tr>
						<td>mget</td>
						<td>Indique les fichiers à récupérer. Utilisation de caractère générique comme * possible</td>
					</tr>
				</tbody>
			</table>
			<p>Le fichier .netrc doit être composé de la façon suivante</p>
			<p>machine adresse de la machone</br>login votre login</br>password votre mot de passe</p>
			<p><u><strong>Voici un exemple de programme qui prend en argument La liste suivante :</strong></u></p>
			<ol>
				<li>Machine à contacter</li>
				<li>Chemin d'acces sur l'hote distant</li>
				<li>Fichier à transferer</li>
				<li>Login (Falcultatif par defaut anonymous</li>
				<li>Mot de passe (Falcultatif par defaut adresse de l'hote client</li>
			</ol>
			<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;#PAramétrage du transfert désiré
&gt;
&gt;MACHINE=${1:?Pas de machine indiquée}
&gt;CHEMIN=${2:?Pas de chemin indiqué}
&gt;FICHIERS=${3:?Pas de fichiers indiqués}
&gt;
&gt;LOGIN=${4:-anonymous}
&gt;PASSWORD=${5:-$USER@$HOSTNAME}
&gt;
&gt;#D'abord sauver l'éventuel fichier ~/.netrc
&gt;
&gt;if [ -f ~/.netrc ] ;then
&gt;	mv ~/.netrc ~/.netrc.back
&gt;fi
&gt;
&gt;#Créer un nouveau ~/.netrc
&gt;#avec uniquement les infos concernant la connexion voulue
&gt;
&gt;#ANCIEN_UMASK=$(umask)
&gt;#umask 0177
&gt;
&gt;echo machine $MACHINE &gt; ~/.netrc
&gt;echo login $LOGIN &gt;&gt; ~/.netrc
&gt;echo password $PASSWORD &gt;&gt; ~/.netrc
&gt;#umask $ANCIEN_UMASK
&gt;
&gt;#Lancer la connexion
&gt;ftp &lt;&lt;- FIN
&gt;	open $MACHINE
&gt;	bin
&gt;	prompt
&gt;	cd $CHEMIN
&gt;	mget $FICHIERS
&gt;	quit
&gt;FIN
&gt;
&gt;#Effacer .netrc et récupérer l'ancien
&gt;
&gt;rm -f ~/.netrc
&gt;if [ -f ~/.netrc ]; then
&gt;	mv ~/.netrc
&gt;fi
</code></pre></p>
			<p>Un exemple d'éxecution avec comme hôte distant : ftp.lip6.fr qui est un serveur de l'universite de paris</p>
			<p>Elle possede notament des distributions linux ainsi que des commandes</p>
			<p>Pour se connecte login anonymous et mot passe son adresse $USER@$HOSTNAME du client</p>
		</article>
	</section>
	<section id="condition_if">
		<h1><u>Les conditions de structure if_then_elif_then_else_fi</u></h1>
		<article>
			<p>La structure :<code></br>&gt;if condition1 ; then</br>	&gt;instruction</br>&gt;elif condition2 ; then</br>	&gt;instruction</br>&gt;else</br>	&gt;instruction</br>&gt;fi</code></p>
			<p>Il est recommandé d'utiliser les [ ] pour entourer les conditions</p>
			<p>then peut se mettre à la ligne le ; n'est plus necessaire dans ce cas</p>
			<p><u>LE Shell offre la possibilité de faire certain test avec l'opérateur internet test avec les arguments suivants :</u></p>
			<table>
				<thead>
					<tr>
						<th>Options :</th>
						<th>La condition sera vraie si : </th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>-a fichier</br>-e fichier</td>
						<td>Si le fichier indiqué existe. L'option -a n'est pas définie dans Single UNIX version 3 on préfèrera utilisé l'option -e </td>
					</tr>
					<tr>
						<td>-b fichier</td>
						<td>Le fichier indiqué est un noeud spécial qui décrit un périphérique en mode bloc</td>
					</tr>
					<tr>
						<td>-c fichier</td>
						<td>Le fichier indiqué est un noeud spécial qui décrit un périphérique en mode caractère</td>
					</tr>
					<tr>
						<td>-d répertoire</td>
						<td>Le répertoire indiqué existe</td>
					</tr>
					<tr>
						<td>-f fichier</td>
						<td>Le fichier indiqué et un fichier régulier</td>
					</tr>
					<tr>
						<td>-g fichier</td>
						<td>Le Set-GID du fichier indiqué et positionné</td>
					</tr>
					<tr>
						<td>-h fichier</br>-L fichier</td>
						<td>Le fichier indiqué et un lien symbolique</td>
					</tr>
					<tr>
						<td>-G fichier</td>
						<td>Le fichier indiqué appartient au même groupe que le GID effectif du processus invoquant la commande test</td>
					</tr>
					<tr>
						<td>-k fichier</td>
						<td>Le bit sticky du fichier indiqué et positionné</td>
					</tr>
					<tr>
						<td>-n chaine</td>
						<td>La longueur de la chaine renseigné et non null</td>
					</tr>
					<tr>
						<td>-N fichier</td>
						<td>Le fichier à été modifié depuis le dernier accès en mode lecture</td>
					</tr>
					<tr>
						<td>-O fichier</td>
						<td>Le fichier indiqué appartient au même utilisateur que l'UID effectif du processus invoquant la commande test</td>
					</tr>
					<tr>
						<td>-p fichier</td>
						<td>Le fichier indiqué est un tube nommé (file FIFO).</td>
					</tr>
					<tr>
						<td>-r fichier</td>
						<td>Le fichier indiqué et lisible</td>
					</tr>
					<tr>
						<td>-s fichier</td>
						<td>La taille du fichier indiqué et non null</td>
					</tr>
					<tr>
						<td>-S fichier</td>
						<td>Le fichier indiqué est une socket</td>
					</tr>
					<tr>
						<td>-t descripteur</td>
						<td>Le descripteur de fichier correspond à un terminal</td>
					</tr>
					<tr>
						<td>-u fichier</td>
						<td>Le bit Set-UID du fichier indiqué est positionné</td>
					</tr>
					<tr>
						<td>-w fichier</td>
						<td>On peut écrire dans le fichier</td>
					</tr>
					<tr>
						<td>-x fichier</td>
						<td>Le fichier indiqué est éxecutable</td>
					</tr>
					<tr>
						<td>-z chaine</td>
						<td>La longueur de la chaine indiquée est nulle</td>
					</tr>
					<tr>
						<td>chaine</td>
						<td>La chaine est non nulle</td>
					</tr>
					<tr>
						<td>chaine = chaine2</td>
						<td>Les deux chaines sont identique</td>
					</tr>
					<tr>
						<td>chaine != chaine2</td>
						<td>Les deux chaînes sont diffèrentes.</td>
					</tr>
					<tr>
						<td>chaine &lt; chaine2</td>
						<td>La premiere chaine apparaît avant la seconde, dans un tri lexicographique croissant.</td>
					</tr>
					<tr>
						<td>chaine &gt; chaine2</td>
						<td>La premiere chaine apparait après la seconde, dans un tri lexicographique croissant.</td>
					</tr>
					<tr>
						<td>valeur -eq valeur2</td>
						<td>Les valeur arithmétiques sont égales</td>
					</tr>
					<tr>
						<td>valeur -ge valeur2</td>
						<td>La premiere valeur est supérieur ou égale à la seconde.</td>
					</tr>
					<tr>
						<td>valeur -gt valeur2</td>
						<td>La premiere valeur est strictement supérieure à la seconde</td>
					</tr>
					<tr>
						<td>valeur -le valeur2</td>
						<td>LA premiere valeur est inférieure ou égal à la seconde</td>
					</tr>
					<tr>
						<td>valeur -lt valeur2</td>
						<td>LA premiere valeur est strictement inférieur à la seconde</td>
					</tr>
					<tr>
						<td>valeur -ne valeur2</td>
						<td>Les deux valeur arithmétiques sont diffèrentes</td>
					</tr>
					<tr>
						<td>fichier -ef fichier2</td>
						<td>Le fichier est le même que le fichier2.Il peut s'agir de deux noms(liens physique) diffèrents dans le système de fichiers, correspondant au même contenu sous-jacent.La comparaison concerne le numéro de périphérique de support et le numéro d'i-noeud.</td>
					</tr>
					<tr>
						<td>fichier -nt fichier2</td>
						<td>La dte de dernière modification du fichier est plus récente que celle du fichier2.</td>
					</tr>
					<tr>
						<td>fichier -ot fichier2</td>
						<td>La date de dernière modification du fichier est plus ancienne que celle du fichier2</td>
					</tr>
				</tbody>
			</table>
			<p><strong>Les mêmes options peuvent être utilisé dans la commande interne [ ] qui est un synonyme de test</strong></p>
			<p>Si on indique un nom de fichier correspondant à un lien symbolique seul les options -h et -L s'occuperont du lien symbolique. Les autres options traiteront la cible visé pas le lien</p>
			<p>Voici un script qui donne des informations sur les fichiers passé en arguments</p>
			<p><pre><code>
#!/bin/bash

for i in "$@" ; do
	echo "$i : "
	if [ -L "$i" ] ; then echo " (lien symbolique) " ; fi
	if [ -e "$i" ] ; then
		echo -n " type = "
		if [ -b "$i" ] ; then echo "special bloc" ; fi
		if [ -c "$i" ] ; then echo "special caractère " ; fi
		if [ -d "$i" ] ; then echo "répertoire" ; fi
		if [ -f "$i" ] ; then echo "fichier regulier" ; fi
		if [ -p "$i" ] ; then echo "tube nommé " ; fi
		if [ -S "$i" ] ; then echo "socket " ; fi
		echo -n " bits = "
		if [ -g "$i" ] ; then echo -n "Set_GID " ; fi
		if [ -u "$i" ] ; then echo -n "Set-UID " ; fi
		if [ -k "$i" ] ; then echo -n "Sticky " ; fi
		echo ""
		echo -n " accès = "
		if [ -r "$i" ] ; then echo -n "lecture "; fi
		if [ -w "$i" ] ; then echo -n "écriture "; fi
		if [ -x "$i" ] ; then echo -n "execution "; fi
		echo ""
		if [ -G "$i" ] ; then echo " appartient à notre GID"; fi
		if [ -O "$i" ] ; then echo " appartient à notre UID"; fi
	else
		echo " n'existe pas"
	fi
done</code></pre></p>
			<p>Toutes les occurences de $i sont entre "" pour conserver les espaces dans les noms de fichiers passé en argument</p>
			<p>Passe chaque fichier dans les conditions afin d'obtenir des informations complémentaire</p>
		</article>
		<h1><u>Tester plusieurs conditions</u></h1>
		<article>
			<p>Pour vérifier plusieurs conditions on peut utiliser la notation suivante : </p>
			<table>
				<thead>
					<tr>
						<th>Option</th>
						<th>Alternative</th>
						<th>Vrai si </th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>! condition</td>
						<td>! condition</td>
						<td>La condition est Fausse</td>
					</tr>
					<tr>
						<td>condition_1 -a condition_2</td>
						<td>condition_1 &amp;&amp; condition_2</td>
						<td>Les deux conditions sont vraie</td>
					</tr>
					<tr>
						<td>condition_1 -o condition_2</td>
						<td>condition_1 || condition-2</td>
						<td>si au moins une des conditions est vraie</td>
					</tr>
				</tbody>
			</table>
		</article>
	</section>
	<section id="condition_case">
		<h1><u>Utilisation des structures de condition case esac</u></h1>
		<article>
			<p><u>Voici la structure de case : </u></p>
			<p><pre><code>&gt;case expression in</br>	&gt;motif 1) commande_1;;</br>	&gt;motif 2) commande_2;;</br>	&gt;motif 3) commande_3;;</br>&gt;esac</code></pre></p>
			<p>L'expréssion est évalué puis comparé en tant que chaine de caractère aux diffèrents motif</p>
			<p>Si correspondance avec le motif la commande qui suit et éxecuté et passe la fin de case à la ligne esac</p>
			<p>Les motifs peuvent être des caractères générique du Shell. Comme l'astérix qui permet de désigner tout caractère ou le point d'interogation qui remplace un unique caractère</p>
			<p>Un motif peut être une REGEX entre [ ]</p>
			<p>Un exemple ci-dessous avec la commande uname</p>
		</article>
	</section>
	<section id="uname">
		<h1><u>Utilisation de la commande uname</u></h1>
		<article>
			<p>LA commande uname permet d'avoir des informations sur la machine le noyeau l'architecture</p>
			<p>La commande : <code>&gt;uname -a</code> Donne en résultat toutes les informations disponible par uname</p>
			<p>Avec l'option -r <code>&gt;uname -r</code> Retourne le numéro du noyeau kernel en cours d'utilisation</p>
			<p><u>Un exemple de code avec deux imbrication de case : </u></p>
			<p><pre><code>
#!/bin/bash

i=$(uname -r)

case "$i" in
	3.*) Type_noyau="3" ;;
	2.6.*) Type_noyau="2.6" ;;
	2.4.* | 2.5.*) Type_noyau="2.4" ;;
	2.* | 1.* | 0.*) echo "Trop ancien, impossible de continuer"
			exit 1 ;;
	*) Type_noyau="Inconnu"
		echo "Noyau inconnu ; continuer l'installation ?"
		read Reponse
		case "$Reponse" in
			O* | o* | Y* | y*)
				echo OK;;
			*) exit 1;;
		esac ;;
esac
echo "Instalation pour noyau de type $Type_noyau"
</code></pre></p>
			<p>Ce code vérifie la version du noyau kernel en cours d'éxecution grâce à la commande uname</p>
		</article>
	</section>
	<section id="boucle">
		<h1><u>Les boucles de répétition while_do_done et until_do_done</u></h1>
		<article>
			<p><u>La boucle while_do_done</u></p>
			<p>Structure de la boucle : <code></br>&gt;while condition ; do</br>&gt;instruction</br>&gt;done</code>
			<p>Code d'exemple qui calcul la factorielle d'un nombre :</p>
			<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;#n = argument $1 si argument $1 n'est pas défini alors n = 1
&gt;n=${1:-1}
&gt;i=1
&gt;f=1
&gt;while [ $i -le $n ] ; do
&gt;	f=$((f * i++))
&gt;done
&gt;
&gt;echo "$n! =$f"
			</code></pre></p>
			<p><u>La boucle until_do_done</u></p>
			<p>Structure de la boucle : <code></br>&gt;until condition ; do</br>&gt;instruction</br>&gt;done</code>
			<p>Fonctionne sur le même principe que while_do_done</p>
		</article>
		<h1><u>Rupture de séquence avec les instructions <code>continue et break</code></u></h1>
		<article>
			<p><code>break</code> Sert à sortir immédiatement de la boucle en cours d'éxecution. l'éxecution du processus continue après l'instruction done de la boucle ciblé</p>
			<p>Exemple : <pre><code>
&gt;#!/bin/bash
&gt;
&gt;while true ; do
&gt;	echo -n "[Commande]&gt;"
&gt;	if ! read chaine ; then
&gt;		echo "Saisie invalide"
&gt;		break;
&gt;	fi
&gt;	if [ -z "$chaine" ] ; then
&gt;		echo "Saisie vide"
&gt;		break
&gt;	fi
&gt;	if [ "$chaine" = "fin" ] ; then
&gt;		echo "Fin demandée"
&gt;		break;
&gt;	fi
&gt;	eval $chaine
&gt;done
&gt;echo "Au revoir"</code></pre></p>
			<p>Dans ce code Les instructions break met fin à la boucle infinie while true ; do</p>
			<p>eval execute la commande qui se trouve dans chaine</p>
			<p>Si on tape fin alors  le script s'arrête (Mini interpreteur)</p>
			<p><strong>Une option avec break <code>break 2</code> fera sortir des deux boucles imbrique</strong></p>
			<p>Par defaut break 1 et égal à break seul</p>
			<p><code>continue</code> Renvoie le contrôle au début de la boucle</p>
			<p>Sans éxecuter les commandes qui suivent. Effectue un saut au début de la boucle</p>
			<p>Peut prendre un chiffre en option comme pour break pour indiquer le nombre de boucle que l'on doit remonter</p>
			<p>Par defaut continue 1 est égal à continue sans option</p>
		</article>
	</section>
	<section id="for_do">
		<h1><u>La boucle de répétition avec condition for_do_done</u></h1>
		<article>
			<p>La structure de la boucle for : <code>&gt;for variable in liste_de_mot ; do</br>&gt;commandes</br>&gt;done</code></p>
			<p>Son fonctionnement diffèrent de l'utilisation que l'on en fait dans les autre langage courant comme le C</p>
			<p>La variable va prendre une à une successivement tous les mots qui son contenu dans la liste</p>
			<p>Le corp de la boucle sera répété pour chaque valeur de variable</p>
			<p>Exemple de script qui calcule le carré des entiers indiqué</p>
			<p><pre><code>&gt;for i in 1 2 3 5 7 11 13; do</br>&gt;	echo "${i}2 = $((i * i))"</br>&gt;done</code></pre></p>
			<p>La boucle for est souvent utilisé avec les listes "$@" et *</p>
			<p>$@ represente la liste des arguments passé en ligne de commande et * la liste des fichiers présent dans le répertoire courant en cour</p>
			<p>Par defaut for utilise "$@" comme liste si aucune n'est renseigné</p>
			<p>Exemple : <code>&gt;for i ; do&gt;echo $i&gt;done</code></p>
			<p>echo affichera le nom des argumments passé en ligne de commande</p>
			<p>Exemple d'utilisation de la boucle for en ligne de commande pour rennommer tous les fichier .TGZ en tar</p>
			<p><code>&gt;for i in *.TGZ ; do mv $i ${i%%.TGZ}.tar ; done</code></p>
		</article>
	</section>
	<section id="select">
		<h1><u>La boucle de selection select_do_done</u></h1>
		<article>
			<p>La structure de condition et assez originale et peut être très utile dans certain script</p>
			<p>Structure de select : <code>&gt;select variable in liste_de_mot; do</br>&gt;commande</br>&gt;done</code></p>
			<p>Le shell développe et affiche la liste des mots sur la sortie standard d'erreur</p>
			<p>Il affiche ensuite le symbole d'invite representer par la variable PS3 et lit une ligne depuis son entrée standard</p>
			<p>SI elle contient qui représentent l'un des mots affichés, ce dernier et placé dans la variable dont le nom et précisé après select.</p>
			<p>La boucle s'arrête lorsque la lecture rencontre une fin de fichier ou ctrl-d ou l'instruction break</p>
			<p>Lorsque la lecture rencontre une ligne vide la liste de mot et à nouveau affiché et la saisie recommence</p>
			<p>Si la ligne lue ne correspond à aucun mot affiche, la variable reste vide, mais la saisie et envoyé dans la variable spéciale <strong>REPLY</strong></p>
			<p>Vraiment pratique pour une utilisation avec interaction de l'utilisateur</p>
			<p>Exemple de menu qui propose diffèrente manipulation sur tous les fichiers du répertoire courant d'utilisation</p>
			<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;#Cette fonction reçoit en argument le nom d'un fichier, et
&gt;#propose les diffèrentes actions possibles.
&gt;
&gt;function action_fichier ()
&gt;{
&gt;	local reponse
&gt;	local saisie
&gt;
&gt;	echo "*******************************"
&gt;	PS3="
&gt;Action sur $1 : "
&gt;	select reponse in Infos Copier Déplacer Détruire Retour ; do
&gt;		case $reponse in
&gt;		Infos )
&gt;			echo
&gt;			ls -l $1
&gt;			echo
&gt;			;;
&gt;		Copier )
&gt;			echo -n "Copier $1 vers ? "
&gt;			if ! read saisie ; then continue ; fi
&gt;			cp $1 $saisie
&gt;			;;
&gt;		Déplacer )
&gt;			echo -n "Nouvel emplacement pour $1 ? "
&gt;			if ! read saisie ; then continue ; fi
&gt;			mv $1 $saisie
&gt;			break
&gt;			;;
&gt;		Détruire )
&gt;			if rm -i $1 ; then break; fi
&gt;			;;
&gt;		Retour )
&gt;			break
&gt;			;;
&gt;		* ) if [ "$REPLY" = "O" ] ; then break ; fi
&gt;			echo "$REPLY n'est pas une reponse valide"
&gt;			echo
&gt;			;;
&gt;		esac
&gt;	done
&gt;}
&gt;
&gt;#Cette routine affiche la liste des fichiers présents dans
&gt;#le répertoire, et invoque la fonction action_fichier si la
&gt;#saisie est correcte. Elle se termine si on sélectionne "0"
&gt;function liste_fichiers ()
&gt;{
&gt;	echo "*****************************************"
&gt;	PS3="Fichier à traiter : "
&gt;	select fichier in * ; do
&gt;		if [ ! -z "$fichier" ] ; then
&gt;			action_fichier $fichier
&gt;			return 0
&gt;		fi
&gt;		if [ "$REPLY" = "0" ] ; then
&gt;			return 1
&gt;		fi
&gt;		echo "==&gt; Entrez 0 pour Quitter"
&gt;		echo
&gt;	done
&gt;}
&gt;
&gt;#Exemple de boucle tant qu'une fonction réussit.
&gt;#Le deux-points dans la boucle signifie "ne rien faire"
&gt;while liste_fichiers ; do : ; done</code></pre></p>
			<p>Ce script prend tous les fichiers du repertoire courant et grâce à la boucle de selection select nous demande avec lequel nous voulons interargir</p>
			<p>Nous passons ensuite la deuxieme fonction si notre choix et correcte et nous demande si l'ont souhaite faire une des commandes préciser sur le fichier</p>
			<p>Pour sélectionner un choix proposéé par la boucle select il faut entrer un numéro qui iniquer avant le texte corespondant</p>
			<p><strong>Attention un return dans une boucle de sélection select ne fait pas quitter la fonction mais uniquement la boucle select</strong></p>
			<p>La boucle while tout à la fin du script ne vérifie qu'une valeur tant que la fonction liste_fichiers renvoie null (pas d'erreur)</p>
			<p>Les deux points dans la boucle while signifie ne rien faire</p>
			<p>ici quelque exemple de résultat du script :</br><code>
&gt;./menu_fichier.sh</br>
&gt;*********************************************</br>
&gt;1) doc.tgz</br>
&gt;3) menu_fichier.sh</br>
&gt;5) src.tgz</br>
&gt;2) icones.tgz</br>
&gt;4) sons.tgz</br>
<strong>&gt;Fichier à traiter : 2</strong></br>
&gt;*********************************************</br>
&gt;1) Infos</br>
&gt;3) Déplacer</br>
&gt;5) Retour</br>
&gt;2) Copier</br>
&gt;4) Détruire</br>
<strong>&gt;Action sur icones.tgz : 2</strong></br>
&gt;Copier icones.tgz vers ? essai</br>
&gt;*********************************************</br>
&gt;1) Infos</br>
&gt;3) Déplacer</br>
&gt;5) Retour</br>
&gt;2) Copier</br>
&gt;4) Détruire</br>
<strong>&gt;Action sur icones.tgz : 5</strong></br>
&gt;*********************************************</br>
&gt;1) doc.tgz</br>
&gt;3) icones.tgz</br>
&gt;5) sons.tgz</br>
&gt;2) essai</br>
&gt;4) menu_fichier.sh 6) src.tgz</br>
<strong>&gt;Fichier à traiter : 2</strong></br>
&gt;*********************************************</br>
&gt;1) Infos</br>
&gt;3) Déplacer</br>
&gt;5) Retour</br>
&gt;2) Copier</br>
&gt;4) Détruire</br>
<strong>&gt;Action sur essai : 4</strong></br>
&gt;Détruire essai ? o</br>
&gt;*********************************************</br>
&gt;1) doc.tgz</br>
&gt;3) menu_fichier.sh 5) src.tgz</br>
&gt;2) icones.tgz</br>
&gt;4) sons.tgz</br>
<strong>&gt;Fichier à traiter : 5</strong></br>
&gt;*********************************************</br>
&gt;1) Infos</br>
&gt;3) Déplacer</br>
&gt;5) Retour</br>
&gt;2) Copier</br>
&gt;4) Détruire</br>
&gt;Action sur src.tgz : 3</br>
&gt;Nouvel emplacement pour src.tgz ? sources.tar.gz</br>
&gt;*********************************************</br>
&gt;1) doc.tgz</br>
&gt;3) menu_fichier.sh 5) sources.tar.gz</br>
&gt;2) icones.tgz</br>
&gt;4) sons.tgz</br>
<strong>&gt;Fichier à traiter : 0</strong></code></pre></p>
		<p>Les lignes en gras represente les interactions avec l'utilisateur</p>
		<p>On voit bien que dans cette exemple que l'utilisateur fait son choix en entrant un numéro</p>
		<p>Le choix des menus et affiché grâce à la sortie d'erreur</p>
		<p>Donc si la sorite d'erreur est redirigé vers un fichier ou autre les menus n'apparaitrons pas</p>
		<p>La boucle de selection peut s'averé très utile dans des scripts d'instalation ou l'utilisateur choisi des modules ou des répertoires à copier</p>
		</article>
	</section>
	<section id="fonction">
		<h1><u>Utilisation des fonctions dans des scripts</u></h1>
		<article>
			<p>Il est possible d'utiliser des fonctions dans les scripts</p>
			<p>D'une manière général les fonctions se déclare de la manière suivante :</p>
			<p><code>&gt;function nom_de_la_fonction ()</br>&gt;{</br>&gt;Commande</br>&gt;}</code></p>
			<p>Il possible de prendre des raccourcis par exemple en ne mettant pas function mais juste le nom de la fonction suivi des () ou alors de ne pas mettre de paranthèse mais le mot clé function</p>
			<p><code>&gt;nom_de_la_fonction ()</br>&gt;{</br>&gt;Commande</br>&gt;}</code> ou <code>&gt;function nom_de_la_fonction</br>&gt;{</br>&gt;Commande</br>&gt;}</code></p>
			<p>Si l'on souhaite que le script soit portable il vaut mieu prévilègié la méthode avec les parenthèse</p>
			<p>L'accolade peut être placé juste après les parenthèse</p>
			<p>Les arguments que l'on passe à une fonction sont placé à la suite de son nom lors de son invocation. Ils ne sont pas indiqué lors de la définition de la fonction</p>
			<p>Les arguments sont placé dans les paramètres positionnels $1 $2 $3 ... $n ou l'on pourra les consulter dans la fonction</p>
			<p>Une attitude défensive de programmation voudrai que l'on vérifie au moins que le bon nombre d'arguments à été passé</p>
			<p>C'est possible grâce aux paramètres spécial $@ qui contient le nombre de paramètre positionnel reçu</p>
			<p>Exemple de code dans une fonction qui vérife que l'on à bien 3 paramètres positionnel reçu<code>
			<p><code>&gt;function trois_arg</br>&gt;{</br>&gt;#Cette runtime attend trois arguments</br>&gt;if [ $# -ne  3 ] ; then</br>&gt;echo "Nbr d'arguments erroné dans trois_arg()"</br>&gt;return</br>&gt;fi</br>&gt;echo "Traitement des arguments de trois_arg()"</code></p>
			<p><u>Exemple de transmition des arguments passé en ligne de commande à une fonction</u></p>
			<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;function additionne
&gt;{
&gt;	#Cette routine additionne tous ses arguments, et
&gt;	#affiche le résultat sur la sortie standard
&gt;	local somme
&gt;	local i
&gt;	somme=0
&gt;	for i in "$@" ; do
&gt;		somme=$((somme + i))
&gt;	done
&gt;	echo $somme
&gt;}
&gt;#Appeler la fonction avec les arguments reçus
&gt;#en ligne de commande.
&gt;additionne "$@"</code></pre></p>
			<p> La dernière ligne appel la fonction additionne en lui transmetant tous les arguments grâce au paramètre spécial "$@" entouré des "" pour garder les espaces ou autres caractères spéciaux</p>
			<p>Le paramètre positionnel $0 conserve la même valeur que dans le reste du script, c'est à dire le nom et le chemin d'accès du fichier contenant le script
			<p>Le mot clé local permet d'indiquer que la variable déclaré ainsi ne sera visible que dans la fonction déclaré</p>
			<p>La déclaration local protège la modification de variable externe à la fonction</p>
			<p>La déclaration  local permet également l'appel récursif de la fonction</p>
			<p><u>Exemple de code avec un appel récursif :</u></p>
			<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;function explore_repertoire
&gt;{
&gt;	local f
&gt;	local i
&gt;	#Faire précéder le nom du répertoire reçu en premier
&gt;	#argument par autant de caractères blancs que la 
&gt;	#valeur du second argument/
&gt;	i=0
&gt;	while [ $i -lt $2 ] ; do
&gt;		echo -n " "
&gt;		i=$((i+1))
&gt;	done
&gt;	echo "$1"
&gt;	#Se déplacer dans le 1er répertoire. Si échec -> abandon
&gt;	if ! cd "$1" ; then return ; fi
&gt;	#Balayer tout le contenu du répertoire
&gt;	for f in * ; do
&gt;		#Sauter les liens symboliques
&gt;		if [ -L "$f" ] ; then
&gt;			continue
&gt;		fi
&gt;		#Si on a trouvé un sous-répertoire, l'explorer en
&gt;		#incrémentant sa position (de 4 pour l'esthétique)
&gt;		if [ -d "$f" ] ; then
&gt;			explore_repertoire "$f" $(($2 + 4))
&gt;		fi
&gt;	done
&gt;	#Revenir dans le répertoire initial
&gt;	cd ..
&gt;}
&gt;
&gt;#Lancer l'exploration à partir de l'argument
&gt;explore_repertoire "$1" 0</code></pre></p>
			<p>L'appel de la variable $f est obligatoire en local sinon l'appel récursif  aurait été modifié sa valeur avant le retour</p>
			<p>PLus on descend dans l'arborescence plus ont rempli avec des espaces blancs pour mieu voir l'emplacement de chaque fichier</p>
		</article>
		<h1><u>La valeur retourné par une fonction</u></h1>
		<article>
			<p>Une fonction retourne une valeur qui est le code retour de la dernière instruction exécuté</p>
			<p>L'instruction return permet, si on le désire de définir explicitemetn un code retour</p>
			<p>Le code retour d'une fonction sert principalement pour les test de condition type if_then_else_fi</p>
			<p>Se code retour ne peut pas être stocker dans une variable (En règle général) ni être affiché</p>
			<p>Le code est égal à zéro pour signifié pas de souci. C'est égal à true</p>
			<p>Si c'est une autre valeur alors erreur dans l'éxécution. c'est false</p>
		</article>
	</section>
    </body>
</html>
