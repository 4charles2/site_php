
<section id="top_page">
	<h1><u>Utilisation du JavaScript</u></h1>
	<article>
		<p>Listes des paragraphes :</p>
		<ul>
			<li><a href="#dynamic_script">Dynamic Script Loading DSL Pour insérer du script dynamiquement</a></li>
			<li><a href="#script">Créer un script dans une page Web</a></li>
			<li></li>
		</ul>
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
&gt;		scriptElement.src = 'dsl_script.php?nick=' + prompt('Quel est votre pseudo ?');
&gt;							//On change la source pour appeler la page php
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
		<p><u>Charger du JSON</u></p>
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

<section id="script">
	<h1><u>Créez un script dans une page Web :</u></h1>
	<article>
		<p>Pour créer un script dans une page Web rien de plus simple : </p>
		<p>On utilise les balises : <code>&gt;&lt;script type="text/javascript"&gt;Ici le code Javascript&lt;/script&gt;</code></p>
	</article>
</section>
