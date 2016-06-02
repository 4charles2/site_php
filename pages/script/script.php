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
					<li><a href="#reseau">Les commandes pour le réseau</a></li>
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
					<li><a href="#commande">Quelques commandes shell</a></li>
					<li><a href="#getopts">La fonction de haut niveau getopts pour les arguments en ligne de commandes</a></li>
					<li><a href="#touch">La commande touch pour créer un fichier et modifier date dernier modif ou creation</a></li>
					<li><a href="#wait">La commande wait pour attendre la fin des processus fils ou d'un processus renseigné avec son PID</a></li>
					<li><a href="#commande_externe">Utilisation des commandes externes</a></li>
					<li><a href="#parallelisme_processus_fils">Le parallélisme des processus fils</a></li>
					<li><a href="#at">La commande at pour programmer une commande à une heure précise</a></li>
					<li><a href="#processus_background">Contrôler et lancer des processus en arrière plan</a></li>
					<li><a href="#ps">La commande ps pour afficher les procesuss en cour</a></li>
					<li><a href="#mkfifo">Utilisé la commande mkfifo pour créer des files</a></li>
					<li><a href="#entrer_sortie">Système d'entrée sortie du shell</a></li>
					<li><a href="#tee">La commande tee pour T permet une copie en dérivation en (T)</a></li>
					<li><a href="#xargs">Pour transmettre des lignes de texte en arguments sélectionner à l'aide d'une commande</a></li>
					<li><a href="#styy">La commande stty pour modifier les paramètres du terminal employé par l'utilisateur</a></li>
					<li><a href="#tput">La commande pour fonctionnalité de haut niveau</a></li>
					<li><a href="#dialog">La commande dialog pour réaliser des interfaces utilisateur conviviable en mode texte</a></li>
					<li><a href="#debogage">Les manipulations et techniques de debogage des scripts</a></li>
				</ol>
				<p>Voici un site qui présente les 101 commandes les plus importantes de linux</p>
				<a href="https://buzut.fr/2012/09/10/101-commandes-indispensables-sous-linux/">Les 101 commandes les plus importantes de linux</a>
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
				<p><strong>Pour connaitre les options des conditions man test</strong></p>
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
&gt;#!/bin/bash
&gt;
&gt;for i in "$@" ; do
&gt;	echo "$i : "
&gt;	if [ -L "$i" ] ; then echo " (lien symbolique) " ; fi
&gt;	if [ -e "$i" ] ; then
&gt;		echo -n " type = "
&gt;		if [ -b "$i" ] ; then echo "special bloc" ; fi
&gt;		if [ -c "$i" ] ; then echo "special caractère " ; fi
&gt;		if [ -d "$i" ] ; then echo "répertoire" ; fi
&gt;		if [ -f "$i" ] ; then echo "fichier regulier" ; fi
&gt;		if [ -p "$i" ] ; then echo "tube nommé " ; fi
&gt;		if [ -S "$i" ] ; then echo "socket " ; fi
&gt;		echo -n " bits = "
&gt;		if [ -g "$i" ] ; then echo -n "Set_GID " ; fi
&gt;		if [ -u "$i" ] ; then echo -n "Set-UID " ; fi
&gt;		if [ -k "$i" ] ; then echo -n "Sticky " ; fi
&gt;		echo ""
&gt;		echo -n " accès = "
&gt;		if [ -r "$i" ] ; then echo -n "lecture "; fi
&gt;		if [ -w "$i" ] ; then echo -n "écriture "; fi
&gt;		if [ -x "$i" ] ; then echo -n "execution "; fi
&gt;		echo ""
&gt;		if [ -G "$i" ] ; then echo " appartient à notre GID"; fi
&gt;		if [ -O "$i" ] ; then echo " appartient à notre UID"; fi
&gt;	else
&gt;		echo " n'existe pas"
&gt;	fi
&gt;done</code></pre></p>
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
&gt;#!/bin/bash
&gt;
&gt;	i=$(uname -r)
&gt;
&gt;	case "$i" in
&gt;		3.*) Type_noyau="3" ;;
&gt;		2.6.*) Type_noyau="2.6" ;;
&gt;		2.4.* | 2.5.*) Type_noyau="2.4" ;;
&gt;		2.* | 1.* | 0.*) echo "Trop ancien, impossible de continuer"
&gt;				exit 1 ;;
&gt;		*) Type_noyau="Inconnu"
&gt;			echo "Noyau inconnu ; continuer l'installation ?"
&gt;			read Reponse
&gt;			case "$Reponse" in
&gt;				O* | o* | Y* | y*)
&gt;					echo OK;;
&gt;				*) exit 1;;
&gt;			esac ;;
&gt;	esac
&gt;	echo "Instalation pour noyau de type $Type_noyau"
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
				<p>Exemple de boucle avec la commande seq qui va décompte les nombre de 5 à 0</p>
				<p><code>&gt;for i in $(seq -5 0) ; do echo ${i#-} ; sleep 1 ; done</code></p>
				<p>Le résultat sera 5 4 3 2 1 0 avec une pause de 1 seconde entre chaque numéro</p>
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
				<p>Exemple de code dans une fonction qui vérife que l'on à bien 3 paramètres positionnel reçu</p>
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
		<section id="commande">
			<h1><u>Quelques commandes pour script Shell très utilent</u></h1>
			<article>
				<p>Les commandes du shell peuvent se répartir en trois catégories</p>
				<ol>
					<li>Configuration du comportement du shell</li>
					<li>L'éxecution de scripts</li>
					<li>Les interactions avec le système</li>
				</ol>
				<h3><u>La commande set permet de configurer le comportement du shell</u></h3>
				<p>Cette commande propose un grands nombres d'arguments. Consulter man bash</p>
				<p><u>Voici une liste de quelques options utilent</u></p>
				<table>
					<thead>
						<tr>
							<th>Options</th>
							<th>Significations</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>-a <br />ou<br />-o allexport</td>
							<td>Toutes les variables sont automatiquement exporter dans les processus fils</td>
						</tr>
						<tr>
							<td>-n<br />ou<br />-o noexec</td>
							<td>Ne pas éxecuter les commandes du script mais les afficher pour permettre le debogage.</td>
						</tr>
						<tr>
							<td>-u<br />ou<br />-o nounset</td>
							<td>La lecture d'une variable inexistente déclenchera une erreur. Cela et très précieux pour la mise au point de script</td>
						</tr>
						<tr>
							<td>-v<br />ou<br />-o verbose</td>
							<td>Afficher le contenu du script au fur et à mesure de son execution</td>
						</tr>
						<tr>
							<td>-x<br />ou<br />-o xtrace</td>
							<td>Permettre le suivi du script instruction par instruction. </td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="2">Utiliser le + à la place du - devant une option permet réclamer le comprtement contraire</td>
						</tr>
						<tr>
							<td colspan="2">Il est recommander d'utiliser l'option set -u au début d'un script pour détecter immédiatement les fautes de frappes</td>
						</tr>
					</tfoot>
				</table>
				<h3><u>La commande source ou . pour appeler un script au lieu de ./</u></h3>
				<p>Le lancement d’un script ou d’une commande externe peut se faire de plusieurs manières. Tout d’abord, on peut appeler directement le programme, sur la ligne de commande
					ou dans une ligne de script, si le fichier se trouve dans un répertoire mentionné dans la variable PATH , ou si le chemin d’accès est indiqué en entier. Dans ce cas, un processus fils
					est créé, grâce à l’appel système fork() , et ce nouveau processus va exécuter la commande indiquée. Dès que celle-ci se termine, le processus fils « meurt » également.
					Le processus père attend la fin de son fils et en reçoit un code – dont il tient compte ou non – expliquant les circonstances de la terminaison du processus. La création d’un
					processus fils peut être mise en évidence grâce à la variable spéciale $$ qui, nous le verrons plus bas, contient le PID (Process Identifier) du processus.</p>
				<p>Dans le cas d’un script shell, on peut également demander que l’exécution ait lieu dans l’environnement en cours, le shell lisant le script ligne à ligne et l’interprétant directement. Pour cela, on utilise la commande source , que l’on peut également abréger en un
				simple point. Cela présente deux avantages essentiels : </p>
				<ul>
					<li>Le script exécuté peut modifier l’environnement du shell courant, aussi bien les variables</li>
				que le répertoire de travail ;
					<li>Le fichier n’a pas besoin d’être exécutable.</li>
				</ul>
				<p>Attention toutefois si le script se termine par une instruction exit alors c'est le shell lui-même que de fermera</p>
				<p>L'utilisation de source ou . est réserver au script shell/bash</p>
				<h3><u>La commande exec demande qu'un fichier binaire soit executé par le même processus que le shell en cour</u></h3>
				<p>A ce momment la toute l'image mémoire sera remplacée définitivement par celle de l'éxécutable réclamé</p>
				<p>Lorsque le processus se termine le processus mourra sans revenir au shell</p>
				<h3><u>La commande exit pour interompre un processus</u></h3>
				<p>Il est parfois nécessaire de terminer un script shell brutalement, sans attendre d’arriver à
					la dernière instruction, ou depuis l’intérieur d’une fonction, comme c’est le cas dans la
					gestion d’erreurs critiques. Une commande interne, nommée exit , termine immédia-
					tement le shell en cours, en renvoyant le code de retour indiqué en argument. Si ce code
					est absent, exit renvoie le code de la dernière commande exécutée.
					Par convention, un code nul correspond à une réussite, et prend une valeur vraie dans un
					test if . Un code non nul signifie « échec » et renvoie une valeur fausse pour if .
				</p>
				<p><strong>On notera toutefois que l’appel exit termine entièrement le shell en cours. Lors d’une
				invocation classique, le processus fils créé pour exécuter le script se finit et le processus
				père reprend la main. En revanche, lors d’une invocation avec source ou exec , le shell
				original est également terminé.
				</strong></p>
				<h3><u>La commande cd dispose d'option très utilent</u></h3>
				<p>cd est une commande interne pas d'un utilitaire système</p>
				<p>La commande cd a quelques particularités intéressantes :
				<ul>
					<li>cd seul revient dans le répertoire indiqué dans la variable HOME configurée lors de la
					connexion de l’utilisateur. Si cette variable n’existe pas, cd ne fait rien.</li>
					<li>cd - ramène dans le répertoire précédent. On peut alterner ainsi entre deux répertoires
					avec des invocations cd - successives.Commandes, variables et utilitaires système</li>
					<li>Lorsque l’argument de cd n’est pas un chemin complet, le sous-répertoire de destina-
					tion est recherché par des balayages des répertoires indiqués dans la variable CDPATH .
					Celle-ci n’est que rarement configurée. Lorsqu’elle n’existe pas, cd considère qu’elle
					vaut « .  » : c’est-à-dire qu’il ne recherche la destination que dans les sous-répertoires
					du répertoire courant.</li>
				</ul>
				<p>Inversement, pour retrouver le nom du répertoire courant, on peut recourir à une
					commande interne nommée pwd qui fournit ce nom sur sa sortie standard. Il est préférable
					d’employer cette commande car elle est optimisée, même s’il existe un utilitaire système
					/bin/pwd .
				</p>
				<h3><u>La commande echo très utilisé envoie des informations sur la sortie standard</u></h3>
				<p>Il s'agit d'une commande interne au shell mais un utilitaire sous forme executable existe souvant dans les distributions /bin/echo</p>
				<p><u>Voici une liste d'options : </u></p>
				<table>
					<thead>
						<tr>
							<th>Option</th>
							<th>echo interne</th>
							<th>/bin/echo</th>
							<th>Signification</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>-n</td>
							<td>oui</td>
							<td>oui</td>
							<td>Ne pas afficher de saut à la ligne après l'affichage. Cela permet de juxtaposer des messages lors d'appel sucessifs, ou d'afficher un symbole invitant l'utilisateur à une saisie.</td>
						</tr>
						<tr>
							<td>-e</td>
							<td>oui</td>
							<td>oui</td>
							<td>Interpréter les séquences particulières de caractères</td>
						</tr>
						<tr>
							<td>-E</td>
							<td>oui</td>
							<td>oui</td>
							<td>Ne pas interpréter les séquences spéciales. Il s'agit du comportement par défaut</td>
						</tr>
						<tr>
							<td>--version</td>
							<td>non</td>
							<td>oui</td>
							<td>Afficher le numéro de version de l'utilitaire</td>
						</tr>
						<tr>
							<td>--help</td>
							<td>non</td>
							<td>oui</td>
							<td>Afficher un écran d'aide</td>
						</tr>
					</tbody>
				</table>
				<p><u>Précision sur les option -E et -e pour l'interprètation des séquences particulières</u></p>
				<p>Les options décritent ci-dessous ne fonctionne que si l'option -e est activé</p>
				<table>
					<thead>
						<tr>
							<th>Séquences</th>
							<th>Significations</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>\\</td>
							<td>Affichage du caractère littèral \</td>
						</tr>
						<tr>
							<td>\XXX</td>
							<td>Affichage du caractère ascii corespondant au code XXX exprimé en octal</td>
						</tr>
						<tr>
						<tr>
							<td>\a</td>
							<td>Sonnerie</td>
						</tr>
							<td>\b</td>
							<td>Retour en arrière d'un caractère</td>
						</tr>
						<tr>
							<td>\c</td>
							<td>Eliminer le saut de ligne final(comme l'option -e)</td>
						</tr>
						<tr>
							<td>\f</td>
							<td>Saut de page</td>
						</tr>
						<tr>
							<td>\n</td>
							<td>Saut de ligne</td>
						</tr>
						<tr>
							<td>\r</td>
							<td>Retour chariot en début de ligne</td>
						</tr>
						<tr>
							<td>\t</td>
							<td>Tabulation horizontale</td>
						</tr>
						<tr>
							<td>\v</td>
							<td>Tabulation verticale</td>
						</tr>
					</tbody>
				</table>
				<p>On peut utilisé ses séquences pour controler grossièrement le mouvement du cursuer</p>
				<p><u>Par exemple la commande suivante affiche la date en bas à gauche de l'écran</u></p>
				<p><code>while true ; do D=$(date)i ; echo -en "\r$D" ; done</code>
				<p>Chaque écritue de ce code écrase la ligne précédente grâce au retour chariot au début de ligne</p>
				<h3><u>La commande read lit l'entrée standard</u></h3>
				<p>C'est une commande interne. elle prend en argument une ou plusieurs variables.</p>
				<p>Si aucune variable n'est renseigné alors le contenu et envoyé dans la variable spéciale $REPLY</p>
				<p>Elle lit une ligne depuis l'entrée standard puis la scinde en diffèrents mot pour remplir les variables indiqués</p>
				<p>Le découpage a lieu en utilisant comme séparateur les caractères présent dans la varibale spéciale IFS</p>
				<p>Le premier mot sera stocké dans la première variable le second dans la second jusqu'a la dernière qui recevra le reste de la ligne</p>
				<p>La fonction read est interne au Shell il ne serait donc pas possible d'utiliser un éxecutable binaire /bin/read qui serait éxecuté dans un sous-processus et qui ne modifirai pas les variables dans le processus père</p>
				<p>Pour la même raison on ne peut pas utilisé read dans un papeline, car chaque commande peut être éxecuter dans un processus indépendant</p>
				<p>Prenons un exemple : retrouver le nom complet de l'utilisateur à partir de son nom de connexion en consultant le fichier : /etc/passwd</p>
				<p>Ce fichier est constitué de la façon suivante :</p>
				<ol>
					<li>identifiant</li>
					<li>mot de passe (généralement absent car dissimuler par le fichier /etc/shadow)</li>
					<li>numéro de l'identification de l'utilisateur</li>
					<li>numéro d'identification du groupe principal auquel appartient l'utilisateur</li>
					<li>nom complet de l'utilisateur</li>
					<li>répertoire personnel de connexion</li>
					<li>shell utilisé</li>
				</ol>
				<p>Mauvais exemple : <code>&gt;$IFS=":"; grep $USER /etc/passwd | read ident passe uid gid nom reste</code></p>
				<p>Hélas ce code n'est pas portable car read sera éxécuté dans sous processus et ne modifie pas la variable ident du shell père</p>
				<p>Mais dans certaine version de shell korn cette commande fonctionne car il considère qu'une commande read placé en dernière position d'un papeline doit être éxecuté par le shell père</p>
				<p>Une solution consiste à stocker le résultat des commandes en amont dans des variables; puis envoyé les valeurs dans une entrée standard redirigé depuis cette variable au moyen d'un document en ligne</p>
				<p>Exemple :</br><pre><code>
&gt;/bin/sh: 1: Syntax error: redirection unexpected=$(grep $USER /etc/passwd)
&gt;IFS=":"
&gt;read ident passe uid gid nom restant &lt;&lt;FIN
&gt;$A
&gt;FIN
&gt;echo "Le nom de $ident est : $nom"
				</code></pre></p>
				<p>Le comportement du shell par rapport à la variable IFS est parfois un peu déroutant.
				Il faut savoir qu’elle lui sert essentiellement à séparer les mots obtenus sur une ligne, de
				façon à distinguer les commandes et les arguments. Par défaut, IFS contient les caractères
				espace, tabulation et retour chariot. Cette variable a été employée à de nombreuses reprises
				pour exploiter des failles de sécurité, aussi les shells modernes prennent-ils à son encontre
				des mesures draconiennes :
				<ul>
					<li>IFS n’est jamais exportée dans l’environnement des sous-processus.</li>
					<li>IFS est réinitialisée à sa valeur par défaut à chaque démarrage du shell (elle n’est donc
				pas importée).</li>
				</ul>
				Voici une autre explication au fait que la ligne naïve de lecture du nom de l’utilisateur
				depuis le fichier /etc/passwd avec un pipeline ne fonctionne pas, IFS reprenant sa valeur
				par défaut dans chacun des sous-processus.</p>
			</article>
		</section>
		<section id="getopts">
			<h1><u>La fonction getopts permet la lecture des options passé en ligne de commande</u></h1>
			<article>
				<p><u>Structure d'utilisation de getopts :</u></p>
				<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;while getopts liste_d_options option ; do
&gt;	case $option in
&gt;		option_1 ) .... ;;
&gt;		option_2 ) .... ;;
&gt;		? ) ... ;;
&gt;	esac
&gt;done</code></pre></p>
				<p>Le premier argument qui se trouve à la suite de getopts contient toutes les lettres accepté par le script pour introduire une option</p>
				<p>Si une option doit complété par un argument, on fait suivre la lettre de deux point (:)</p>
				<p>Par exemple les options de la commande touch reconnue par le SUSv3 comprenne au moins :</p>
				<table id="touch">
					<thead>
						<tr>
							<th>Options</th>
							<th>Significations</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>-a</td>
							<td>Mettre à jour la date et l'heure du dernier accès au fichier</td>
						</tr>
						<tr>
							<td>-c</td>
							<td>ignorer les fichiers qui n'éxistent pas</td>
						</tr>
						<tr>
							<td>-m</td>
							<td>Mettre à jour la date et l'heure de la dernière modification du fichier</td>
						</tr>
						<tr>
							<td>-r fichier</td>
							<td>Utilisé la date et l'heure du fichier indiqué plutôt que la date actuelle</td>
						</tr>
						<tr>
							<td>-t date</td>
							<td>Utilisé la date et l'heure fournies plutôt que la date actuelle.</td>
						</tr>
					</tbody>
				</table>
				<p>On peut écrire comme ceci la chaîne qui décrit les options : acmr:t: . À chaque appel, la fonction getopts incrémente la variable interne OPTIND qui vaut zéro
					par défaut au début du script, et examine l’argument de la ligne de commande ayant ce rang. S’il s’agit d’une option simple, qui ne réclame pas d’argument, elle place la lettre
					correspondante dans la variable dont le nom a été fourni à la suite de la chaîne d’options. S’il s’agit d’une option qui nécessite un argument supplémentaire, elle en vérifie la
					présence, et le place dans la variable spéciale OPTARG . La fonction getopts renvoie une valeur vraie si une option a été trouvée, et fausse sinon. Ainsi, après lecture de toutes les
					options qui se trouvent en début de ligne de commande, on peut accéder aux arguments qui suivent, simplement en sautant les OPTIND-1 , premiers mots grâce à l’instruction
					shift . Lorsqu’une option illégale est rencontrée, getopts remplit la variable d’option avec un point d’interrogation.
				</p>
				<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;#L'option c et l'option d peuvent prendre des arguments signifié avec les deux (:)
&gt;while getopts "abc:d:" option ; do
&gt;	echo -n "Analyse argument numéro $OPTIND : "
&gt;	case $option in
&gt;		a ) echo "Option A" ;;
&gt;		b ) echo "Option B" ;;
&gt;		c ) echo "Option C, argument $OPTARG" ;;
&gt;		d ) echo "Option D, argument $OPTARG" ;;
&gt;		? ) echo "Inconnu" ;;
&gt;	esac
&gt;done
&gt;echo $OPTIND
&gt;shift $((OPTIND - 1))
&gt;while [ $# -ne 0 ] ; do
&gt;	echo "Argument suivant : " $1
&gt;	shift
&gt;done</code></pre></p>
				<p><u>Gérer les erreurs</u></p>
				<p>Si on place une option qui doit prendre un argument et que l'on omet cette argument getopts place dans la variable d'option ? mais affiche également un message d'erreur indiquant qu'il manque un argument puis il efface la variable $OPTARG et continue l'éxécution</p>
				<p>Si la variable OPTERR contient la valeur 0, alors le shell n'affiche plus le message d'erreur par contre il place bien ? dans la variable option efface OPTARG</p>
				<p>Nous pouvons observer que le comportement est identique pour deux cas d’erreur différents. Cela est un peu gênant en termes de dialogue avec l’utilisateur, aussi le shell
				propose-t-il de différencier les deux situations. Lorsque le premier caractère de la chaîne contenant les options est un deux-points, getopts n’affiche aucun message d’erreur, mais
				adopte le comportement suivant :
				<ol>
					<li>lorsqu’une lettre d’option illégale est rencontrée, le caractère « ?  » est placé dans la variable d’option, et la lettre est placée dans OPTARG ;</li>
					<li>si un argument supplémentaire est manquant, le caractère « :  » est placé dans la variable d’option, et la lettre de l’option qui nécessite l’argument est placée dans OPTARG .</li>
				</ol>
				<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;while getopts ":abc:d:" option ; do
&gt;	case $option in
&gt;		a ) echo "Option -a" ;;
&gt;		b ) echo "Option -b" ;;
&gt;		c ) echo "Option -c, argument $OPTARG" ;;
&gt;		d ) echo "Option -d, argument $OPTARG" ;;
&gt;		: ) echo "Argument manquant pour l'option -$OPTARG" ;;
&gt;		? ) echo "Option -$OPTARG inconnue" ;;
&gt;	esac
&gt;done
				</code></pre></p>
				<p>Dans ce code si l'on omet un argument alors les deux points seront placé dans la variable d'option et la lettre de l'option sera placé dans la variable OPTARG</p>
				<p>Le message d'erreur sera alors beaucoup plus claire puisque si l'argument d'une option et absent alors le message d'erreur sera argument manquant pour l'option (Lettre de l'option)</p>
				<h3><u>La fonction getopts également pour les arguments passé à une fonction</u></h3>
				<p>La fonction getopts peut également servir pour lire les arguments passé à une fonction<u><strong>Il ne faut pas oublier de remettre la varirable OPTIND à zéro</strong></u></p>
				<p>Avant d'invoquer la fonction getopts. L'appel à getopts dans une fonction peut s'avérer utile surtout si la fonction et exporté dans l'environnement</p>
				<h3><u>getopts et les options longues exemple --help</u></h3>
				<p>La fonction getopts ne permet pas de lire directement les options longue avec les deux -- devant à la mamière des utilitaires GNU</p>
				<p>Il faut pour cela utiliser un artifice. On utilise le caractere - dans la chaine d'option suivi des : (deux points) pour definir le nom de l'option</p>
				<p>Une astuce pour que le travaille soit réalisé qu'une fois c'est de remplacer le - de l'option longue par la lettre de l'option courte</p>
				<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;VERSION=3.14
&gt;while getopts ":hv-:" option ; do
&gt;	if [ "$option" = "-" ] ; then
&gt;		case $OPTARG in
&gt;			help ) option=h ;;
&gt;			version ) option=h ;;
&gt;			* ) echo "Option $OPTARG inconnue" ;;
&gt;		esac
&gt;	fi
&gt;	case $option in
&gt;		h ) echo "Syntaxe : $(basename $0) [option...]"
&gt;			echo " Options :"
&gt;			echo " -v --version : Numéro de version"
&gt;			;;
&gt;		v ) echo "Version $(basename $0) $VERSION" ;;
&gt;		? ) echo "Inconnu" ;;
&gt;	esac
&gt;done</pre></code></p>
				<p>L'utilisation d'option permet de documenter automatiquement l'invocation d'un utilitaire dans un script, et améliore donc l'ergonomie de l'application.</p>
				<p>Il faut quand même être conscient que leur implémentation, telle que nous l’avons décrite ici, ne permet pas de disposer de toutes les fonctionnalités réellement offertes par les routines
				d’analyse de la ligne de commande présentes dans la bibliothèque C. Entre autres, on ne peut pas facilement proposer d’options longues qui acceptent des arguments supplémentaires.</p>
			</article>
		</section>
		<section id="variable_interne">
			<h1><u>Voici le fonctionnement des variables internes</u></h1>
			<article>
				<p>Le shell gère automatiquement un grand nombre de variable interne qui fournissent des informations aus scripts, ou de modifier certains comprtement du shell</p>
				<p>Pour les variables internes modifiant le comportement de bash se réferer à l'aide en ligne</p>
				<h3><u>La variable $?</u></h3>
				<p>La variable $? contient le code de retour du dernier papeline exécuter à l'avant-plan</p>
				<p>Ceci permet de récupérer le code retour d'une commande. Et del'analyser en détails</p>
				<p>Exemple la commande ping envoie des demandes d'echo à l'hôte indiqué sur sa ligne de commande</p>
				<p>Si elle reçoit bien la réponse en écho alors elle se terminera alors avec un code de retour null. Si elle ne reçoit aucune réponse après un temps limite indiqué elle renverra 1. Si une autre erreur se produit alors elle renverra deux (2)</p>
				<p>Exemple de code : <pre><code>
&gt;#!/bin/bash
&gt;
&gt;while [ -n "$1" ]; do
&gt;	# on envoie un seul paquet et on
&gt;	# attend au plus deux secondes
&gt;	ping -c 1 -w 2 $1 &lt; /dev/null 2&lt;&amp;1
&gt;	resultat=$?
&gt;	# ....
&gt;	if [ $resultat = 0 ]; then
&gt;		echo "$1 Ok !"
&gt;	elif [ $resultat = 1 ]; then
&gt;		echo "$1 injoignable"
&gt;	else
&gt;		echo "$1 inexistant"
&gt;	fi
&gt;	shift
&gt;done</code></pre></p>
				<p>Le résultat mémorisé à la ligne <code>resultat=$?</code> Pourrait être traité beaucoup plus loin dans le script, sans que les commandes éxécuté entre temps symbolisé par la ligne #.... n'interfere</p>
				<h3><u>Les variables $$ $! PPID</u></h3>
				<p><u>Le paramètre $$</u></p>
				<p>Le paramètre $$ contient le PID (process Identifier) du shell en cour. Il ne s'agit pas du PID de la commande en cour mais du shell principal. Lorsque qu'un sous shell et invoque avec les parenthèses par exemple $$ ne change pas il garde l'identiter du shell père</p>
				<p>Même avec les parenthèses pour protéger l'interpretation directe du nom du paramètre. Pour qu'il change il faut qu'effectivement un nouveau shell soit invoqué avec la commande sh ou bash</p>
				<p><u>Le paramètre $!</u></p>
				<p>Le paramètre $! contient le PID de la dernière commande exécuté en arrière plan</p>
				<p><u>La variable PPID</u></p>
				<p>La variable PPID qui n'est pas modifiable contient le PPID (parent PID), c'est à dire le PID du processus père du shell en cour</p>
				<p>Le fonctionnement qui en résulte par à rapport aux sous-shell est identique à celui de $$</p>
				<h3><u>Les variables UID EUID</u></h3>
				<p>Ces deux variables accessible uniquement en lecture, contiennte respectivement l'UID (User Identifier) réel et l'UID effectif du shell.</p>
				<p>L'UID réel et le numéro d'identification de l'utilisateur qui à lancé le shell</p>
				<p>L'UID effectif est l'identification qui est prise en compte par le noyau pour vérifier les autorisations d'accès aux divers éléments du système (et en premier lieu aux fichiers)</p>
				<p>Dans la plupart des cas ces deux variables doivent contenir la même valeur</p>
				<p>Elles diffèrent losrque qu'un processus est lancée avec des privilèges plus élevé (en général) que ceux dont dispose normalement l'utilisateur qui à lancer le sous-shell</p>
				<p>Cela permet de fournir un accès à des éléments critiques du système avec un contrôle bien particulier</p>
				<p>Pour que cela soit possible, les bits d’autorisation du fichier exécutable du processus doivent inclure un bit
					particulier nommé Set-UID. L’utilisation de scripts Set-UID étant en soi une faille de sécurité sur de nombreux systèmes, Linux ne tient aucun compte de ce bit pour les
					scripts. La seule manière d’invoquer un script avec un UID effectif, différent de l’UID réel, est de l’appeler depuis l’intérieur d’un programme C compilé, disposant lui-même
					du bit Set-UID. Il n’est généralement pas utile de se soucier de ces variables mais, dans le cas où c’est
					indispensable, on utilisera UID pour identifier l’utilisateur qui dialogue avec le script et EUID pour connaître l’identité prise en compte pour les autorisations d’accès.</p>
				<h3><u>Les variables HOME, PWD, OLDPWD</u></h3>
				<p>La variable HOME contient le répertoire personnel de l'utilisateur. C'est l'endroit ou l'on revient automatiquement lorsque l'on invoque la commande cd sans argument</p>
				<p>La commande PWD contient le répertoire courant de travail du shell. Cette commande et mise à jour lorsque l'on invoque la cd</p>
				<p>La commande OLDPWD renferme le répertoire précedent, celui vers lequel on retourne en invoquant cd -</p>
				<p>La fonction interne PWD affiche le chemin d'accès absolue au répertoire courant à partir de la racine</p>
				<p>On peut faire en sorte que autant que possible afficher le chemin depuis le repertoire personnel de l'utilisateur</p>
				<p>Voici le code très simple pour cela</p>
				<p><pre><code>
&gt;;#!/bin/bash
&gt;
&gt;function pwd ()
&gt;{
&gt;;	A=${PWD%%$HOME*}
&gt;	echo ${A:-\~${PWD#$HOME}}
&gt;}</pre></code></p>
				<p>Bien entendu la fonction doit être sourcé pour être accessible depuis le shell. . ou source pwd.bash(Nom du script)</p>
			</article>
		</section>
		<section id="commande_externe">
			<h1><u>Utilisation des commandes externe</u></h1>
			<article>
				<p>Les commandes internes offertes par le shell ne permettent pas de réaliser toutes les opérations souhaitable dans un script.</p>
				<p>Il souvent souhaitable de faire appel à des fonctions externes généralement programmé en C, qui peuvent dialoguer de façon plus complète avec le système.</p>
				<p>Les utilitaires standards sont disponibles sur la majeure partie des systèmes Unix, même si leurs options peuvent différer légèrement suivant les implémentations. La norme
				SUSv3 en décrit une partie, ce qui leur confère une certaine portabilité. Le tableau présenté ci-après regroupe quelques utilitaires parmi les plus pratiques. On se
				reportera aux pages individuelles de chaque commande de manuel pour avoir des précisions sur leur invocation.</p>
				<table>
					<thead>
						<tr>
							<th>nom</th>
							<th>SUSv3 ?</th>
							<th>Utilité</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>at <br />batch</td>
							<td>oui <br/>oui</td>
							<td>Différer l’exécution d’un programme. La commande at permet d’indiquer l’heure de démarrage retenue pour une tâche. batch attend que le système ne soit pas trop chargé.</td>
						</tr>
						<tr>
							<td>basename</td>
							<td>Oui</td>
							<td>Éliminer le chemin d’accès et un éventuel suffixe dans un nom de fichier.</td>
						</tr>
						<tr>
							<td>bc</td>
							<td>Oui</td>
							<td>Effectuer des calculs en virgule flottante.</td>
						</tr>
						<tr>
							<td>bzip2</td>
							<td>Non</td>
							<td>Compresser ou décompresser des fichiers. Le taux de compression est souvent légèrement meilleur que celui atteint avec gzip . En revanche, la portabilité est moins bonne.</td>
						</tr>
						<tr>
							<td>cat</td>
							<td>Oui</td>
							<td>Copier l’entrée standard vers la sortie standard. Peut servir à afficher un texte en utilisant un document en ligne, ou à saisir plusieurs lignes dans une seule variable.</td>
						</tr>
						<tr>
							<td>cksum<br />md5sum<br />sum</td>
							<td>Oui<br />Non<br />Non</td>
							<td>Calculer une somme de contrôle d’un fichier. C’est utile lorsqu’on transfère des données par une liaison peu fiable (lien série, disquette, etc.).
				md5sum emploie l’algorithme le plus complexe ; sum est le plus simple ; cksum est le plus portable des
				trois.</td>
						<tr>
							<td>csplit</td>
							<td>Oui</td>
							<td>Découper un fichier en sections successives, déterminées par des lignes de séparation dont le contenu peut être indiqué dans une expression régulière.</td>
						</tr>
						<tr>
							<td>date</td>
							<td>Oui</td>
							<td>Afficher une date avec un format précis. La configuration précise du format permet d’utiliser ce programme pour créer par exemple des noms de fichiers d’enregistrement automatique.</td>
						</tr>
						<tr>
							<td>diff</td>
							<td>Oui</td>
							<td>Afficher les différences entre deux fichiers. Le programme diff effectue une analyse intelligente, ce qui permet d’utiliser son résultat pour disposer d’un fichier de variations que l’on transmet à l’utilitaire
				patch afin d’obtenir les mêmes évolutions sur un autre système.</td>
						</tr>
						<tr>
							<td>echo</td>
							<td>Oui</td>
							<td>Envoyer un message sur la sortie standard.</td>
						</tr>
						<tr>
							<td>expr</td>
							<td>Oui</td>
							<td>Évaluer une expression. Cet utilitaire présente quelques fonctionnalités supplémentaires par rapport aux possibilités standards du shell. On l’utilise surtout pour le traitement de chaîne, ou pour exécuter des scripts avec un shell allégé (systèmes embarqués).</td>
						</tr>
						<tr>
							<td>false</td>
							<td>Oui</td>
							<td>Toujours renvoyer un code d’échec. Sert à tester un script en vérifiant le passage dans les différentes branches de l’algorithme.</td>
						</tr>
						<tr>
							<td>file</td>
							<td>Oui</td>
							<td>Afficher le type d’un fichier, en étudiant son contenu. L’analyse permet de reconnaître un grand nombre de fichiers binaires (image, son...) et de sources de différents langages de programmation.</td>
						</tr>
						<tr>
							<td>find</td>
							<td>Oui </td>
							<td>Rechercher des fichiers dans une arborescence.</td>
						</tr>
						<tr>
							<td>fmt</td>
							<td>Non</td>
							<td>Mettre un texte en forme en coupant les lignes pour qu’elles respectent une largeur donnée . Les césures sont correctement gérées.</td>
						</tr>
						<tr>
							<td>fold</td>
							<td>Oui</td>
							<td>Couper les lignes d’un texte moins « intelligemment » qu’avec fmt .</td>
						</tr>
						<tr>
							<td>grep</td>
							<td>Oui</td>
							<td>Rechercher un motif dans des fichiers. Nous examinerons cet utilitaire en détail dans le chapitre 7.</td>
						</tr>
						<tr>
							<td>gzip</td>
							<td>Non</td>
							<td>Compresser des fichiers. Cet utilitaire est présent sur la plupart des Unix, même s’il est légèrement moins portable que compress .</td>
						</tr>
						<tr>
							<td>head</td>
							<td>Oui</td>
							<td>Afficher le début d’un fichier, c’est-à-dire un nombre donné de lignes ou de caractères.</td>
						</tr>
						<tr>
							<td>kill</td>
							<td>Oui</td>
							<td>Envoyer un signal à un processus.</td>
						</tr>
						<tr>
							<td>lpr</td>
							<td>Non</td>
							<td>Imprimer un fichier. La configuration du système d’impression dépend de l’administrateur, mais cette commande permet généralement d’imprimer au moins des fichiers texte (sources) et la plupart du temps des fichiers formatés (PostScript, HTML, images, etc.)</td>
						</tr>
						<tr>
							<td>nice</td>
							<td>Oui</td>
							<td>Modifier la priorité d’un processus. Cette commande permet de lancer un programme en l’empêchant de grignoter tous les cycles processeur, et de déranger ainsi les autres utilisateurs – ou les autres processus. Son exécution sera plus longue, mais plus « courtoise » en quelque sorte.</td>
						</tr>
						<tr>
							<td>nohup</td>
							<td>Oui</td>
							<td>Séparer un processus de son terminal de contrôle.</td>
						</tr>
						<tr>
							<td>od</td>
							<td>Oui</td>
							<td>Présenter le contenu d’un fichier sous forme de valeurs numériques décimales, hexadécimales ou octales.</td>
						<tr>
							<td>paste</td>
							<td>Oui</td>
							<td>Juxtaposer les lignes correspondantes provenant de plusieurs fichiers. L’utilité de cette commande ne se présente pas souvent.</td>
						</tr>
						<tr>
							<td>pr</td>
							<td>Oui</td>
							<td>Préparer un fichier de texte pour l’impression. Cette commande gère entre autres la largeur et la numérotation des pages.</td>
						</tr>
						<tr>
							<td>printf</td>
							<td>Oui</td>
							<td>Afficher des données formatées. Cet utilitaire est une sorte d’ echo nettement amélioré proposant des formats pour afficher les nombres réels. Les programmeurs C reconnaîtront une implémentation en ligne de commande de la célèbre fonction de la bibliothèque stdio .</td>
						</tr>
						<tr>
							<td>ps</td>
							<td>Oui</td>
							<td>Afficher la liste des processus en exécution.</td>
						</tr>
						<tr>
							<td>seq</td>
							<td>Non</td>
							<td>Développer une liste de valeurs numériques. Cet utilitaire, répandu mais pas inclus dans le standard SUSv3, prend en argument deux valeurs et envoie sur sa sortie standard une liste qui contient tous les nombres intermédiaires. Ainsi, seq 1 10 affiche tous les nombres de 1 à 10. On l’utilise en association avec la commande for du shell.</td>
						</tr>
						<tr>
							<td>sort</td>
							<td>Oui</td>
							<td>Trier les lignes d’un fichier. On peut configurer la portion de la ligne qu’il faut utiliser pour les comparaisons, ainsi que la méthode de tri.</td>
						</tr>
						<tr>
							<td>split</td>
							<td>Oui</td>
							<td>Découper un fichier en plusieurs parties. Cet utilitaire permet le découpage de fichiers binaires de sorte que leur recollage ultérieur avec cat reconstitue le fichier original. Très utile pour transporter un gros fichier binaire à l’aide de plusieurs suppor ts amovibles (clé USB).</td>
						</tr>
						<tr>
							<td>stty</td>
							<td>Oui</td>
							<td>Configurer le terminal. Cet utilitaire permet d’ajuster finement le comportement du terminal (et bien souvent de le rendre temporairement inutilisable !). Nous y recourrons dans le prochain chapitre.</td>
						</tr>
						<tr>
							<td>tail</td>
							<td>Oui</td>
							<td>Afficher les dernières lignes d’un fichier. Cela permet par exemple de voir les derniers enregistrements d’un fichier de journalisation ( /var/log/messages ). L’option -f permet un affichage continu à chaque modification.</td>
						<tr>
							<td>tar</td>
							<td>Non</td>
							<td>Créer des archives regroupant plusieurs fichiers. Cette commande était utilisée à l’origine pour regrouper des fichiers sur une bande, mais on l’emploie à présent pour créer des archives d’une arborescence (fichiers source par exemple). La version GNU inclut des possibilités directes de compression/décompression.
						</tr>
						<tr>
							<td>tee</td>
							<td>Oui</td>
							<td>Copier l’entrée standard vers la sortie standard et vers un fichier. On insère parfois cet utilitaire dans un pipeline pour copier « au passage » les données dans un fichier.</td>
						</tr>
						<tr>
							<td>touch</td>
							<td>Oui</td>
							<td>Toucher un fichier, ce qui modifie ses horodatages. Cela sert dans des scripts d’administration qui utilisent les dates de dernier accès pour savoir si un fichier peut être effacé. On l’utilise aussi pour forcer la recompilation d’un fichier source avec make , ou pour créer un nouveau fichier vide.</td>
						</tr>
						<tr>
							<td>tr</td>
							<td>Oui</td>
							<td>Transposer des caractères lors de la copie de l’entrée standard vers la sortie standard. Cela permet entre autres de remplacer les caractères accentués par leur version nue, de traduire les caractères de contrôle d’une imprimante, ou de supprimer les caractères non imprimables.
						</tr>
						<tr>
							<td>true</td>
							<td>Oui</td>
							<td>Toujours renvoyer un code de réussite. Utilisé pour tester un script, ou pour écrire une boucle infinie avec while true ; do .</td>
						</tr>
						<tr>
							<td>wc</td>
							<td>Oui</td>
							<td>Compter les lignes, mots et caractères contenus dans un fichier.</td>
						</tr>
					</tbody>
				</table>
				<p>Pour connaître la liste complète des commandes disponible et leur utilisation consulter les manuels de bash et shell en ligne</p>
				<p>Sur certain systeme vous pouvez appeler <code>man 1 Index</code> qui représenterat un index des commandes interne et quelques utilitaires externe disponibles</p>
				<p>Pour plus d'information sur une commande la commande help, par exemple help getopts fournie directement le passage du manuel relatif à cette commande</p>
				<p>Pour mieux connaître les commandes externes, la meilleur solution consiste à éxaminer les dossiers /bin /usr/bin et d'invoquer la commande man sur chacun des fichiers inconnue</p>
			</article>
		</section>
		<section id="parallelisme_processus_fils">
			<h1><u>Le parallèlisme et les processus fils</u></h1>
			<article>
				<p>Pour dupliquer un processus il suffit qu'il re-invoque lui-même en faisant suivre l'appel d'un &amp;</p>
				<p>Le paramètre $0 contient le nom du programme ayant servi pour l'éxecution initiale, ainsi l'appel $0 &amp; suffit t-il pour lancer une nouvelle occurence du même script</p>
				<p>Si on passer au processus fils les arguments reçu sur la ligne de commande il suffit de faire $0 "$@" &amp;</p>
				<p>Bien évidament le nouveau processus doit être capable de déterminer qu'il est le fils d'un script précedent, afin de ne pas relancer la duplication à l'infinie</p>
				<p>Un moyen simple consiste à remplir une variable dans le processus père qui sera exporté dans l'environnement du processus fils et une analyse de celle-ci permettra de scinder les deux processus en deux branches d'éxecution</p>
				<p>Nous savons que le paramètre $$ contient le PID du processus en cour. Mais un autre paramètre est interessant  : $!, qui contient le PID de la dernière commande éxecuté en arrière plan</p>
				<p>Dans notre exemple nous lançon qu'un processus fils la variable contiendra la valeur PID de ce processus fils mais dans des cas plus important il peut être utile de conserver cette valeur dans une variable jsute apès le lancement en arrière plan</p>
				<p>Le script suivant contient deux branches distinctes d'éxecution, séparé par un test if</p>
				<p>La premier contient la branche du processus pere et la seconde du processus fils, chacun d'eux affiche quelque informations sur leur PID et appelle la commande sleep pour s'endormir pendant une seconde</p>
				<p>Exemple de code : <pre><code>
&gt;#!/bin/bash
&gt;
&gt;if [ "$MON_PID" != "$PPID" ] ; then
&gt;#Processus Père
&gt;	export MON_PID=$$
&gt;	echo "PERE : mon PID est $$"
&gt;	echo "PERE : je lance un fils"
&gt;	$0 &amp;
&gt;	sleep 1
&gt;	echo "PERE : le PID de mon fils est $!"
&gt;	echo "PERE : je me termine"
&gt;else
&gt;#Processus FILS
&gt;	echo "FILS : mon PID est $$, celui de mon Père est $PPID"
&gt;	sleep 1
&gt;	echo "FILS : je me termine"
&gt;fi</code></pre></p>
				<p>Dans ce code on vérife que un processus père n'existe pas grâce à la condition si la variable MON_PID et égal PID</p>
				<p>la variable $$ indique le PID du processus en cour et $! Le PID du processus fils et la variable PPID renseigne le PID du processus père</p>
				<p>Une erreur peut subvenir toutefois à la fin car le shell peut revenir en ligne de commande(shell interactif) alors que le processus fils n'à pas fini son éxecution</p>
				<p>Pour évité cela une commande existe wait qui demande d'attendre la fin de l'exécution du processus fils avant de revenir à la ligne de commande</p>
				<h3 id="wait"><u>La commande wait</u></h3>
				<p>La commande suivi d'un Numéro de PID attend la fin du processus avec le PID renseigné</p>
				<p>La commande wait sans aucun renseignemant suivi demande d'attendre la fin de tous les processus fils éxistant</p>
				<p>Voici un exemple de code qui attend la fin de l'execution du processus fils : </p>
				<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;function compte
&gt;{
&gt;	local i;
&gt;	for i in $(seq 3) ; do
&gt;		echo "$1 : $i"
&gt;		sleep 1
&gt;	done
&gt;}
&gt;
&gt;if [ "$MON_PID" = "$PPID" ] ; then
&gt;#Processus FILS
&gt;	echo "FILS : mon PID est $$, mon PPID est $PPID"
&gt;	compte "FILS"
&gt;	echo "FILS : je me termine"
&gt;else
&gt;#processus Père
&gt;	export MON_PID=$$
&gt;	echo "PERE : mon PID est $$"
&gt;	echo "PERE : je lance un fils"
&gt;	$0 &amp;
&gt;	echo "PERE : mon fils a le PID $!"
&gt;	compte "PERE"
&gt;	echo "PERE : j'attends la fin de mon fils"
&gt;	wait
&gt;	echo "PERE : je me termine"
&gt;fi</code></pre></p>
				<p>La condition [ "$MON_PID" = "$PPID" ] vérife que le PID du processus père est identique à la variable créer lors de la création du processus père</p>
				<p>On c'est qu'on peut analyser le code retour de la dernière commande lancer avec $? pour les processus en avant plan</p>
				<p>Pour analyser le code retour d'un processus en arrière plan on peut utiliser le code retourné par wait si le PID du processus et renseigné sinon wait remplira la variable $? avec une valeur true</p>
				<p>Un exemple de récupération du code retour du processus fils qui renvoit la valeur 14</p>
				<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;if [ "$MON_PID" = "$PPID" ] ; then
&gt;#Processus FILS
&gt;	echo "FILS : mon PID est $$, mon PPID est $PPID"
&gt;	echo "FILS : je me termine avec le code 14"
&gt;	exit 14
&gt;else
&gt;#Processus Père
&gt;	export MON_PID=$$
&gt;	echo "PERE : mon PID est $$"
&gt;	$0 &amp;
&gt;	echo "PERE : mon fils a le PID $!"
&gt;	echo "PERE : j'attend la fin de mon fils"
&gt;	wait $!
&gt;	echo "PERE : mon fils s'est terminé avec le code $?"
&gt;fi</code></pre></p>
				<h3 id="at"><u>La commande at pour programmer l'execution d'une commande à une heure précise</u></h3>
				<p>Exemple pour programmer une commande qui s'éxecutera 1 heure plus tard on utilise l'utilitaire at, qui lance une commande lues sur son entrée standard à l'instant indiqué par argument en ligne de commande</p>
				<p>Comme at lit toujours son entrée standard on utilise un document en ligne pour lui transmettre les commandes souahitées</p>
				<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;while true ; do
&gt;	FICHIER=$(date "+%Y_%m_%d_%H_%M")
&gt;	TEMP=/var/tmp/enreg_$$
&gt;	/usr/bin/enregistreur --serveur 192.1.5.20 --fichier $TEMP &amp;
&gt;	at now + 1 hours &lt;&lt;-FIN
&gt;	kill -INT $!
&gt;	FIN
&gt;	wait
&gt;	FICHIER=${FICHIER}$(date "+-%Y_%m_%d_%H_%M.dat")
&gt;	mv $TEMP $FICHIER
&gt;done</code></pre></p>
				<p>Comme on souhaite obtenir des fichiers aux noms significatifs, on commence par créer une première partie de nom avec la date de début. On crée aussi un nom de fichier temporaire en utilisant le numéro de
				PID du processus en cours. L’enregistreur est ensuite lancé en arrière-plan, puis une commande kill est programmée pour l’heure suivante, qui lui enverra le signal requis. Le
				script passe alors en attente de la fin de l’enregistrement. Le reste de la boucle est donc exécuté au bout d’une heure. On construit la seconde partie du nom de fichier, que l’on utilise alors pour renommer le fichier temporaire.</p>
			</article>
		</section>
		<section id="processus_background">
			<h1><u>Contrôler et créer des processus en arrière plan</u></h1>
			<article>
				<p>Pour lancer un pprocessus en arrière plan il nous suffit de mettre &amp; à la fin de la commande</p>
				<p>Mais il est nécessaire d'avoir souvent reccour à d'autre méthode pour assurer le bon fonctionnement des scripts en arrière plan</p>
				<p>La plupart des shells, lorsqu’ils reçoivent un signal SIGHUP , le retransmettent à tous les processus fils qu’ils ont créés. Ce signal, dont la signification est hang up (« raccro-
				chage », au sens téléphonique du terme), est notamment émis par les terminaux et les modems lors d’une rupture de connexion. Certains shells émettent également ce signal,
				systématiquement ou sous contrôle d’une option, lorsqu’ils se terminent. Quand aucune mesure particulière n’est prise au sein du processus, la réception de ce
				signal le contraindra à se terminer immédiatement. C’est gênant si on souhaite lancer un travail en tâche de fond pour une longue durée, puis se déconnecter et récupérer le résultat le
				lendemain matin par exemple. Pour pallier ce problème, on peut recourir à un utilitaire nommé nohup qui fait en sorte qu’un processus ne soit pas sensible au signal SIGHUP .</p>
				<p>Cet utilitaire exécute l’application demandée avec une priorité légèrement diminuée, puisqu’il s’agit d’une tâche de fond qui ne doit pas perturber les autres processus. Enfin,
				il redirige la sortie standard et celle d’erreur vers le fichier nohup.out ou ~/nohup.out , car le processus s’exécute sans terminal pour afficher ses résultats.
				L’emploi de nohup est très simple ; il suffit de l’utiliser en préfixe pour lancer le programme. Par exemple, le script suivant compte jusqu’à quatre en écrivant son résultat sur la sortie standard et en respectant une petite pause entre chaque écriture.</p>
				<p>Exemple d'utilisation avec un script de comptage : </p>
				<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;for i in $(seq 1 4) ; do
&gt;	echo $i
&gt;	sleep 3
&gt;done</code></pre></p>
				<p>Voici les diffèrents résultat suivant la méthode d'appel effectué</p>
				<p><pre><code>
&gt;$ ./comptage.sh &amp;
&gt;[1] 17463
&gt;$ 1
&gt;2
&gt;3
&gt;4
&gt;[1]+ Done
&gt;Le script et éxecuté dans un sous shell mais la sortie standard vient pertuber la processus interactif
&gt;./comptage.sh
&gt;$ nohup ./comptage.sh &amp;
&gt;[1] 17472
&gt;nohup: appending output to `nohup.out'
&gt;$ (attente 40 secondes, puis Entrée)
&gt;[1]+ Done
&gt;Ici le processus et lancer dans un sous shell et la sortie standard et envoyé dans un fichier nommé nohup.out une fois lancé apuiyé sur entrè et le script continuera de s'éxécuté en fond sans pertubé le shell interactif
&gt;$ cat nohup.out
&gt;1
&gt;2
&gt;3
&gt;4
&gt;$</code></pre></p>
				<p>Ensuite on affiche le contenu du fichier nohup.out pour voir le résultat de la commande</p>
				<p>Il convient de noter que, suivant la configuration du terminal (et plus particulièrement de l'option tostop de stty), un processus en arrière plan peut être arrèté automatiquement s'il esseye d'écrire sur sa sortie standard.</p>
				<p>Lorsque qu'une application doit tourné en arrière plan pendant une longue durée et également fournir des services à d'autre processus</p>
				<p>Il devient interessant de le programmer comme un demon unix. Ce type de processus doit remplir un certain nombre de critères qui lui permettent ainsi de fonctionner d'une manière sûre et fiable aussi longtemp qu'il le requiert.</p>
				<p id="ps">Tout d'abord un demon ne doit pas avoir de terminal de contrôle. On peut observer cela grâce à la commande ps qui affiche dans tty, un point d'interrogation pour les processus sans terminaux de contrôle</p>
			</article>
		</section>
		<section id="demon">
			<h1><u>Utiliser un demon unix pour lancer un processus en arrière plan sans terminal de contrôle</u></h1>
			<article>
				<p>Pour lancer un demon nous devons créer une nounvelle session de processus</p>
				<p>Pour cela c'est la commande setsid et comme le processus ne doit pas être leader de son groupe, qu'il doit s'agir d'un processus fils de celui qui est à l'avant plan. Nous utiliserons un scrip qui se dupliquera pour que le processus père se termine après avoir créer son fils</p>
				<p>Le deuxieme point important, c'est de bien refermer les cannaux d'entrée sortie standards qui ont été mis en place par le shell lors du lancement du programme. Pour ce faire, on procède avec les opérateurs de redirection <code>&lt;&amp;- et &gt;&amp;- </code>qui indiquent la fermeture du flux. Nous ajoutons donc <code>0&lt;&amp;-, 1&gt;&amp;- et 2&gt;&amp;-</code> sur la ligne de commande de lancement du demon.</p>
				<p>Un dernier critère établit enfin qu'un démon ne doit en aucun cas bloquer une partition qu'un administrateur système pourrait avoir besoin de démonter</p>
				<p>L'une des premières instruction sera donc cd / pour déplacer le répertoire de travail vers la racine du système de fichier</p>
				<p>Toutefois cela ne suffit pas ; lorsque le noyau exécute directement un script, il ouvre un descripteur, précisément vers ce fichier, qu'il emploie ensuite pour alimenter le shell</p>
				<p>Le fichier script lui-même reste donc ouvert pendant toute la durée d’exécution du programme, ce qui bloque la partition. La solution consiste à lire le contenu du script
				dans une grande chaîne de caractères stockée dans une variable, et à invoquer le shell en lui transmettant directement cette commande en argument de l’option -c , afin qu’il n’ait pas à manipuler le fichier.</p>
				<p>Voici un script qui va lancer le reste du programme en demon :</p>
				<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;if [ "$MON_PID" != "$PPID" ] ; then
&gt;	export MON_PID=$$
&gt;	MON_LISTING=$(cat $0)
&gt;	cd /
&gt;	setsid /bin/bash -c "$MON_LISTING" "$0" "$@" 0&lt;&amp;- 1&gt;&amp;- 2&lt;&amp;- &amp;
&gt;	logger -t $(basename $0) "Le PID du demon est $!"
&gt;	echo "Le PID du démon est $!" &lt;&amp; 2
&gt;	exit 0
&gt;fi
&gt;
&gt;#Début du démon proprement dit
&gt;
&gt;sleep 30</code></pre></p>
				<p>Affichera le PID du demon. Puis ensuite on peut verifier le log du processus dans : </p>
				<p>Soit <code>/var/log/messages</code> soit comme sur mon pc dans <code>/var/log/syslog</code></p>
				<p>Le plus simple pour voir le dernier processus lancer et la commande <code>tail -1 /var/log/syslog</code></p>
				<p>On peut vérifier que le processus ne possèdent aucun fd (filedescriptor) dans le dossier /proc/5036/fd</p>
				<p>A la place du numéro 5036 metre le PID du processus</p>
				<p>Puis on peut vérifier si le processus à un terminal de contrôle (Dans notre cas il ne doit pas en avoir)</p>
				<p>Pour cela la commande ps -l numeroPID</p>
				<p>Dans la colonne tty un point d'interrogation doit être présent se qui signifie que aucun terminal de contrôle ne lui appartient</p>
				<h3><u>La gestion des Signaux : </u></h3>
				<p>On peut se représenter un signal comme une sorte d'impulsion qui est envoyé vers un autre processus pour communiquer </p>
				<p>Les signaux sont surtout utilisé par le noyau pour indiquer à un programme l'occurence d'une situation extraordinaire (tentative d'accès à un espace mémoire invalide, instruction illégale, etc.)</p>
				<p>Mais ils constituent également d'interaction entre l'utilisateur et le terminal (Touches spéciales comme Contrôle-C, Contrôle-Q, Contrôle-S, Contrôle-Z ...). On utilise parfois les signaux pour implémenter un dialogue minimal entre processus.</p>
				<h3><u>Envoyé un signal : </u></h3>
				<p>On procède à l'émission d'un signal au moyen de la commande kill. On fait suivre la commande du numéro du signal souhaité, précédé d'un tiret, puis du PID visé.</p>
				<p>Le signal est alors envoyé au processus cible-Sous réserve que l'émetteur dispose des autorisations nécessaires - qui peut prendre des mesures en consèquences</p>
				<p>Le numéro est souvent indiqué d'une manière symbolique, avec les noms décrits dans la table ci-dessous</p>
				<p>On ajoute le préfixe SIG suivi du suffixe voulu. Voici quelque signaux principaux : </p>
				<table>
					<thead>
						<tr>
							<th>Noms</th>
							<th>Descriptions</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>SIGUSR1 et SIGUSR2</td>
							<td>Réservé aux applications utilisateurs, et on les emploies souvent pour implémenter un dialogue entre des scripts personnel</td>
						</tr>
						<tr>
							<td>SIGTERM, SIGINT, SIGQUIT, SIGKILL</td>
							<td>Sont employé pour mettre fin à l'éxecution d'un processus, ils sont présenté ici dans l'ordre croissant de leur caractère impératif</td>
						</tr>
						<tr>
							<td>SIGHUP</td>
							<td>Sert généralement à demander à un démon de relire ses fichiers de configuration, se qui évite de devoir l'arrêter et de le relancer.</td>
						</tr>
					</tbody>
				</table>
				<p>Exemple de code : </p>
				<p><pre><code>
				&gt;kill -HUP $PID_DEMON
				&gt;kill -TERM $PID_SERVEUR
				&gt;kill -USR2 $PID_CLIENT</code></pre></p>
				<p>On notera qu'un PID négatif correspond en fait à l'identifiant d'un groupe de processus, ce qui permet d'envoyer un signal à tous ces descandants d'un processus. On y recourt rarement dans la programmation shell</p>
				<p>L'emploi du PID -1 permet pour sa part de demander l'envoi d'un signal à tous les processus du syteme. On utilisera jamais cette commande en étant logger en root pour éviter d'arreter tous le système, mais pour un utilisateur normal, eu égard aux permissions d'émission, c'est un moyen de tuer tous ses propres processus en une seul fois</p>
				<p>Voici la commande : <code>kill -KILL -1</code></p>
				<p>Bien sur on se retrouve déconnecté mais c'est parfois la seul solution pour terminé un script qui se reproduit à l'infini comme :</p>
				<p><pre><code>
&gt;#! /bin/bash
&gt;$0 &amp;</code></pre></p>
				<h3><u>Recevoir des signaux : </u></h3>
				<p>Lorsque qu'un processus reçoit un signal, il adopte automatiquement l'un des trois comportement suivant :</p>
				<ol>
					<li>Ignorer le signal : Le processus continue simplement son travail comme si de rien n'était.</li>
					<li>Capturer le signal : le deroulement du processus est interrompu est un série d'instruction préprogrammés est éxécutée. Une fois ces instructions terminées, le processus reprend son cour normal</li>
					<li>Agir par defaut : à chaque signal est attribuée une action par défaut. Certains, comme SIGCHLD, n'ont aucune influence sur le processus. D'autre comme SIGTSTP, arrête temporairement le processus.
					Enfin la majorité d'entre eux provoque la fin du processus avec, comme SIGSEGV, création d'un fichier core contenant une représentation de l'espace mémoire, afin de permettre le debogage post mortem, ou,
					comme SIGINT, sans création de ce fichier.</li>
					</ol>
				<p><strong>Deux signaux ne peuvent pas être Capturer ni être Ignorer. SIGKILL et SIGSTOP</strong></p>
				<p>Pour configurer le comportement souhaité pour un processus, on utilise la commande trap. Celle-ci prend en argument une chaine de caractères suivie d'un symbole de signal.</p>
				<p>Si la chaine est absente, le processus reprend le comportemet par defaut pour le signal mentionné.Si la chaîne est vide, le signal sera ignoré. Sinon, la chaine sera évalué à la reception du signal.</p>
				<p>En général, cette chaine contiendra simplement le nom d'une fonction chargée de gérer l'occurence du signal. Cette fonction est traditionnelement appelée gestionnaire du signal</p>
				<p>Exemple : Dans ce script suivant, on va vérifier que la chaine transmise à trap n'est bien évaluée qu'à la réception du signal, en y placant une variable dont ont modifie le contenu. Le processus s'envoie lui-même un signal à l'aide du paramètre $$ qui contient son propre PID</p>
				<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;function gestionnaire_1
&gt;{
&gt;	echo "-&gt; SIGINT reçu dans gestionnaire 1"
&gt;}
&gt;
&gt;function gestionnaire_2
&gt;{
&gt;	echo "-&gt;SIGINT reçu dans gestionnaire 2"
&gt;}
&gt;
&gt;trap '$GEST' INT
&gt;
&gt;echo "GET non remplie : envoi de SIGINT"
&gt;kill -INT $$
&gt;
&gt;echo "GEST=gestionnaire_1 : envoi de SIGINT"
&gt;GEST=gestionnaire_1
&gt;kill -INT $$
&gt;
&gt;echo "GEST=gestionnaire_2 : envoi de SIGINT"
&gt;GEST=gestionnaire_2
&gt;kill -INT $$</code></pre></p>
				<p>Nous vérifions que tant que GUEST n'est pas remplie, la chaîne transmise à trap est vide et le signal ignoré, puis au gré des modifications de cette variable, le processus éxecute l'un ou l'autre des gestionnaire</p>
			<p>Voici le script de réponse : </p>
			<p><pre><code>
&gt;./exemple_trap.bash
&gt;GEST non remplie : envoi de SIGINT
&gt;GEST=gestionnaire_1 : envoi de SIGINT
&gt;-&gt; SIGINT reçu dans gestionnaire 1
&gt;GEST=gestionnaire_2 : envoi de SIGINT
&gt;-&gt; SIGINT reçu dans gestionnaire 2</code></pre></p>
			<p>Notez que l'utilitaire nohup utilisé dans le script et parfois implémenté par un script qui invoque <code>trap "" HUP</code> avant d'appeler la commande mentionnée en argument, ce afin que cette dernière ignore le signal SIGHUP</p>
			<h3><u>Attente de signaux</u></h3>
			<p>Lorsqu'on emploie des signaux à des fins de dialogue entre processus, il est important de bien vérifier que la synchronisation entre les processus ne risque pas d'aboutir à des situations de blocage, ou chacun attend un message de son interlocuteur avant de poursuivre son éxecution. En règle générale, il est recommandé de restreindre l'action du gestionnaire de signal à la modification d'une variable globale. Celle-ci sera consultée régulièrement dans le corps du script pour savoir si un signal est arrivé. Par exemple, on pourra utiliser un signal comme :</p>
			<p><pre><code>
&gt;USR1_recu=0;
&gt;function gestionnaire_USR1
&gt;{
&gt;	USR1_recu=1;
&gt;}
&gt;trap gestionnaire_USR1 USR1</code></pre></p>
			<p>Et dans le corp du message</p>
			<p><pre><code>
&gt;# attente du signal
&gt;	while [ $USR1_recu -eq 0 ] ; do
&gt;		sleep 1
&gt;	done
&gt;# le signal est arrivé, on continue...</code></pre></p>
				<h3 id="mkfifo"><u>Les communications entre processus </u></h3>
				<p>La communication entre processus recouvre un large domaine de la programmation système, où l’on retrouve aussi bien les tubes ou les sockets réseau que les segments de
				mémoire partagée ou les sémaphores. Au niveau des scripts shell, la communication entre des processus distincts est toutefois assez restreinte. Nous avons déjà évoqué les
				possibilités de synchronisation autour des signaux USR1 et USR2 , mais il s’agit vraiment d’une communication minimale. De plus, le processus émetteur d’un signal doit connaî-
				tre son correspondant par son identifiant PID. En d’autres termes, s’ils ne sont pas tous les deux issus d’un même script (avec un mécanisme père/fils comme nous l’avons vu), il
				faut mettre au point une autre méthode de communication du PID (fichier, par exemple). Les systèmes Unix proposent toutefois un mécanisme étonnamment simple et puissant,
				qui permet de faire transiter autant d’information qu’on le désire entre des processus, sans liens préalables : les files Fifo (First In First Out, premier arrivé, premier servi).
				Une file est une sorte de tunnel que le noyau met à la disposition des processus ; chacun peut y écrire ou y lire des données. Une information envoyée à l’entrée d’une file est
				immédiatement disponible à sa sortie, sauf si d’autres données sont déjà présentes, en attente d’être lues. Pour que l’accès aux files soit le plus simple possible, le noyau fournit
				une interface semblable aux fichiers. Ainsi un processus écrira-t-il dans une file de la même manière qu’il écrit dans un fichier (par exemple avec echo et une redirection pour
				un script shell) et pourra-t-il y lire avec les mêmes méthodes que pour la lecture d’un fichier ( read par exemple). En outre, l’interface étant identique à celle des fichiers, les
				autorisations d’accès seront directement gérées à l’aide du propriétaire et du groupe de la file.
				La création d’une file dans le système de fichiers s’obtient avec l’utilitaire mkfifo . Celui-ci prend en argument le nom de la file à créer, éventuellement précédé d’une option -m
				suivie du mode d’accès en octal. Dans l’exemple suivant, nous allons créer un système client-serveur, dans lequel un
				processus serveur fonctionnant en mode démon crée une file Fifo avec un nom bien défini. Notre serveur aura pour rôle de renvoyer le nom complet qui correspond à un
				identifiant d’utilisateur, en consultant le fichier /etc/passwd . Les clients lui enverront donc dans sa file Fifo les identifiants à rechercher. Toutefois, pour que le serveur puisse
				répondre au client, ce dernier devra également créer sa propre file, et en transmettre le nom dans le message d’interrogation. Le script du client sera le plus simple. Il connaît le
				nom de la file du serveur, ici ~/noms_ident.fifo , mais on pourrait convenir de déplacer ce fichier vers un répertoire système comme /etc . Le script créera donc une file personnelle,
				et enverra l’identifiant recherché, suivi du nom de sa file, dans celle du serveur. Il attendra ensuite la réponse et se terminera après avoir supprimé sa file.</p>
				<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;FIFO_SRV=~/noms_ident.fifo
&gt;FIFO_CLT=~/fifo_$$.fifo
&gt;
&gt;if [ -z "$1" ] ; then
&gt;	echo "Syntaxe : $0 identifiant" &gt;&amp;2
&gt;	exit 1
&gt;fi
&gt;
&gt;if [ ! -p $FIFO_SRV ] ; then
&gt;	echo "Le serveur n'est pas accessible"
&gt;	exit 1
&gt;fi
&gt;
&gt;mkfifo -m 0622 $FIFO_CLT
&gt;if [ ! -p $FIFO_SRV ] ; then
&gt;	echo "Impossible de créer la file ~/fifo_$$.fifo"
&gt;	exit 1
&gt;fi
&gt;
&gt;echo "$1 $FIFO_CLT" &gt; $FIFO_SRV
&gt;cat &lt; $FIFO_CLT
&gt;rm -f $FIFO_CLT</code></pre></p>
				<p>Le serveur est un peu plus complexe : tout d’abord, il doit basculer en arrière-plan, en mode démon. Ensuite, pour être certain de toujours détruire la file Fifo quand il se
				termine, nous allons lui ajouter un gestionnaire pour les principaux signaux de terminaison, ainsi que pour le pseudo-signal EXIT qui est invoqué lorsque le script se termine
				normalement. Le serveur vérifie qu’un autre serveur n’est pas déjà actif, sinon il lui envoie une demande de terminaison. Ensuite, il crée la file Fifo prévue et entre dans la boucle de
				fonctionnement principal. Cette boucle se déroule jusqu’à ce qu’il reçoive un identifiant « FIN  ». L’identifiant et le nom de la Fifo du client sont lus grâce à une instruction read .
				On balaye ensuite le fichier /etc/passwd . Pour ce faire, le plus simple est de mettre en place une redirection depuis ce fichier vers l’entrée standard grâce à exec . Cette mise en
				œuvre a pour effet secondaire de ramener au début le pointeur de lecture dans le fichier /etc/passwd . Pour séparer les champs qui se trouvent sur les lignes du fichier, on recourt
				sans problème à read , après avoir temporairement modifié la variable IFS , pour qu’elle contienne le séparateur « :  ». Si l’identifiant est trouvé, le nom complet est inscrit dans la file Fifo du client, et la boucle recommence.</p>
				<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;# Passage en mode démon
&gt;if [ "$MON_PID" != "$PPID" ] ; then
&gt;	export MON_PID=$$
&gt;	MON_LISTING=$(cat $0)
&gt;	cd /
&gt;	setsid /bin/bash -c "$MON_LISTING" "$0" "$@" 0&lt;&amp;- 1&gt;&amp;- 2&gt;&amp;- &amp;
&gt;	logger -t $(basename $0) "Le PID du démon est $!"Programmation shell avancée
&gt;	C HAPITRE 6
&gt;	echo "Le PID du démon est $!" &gt;&amp; 2
&gt;	exit 0
&gt;fi
&gt;FIFO_SRV=~/noms_ident.fifo
&gt;	function gestionnaire_signaux
&gt;{
&gt;	rm -f $FIFO_SRV
&gt;		exit 0
&gt;}
&gt;trap gestionnaire_signaux EXIT QUIT INT HUP
&gt;if [ -e $FIFO_SRV ] ; then
&gt;	echo "FIN" &gt; $FIFO_SRV &amp;
&gt;	exit 0
&gt;fi
&gt;mkfifo -m 0622 $FIFO_SRV
&gt;if [ ! -p $FIFO_SRV ] ; then
&gt;	echo "Impossible de créer la file FIFO $FIFO_SRV"
&gt;	exit 1
&gt;fi
&gt;FIN=""
&gt;while [ ! $FIN ] ; do
&gt;	read IDENT FIFO_CLT &lt; $FIFO_SRV
&gt;	TROUVE=""
&gt;	exec &lt; /etc/passwd
&gt;	ANCIEN_IFS="$IFS"
&gt;	IFS=":"
&gt;	while read ident passe uid gid nom reste ; do
&gt;		if [ "$IDENT" == "$ident" ] ; then
&gt;			TROUVE="Oui"
&gt;			break
&gt;		fi
&gt;	done
&gt;	IFS=$ANCIEN_IFS
&gt;	if [ "$IDENT" == "FIN" ] ; then
&gt;		FIN="Oui"
&gt;		TROUVE="Oui"
&gt;		nom="Fin du serveur"
&gt;	fi
&gt;	if [ $TROUVE ] ; then
&gt;		echo "$nom" &gt; $FIFO_CLT
&gt;	else
&gt;		echo "Non trouvé" &gt; $FIFO_CLT
&gt;	fi
&gt;done</code></pre></p>
				<p>Voici le résultat de l'éxecution</p>
				<p><pre><code>
&gt;./fifo_serveur.sh
&gt;Le PID du démon est 6963
&gt;$ ./fifo_client.sh
&gt;Syntaxe : ./fifo_client.sh identifiant
&gt;$ ./fifo_client.sh cpb
&gt;Christophe Blaess
&gt;$ ./fifo_client.sh root
&gt;root
&gt;$ ./fifo_client.sh ftp
&gt;FTP User
&gt;$ ./fifo_client.sh inexistant
&gt;Non trouvé
&gt;$ ./fifo_client.sh FIN
&gt;Fin du serveur
&gt;$ ./fifo_client.sh root
&gt;Le serveur n'est pas accessible
&gt;$ ls ~/*.fifo
&gt;ls: Aucun fichier ou répertoire de ce type</code></pre></p>
				<p>La communication entre processus au moyen des files Fifo est un mécanisme puissant, mais il faut bien prendre garde aux risques d’interactions bloquantes si chacun des deux
				processus attend l’action de l’autre. Il est aisé – et amusant – de tester les différentes situations en créant manuellement une file avec la commande mkfifo , puis d’examiner les
				comportements et les blocages en écrivant dans la file avec echo "..." &gt; fifo ou en lisant avec cat &lt; fifo depuis plusieurs fenêtres xterm différentes.</p>
			</article>
		</section>
		<section id="entrer_sortie">
			<h1><u>Les sytèmes d'entrée et de sortie du shell</u></h1>
			<article>
				<p>Rappelons tout d'abord qu'il est possible de mettre en place ou de modifier les redirections au sein même d'un script</p>
				<p>Utilisé un regroupement de commande et modifier temporairement les entrées et sortie standard uniquement pour cette portion</p>
				<p>On peut également modifier les redirections grâce à la commande exec, sans arguments, comme dans le script ci-dessus fifo_serveur.sh</p>
				<p>Il donc possible en fesant preuve de patience de réalider des script shell pour gérer des données de façon intelligente sans faire appel à un autre language de programmation</p>
				<p>Lorsque qu'on rédige des chaines de commandes qui agissent comme des filtres (entrée standard et sortie standard), deux besoins apparaissent souvent : </p>
				<ol>
					<li>observer, durant la phase de mise au point, les données qui circulent en un point quelconque du pipeline</li>
					<li>regroupé des informations qui se trouve sur des lignes successives pour construire une seul commande.</li>
				</ol>
				<p>Deux utilitaires permettent de réaliser ces fonctions : tee pour la premiere et xargs pour la seconde</p>
				<h3 id="tee"><u>La commande tee pour une sortie annexe</u></h3>
				<p>Cette utilitaire peut s'imaginer comme un T en plonberie, c'est à dire un accessoire que l'on insère dans un pipeline pour disposé d'une sortie annexe</p>
				<p>tee lit les données sur son entrée standard et les copie sur sa sortie standard, tout en envoyant une copie supplémentaire dans tous les fichiers dont le nom lui est fournies en argument</p>
				<p>Cette commande permet donc enregistré le trafic de données entre chaque commande d'un pipeline, se qui est très pratique lors de la mise au point</p>
				<p>Il est également possible d'utiliser le nom de fichier spécial /dev/tty pour obtenir un affichage à l'écran des données qui transite par tee</p>
				<p>Voici un exemple de script qui ecoute l'interface ethernet eth0, que l'on filtre par le nom d'hôte : </p>
				<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;tcpdump -i eth0 -l | grep 192.1.1.51 &gt; capture</code></pre></p>
				<p>Si l'on regarde le résultat du fichier capture il sera vide</p>
				<p>Pour comprendre pourquoi aucune donnée ne passe on utilise la commande tee</p>
				<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;tcpdump -i eth0 -l | tee /dev/tty | grep 192.1.1.51 &gt; capture</code></pre></p>
				<p>On place /dev/tty après tee pour demander un affichage à l'écran</p>
				<p>Une fois relancer la commande on s'aperçoit qu'on voulait filter une adresse ip alors que tcpdump dans ce cas renvoiyait des noms d'hôtes sous forme symbolique</p>
				<p>Avoir le reflexe d'utiliser tee pour sonder le passage de données dans un pipeline permet souvent de gagner du temp lors de la mise au point de commande composées qui sont complexes</p>
				<h3 id="xargs"><u>La commande xargs pour transmettre en arguments des lignes de texte sélectionner à l'aide d'une commande</u></h3>
				<p>Elle prend des lignes de textes sur son entrée standard, les regroupes pour les transmettre en argument avant de lancer une autre commande</p>
				<p>C'est le seul moyen efficace de transformer des données arrivant dans un flux du type pipeline en information du type pipeline en information sur une ligne de commande</p>
				<p>SOn utilisation la plus fréquente est l'association des outils find et grep pour rechercher des chaînes de caractères, en parcourant récursivement les répertoires qui contienne les fichiers</p>
				<p><code>&gt;find . -name *.c | xargs grep ipv6_getsockopt</code></p>
				<p>Va permetre d'analyser l'interieure de chacun des fichiers retourner par find grâce à xargs</p>
				<p>Très éfficace également pour transmettre le résultat d'une application sur la ligne de commande d'une autre</p>
				<p>Par exemple le lancement d'un éditeur sur tous les fichiers qui contiennent une chaîne données (l'option -l de grep demande que ne soit affiché que les noms de fichiers ou la chaine se trouve)</p>
				<p><code>&gt;grep -l interface_eth '*.pm' | xargs nedit</code></p>
			</article>
		</section>
		<section id="stty">
			<h1><u>La commande stty pour configurer les options du terminal de l'utilisateur</u></h1>
			<article>
				<p>Voici une petite liste des possibilité de la commande :</p>
				<table>
					<thead>
						<tr>
							<th>Options</th>
							<th>Significations</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>-g</td>
							<td>Afficher la configuration en cours dans un format qui puissent être utilisé pour la restauré ultérieurement.</td>
						</tr>
						<tr>
							<td>-a</td>
							<td>Afficher la configuration de manière intelligible </td>
						</tr>
						<tr>
							<td>sane</td>
							<td>Remise du terminal dans un état utilisable</td>
						</tr>
						<tr>
							<td>-echo</td>
							<td>Suprimer l'echo des caractères saisies</td>
						</tr>
						<tr>
							<td>-icanon</td>
							<td>Basculer en mode non canonique, ce qui modifie le comportement vis-à-vis de certaines touches spéciales.</td>
						</tr>
						<tr>
							<td>min m time t</td>
							<td>En mode non canonique, faire echoué la lecture si m caractères n'ont pas été lus au bout de t dixièmes de seconde</td>
						</tr>
					</tbody>
				</table>
				<p>On retiendra que la lecture au vol de caractères se fait en configurant le terminal avec :</p>
				<p><code>stty -icanon min 0 time 1</code></p>
				<p>Et ensuite en utilisant read comme dans le script suivant</p>
	<p><pre><code>
&gt;saisie_touche.sh :
&gt;#! /bin/sh
&gt;sauvegarde_stty=$(stty -g)
&gt;stty -icanon time 1 min 0 -echo
&gt;touche=""
&gt;while [ -z "$touche" ] ; do
&gt;	read touche
&gt;done
&gt;echo "Touche pressée = " $touche
&gt;stty $sauvegarde_stty</code></pre></p>
				<p>Le résultat : </p>
				<p><pre><code>
&gt;./saisie_touche.sh
&gt;	(pression sur a)
&gt;Touche pressée = a</code></pre></p>
				<p>Par exemple voic la liste des options stty -a sur mon pc : </p>
				<p><pre><code>
&gt;speed 38400 baud; rows 24; columns 168; line = 0;
&gt;intr = ^C; quit = ^\; erase = ^?; kill = ^U; eof = ^D; eol = M-^?; eol2 = M-^?; swtch = M-^?;
&gt;start = ^Q; stop = ^S; susp = ^Z; rprnt = ^R; werase = ^W; lnext = ^V;
&gt;flush = ^O; min = 1; time = 0;
&gt;parenb -parodd cs8 hupcl -cstopb cread -clocal -crtscts
&gt;ignbrk brkint -ignpar -parmrk -inpck -istrip -inlcr -igncr icrnl ixon -ixoff -iuclc ixany imaxbel iutf8
&gt;opost -olcuc -ocrnl onlcr -onocr -onlret -ofill -ofdel nl0 cr0 tab0 bs0 vt0 ff0
&gt;isig icanon iexten echo echoe echok -echonl -noflsh -xcase -tostop -echoprt echoctl echoke
				</code></pre></p>
			</article>
		</section>
		<section id="tput">
			<h1><u>La commande tput pour accéder à fonctionnalité de haut niveau</u></h1>
			<article>
				<p>L'utilitaire tput permet d'accéder aux fonctionnalités de la bibliothèque ncurses qui utilise les descriptions rencontrées dans la base de données dans terminfo
				afin de gérer les diffèrents terminaux pour par exemple effacer l'écran ou placer le curseur à un endroit précis à l'aide de y x</p>
				<p>On peut lui transmettre des odres qu'il va interpréter en fonction des commandes qui sont indiquées dans la base de données terminfo</p>
				<p>Pour comprendre le fonctionnement de tput <code>man tput</code> et pour connaitre la liste des commandes supporté terminfo <code>man terminfo</code></p>
				<p>De manière portable, seul les commandes clear (effacement de l'écran) et reset (réinitialisation du terminal) sont vraiment sûres.</p>
				<p>Toutefois la commande cup, suivie de deux nombres L et C, place sur de nombreux Unix le curseur en ligne L et colonne C de l'écran</p>
			</article>
		</section>
		<section id="dialog">
			<h1><u>La commande dialog pour réaliser des interfaces utilisateur conviviable en mode texte</u></h1>
			<article>
				<p>Cet outil permet de programmer très simplement des menus choix, des boîtes de saisie, des boîtes de dialogue avec des boutons de réponse, des jauges indiquant la progression d'un programme</p>
				<p>Etait à l'origine destiné à simplifier l'écriture de script d'instalation</p>
				<p>La portabilité des script dialog est un peu amoindrie, mais il faut savoir que se produit s'appuie uniquement sur l'interface ncurses et devrait donc pouvoir être recompiler et installé sur 
				n'importe quel système Unix</p>
			</article>
		</section>
		<section id="debogage">
			<h1><u>Les manipulations et techniques de debogage des scripts</u></h1>
			<article>
				<p>En premier lieu pour lutter contre les fautes de frappe, on emploiera en début de script l'option shell <code>set -u ou set -o nounset</code></p>
				<p>Qui déclenche une erreur si on fait référence à une variable non définie.</p>
				<p>Voici un script qui déclenchera une erreur : </p>
				<p><pre><code>
&gt;#!/bin/bash
&gt;
&gt;set -o nounset
&gt;
&gt;if [ -z "$Chaine" ] ; then
&gt;	echo "La chaine est vide"
&gt;fi</code></pre></p>
				<p>Ce script va déclencher une erreur : </p>
				<p><code>&gt;./erreur_unset.sh: Chaine: unbound variable</code></p>
				<p>Alors que l'éxecution du script sans la ligne 3 donneras comme comportement : </p>
				<p><code>&gt;La chaine est vide</code></p>
				<p><strong>Cette option permet de régler déjà un nombre incroyable de problèmes</strong></p>
				<p>Pour aller plus loin il y a les options <code>set -v et set -o verbose</code></p>
				<p>qui permet d'afficher les lignes au fur et à mesure de l'éxecution. Toutefois l'affichage se faisant par blocs de commande complets, on ne sait pas toujours exactement à quel endroit se trouve le point d'éxecution courant</p>
				<p>
				<p>Une option plus utile pour suivre plus exactement le déroulement du script est <code>set -x ou set -o xtrace</code> Elle indique le suivi pour chaque commande simple.</p>
				<p>Lorsque l'on souhaite suivre l'évolution d'une variable au court d'un script, on peut avec certain Shells utiliser un gestionnaire sur le pseudo-signal DEBUG.</p>
				<p>Celui-ci sera invoqué après l'éxecution de chaque commande simple.</p>
				<p>On peut par exemple y afficher le contenu de la variable spéciale LINENO qui contient le numéro de la dernière ligne exécutée. On peut également y observer le contenu de toutes autres variables Global</p>
				<p>Pour le compte rendu des informations de suivi, on peut utiliser naturellement echo redirigé vers un fichier (&gt;&gt;), ou la commande <code>logger</code> qui envoie un message au système de journalisation syslog</p>
				<p>La commande <code>ultime</code> permet de restreindre la consommation des ressources système par un processus. Pour plus de renseignements man ultime</p>
				<p>Pour exemple d'utilisation de la commande : </p>
				<ul>
					<li>Interdire la création d'un fichier core (ulimit -c 0)</li>
					<li>Restreindre le nombre de processus simultané pour le même utilisateur (ulimit -u 64)</li>
					<li>Limiter la consommation CPU pour empêcher un processus en boucle de tourner trop longtemp (ulimit -t 4).</li>
				</ul>
				<p>La commande internet <code>times</code> pour obtenir des statistiques sur les temps utilisateur et système consommés par processus et par ses descandants. Cela permet parfois d'affiner la mise au point 
				en recherchant les portions d'un programme les plus gourmandes en temps processeur.</p>
			</article>
		</section>
		<section id="reseau">
			<h1><u>Les commandes utiles pour manipuler le réseau</u></h1>
			<article>
				<p>Voici une liste de commande pour manipuler le réseau : </p>
				<table>
					<thead>
						<tr>
							<th>Commande</th>
							<th>Fonction</th>
							<th>Exemple</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>tcpdump</td>
							<td>Imprime le contenu des paquets sur une interface réseau</td>
							<td>tcpdump -i 192.168.0.36 -l | grep 192.168.0.36 &gt; capture</td>
						</tr>
						<tr>
							<td>ifconfig</td>
							<td>ifconfig</td>
							<td>Permet d'obtenir des info sur interface réseau comme son ip ou ip de la passerelle</td>
						</tr>
					</tbody>
				</table>
			</article>
		</section>
    </body>
</html>
