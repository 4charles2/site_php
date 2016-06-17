
<section id="top_page">
	<h1><u>Utilisation de la technologie AJAX (Asynchronous JavaScript and XML)</u></h1>
	<article>
		<ul>
			<li><a href="#AJAX">Présentation du AJAX</a></li>
			<li><a href="#XMLHttpRequest">Requête XMLHttpRequest pour réaliser une requêtte http</a></li>
			<li><a href="#encoge">Comprendre l'encodage utilisé par AJAX utf-8 car provoque beaucoup <strong>erreur</strong></a></li>
			<li><a href="#versiontwo">La deuxieme version plus avancée de XHR XMLHttpRequest</a></li>
			<li><a href="#iframe">Upload via une  iframe (page web dans une autre)</a></li>
			<li><a href="#dynamic_script">Dynamic Script Loading (Insérer un élement script une fois la page chargé)</a></li>
		</ul>
	</article>
</section>

<section id="AJAX">
	<h1><u>Présentation de AJAX</u></h1>
	<article>
		<p>Il s'agit d'un enssemble de technologie destinées à réaliser de rapides mise à jour du contenu d'une page Web, sans qu'elle ne necessite le moindre rechargement visible par l'utilisateur de la page Web.</p>
		<p>Les technologie employé sont diverse et dépendent du type de requêtes que l'on souhaite utiliser, mais d'une manière générale le Javascript est constament présent.</p>
		<p>D'autre langages sont également pris en compte comme le html et le css, qui servent à l'affichage, mais ceux-ci ne sont pas inclus dans le processus de communication. Le transfert de données est géré exclusivement par le Javascript, et utilise certaines technologies de formatage de données, comme le XML ou le JSON, mais cela s'arrête là.</p>
		<p>Ce principe de rechargement de seulement un contenu visée peut être très utile notament par exemple pour créer une <strong>Auto-complétion</strong> ou encore une <strong>sauvegarde des textes saisies</strong> dans la page ou encore mettre à jour les messages postés sur un <strong>chat</strong></p>
		<p>Les requêtes effectuées ne contiendrons que le contenu necessaire à notre mise jours</p>
		<p>Il existe de nombreux formats pour transférer des données. Voici les quatres principaux : </p>
		<ul>
			<li><strong>Le format texte</strong> le plus simple. C'est une chaîne de caractère sans aucune structure prédéfinie.</li>
			<li><strong>Le HTML</strong> A pour but d'acheminer des données qui sont déjà formatées par le serveur puis affichées directement dans la page sans aucun traitement préalable de la part du javascript</li>
			<li><strong>Le XML</strong> eXtensible Markup Language Très proche du html. Mais avec les noms de balise du DOM personnalisé</li>
			<li><strong>Le JSON</strong> JavaScript Object Notation. Il à pour particularité de segmenter les données dans un objet Javascript, il très avantageux pour de petits transferts de données segmentées et est de plus en plus utilisé dans de très nombreux langages.</li>
		</ul>
		<p>Les formats classique : </p>
		<p>Pour les formats classique aucun traitement particulier à éffectué. Le contenu d'une requête html est déjà formaté juste à l'affiché la ou besion</p>
		<p>Le XML : </p>
		<p>Le XML permet de formater des données sur le principe de HTML mais avec des balises personnalisées. Pour parcourir le DOM du XML c'est comme pour le html avec par exemple getElementsByTagName()</p>
		<p>C'est un parseur(analyseur syntaxique) qui se mettre en route pour analyser le code reçu, Le décomposer et le reconstitué sous forme d'arbre DOM qu'il sera possible de parcourir</p>
		<p>Le JSON</P>
		<p>Le JSON est le format le plus utilisé et le plus pratique pour nous. Comme l'indique son nom ( Javascript Object Notation ), il s'agit d'une représentation des données sous forme d'objet Javascript.</p>
		<p>Le parseur ne se déclenche pas automatiquement pour se format. Il faut utilisé l'objet nommé JSON qui possède deux méthodes : </p>
		<p>Les deux méthodes pour traiter un object JSON : </p>
		<ul>
			<li><strong>parse()</strong>, prend en paramètre la chaîne de caractères à analyser et retourne le résultat sous forme d'objet JSON</li>
			<li><strong>stringify()</strong>, permet de faire l'inverse : elle prend en paramètre un objet JSON et retourne son équivalent sous forme de chaîne de caractères.</li>
		</ul>
		<p>Voici un exemple d'utilisation de ces deux méthodes : </p>
		<p><pre><code>
&gt;var obj = {
&gt;	index: 'contenu'
&gt;},
&gt;string;
&gt;string = JSON.stringify(obj);
&gt;alert(typeof string + ' : ' + string); // Affiche : string : {"index":"contenu"}
&gt;obj = JSON.parse(string);
&gt;alert(typeof obj + ' : ' + obj); // Affiche : object : [object Object]
</code></pre></p>
		<p><strong>Très utile notament depuis la version 5.2 de php et le support des fonctions json_decode() et json_encode().</strong></p>
	</article>
</section>

<section id="XMLHttpRequest">
	<h1><u>Fonctionnement de l'objet XMLHttpRequest</u></h1>
	<article>
		<p>Cette objet possède deux versions</p>
		<p>La première version est compatibles sur tous les navigateurs récent mais possède moins de fonctionnalité</p>
		<p>La deuxième version possède des fonctionnalités intéressante comme la gestion du cross-domain ainsi que l'introduction de l'objet FormData. Cependant il y à encore peu de navigateur qui le supportent actuellement</p>
		<p><strong>L'utilisation de l'objet XHR se fait en deux étapes :</strong></p>
		<ul>
			<li>Préparation et envoi de la requête;</li>
			<li>Réception des données</li>
		</ul>
		<h3><u>Préparation et envoi de la requête : </u></h3>
		<p>Pour commencer il nous faut un instancier un nouvelle objet XHR</p>
		<p><code>&gt;var xhr = new XMLHttpRequest();</code></p>
		<p>La préparation de la requête se fait par le biais de la méthode open(), qui prend en paramètres cinq argument diffèrents, dont trois facultatifs : </p>
		<ul>
			<li>Le premier argument contient la méthode d'envoi des données, Les trois méthodes principales sont GET, POST et HEAD.</li>
			<li>Le deuxieme argument est L'URL à laquelle vous souhaitez soumettre votre requête, par exemple : 'https://monsiteweb.com'.</li>
			<li>Le troisième argument est un booléen facultatif dont la valeur par défaut et true(Qui signifie que la requête sera de type asynchrone), et avec la valeur false elle sera de type synchrone.</li>
			<li>Les deux derniers arguments sont à spécifier en cas d'identification nécessaire sur le site web(à cause d'un .htaccess par exemple). Le premier contient le nom d'utilisateur et le second le mot de passe</li>
		</ul>
		<p>Voici un exemple courant d'utilisation de la méthode open() <code>&gt;xhr.open('GET', 'http://mon_site_web.com/ajax.php');</code></p>
		<p>Cette ligne de code prépare une requête afin que cette dernière contacte la page ajax.php sur le nom de domaine mon_site_web.com par le biais du protocole http(d'autres sont possible come le https ou ftp...)</p>
		<p>Après la préparation de la requête, il faut l'envoyer avec la méthode send(). Cette dernière prend en paramètre un argument obligatoire. Dans l'exemple suivant il prendra la valeur NULL</p>
		<p>Un exemple : <code>&gt;xhr.send(null)</code></p>
		<p><strong>La solution synchrone va bloquer le script le temp de la requête alors la solution asynchrone continuera l'éxecution du script et préviendra lors de l'obtention de la réponse par le biais d'un évenement</strong></p>
		<p>Pour l'envoi de données par requête http : Il faut faut indiquer dans l'URL les arguments que l'on souhaite passer à la méthode open() à l'aide des caractères &amp; et ? comme avec une url classique </p>
		<p>Exemple de syntaxe : <code>&gt;xhr.open('GET', 'http://mon_site_web.com/ajax.php?param1=valeur1&amp;param2=valeur2');</code></p>
		<p>Il est fortement conseillé de qu'elle que soit il méthode utilisé d'encoder toutes les valeurs que vous passez en paramètre grâce à la fonction <strong><code>&gt;encodeURIComponent()</code></strong>, afin d'éviter d'écrire d'éventuels caractères interdits dans une url.</p>
		<p>Exemple de script qui encode les valeurs : <pre><code>
&gt;var xhr = new XMLHttpRequest();
&gt;var value1 = encodeURIComponent(value1);
&gt;var value2 = encodeURIComponent(value2);
&gt;
&gt;xhr.open('GET', 'http://mon_site_web.com/ajax.php?param1=' + value1 + '&amp;param2=' + value2);
		</code></pre></p>
		<p>Pour la méthode POST, les paramètres ne sont pas à spécifier avec la méthode open() mais avec la méthode send().</p>
		<p>Exemple : <pre><code>
&gt;xhr.open('POST', 'http://mon_site_web.com/ajax.php');
&gt;xhr.send('param1=' + value1 + '&amp;param2=' + value2);
		</code></pre></p>
		<p>La méthode sert en général à envoyé des données d'un formulaire, il faut donc modifier les en-têtes d'envoi des données afin de préciser qu'il s'agit de données provenant d'un formulaire.</p>
		<p>Exemple : <pre><code>
&gt;xhr.open('POST', 'http://mon_site_web.com/ajax.php');
&gt;xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
&gt;xhr.send('param1=' + value1 + '&amp;param2=' + value2);
		</code></pre></p>
		<p>La méthode setRequestHeader() permert l'ajout ou la modification d'un en-tête, elle prend en paramètres deux arguments : Le premier est l'entête concerné et le deuxieme est la valeur à lui attribuer.</p>
		<h3><u>La réception des données : </u></h3>
		<p>Pour une requête asynchrone</p>
		<p>Dans le cas d'une requête asynchrone, il nous faut spécifier une fonction de callback afin de savoir quand la requête s'est terminée. Pour cela, l'ogjet XHR possède un évenement nommé readystatechange auquel il suffi d'attribuer une fonction.</p>
		<p>Exemple : <code>&gt;xhr.addEventListener('readstatechange', function() { //Le code });</code></p>
		<p>Cet évenement ne se déclenche pas seulement lorsque la requête est terminée, mais plutôt, comme son nom l'indique, à chaque changement d'état. Il existe cinq états diffèrents représentés par des constantes spécifiques à l'objet XMLHttpRequest</p>
		<table>
			<thead>
				<tr>
					<th>Constante</th>
					<th>Valeur</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>UNSENT</td>
					<td>0</td>
					<td>L'objet XHR a été créé, mais pas initialisé(la méthode open() n'à pas encore été appelée).</td>
				</tr>
				<tr>
					<td>OPENED</td>
					<td>1</td>
					<td>La méthode open() a été appelée, mais la requête n'a pas encore été envoyée par la méthode send().</td>
				</tr>
				<tr>
					<td>HEADERS_RECEIVED</td>
					<td>2</td>
					<td>La méthode send() a été appelée et toutes les informations ont été envoyées au serveur.</td>
				</tr>
				<tr>
					<td>LOADING</td>
					<td>3</td>
					<td>Le serveur traite les informations et a commencé à renvoyer les données. Tous les entêtes des fichiers ont été reçus.</td>
				</tr>
				<tr>
					<td>DONE</td>
					<td>4</td>
					<td>Toutes les données ont été réceptionnées.</td>
				</tr>
			</tbody>
		</table>
		<p>L'utilisation de la propriété <code>&gt;readyState</code> est nécessaire pour connaître l'état de la requête.</p>
		<p>On va vérifié que la requête est bien terminé avec la constante DONE. Deux manières de procédé.</p>
		<p>La première : <code>&gt;xhr.addEventListener('readystatechange', function() { if (xhr.readystate === XMLHttpRequest.DONE) { Le code } });</code>
		Si la constante DONE appartient à l'objet XMLHttpRequest elle n'est pas global</p>
		<p>La deuxieme solution consiste à utilisé directement la valeur de la constante, soit 4 pour la constante DONE</p>
		<p>Exemple : <code>&gt;xhr.addEventListener('readystatechande', function() { if (xhr.readyState === 4 ) { //Le code } });</code></p>
		<p>De cette manière, notre code ne s'éxécutera que lorsque la requête aura terminé son travail. Toutefois, même si la requête a terminé son travail, cela ne veut pas dire qu'elle l'a mené à bien, pour cela nous allons devoir consulter le status de la requête grâce à la propriété <code>&gt;status</code>. Cette dernière renvoie le code correspondant à son statut, comme le fameux 404 pour fichiers non trouvés. Le status 200 signifie que tous c'est bien passé</p>
		<p>Vérification du status 200 réussite de la requête : <code>&gt;xhr.addEventListener('readystatechange', function() { if (xhr.readyState === XMLHttpRequest.DONE &amp;&amp; xhr.status === 200) { //Le code } });</code></p>
		<p>Il existe une version texte avec la propiété statusText par exemple 404 donnera le texte suivant : Not Found</p>
		<h3><u>Le traitement des données : </u></h3>
		<p>Une fois la requête terminée, il vous faut récupérer les données obtenues. Ici, deux possibilités s'offrent à vous : </p>
		<ul>
			<li>Les données sont au format XML, vous pouvez alors utiliser la propiété <code>&gt;responseXML</code>, qui permet de parcourir l'abre DOM des données reçues.</li>
			<li>Les données sont dans un autre format que le XML, il vous faut alors utiliser la propriété <code>&gt;responseText</code>, qui fournit toutes les données sous forme d'une chaine de caractères. Il faut ensuite effectuées d'éventuelles conversions, par exemple avec un objet JSON: <code>&gt;var response = JSON.parse(xhr.responseText);</code></li>
		</ul>
		<p>Par exemple si je reçoit l'arbre DOM suivant en XML : <pre><code>
&gt;&lt;?xml version="1.0" encoding="utf-8"?&gt;
&gt;
&gt;&lt;table&gt;
&gt;
&gt;
&gt;	&lt;line&gt;
&gt;
&gt;		&lt;cel&gt;Ligne 1 - Colonne 1&lt;/cel&gt;
&gt;
&gt;		&lt;cel&gt;Ligne 1 - Colonne 2&lt;/cel&gt;
&gt;
&gt;		&lt;cel&gt;Ligne 1 - Colonne 3&lt;/cel&gt;
&gt;
&gt;	&lt;/line&gt;
&gt;
&gt;
&gt;	&lt;line&gt;
&gt;
&gt;		&lt;cel&gt;Ligne 2 - Colonne 1&lt;/cel&gt;
&gt;
&gt;		&lt;cel&gt;Ligne 2 - Colonne 2&lt;/cel&gt;
&gt;
&gt;		&lt;cel&gt;Ligne 2 - Colonne 3&lt;/cel&gt;
&gt;
&gt;	&lt;/line&gt;
&gt;
&gt;
&gt;
&gt;	&lt;line&gt;
&gt;
&gt;		&lt;cel&gt;Ligne 3 - Colonne 1&lt;/cel&gt;
&gt;
&gt;		&lt;cel&gt;Ligne 3 - Colonne 2&lt;/cel&gt;
&gt;
&gt;		&lt;cel&gt;Ligne 3 - Colonne 3&lt;/cel&gt;
&gt;
&gt;	&lt;/line&gt;
&gt;
&gt;
&gt;&lt;/table&gt;
		</code></pre></p>
		<p>On peut récupérer toutes les balises &lt;cel&gt; de la manière suivante : </p>
		<p><code>&gt;var cels = xhr.responseXML.getElementsByTagName('cel');</code></p>
		<p>Il faut penser à bien spécifier l'entête d'un fichier sinon la propiété pourrait être inutilisable notament sur de vieux navigateur</p>
		<p>Pour Cela c'est l'en-tête Content-type avec la valeur text/xml pour un fichier en XML. Le Javascript reconaîtra alors le type MIME xml.</p>
		<p>Pour réaliser cela en php : <code>&gt;&lt;?php header('Content-type : text/xml'); ?&gt;</code></p>
		<h3><u>Récupération des en-têtes de la réponse : </u></h3>
		<p>Pour cela deux méthodes. La première se nomme <code>&gt;getAllResponseHeaders()</code> et retourne tous les en-têtes de la réponse en vrac. </p>
		<p>Voici un exemple de réponse de cette méthode : <pre><code>
&gt;Date: Sat, 17 Sep 2011 20:09:46 GMT
&gt;Server: Apache
&gt;Vary: Accept-Encoding
&gt;Content-Encoding: gzip
&gt;Content-Length: 20
&gt;Keep-Alive: timeout=2, max=100
&gt;Connection: Keep-Alive
&gt;Content-Type: text/html; charset=utf-8
		</code></pre></p>
		<p>La deuxième méthode <code>&gt;getResponseHeader()</code>, permet la récupération d'un seul en-tête. Il suffit d'en spécifier le nom en paramètre et la méthode retournera sa valeur : </p>
		<p>Voici l'exemple : <pre><code>
var xhr = new XMLHttpRequest();
xhr.open('HEAD', 'http://mon_site_web.com', false);
xhr.send(null);

alert(xhr.getResponseHeader('Content-type')); // Affiche : text/html; charset=utf-8
		</code></pre></p>
		<h3><u>Exemple de code qui affiche le contenu d'un fichier choisie par l'utilisateur</u></h3>
		<p>Voici la page html : <pre><code>
&gt;&lt;p&gt; Veuillez choisir quel est le fichier dont vous souhaitez voir le contenu : &lt;/p&gt;
&gt;&lt;p&gt;
&gt;	&lt;input type="button" value="file1.txt" /&gt;
&gt;	&lt;input type="button" value="file2.txt" /&gt;
&gt;&lt;/p&gt;
&gt;&lt;p id="filecontent"&gt;
&gt;&lt;span&gt;Aucun fichier chargé&lt;/span&gt;
&gt;&lt;/p&gt;
</code></pre></p>
		<p>Et maintenant le code Javascript. La fonction qui sera appelé lors d'un clic sur un des deux boutons, elle sera chargée de s'occuper du téléchargement et de l'affichage du fichier passé en paramètre.</p>
		<p><pre><code>
&gt;function loadFile(file){
&gt;	var xhr = new XMLHttpRequest();
&gt;	//Ont veut juste récupérer le contenu du fichier , la méthode GET suffit amplement.
&gt;	xhr.open('GET', file);
&gt;	xhr.addEventListener('readystatechange', function() { //Requête asynchrone
&gt;		if (xhr.readyState === XMLHttpRequest.DONE &amp;&amp; xhr.status === 200) {// SI le fichier est chargé sans erreur
&gt;			document.getElementById('filecontent').innerHTML = '&lt;span&gt;' + xhr.responseText + '&lt;/span&gt;;
&gt;			//Affiche le contenu
&gt;		}
&gt;	});
&gt;	xhr.send(null); //La requête est prête, on envoie tout !
		</code></pre></p>
		<p>Il ne reste maintenant plus qu'à mettre en place les évenements qui déclencheront tout le processus.</p>
		<p><pre><code>
&gt;(function() { //une IIFE pour éviter les variables globales
&gt;	var inputs = document.getElementsByTagName('imput'),
&gt;	inputsLen = inputs.length;
&gt;	for (var i = 0; i &lt; inputsLen; i++) {
&gt;		loadFile(this.value);//A chaque clique, un fichier sera chargé dans la page
&gt;	});
&gt;}
&gt;})();//Fin de la IIFE
		</code></pre></p>
		<p>Et voilà le travail !</p>
		<p>Voici le code utilisé pour mettre à jour toutes les 5 secondes les Dix derniers message du chat via une requête en AJAX</p>
		<p><pre><code>
&gt;function loadFile(file) {
&gt;	var xhr = new XMLHttpRequest();
&gt;	xhr.open('GET', file);
&gt;	xhr.addEventListener('readystatechange', function() { //ongère ici une requête asynchrone
&gt;	if(xhr.status === 200) { //Si le fichier est chargé sans erreur
&gt;			document.getElementById('message_chat').innerHTML = '&lt;di&gt;' + xhr.responseText + '&lt;/div&gt;';
&gt;		}
&gt;	});
&gt;	xhr.send(null);// La requête est prête, on envoie tout !
&gt;}
&gt;setInterval( function() { loadFile("bdd/affiche_message.php"); } , 5000);
		</code></pre></p>
		<p>J'appelle la fonction loadFile en lui passant en argument le chemin du fichier à charger toutes les 5 secondes</p>
		<p>La Fonction loadFile(file) créer un objet xhr ont créer la requête avec la méthode open une fois que le status à changer et si le code retour et 200 pour signifie good process alors ont affiche le contenu telle-quel puisque déjà formater en html par le serveur dans la balise fieldset avec l'id message_chat entre balise div</p>
	</article>
</section>

<section id="encodage">
	<h1><u>L'encodage des requêtes AJAX est UTF-8 bien l'assimiler pour éviter les erreurs :</u></h1>
	<article>
		<p>Même si les pages html sont encodé par exemple en ISO-8859-1 et que les pages php coté serveur également la requête ajax elle sera encodé en utf-8
		ce qui peut donnée comme résultat des lettres accuentué déformé.</p>
		<p>Voici la procédure d'encodage des requêtes ajax : (de fichier encoder en  ISO-8859-1)</p>
		<ul>
			<li>La requête est envoyé, les données sont alors converties proprement de L'ISO à l'UTF-8. Ainsi, le ê en ISO est toujours un ê en UTF-8, l'AJAX
			sait faire la conversion d'encodage sans problème.</li>
			<li>Les données arrivent sur le serveur, c'est là que se pose le problème : elles arrivent en UTF-8, alors que le serveur attend des données en ISO, cette erreur d'encodage n'étant pas détectée, le caractère ê n'est plus du tout le même vis-à-vis du serveur, il s'agit alors des deux caractères Ãa.</li>
			<li>Le serveur renvoie des données au format ISO, mais celles-ci ne subissent aucune modification d'encodage lors du retour de la requête. Les données renvoyées par le serveur en ISO seront bien réceptionnées en ISO.</li>
		</ul>
		<p>Pour remédier à ce problème deux solutions : </p>
		<ul>
			<li>La première solution et de loin la meilleur tout formater en utf-8 (unicode) coté client et coté serveur</li>
			<li>La deuxième solution décoder les caractères reçu par le biais d'une requête AJAX avec la fonction PHP utf8_decode().</li>
		</ul>
	</article>
</section>

<section id="versiontwo">
	<h1><u>La deuxieme version plus avancée.</u></h1>
	<article>
		<p>Les requêtes <strong>cross-domain</strong></p>
		<p>Les requêtes cross-domain sont des requêtes effectuées depuis un nom de domaine A vers un nom de domaine B. Elles sont pratiques, mais absoluement inutilisables avec la premiere version du XHR en raison de la présence d'une sécurité basé sur le principe de la same origin policy. Cette sécurité est appliquée aux différrents langages utilisables dans un navigateur Web, le javascript est donc concerné. Il est important de comprendre en quoi elle consiste et comment elle peut-être contournée, car les requêtes cross-domain sont au coeur du XHR2.</p>
		<p>Il faut autoriser une connexion cross-domain à un site ou une page dont le nom de domaine n'est pas identique à celui qui effectue la requête</p>
		<p>Cela consiste à ajouté un en-tête dans la page appelée par la requête pour autoriser le cross-domain. Cet en-tête se nomme Access-Control-Allow-Origin et permet de spécifier un ou plusieurs domaines autorisés à acceder à la page par le biais d'une requête XHR.</p>
		<p>Pour spécifier un nom de domaine il faut ajouter la ligne suivante : <code>&gt;Acces-Control-Allow-Origin: http://example.com</code></p>
		<p>Il est impossible d'indiquer plusieurs noms de domaine par contre ont autoriser tous les nom de domaine à se connecté avec l'astérisque *</p>
		<p><code>&gt;Access-Control-Allow-Origin: *</code></p>
		<p>Ensuite il faut ajouter cette en-tête à tous les fichiers php : <code>&gt;header('Access-Control-Allow-Origin: *');</code></p>
		<p>Cependant prendre garde avec l'utilisation de l'astérisque car il permet des connexions de tous les noms domaines même seut que je ne contrôle pas</p>
		<p>Pour autoriser l'envoie des cookies et $_SESSION $_COOKIE spécifié l'en-tête : <code>&gt;Access-Control-Allow-Credentials: true</code></p>
		<p>La deuxième version possède 8 évenements :</p>
		<ul>
			<li>loadstart : Se déclenche losrque la requête démarre(lors de l'appel de send()).</li>
			<li>load : se déclenche lorsque la requête se termine si la requête se termine correctement.(Pas d'erreur 404 ou autres).</li>
			<li>loadend : se déclenche lorsque la que la requête se termine même si elle se termine avec une erreur type 404 ou autres.</li>
			<li>error : Se déclenche en cas de non aboutissement de la requête</li>
			<li>abort : S'exécutera  en cas d'abandon de la requête avec la méthode abort() ou bien avec le bouton Arrêt de l'interface du navigateur web.</li>
			<li>timeout : Se déclenche lorsque que le temp maximale spécifiée dans la propriété associée est atteinte.</li>
			<li>progress : Son rôle est de déclencher à intervalles réguliers pendant le rapatriement du contenu exigé par la requête. Fournie un objet qui contient deux propriétés nommées loaded et total. Qui indiquent respectivement, le nombre d'octets actuellement téléchargés et le nombre d'octets total à télécharger.
			Exemple de code : <code>&gt;xhr.addEventListener('progress', function(e) { element.innerHTML = e.loaded + ' / ' + e.total; });</code></li>
			<li>readystatechange : Lors d'un changement de status.</li>
		</ul>
		<p>Avec la deuxième version c'est l'objet FormData() pour envoyée des données via un formulaire avec la méthode POST</p>
		<p>Voici un code d'exemple pour l'utilisation de FormData() </p>
		<p><pre><code>
&gt;&lt;form id="myform"&gt;
&gt;	&lt;input id="mytext" name="mytext" type="text" value="Test ! Un, Deux, un, deux !"/&gt;
&gt;&lt;/form&gt;
&gt;&lt;script&gt;
&gt;	var xhr = new XMLHttpRequest();
&gt;	xhr.open('POST', 'script.php');
&gt;	var myForm = document.getElementById('myForm'),
&gt;		form = new FormData(myForm);
&gt;	xhr.send(form);
&gt;&lt;/script&gt;</code></pre></p>
		<p>Et côté serveur on récupère les infos normalement : <code>&gt;&lt;?php echo $_POST['myText']; // Affiche : Test ! Un, Deux, un, deux !</code>
	</article>
</section>

<section id="iframe">
	<h1><u>Upload d'une page web dans une autre via iframe</u></h1>
	<article>
		<p>D'une manière générale c'est une balise à éviter car elle peut permettre à une personne malveillante de chargé un script est de contrôler l'iframe</p>
		<p>En cours  de rédaction</p>
	</article>
</section>

<section id="dynamic_script">
	<h1><u>Dynamic Script Loading (DSL) Charger un script dans une page web déjà chargé dans le navigateur</u></h1>
	<article>
		<p>Avec le DOM, il est possible d'insérer n'importe quel élement HTML au sein d'une page web, cela vaut également pour un élement &lt;script&gt;</p>
		<p>Il est donc possible de lier et d'éxécuter un fichier Javascript après que la page a été chargée : </p>
		<p>Voici le code : <pre><code>
&gt;window.addEventListener('load', function() {
&gt;	var scriptElement = document.createElement('script');
&gt;	scriptElement.src = 'url/du/fichier.js';
&gt;	document.body.appendChild(scriptElement);
&gt;});
		</code></pre></p>
		<p>Avec ce code un nouvel élement &lt;script&gt; sera inséré dans la page une fois que cette dernière aura été chargée. Mais s'il est possible de charger un fichier Javascript à la demande, pourquoi ne pas s'en servir pour charger des données, et faire de L'AJAX.</p>
		<p>Voici un exemple qui va charger un fichier JavaScript qui exécutera une fonction. Cette fonction se trouve dans la page HTML</p>
		<p><pre><code>
&gt;&lt;script&gt;
&gt;	function sendDSL() {
&gt;		var scriptElement = document.createElement('script');
&gt;		scriptElement.src = 'dsl_script.js';
&gt;		document.body.appendChild(scriptElement);
&gt;	}
&gt;	function receiveMessage(message) {
&gt;		alert(message);
&gt;	}
&gt;&lt;/script&gt;
		</code></pre></p>
		<p>Voici le contenu du fichier dsl_script.js <code>&gt;receiveMessage('Ce message est envoyé par le serveur !');</code></p>
		<p>Voici le comportement du script : Dès que l'on clique sur la bouton, la fonction sendDSL() va charger le fichier JavaScript qui contient un appel vers la fonction receiveMessage(), tout en prenant soin de lui passer un message en paramètre. Ainsi, via la fonction receiveMessage(), on est en mesure de récupérer du contenu. Évidemment, cet exemple n'est pas très intéressan t car on c'est à l'avance ce que le fichier JavaScript va renvoyer.</p>
		<p><u>Avec des variables PHP</u></p>
		<p>Au lieu d'appeler un fichier javascript ici c'est une page php</p>
		<p><pre><code>
&gt;&lt;script&gt;
&gt;	function sendDSL() {
&gt;		var scriptElement = document.createElement('script');
&gt;		scriptElement.src = 'dsl_script.php?nick=' + prompt('Quel est votre pseudo ?');//On change la source pour appeler la page php
&gt;		document.body.appendChild(scriptElement);
&gt;	}
&gt;	function receiveMessage(message) {
&gt;		alert(message);
&gt;	}
&gt;&lt;/script&gt;
		</code></pre></p>
		<p>Ensuite il faut utiliser la fonction header() pour indiquer au navigateur que le contenu du fichier PHP est en réalité du javascript.</p>
		<p>Puis, il ne reste plus qu'à introduire la variable $_GET['nick'] au sein du script JavaScript</p>
		<p><pre><code>
&gt;&lt;?php header("Content-type: text/javascript"); ?&gt;
&gt;var string = 'Bonjour &lt;?php echo $_GET['nick'] ?&gt; !';
&gt;receiveMessage(string);
		</code></pre></p>
		<p><u>Charger du JSON</p>
		<p>On va utiliser une page PHP pour générer le contenu du fichier JavaScript, et donc le JSON(JavaScript Object Notation). Dans l'exemple suivant les données JSON contiennent une liste d'éditeurs et pour chacun une liste de programmes qu'ils éditent :</p>
		<p><pre><code>
&gt;&lt;?php
&gt;header("Content-Type: text/javascript");
&gt;echo 'var softwares = {
&gt;	"Adobe": [
&gt;		"Acrobat",
&gt;		"Dreamweaver",
&gt;		"Photoshop",
&gt;		"Flash"
&gt;	],
&gt;	"Mozilla": [
&gt;		"Firefox",
&gt;		"Thumderbird",
&gt;		"Lightning"
&gt;	],
&gt;	"Microsoft": [
&gt;		"Office",
&gt;		"Visual C# Express",
&gt;		"Azure"
&gt;	]
&gt;};';
&gt;?&gt;
&gt;receiveMessage(softwares);
		</code></pre></p>
		<p>Sur la page HTML pas de grand changement. Juste un autre code pour la fonction receiveMessage() de manière à afficher dans une alerte les données issues du JSON.</p>
		<p><pre><code>
&gt;&lt;script&gt;
&gt;	function sendDSL() {
&gt;		var scriptElement = document.createElement('script');
&gt;		scriptElement.src = 'dsl_script_json.php';
&gt;
&gt;		document.body.appendChild(scriptElement);
&gt;	}
&gt;
&gt;	function receiveMessage(json) {
&gt;		var tree = '',
&gt;			nbItems, i;
&gt;
&gt;		for (node in json) {
&gt;			tree += node + "\n";
&gt;			nbItems = json[node].length;
&gt;
&gt;			for (i = 0; i &lt; nbItems; i++) {
&gt;				tree += '\t' + json[node][i] + '\n';
&gt;			}
&gt;		}
&gt;		alert(tree);
&gt;	}
&gt;&lt;script&gt;
&gt;&lt;p&gt;&lt;button type="button" onclick="sendDSL()"&gt;Charger le JSON&lt;/button&gt;&lt;/p&gt;
		</code></pre></p>
		<p>Dans ce cas il n'est pas necessaire de parser le JSON il directement opérationnel on appelle cette notion avec l'abbréviation JSONP.</p>
		<p>Petite astuce pour le PHP qui dispoce de deux fonctions pour manipuler du JSON : <code>&gt;json_encode() et &gt;json_decode()</code> La première converti une variable en une chaine de caractère au format JSON et la 
		seconde fait le contraire elle recréer une variable à partir d'une chaine de caractère au format JSON.</p>
	</article>
</section>
