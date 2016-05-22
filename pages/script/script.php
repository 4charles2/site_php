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
						<th>Fonctionnilité du symbôle</th>
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
			<li><a href="#variable_arthmetique">Declarer une variable arithmetique</a></li>
			<li><a href="#variable_lecture_seul">Modifier une variable pour qu'elle ne soit disponible qu'en lecture seul</a></li>
			<li><a href="#sous_chaine">extraction de sous-chaine</a></li>
		</ol>
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
        <h1><u>Exemple de script qui rennome tous les fichiers portant l'extention .TGZ en .tar.gz</u></h1>
        <article>
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
			<p><strong>Les affectations peuvent aussi se faire avec les raccourcis <code>+= , -= , *= , /= , <<= , >>= , &= , |= , ^= .</code></strong></p>
			<p><u>Les conditions avec la structure $(( ))</u></p>
			<p>La structure $(( )) peut également servir à vérifier des conditions arithmétiques. Les
opérateurs de comparaison renvoient la valeur 1 pour indiquer qu’une condition est véri-
fiée, et 0 sinon. Il s’agit des comparaisons classiques &lt; , &lt;= , &gt;= , &gt; , ainsi que == pour
l’égalité et != pour la différence. Les conditions peuvent être associées par un Et Logique
&amp;&amp; ou un Ou Logique || , ou encore être niées avec ! .</p>
			<p>Exemple de condition :
            <pre><code>&gt;echo $(((25 + 2) &amp; 28))</br>&gt;1</br>&gt;echo $(((12 + 4) == 17))</br>&gt;0</br>&gt;echo $(((1 == 1) &amp;&amp; (2 &amp; 3)))</br>&gt;1</code></pre></p>
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
    </body>
</html>
