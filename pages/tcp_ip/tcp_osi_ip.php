<script type="text/x-mathjax-config">
		  MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
</script>
<script type="text/javascript" async  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_CHTML">
</script>
<section id="top_page">
	<h1><u>Le réseau TCP/IP</u></h1>
	<article>
		<ul>
			<li><a href="#OSI">Modèle OSI et TCP/IP (Les couches)</a></li>
			<li><a href="#couche_1">La couche 1 brancher les machine</a></li>
			<li><a href="#couche_2">La couche  2 faire communiquer les machines entre elle</a></li>
			<li><a href="#couche_3">La couche 3 La réseau communiquer entre réseau</a></li>
			<li><a href="#routage">Le routage </a></li>
		</ul>
	</article>
</section>
<section id="OSI">
	<h1><u>Fonctionnement du réseau tcp/ip sur le modèle théorique OSI</u></h1>
	<article>
		<p>Le protocole tcp/ip est le protocole utilisé pour les communications </p>
		<p>Il se base sur le modèle OSI qui comporte 7 couches : </p>
		<table style="border: 1px solid black" bgcolor="#aaa">
			<caption>Modèle OSI</caption>
			<tr>
				<th></th>
				<th>PDU</th>
				<th colspan=2>Couche</th>
				<th>Fonctions</th>
			</tr>
			<tr >
				<td rowspan=4>Couches haute</td>
				<td rowspan="3" bgcolor="#d8ec9b">Donnée</td>
				<td bgcolor="#d8ec9b">7</td>
				<td bgcolor="#d8ec9b">Application</td>
				<td bgcolor="#d8ec9b">Point d'accès aux services réseau</td>
				<tr bgcolor="#d8ec9b">
					<td>6</td>
					<td>Présentation</td>
					<td>Gère le chiffrement et le déchiffrement des données, convertit les données machine en données exploitables par n'importe quelle autre machine</td>
				</tr>
				<tr bgcolor="#d8ec9b">
					<td>5</td>
					<td>Session</td>
					<td>Communication Interhost, gère les sessions entre les différentes applications</td>
				</tr>
			</tr>
			<tr bgcolor="#e7ed9c">
				<td>Segments/Datagrammes</td>
				<td>4</td>
				<td>Transport</td>
				<td>Connexion bout à bout, connectabilité et contrôle de flux. Intervient la notion de port.</td>
			</tr>
			<tr>
					<td rowspan="3" >Couches Matérielles</td>
					<td bgcolor="#eddc9c">paquet</td>
					<td bgcolor="#eddc9c">3</td>
					<td bgcolor="#eddc9c">Réseau</td>
					<td bgcolor="#eddc9c">Détermine le parcours des données et l'adressage logique (Adresse IP)</td>
				<tr bgcolor="#e9c189">
					<td>Trame</td>
					<td>2</td>
					<td>Liaison</td>
					<td>Adressage physique (Adresse MAC)</td>
				</tr>
				<tr bgcolor="#e9988a">
					<td>Bit</td>
					<td>1</td>
					<td>Physique</td>
					<td>Transmission des signaux sous forme numérique ou analogique</td>
				</tr>
			</tr>
		</table>
		<h2><u>La carte d'identité des couches du modèle OSI</u></h2>
		<ul>
			<h3><u>La couche 1 ou couche physique : </u></h3>
			<li>Nom : physique</li>
			<li>Rôle : offrir un support de transmission pour la communication.</li>
			<li>Rôle secondaire : RAS</li>
			<li>Matériel associé : le hub, ou concentrateur en français.</li>
		</ul>
		<ul>
			<h3><u>La couche 2 ou couche de liaison : </u></h3>
			<li>Nom : liaison de données.</li>
			<li>Rôle : connecter les machines entre elles sur un réseau local.</li>
			<li>Rôle secondaire : détecter les erreurs de transmission.</li>
			<li>Matériel associé : le switch, ou commutateur.</li>
		</ul>
		<ul>
			<h3><u>La couche 3 ou couche réseau : </u></h3>	
			<li>Nom : réseau.</li>
			<li>Rôle : interconnecter les réseaux entre eux.</li>
			<li>Rôle secondaire : fragmenter les paquets.</li>
			<li>Matériel associé : le routeur.</li>
		</ul>
		<ul>
			<h3><u>La couche 4 ou couche transport : </u></h3>
			<li>Nom : transport.</li>
			<li>Rôle : gérer les connexions applicatives.</li>
			<li>Rôle secondaire : garantir la connexion.</li>
			<li>Matériel associé : RAS.</li>
		</ul>
		<ul>
			<h3><u>La couche 7 ou couche application : </u></h3>
			<li>Nom : application</li>
			<li>Rôle : RAS</li>
			<li>Rôle secondaire : RAS</li>
			<li>Matériel associé : le proxy</li>
		</ul>
		<p>Pour les couches suivantes voir le tableau</p>
		<p>Voici un schéma qui explique le fonctionnement des communications sur le réseaux
		<img src="pages/tcp_ip/schema_protocoles.png" alt="shema des protocole tcp ip" ></p>
		<p>Ces applications sont les suivantes : </p>
		<ul>
			<li>FTP : Protocole de transfert de fichiers</li>
			<li>HTTP : Protocole HTTP (Hypertext Transfert Protocol)</li>
			<li>SMTP : Protocole SMTP (Simple Mail Transfert Protocol)</li>
			<li>DNS : Système DNS (Domaine Name Systm)</li>
			<li>TFTP : Protocole TFTP (Trivial File Transfert Protocol) comme ftp mais fonctionne en UDP alors ftp en tcp/ip</li>
		</ul>
		<p>Le modèle TCP/IP met l'accent sur une souplesse maximale, au niveau de la couche application, à l'intention des développeurs de logiciels. La couche transport fait appel à deux protocoles : le protocole TCP (protocole de transmission) et le protocole UDP (User datagram Protocol). La couche inférieur, soit la couche d'accès au réseau, concerne la technologie LAN ou WLAN utilisée.</p>
		<p>Dans le modèles TCP/IP IP est le seul et unique protocole utilisé, et ce, quels que soit le protocole de transport utilisé et l'application qui demande des services réseau. Il s'agit là d'un choix de conception délibéré. IP est un protocole universel qui permet à tout ordinateur de communiquer en tout temps et en tout lieu.</p>
		<p>Voici un schéma de comparaison des modèles TCP/IP et OSI</p>
		<img src="pages/tcp_ip/comparaison_modele_tcp_ip_et_osi.png" alt="scheme de comapraison entre OSI et TCP IP" />
		<ul>
			<h3><u>Les Similitudes :</u></h3>
			<li>Tous deux comportent des couches</li>
			<li>Tous deux comportent une couche application, bien que chacune fournisse des services très différents</li>
			<li>Tous deux comportent des couches réseau et transport comparables</li>
			<li>Tous deux supposent l'utilisation de la technologie de communication de paquets (et non de communication circuits)</li>
			<li>Les professionnels des réseaux doivent connaître les deux modèles</li>
		</ul>
		<ul>
			<h3><u>Les Différences : </u></h3>
			<li>TCP/IP intègre la couche présentation et couche session dans sa couche application</li>
			<li>TCP/IP regroupe les couches physiques et liaison de données OSI au sein d'une seule couche</li>
			<li>TCP/IP semble plus simple, car il comporte moins de couches</li>
			<li>Les protocoles TCP/IP constituent la norme sur laquelle s'est développé Internet. Aussi, le modèle TCP/IP a-t-il bâti sa réputation sur ses protocoles. En revanche, les réseaux ne sont généralement pas architectures autour du protocole OSI, bien le modèle OSI puisse être utilisé comme guide.</li>
		</ul>
		<ol>
			<h3><u>Caractéristiques résume des couches : </u></h3>
			<li>La couche 1 physique est chargée de la transmission effective des signaux entre les interlocuteurs. Son service est limité à l'émission et la réception d'un bit ou d'un train de bit continu (notamment pour les supports synchrones (concentrateur)).</li>
			<li>La couche 2 liaison de données à gère les communications entre 2 machines directement connectées entre elles, ou connectées à un équipement qui émule une connexion directe (commutateur).</li>
			<li>La couche 3 réseau gère les communications de proche en proche, généralement entre machines : routage et adressage des paquets (cf. Note ci-dessous).</li>
			<li>La couche 4 transport gère les communications de bout en bout entre processus (programmes en cours d'exécution).</li>
			<li>La couche 5 session gère la synchronisation des échanges et les transactions, permet l'ouverture et la fermeture de session.</li>
			<li>La couche 6 présentation est chargée du codage des données applicatives, précisément de la conversion entre données manipulées au niveau applicatif et chaînes d'octets effectivement transmises.</li>
			<li>La couche 7 application est le point d'accès aux services réseaux, elle n'a pas de service propre spécifique et entrant dans la portée de la norme.</li>
		</ol>
		<ul>
			<h3>Ce qu'il faut retenir</h3>
			<li>Le modèle OSI est une norme précisant comment les machines doivent communiquer entre elles.</li>
			<li>C'est un modèle théorique, le modèle réellement utilisé étant le modèle TCP/IP.</li>
			<li>Le modèle OSI possède 7 couches.</li>
			<li>Chaque couche a son rôle particulier à accomplir.</li>
			<li>Les couches 1 à 4 sont les couches réseau.</li>
			<li>Les couches réseau offrent le service de communication à la couche applicative.</li>
			<li>Chaque couche est indépendante des autres.</li>
			<li>Chaque couche ne peut communiquer qu'avec une couche adjacente.</li>
			<li>Lors de l'envoi de données, on parcourt le modèle OSI de haut en bas, en traversant toutes les couches.</li>
			<li>Vous connaissez et comprenez maintenant le modèle OSI.</li>
			<li>Il y a deux règles d'or associées à ce modèle qui permettent de garantir la bonne utilisation du modèle OSI.</li>
		</ul>
		</article>
</section>
<section id="couche_1">
	<h1><u>La couche 1 brancher les machines</u></h1>
	<article>
		<a href="#topologie">Les différentes topologie de réseau</a>
		<p>Le rôle principal de la couche 1 est de fournir le support de transmission de la communication.</p>
		<p>La couche 1 aura donc pour but d'acheminer des signaux électriques, des 0 et est des 1 soit par câble Ethernet ou wiffi.</p>
		<p>Les 0 et les 1 vont circuler grâce aux différents support de transmission.</p>
		<ul>
			<h3><u>Les matériaux, câbles, etc ... : </u></h3>
			<li> Les câbles coaxiaux : <br />
			<img src="pages/tcp_ip/258382.gif" alt="schema cable coaxial"/>
			Le principe est de faire circuler le signal électrique dans le fil de données central. On se sert du maillage de masse, autrement appelé grille, pour avoir un signal de référence à 0v. On obtient le signal électrique en faisant la différence de potentiel entre le fil de données et la masse.<br /> Le nom scientifique donné au câble coaxial est 10B2 ou 10B5 .<br />
				<ul>
					<li>Le 10 indique le débit en Mbps(mégabits par seconde);</li>
					<li>Le B indique la façon de coder les 0 et les 1, soit ici la bande de Base;</li>
					<li>Le dernier chiffre indique la taille maximale du réseau, exprimée en mètre et divisé par 100.
						<ul>
							<li>Pour le câble coaxial 10B5 : <br />On utilisait une prise vampire pour se connecté<br /><img src="pages/tcp_ip/prise_vampire.gif" alt="prise vampire" /><br />Il ne fallait pas plier le câble sinon le câble de données à l'intérieur se coupait et patatra plus de connexion dans tous le réseau.</li>
							<li>Le câble coaxial 10B2 : <br/>Il et plus fin. <br />Pour mettre en place un réseau en 10B2, il fallait : 
								<ul>
									<li>des câbles 10B2 équipés de prises BNC</li>
									<li>des tés BNC</li>
									<li>Des bouchons.</li>
									<img src="pages/tcp_ip/prise_BNC.png" alt="prise BNC" /><br />
									<img src="pages/tcp_ip/Te_BNC.jpg" alt="t� BNC" /><br />
									<img src="pages/tcp_ip/bouchon_BNC.jpg" alt="bouchon BNC" />
								</ul>
								<li>Pour créer le réseau, on mettait un bouchon sur un côté du té, une carte réseau sur le deuxième côté (celui du milieu) et un câble sur la dernière prise. L'autre extrémité du câble était branché sur un autre té, et ainsi de suite jusqu'à la fermeture du réseau par un bouchon.<br /> Voici une figure d'exemple de connexion sur un té : <br /><img src="pages/tcp_ip/connexion_te.jpg" alt="figure connexion te"/><br />Et voici le réseau complet sur la figure suivante : <br /><img src="pages/tcp_ip/reseau_coxial_10B2.gif" alt="figure reseau coaxial 10B2" /></li>
							</li>
						</ul>
					</li>
				</ul>
			</li>
			<li>La paire torsadé : <br />
				Le câble à paire torsadées n'est plus un câble coaxial. Il n'y a plus un unique fil dans le câble mais 8 !<br />
				Il sont torsadé deux à deux par paires. D'où son nom paire torsadé.<br /> Voici une figure : <br /><img src="pages/tcp_ip/cable_paire_torsade.jpg" alt="figure du câble paire torsade" /><br />
				A l'heure actuel nous utilisons deux paires de fils soit 4 fils. Une paire pour recevoir l'info et une paire pour envoyé l'information. Les autres peuvent être utiles dans l'avenir.<br />
				Il existe tout de même des technologie qui utilise plus de fils.<br />
				Le torsadage permet une meilleur protection du signal électrique. Le câble est moins sujet aux perturbations électromagnétique.<br />
				Il faut cependant éviter si possible, de posez du câble à coter de source de perturbation comme des câbles électriques à 22v ou des néons qui créent de grosses perturbations lors de l'allumage.<br />
				Les nom scientifique : 10BT, 100BT ou 1000BT, selon le débit utilisé (10Mbps, 100Mbps, 1000Mbps) le T signifie torsadé ou twisted en anglais. Des fois un x apparait derrière pour dire que le réseau est commuté. 
				<strong>Le câble coaxial n'est plus utilisé mais le câble torsadé par paire et utilisé dans 90% des cas</strong><br />
				C'est le top du top<br />
				Pour brancher le câble à paire torsadé on utilise les prises RJ45 dont voici une image : <br />
				<img src="pages/tcp_ip/prise_RJ45.png" alt="prise RJ45" /><br />
				<strong>Les câbles RJ45 n'existe pas se sont des câble torsadé avec une prise RJ45</strong><br />
				Même si on utilise que deux paires de câbles soit 4 fils on ne peut pas utilisé n'importe quel câble.<br />
				<em>Il faut utiliser les fils 1,2,3, et 6.</em><br />
				Voici une figure de branchement de câble torsadé par paire avec les fils utilisé.<br />
				<img src="pages/tcp_ip/fil_utilise_cable_torsade.png" alt="schema fils utilisé sur câble torsade" /><br />
				Imaginons que nous ayons une machine A à gauche, et une machine B à droite que nous relions à l'aide de ce câble. Voici sur la figure suivante ce que ça donne. <br />
				<img src="pages/tcp_ip/bad_branchement_RJ45.png" alt="mauvais branchement RJ45 entre machine schéma" /><br />
				<strong>Ce branchement ne fonctionnera pas car nous avons une paire pour la réception et une paire pour la transmission.</strong><br />
				Hors dans notre schéma la transmission de la machine A et en relation avec la transmission de la machine B et la réception de la machine A et en relation avec la réception de la machine B.<br />
				Un schéma pour mieux comprendre. Tx (transmission et Rx réception) + données et - masse<br />
				<img src="pages/tcp_ip/schema_error_branchement_RJ45.png" alt="schema explicatif de l'erreur de branchement RJ45" /><br />

				Pour résoudre ce problème il nous faut une prise RJ45 croisé. Pour que la transmission de la machine A soit en relation avec la réception de la machine B. Comme sur la figure suivante : <br />
				<img src="pages/tcp_ip/RJ45_croise.png" alt="sch�ma de RJ45 crois�" /><br />
				Il est cependant possible d'utiliser un câble non croisé dans certain cas comme : 
				<ul>
					<li>La prise femelle possède déjà ses connexions transmission et réception inversées.</li>
					<li>Les prises femelles des deux machines inter connecté sont capables de s'adapter et d'inverser les connexions de transmission et réception si besoin.</li>
				</ul>
				Comme dans cette exemple : <br />
				<img src="pages/tcp_ip/inverse_machine_t_r.png" alt="sch�ma inversion de transmission et reception par les machines" /><br />
				Sa fonctionne sur tous matériels récent. Mais dans le cas d'un matériel ancien pour savoir si il faut utiliser du droit ou du croisé il y à une règle. <strong>Je doit utiliser un câble croisé pour connecté deux matériaux de même type.</strong><br />
				Par exemple deux ordinateur, ou deux imprimante 				Par contre, si l'on veut connecter un ordinateur et une imprimante, il va falloir créer deux catégorie.
				<ul>
					<li>Le matériel de connexion : <br />
					Les matériels de connexion sont ceux qui servent à connecter plusieurs machines entre elles, comme les hubs ou les switchs. Voici deux images qui les représentes.<br />
					<figure><img src="pages/tcp_ip/hub.png" alt="un hub" /><figcaption>un Switch</figcaption></figure><br />
					Un hub (concentrateur en français) envoyé toutes les informations qu'il reçoit à toutes les machines connecté au hub<br />
					C'est pas le top pour la confidentialité.<br />
					<figure><img src="pages/tcp_ip/switch.png" alt="un switch" /><figcaption>un hub</figcaption></figure><br />
					</li>
					<li>Le matériel connecté.</li>
					Il représente tous le reste : ordinateur, imprimante, routeur
				</ul>
				La paire torsadé sera remplacé par la fibre optique au fur et à mesure mais ce n'est pas pour tout de suite le remplacement total
			</li>
			<br />
			<li>La Fibre Optique : 
				<p>Avec la fibre optique on transporte des 1 et 0, non plus avec de l'électricité mais avec de la lumière.</p>
				<p>Le nom scientifique de la fibre optique et 1000BF, Du gigabit avec le F pour fibre</p>
				<ul>Il existe aujourd'hui globalement  deux types  de fibre :
					<li>La fibre mono mode : 
						<p>La mono mode fait passer une seule longueur d'onde lumineuse, soit une seul  couleur. Elle fonctionne avec du laser 
							soit vert, bleu, rouge ...</p>
					</li>
					<li>la fibre multimodale
						<p>La multimodale fonctionne avec de la lumière blanche, et donc toutes les longueurs d'ondes (la lumière blanche et la somme de toutes les lumières possibles, comme celle du soleil</p>
					</li>
				</ul>
				<p>La différence entre les deux se situe sur le débit et la distance parcouru.
					La fibre mono mode est beaucoup plus performante sur ces deux points.</p>
			</li>	
			<p>De nos jours il existe également le câblage virtuel comme le wiffi.</p>
		</ul>
	</article>
	<article id="topologie">
		<h2><u>Les différentes topologies réseau possible</u></h2>
		<ol>
			<h3>Il existe trois topologies principales : </h3>
			<li>la topologie en bus</li>
			<li>la topologie en anneau</li>
			<li>la topologie en étoile</li>
		</ol>
		<figure>
			<figcaption>Les voici représentées sur les figures suivantes, avec des ronds pour les machines et des trait pour les câbles</figcaption>
			<img src="pages/tcp_ip/topologie_bus.png" alt="topologie en bus" />
			<p>Dans la topologie en bus toutes les machines sont relié au même câble qui n'est pas bouclé cela se rapporte au câble coaxial 10B2 et 10B5</p>
			<img src="pages/tcp_ip/topologie_rond.png" alt="voici les topologie reseau rond" />
			<p>Dans la topologie en rond (anneau) toutes les machines sont relié au même câble qui est bouclé</p>
			<img src="pages/tcp_ip/topologie_etoile.png" alt="topologie en etoile" />
			<p>Toutes les machines sont relié à une machine centrale.</p>
		</figure>
		<h5><u>Voici les différentes caractéristique des topologies</u></h5>
		<figure>	
			<h5><em>Caractéristique de la topologie en bus : </em></h5>
			<img src="pages/tcp_ip/topologie_bus.png" alt="topologie en bus" />
			<p>Sur un bus une seule machine peu parler à la fois. On écoute si une machine parle si personne ne parle on peu envoyer notre message.</p>
			<p>On ne peut pas brancher une infinité de machine car plus il y a de machine moins nous avons de chance pouvoir parler.
				Le nombre maximum est d'environ 50 machines au delà les chances de parler en même temps qu'une autre machine et trop forte 
				et le réseau ne fonctionnerait plus.</p>
			<p>La taille du câble de liaison ne peut pas non plus être infinie car plus le câble et long plus l'information mais du temps pour se propager et donc 				il  y a plus de chance qu'une machine essaye de parler en même temps qu'une autre même si les machines sont peu nombreuse</p>
		</figure>
		<figure>
			<h5><em>Caractéristique de la topologie en anneau : </em></h5>
			<img src="pages/tcp_ip/topologie_rond.png" alt="voici les topologie reseau rond" />
			<p>Le mode de communication sur un anneau utilise un jeton qui tourne en permanence et que les machines peuvent utiliser pour envoyé un message les autres machines regarde l'adresse de destination si elle correspond alors elle réceptionne le message.</p>
			<p>On ne peut n'y mettre une infinité de machine ni une longueur infinie pour les mêmes raison que la topologie en bus</p>
		</figure>
		<figure>
			<h5><em>Caractéristique de la topologie en étoile</em></h5>
			<img src="pages/tcp_ip/topologie_etoile.png" alt="topologie en etoile" />
			<p>En étoile toutes les communications passe par le point central.</p>
			<p>On lui envoie l'information avec l'adresse du destinataire, et le point centrale aiguille l'information vers la bonne machine.</p>
			<p>La taille et le nombre de machine n'est limité que par la capacité du ou des points centraux. On peut relié plusieurs point centraux entre eux si le premier ne trouve pas le destinataire alors il envoie l'information au suivant. Jusqu' à trouver me destinataire</p>
			<p>Avec la bonne configuration le réseau peut comporter un illimité de machine et peut avoir une taille infinie</p>
		</figure>
		<p>Les réseaux en bus ou en anneau sont en voix de disparition .</p>
		<ol>
			<li>Vous savez maintenant que le rôle principal de la couche 1 est d'offrir un support de transmission pour les communications</li>
			<li>le câble le plus utilisé aujourd'hui et le câble torsadé muni d'une prise RJ45</li>
			<li>le matériel utilisé et le hub ou le switch</li>
			<li>Il existe plusieurs organisations pour brancher les machines, appelés topologies</li>
			<li>la topologie la plus adapté est la topologie en étoile</li>
			<li>sur une topologie en bus il peu y avoir des collisions</li>
			<li>Le CSMA/CD permet d'instaurer des règles afin d'éviter les collisions</li>
		</ol>
	</article>
</section>
<section id="couche_2">
	<h1><u>La couche 2 faire communiquer les machines entre elle</u></h1>
	<article>
		<p><u>La couche de liaison : </u></p>
		<p>Le rôle de la couche 2 est de connecté des machines sur un réseau local</p>
		<p>La couche 2 à un également le rôle de détecter des erreurs de transmission. <em>(détection pas correction) !</em></p>
		<p>Pour communiquer la couche deux utilise un identifiant l'adresse MAC . (L'adresse de la carte réseau).</p>
		<h3><u>Notation de l'adresse MAC</u></h3>
		<p>Pour comprendre la notation d'une adresse MAC il faut déjà faire des calculs binaire</p>
		<p>Le binaire est un système de numérotation en base 2. Globalement, cela signifie qu'on peut compter qu'avec des 1 et des 0.</p>
		<p>La notation en binaire : <pre><code>
0	1	10 11	100	101	110	111	1000
		</code></pre></p>
		<p>Correspond au nombre décimal : <pre><code>
0	1	2	3	4	5	6	7	8
		</code></pre></p>
		<p>Les informations sont envoyées sous la forme de 0v ou 5v, qui correspond à 0 et 1.</p>
		<p><u>Pour calculer en binaire : </u></p>
		<p>Tout nombre décimal peut s'écrire en binaire. (somme de puissance de 2.)</p>
		<p>Prenons le nombre 45 par exemple :</p>
		<p>Il peut s'écrire sous la forme 45=32+8+4+1 =(1x2^5)+(0x2^4)+(1x2^3)+(1x2^2)+(0x2^1)+(1x2^0)</p>
		<p>Se qui donne en binaire : 101101</p>
		<p>Pour mieux comprendre comment arriver à ce résultat : </p>
		<p>Il faut prendre un tableau de puissance de 2</p>
		<table>
			<tr><td>2^7</td><td>2^6</td><td>2^5</td><td>2^4</td><td>2^3</td><td>2^2</td><td>2^1</td><td>2^0</td></tr>
			<tr><td>128</td><td>64</td><td>32</td><td>16</td><td>8</td><td>4</td><td>2</td><td>1</td></tr>
			<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>
		</table>
		<p>Pour notre nombre 45 cela donne : </p>
		<table>
			<tr><td></td><td>2^7</td><td>2^6</td><td>2^5</td><td>2^4</td><td>2^3</td><td>2^2</td><td>2^1</td><td>2^0</td></tr>
			<tr><td></td><td>128</td><td>64</td><td>32</td><td>16</td><td>8</td><td>4</td><td>2</td><td>1</td></tr>
			<tr><td>45</td><td>0</td><td>0</td><td>1</td><td>0</td><td>1</td><td>1</td><td>0</td><td>1</td></tr>
		</table>
		<p>Soit le nombre binaire 101101</p>
		<p>Il faut commencer par regarder la plus grande puissance de 2 qui peut être contenue dans notre nombre, et recommencer avec la puissance de 2 suivante. Si la somme du résultat de la puissance de 2  peut être contenu dans notre nombre alors c'est égal à 1 sinon 0.</p>
		<p>Un autre exemple pour la valeur 109.</p>
		<table>
			<tr><td></td><td>2^7</td><td>2^6</td><td>2^5</td><td>2^4</td><td>2^3</td><td>2^2</td><td>2^1</td><td>2^0</td></tr>
			<tr><td></td><td>128</td><td>64</td><td>32</td><td>16</td><td>8</td><td>4</td><td>2</td><td>1</td></tr>
			<tr><td>109</td><td>0</td><td>1</td><td>1</td><td>0</td><td>1</td><td>1</td><td>0</td><td>1</td></tr>
		</table>
		<p>Soit pour le nombre 109 sa donne en binaire : 1101101</p>
		<p>Pour gagner du temps on aurait pu après avoir trouvé comme reste 45 ajouté le nombre binaire à la suite de ceux trouvé avant d'avoir le reste 45 pour le nombre 109</p>
		<p>Maintenant que le calcul d'un nombre binaire est bien compris on va pouvoir s'attaquer au calcul d'une adresse MAC. C'est le même principe mais en hexadécimal (log16) qui correspondent aux nombre 1 2 3 4 5 6 7 8 9 A B C D E F</p>
		<p>A = 10; B = 11; C = 12; D = 13; E = 14; F = 15</p>
		<p>Tous nombre décimal peut s'écrire comme la somme de puissance de 16</p>
		<p>Voici un exemple d'une adresse MAC : 00:23:5e:bf:45:6a</p>
		<p>L'adresse MAC est codée sur 6 octets.</p>
		<p>Un octet est une unité informatique indiquant une quantité de données.</p>
		<p>Un octet représente 8 bits. Un bit est une valeur binaire.</p>
		<p>La valeur d'un bit peut être de 0 ou 1. Se qui pour 1 octet une possibilité de 2^8 = 256 valeur possible. Un nombre binaire qui aura comme taille maximum 00000000 8 bits un octet et donc une valeur entre 0 et 255 (256 valeur). Puisque l'on commence à 0.</p>
		<p>Une adresse MAC et coder sur 6 octets soit 6x8 = 48 bits et peut donc prendre 2^48 =  281 474 976 710 656 valeurs possibles(adresses MAC possibles)0.</p>
		<p>Une astuce pour calculer une grande puissance de 2. Comme dans notre exemple avec 2^48. <em>2^48=2^10x2^10x2^10x2^10x2^8 soit 2^48 = 1000 x 1000 x 1000 x 1000 x 256</em>
		<p>Chaque adresse MAC va être unique au monde.</p>
		<p>Chaque carte réseau a donc sa propre adresse MAC. Unique au monde.</p>
		<p>Pour que cela soit possible le constructeur qui fabrique des cartes réseau va acheter des morceaux d'adresse MAC.</p>
		<p>Les trois premier octets de l'adresse représentent le constructeur.</p>
		<p>Ainsi le constructeur change les 3 octets de fin en faisant attention de ne jamais donner les mêmes.</p>
		<p><strong>Il existe Une adresse MAC spéciale</strong> Une adresse appelé broadcast dans laquelle tous les bits ont la valeur 1. Ce qui donne comme adresse ff:ff:ff:ff:ff:ff . Elle est universelle et identifie n'importe quel carte réseau. Elle permet ainsi d'envoyer un message à toutes les carte réseaux des machines présentes sur mon réseau, en une seul fois.</p>
		<p><em>Toute machine qui reçoit une trame qui a, comme adresse MAC de destination, l'adresse broadcast, considère que la trame lui est destiné.</em></p>
		<h3><u>Un protocole, Ethernet : </u></h3>
		<figure>
			<figcaption>Le langage de couche 2, c'est quoi ?</figcaption>	
			<p>Ethernet et le protocole le plus utilisé de la couche 2 n'est pas le seul.</p>
			<p>Le protocole utilisé va définir dans quel ordre on envoyé les informations et quel information. </p>
			<p>Dans un message nous allons envoyé au minimum : </p>
			<ul>
				<li>l'adresse de l'émetteur</li>
				<li>l'adresse du destinataire</li>
				<li>le message proprement dit</li>
			</ul>
			<p>Ainsi, nous pouvons très bien dire que les 48 premiers caractères que nous allons recevoir représentent l'adresse MAC de l'émetteur, les 48 suivant l'adresse du récepteur, puis enfin le message.</p>
			<p><strong>Le protocole va donc définir le format des messages envoyés sur le réseau.</strong></p>
			<p>Plus exactement, nous allons appeler ce message une trame. Une trame est le message envoyé sur le réseau, en couche 2.</p>
			<h3>Format d'une trame Ethernet</h3>
			<p>La trame complète donne : </p>
			<table>
				<tr><td>Adresse MAC DST (destinataire)</td><td>Adresse MAC SRC (source)</td><td>Protocole de couche 3 utilisé</td><td>données à envoyées</td><td>CRC</td></tr>
			</table>
			<p>La couche 3 va indiquer le protocole utilisé.</p>
			<p>Le CRC est une valeur arithmétique calculer en fonction du contenu du message. La machine A calcul le CRC le renseigne en fin de trame  la machine B reçoit le message calcul de son coté le CRC en fonction du contenu du message quelle à reçu puis le compare au crc reçu si égalité par d'erreur sinon c'est qu'il sait produit une erreur.</p>
			<h3>Quel taille pour une trame ethernet.</h3>
			<p>Il y a des éléments qui ne varient jamais d'une trame à l'autre. L'ensemble de ces éléments est appelé en-tête ou, dans le cas de la couche 2, en-tête Ethernet. Il sont indiqués ici en<strong> gras.</strong></p>
			<p><strong>Adresse MAC DST Adresse MAC SRC Protocole de la couche 3</strong>Donnée envoyé <strong>CRC</strong></p>
			<p>Cet en-tête ne variant pas, nous pouvons définir sa taille : </p>
			<ul>
				<li>Les adresses MAC font chacune 6 octets</li>
				<li>Le protocole de couche 3 est codé sur 2 octets</li>
				<li>le CRC est codé sur 4 octets</li>		
			</ul>
			<p>Ce qui nous donne un total de 18 octets pour l'en-tête Ethernet.</p>
			<p><strong>Il y a une taille minimum de 64 octets, pour une trame</strong></p>
			<p><strong>Il y a aussi une taille maximum qui est de 1518 octets. Pour une trame Ethernet.</strong></p>
		</figure>
		<figure>
			<figcaption><u>Le Matériel de couche 2, Le commutateur (Switch) !</u></figcaption>
			<p>Le commutateur est un boîtier sur lequel sont présentes plusieurs prises RJ45 femelle (ou que deux dans le cas d'un pont (bridge)) permettant de brancher dessus des machines à l'aide de câbles à paires torsadées. </p>
			<p>Voici un switch (commutateur) en image : </p>
			<img src="pages/tcp_ip/hub.png" alt="photo d'un Switch" />
			<p>Voici un réseau relié grâce à des commutateurs : </p>
			<img src="pages/tcp_ip/sheme_reseau_commutateur.jpg" alt="shema de reseau avec commutateur" />
			<p>L'aiguillage des trames : </p>
			<p>Pour envoyer la trame vers la bonne machine, le switch se sert de l'adresse MAC de destination contenue dans l'en-tête de la trame.</p>
			<p>Il se réfère à sa table CAM qui fait l'association entre une adresse MAC et un port RJ45 .</p>
			<p>Prenons un exemple avec le schéma suivant : </p>
			<img src="pages/tcp_ip/shema_switch_CAM.png" alt="shema ilustrant table CAM"/>
			<table>
				<caption>La table CAM de notre switch sera la suivante :</caption>
				<thead>
					<tr><th>Port</th><th>@MAC</th></tr>
				</thead>
				<tbody>
					<tr><td>1</td><td>@MAC23</td></tr>
					<tr><td>2</td><td>@MAC24</td></tr>
					<tr><td>3</td><td>@MAC25</td></tr>
				</tbody>
			</table>
			<p>Quand  la machine 23 vaudra envoyer une trame à la machine 25, le switch lira l'adresse de destination et saura alors vers quel port renvoyer la trame.</p>
		<table><tr><td>Adresse MAC 25 (destination)</td><td>Adresse MAC 23 (source)</td><td>Protocole de couche 3</td><td>Données envoyées</td><td>CRC</td></tr></table>	
		<p>Le switch va donc envoyer la trame sur le port 3, et elle arrivera bien à la machine 25 qui est branché sur ce port et à elle seule !</p>
		<p>La table CAM du switch va être fabriquée de façon dynamique. Cela veut dire que le switch va apprendre, au fur et à mesure qu'il voit passer des trames, quelle machine est branchée à quel port</p>
		<img src="pages/tcp_ip/shema_switch_CAM.png" alt="shema illustrant table CAM" />
		<p>Imaginons maintenant que la table CAM du switch est vide et que 'on vient de brancher les machines</p>
		<table><caption>Table CAM vide</caption><tr><td></td></tr></table>
		<p>Maintenant la machine 23 envoie une trame à la machine 25</p>
		<ul>
			<li>La trame arrive au switch.</li>
			<li>Il lit l'adresse MAC source et voit l'adresse MAC de la machine 23.</li>
			<li>Vu que la trame vient du port 1, il met en relation le port 1 et l'adresse MAC  de la machine 23 dans sa table CAM.</li>
			<li>Il met à jour sa table CAM.</li>
		</ul>
		<table><caption>Table CAM Mise à jour :</caption><tr><td>1</td><td>@MAC 23</td></tr></table>
			<p>Par contre comme il ne connait pas l'adresse de destination, il va envoyer la trame sur tous les ports actifs</p>	
			<p>La machine 25 va donc recevoir la trame et va pouvoir répondre.</p>
			<p>Le switch va recevoir la réponse de la machine 25 pour  la machine 23. Il va lire l'adresse source et mettre à jour sa table CAM. </p>
		<table><caption>Table CAM Mise à jour :</caption><tr><td>1</td><td>@MAC 23</td><td>3</td><td>@MAC 25</td></tr></table>
			<p>Et ainsi de suite à chaque fois qu'il voit passer une trame : </p>
			<ul><li>Le Switch met à jour sa table CAM quand il voit passer une trame</li>
			<li>Le switch envoie une trame à tout le monde s'il n'a pas l'adresse MAC de destination dans sa table CAM.</li>
			</ul>
			<p>Les données dans la table CAM reste le temps de la TTL ( qui signifie Time To Live en anglais, Durée de Vie.)</p>
			<p>La table CAM se présente donc sous la forme : </p>
			<table>
				<tr><td>Port</td><td>@MAC</td><td>TTL</td></tr>
				<tr><td>1</td><td>@MAC23</td><td>90s</td></tr>
				<tr><td>3</td><td>@MAC25</td><td>120s</td></tr>
			</table>
			<p>Si une machine envoie une trame la TTL et remise à zéro enfin à son maximum.</p>
			<p>Le switch ne possède pas d'adresse MAC.</p>
			<p>Sauf dans le cas d'un switch administrable ou l'on peut se connecté dessus pour le configurer. </p>
			<p>Voici un exemple réel de table CAM</p>
			<img src="pages/tcp_ip/table_CAM.png" alt="table CAM" />
			<p>On remarque que aux moins 6 machines sont connecté sur le même port. Cela signifie tout simplement que c'est un autre switch qui et brancher sur ce port</p>
		<h3>Truc et astuce de vilain : </h3>
		<p>
		Connaissant maintenant le fonctionnement d'un switch, comment pensez vous qu'on puisse faire pour gêner son fonctionnement s'il nous en prend l'envie ? Il y a plusieurs façons de le faire.

		Méthode 1, saturation par envoi massif intelligent.
		Si l'on envoie des tonnes de trames vers des adresses MAC inexistantes, que se passe-t-il ?

		Le switch ne sachant pas vers quel port les envoyer, il va les envoyer vers tous les ports actifs... et va donc vite saturer !

		Méthode 2, saturation de la table CAM.
		Si l'on envoie des tonnes de trames en utilisant à chaque fois une adresse MAC de source différente, que se passe-t-il ?

		La table CAM du switch va se remplir progressivement. Plus elle sera remplie, plus sa lecture par le switch sera longue, et plus cela induira des temps de latence importants... jusqu'à provoquer l'écroulement du switch. Quand il sera saturé et n'aura plus le temps de lire sa table CAM, il enverra directement les trames sur tous les ports. Ceci permettrait à un pirate de voir tout le trafic du switch...
		Cependant, nous verrons par la suite qu'il existe des méthodes bien plus puissantes pour voir le trafic circulant sur un switch.</p>
		<p>Avec un switch il n'y a pas besoin de CSMA/CD (écouter le réseau) pour envoyer une trame car si une machine reçoit deux trames en même temps alors le switch garde une trame en mémoire puis envoie la premier suivie de ma deuxième. On dit que la carte réseau fonctionne en <strong>FULL DUPLEX</strong></p>
		<p>A l'inverse quand on fait du CSMA/CD sur un hub ou câble coaxial, la carte réseau fonctionne en <strong>half duplex</strong></p>
		<p><strong>Il faut faire très attention que la carte réseau de chaque machine doit être en half duplex sur un réseaux en bus ou/et branché sur un hub sinon la carte réseau en all duplex empêchera les autres machine de parler</strong></p>
		<p>En générale les carte réseau sont intelligente et se règle automatiquement en half duplex ou full duplex</p>
		<p>Si on branche un hub sur switch que se passe t'il ?</p>
		<p>Et bien le port du switch sur lequel et branché le hub passera en half duplex et les autres ports resterons en all duplex comme montré sur la figure suivante : </p>
		<img src="pages/tcp_ip/regle_switch_connect_hub.png" alt="table de regle du switch connecte a un hub"/>
		<p>On y voit que le port 21 du switch fonctionne en 100Mbps et le FC indique full duplex</p>
		<p>Il peut arriver que la négociation de duplex ne fonctionne pas et qu'un port soit en half duplex sur un port qui devrait être en all duplex il faudra alors corrigé se problème manuellement</p>
		<h3><u>Les gain que cela à apporté : </u></h3>
		<ul>
			<li>Les conversations sont isolées, ce qui apporte un gain en sécurité</li>
			<li>On peut recevoir en même temps que l'on envoie des données, ce qui double théoriquement le débit.</li>
			<li>Chaque machine peut parler quand elle le souhaite et n'a pas à attendre que le réseau soit libre, on gagne encore en débit.</li>
		</ul>
		</figure>
		<figure>
			<figcaption><u>Le VLANs fonction avancée du commutateur</u></figcaption>
			<p>LAN signifie local area Network et VLANs signifie Virtual local area network</p>
			<p>Cela permet de créer plusieurs réseaux local sur un switch. Autrement dit d'isoler un groupe de machine d'un autre</p>
			<p>Voici un schéma représentant un VLANs : </p>
			<img src="pages/tcp_ip/switch_VLANs.png" alt="shema de VLANs" />
			<p>Nous avons un switch de 10 ports sur lequel sont branchées six machines.</p>
			<p>On veut créer deux VLANs de trois machines Le premier groupe ne pourra pas parler avec le deuxième.</p>
			<p>On va donc couper notre switch en deux comme si il y en avait deux physiquement. qui ne sont pas relié entre eux. </p>
			<p>Voici le résultat sur la figure suivante : </p>
			<img src="pages/tcp_ip/VLANs_reseau.png" alt="VLANs shema" />
			<p>Nous voyons en vert et en rouge les deux VLANs diffèrent. les machines en vert ne pourrons pas communiquer avec les machines rouges</p>
			<p>Cela revient au même que si le réseau se trouvait dans la configuration suivante : </p>
			<img src="pages/tcp_ip/deux_switch.png" alt="VLANs "/>
			<p><u>Quel est l'intérêt des VLANs ?</u></p>
			<p>Dans l'exemple que nous avons choisi, l'intérêt n'est pas flagrant, mais imaginons que nous ayons à gérer une école, avec une administration, 100 enseignants et 1000 élèves. Nous avons alors plusieurs switch répartis dans l'école. Des gros switchs de 256 ports ! ( on appelle cela souvent des châssis.)</p>
			<p>Il est intéressant de pouvoir segmenter ces switchs pour séparer les trois populations, pour que les élèves n'aient pas accès au réseau administratif ou à celui des enseignants, et que les enseignants n'aient pas accès au réseau administratif (pour changer leur fiche de paye par exemple). Plutôt que d'acheter 25 petits switch de 48 ports, on en achète 5 gros de 256 ports.</p>
			<p>En plus d'apporter de la sécurité, cela apporte de la facilité de configuration. Si je veux qu'un port passe d'un VLAN à un autre, il me suffit de le configurer sur le switch.</p>
			<p>Je peux faire tous sa sens bouger de mon bureau d'administrateur réseau à travers une interface web d'administration du switch, comme vous pouvez le voir sur la figure suivante.</p>
			<img style="width:750px" src="pages/tcp_ip/admin_switch.png" alt="admin interface web switch" />
			<p>On voit ici que le port 1 est dans le VLAN 1 alors que le port 5 est dans le VLAN 2. </p>
			<p>Il n'est pas impossible mais presque de se connecté à un autre VLAN . Cela s'appelle du VLAN hopping. Mais cette faille à été corrigé. </p>
		</figure>
	</article>
</section>
<section id="couche_3">
	<h1><u>La couche 3 protocole ip interconnexion entre réseau</u></h1>
	<article>
		<p>La couche 3 va donc me permettre de joindre n'importe quel réseau sur internet, en passant à travers d'autres réseaux. Ma connexion à une machine sur un autre réseau se fera à travers des réseaux, de proche en proche.</p>
		<p>Une adresse ip est codé sur 32 bits. Pour Calculer le nombre d'adresse possible dans une plage : $2^{Nbde0dans le masque}$ </p>
		<p>La toute première adresse de la plage est réservé pour le réseau lui-même et la toute dernière adresse qui correspond à (255.255.255.255) et réservé pour le broadcast (adresse pour toutes les machines sur le réseau)</p>
		<blockquote class="important_definition">
			<p>Pour calculer un masque de réseau On la première puissance de 2 supérieur.</p>
			<p>Si il me faut 550 adresse. La première puissance de 2 supérieur et $2^{10}$ qui fait 1024 adresse réservé car $2^9$ fait 512 adresse ce qui sera trop petit. </p>
			<p>Ensuite pour trouver la première et la dernière adresse de la plage on peut parmi tant d'autre utilisé la formule : </p>
			<p>On prend le premier octet du masque réseau différent de 255 et on pose 256-Le premier octet diffèrent . Le multiple de ce résultat supérieur à l'octet correspond sur l'adresse ip - 1 sera la dernière adresse (brodcast de la plage.</p>
		</blockquote>
		<p><strong><u>Nous pouvons illustrer ceci en utilisant la commande traceroute sous LINUX (ou tracert sous windows).</u></strong></p>
		<p><em>La commande traceroute permet d'indiquer par qu'elles machines nous passons pour aller d'un point à un autre sur internet.</em></p>
		<figure>
			<figcaption>Résultat possible avec la commande traceroute</figcaption>
			<pre><code># traceroute www.siteduzero.com
traceroute to www.siteduzero.com (92.243.25.239), 30 hops max, 40 byte packets
 1  labo.itinet.fr (10.8.97.1)  1.090 ms  1.502 ms  2.058 ms
 2  neufbox (192.168.1.1)  9.893 ms  10.259 ms  10.696 ms
 3  ivr94-1.dslam.club-internet.fr (195.36.217.50)  43.065 ms  43.966 ms  46.406 ms
 4  V87.MSY1.club-internet.fr (195.36.217.126)  42.037 ms  43.442 ms  45.091 ms
 5  TenGEC6-10G.core02-t2.club-internet.fr (62.34.0.109)  47.919 ms  48.333 ms  49.712 ms
 6  gandi.panap.fr (62.35.254.6)  52.160 ms  51.409 ms  52.336 ms
 7  po88-jd4.core4-d.paris.gandi.net (217.70.176.226)  54.591 ms  36.772 ms  36.333 ms
 8  vl9.dist1-d.paris.gandi.net (217.70.176.113)  39.009 ms  40.223 ms  40.575 ms
 9  lisa.simple-it.fr (92.243.25.239)  41.847 ms  44.139 ms  44.490 ms</code></pre>
		<p>Chacune des lignes correspond à une machine que nous avons rencontrée sur internet.</p>
		<p>A la ligne 1 : labo.itinet.fr (10.8.97.1) 1.090 ms 1.502 ms 2.058 ms nous avons rencontré la machine labo.itinet.fr en à peu près 2 millisecondes (rapide non !)</p>
		<p>Puis on voit à la ligne 2 que nous passons par une neufbox, et aux lignes 3, 4 et 5 par club-internet (Ce qui est normal puisqu'il s'agit de mon hebergeur).</p>
		<p>Nous voyons ensuite que nous passons par un certain gandi.net. C'est un registraire et hébergeur connu. Et d'après la ligne 8, on dirait bien que le site du Zéro est hébergé chez gandi.net, car c'est la dernière  étape 	jsute avant d'arriver au site du zéro qui est hébergé sur la machine lisa.simple-it.fr.</p>
		<p>Nous passons par beaucoup de machines avant d'atteindre le sit du zéro. Chacune de ces machines étant sur un réseau différent, nous passons par de nombreux réseau. Plus exactement, nous sommes passés par 9 réseaux pour rejoindre le site du zéro.</p>
		</figure>
		<h3><u>Pour communiquer entre réseau une adresse l'adresse IP :</u></h3>
		<p>Une adresse IP est codée sur 32 bits (soit 4 octets, car vous vous rappelez qu'un octet vaut 8 bits).</p>
		<blockquote cite="http://www.openclassroom.com">afin de simplifier la lecture d'adresse IP pour les humains, nous avons choisi d'écrire les adresses  avec notation en décimal pointée. Cette dernière sépare les 4 octets sous forme de 4 chiffres décimaux allant de 0 à 255. Cela donne par exemple : 192.168.0.1</blockquote>
		<p>La plus grande adresse IP et 255.255.255.255 et la plus petites et 0.0.0.0</p>
		<p><strong>Mais attention au niveau des ordinateurs et des différents matériels réseau manipulant les adresse IP, ces dernières sont manipulées en binaire(base 2).</strong></p>
		<p>Pour plus d'information <br />
		<a href="https://openclassrooms.com/courses/du-decimal-au-binaire">Tuto du decimal au binaire</a><br />
		<a href="https://openclassrooms.com/courses/les-calculs-en-binaire">Les calculs en binaire</a></p>
		<h3>Plus en détails le fonctionnement</h3>
		<h5>Les masques sous réseau</h5>
		<p>Nous allons en fait ajouter une information supplémentaire à l'adresse IP, le masque de sous-réseau.</p>
		<p>Une adresse IP représente l'adresse de la machine qui seras transmise à  la couche deux et l'adresse du réseau</p>
		<p>Afin de savoir qu'elle partie représente quoi il faut regarder le masque sous réseau.<strong>Le masque sous réseau et l'adresse IP sont indissociable</strong></p>
		<h4><strong>Définition : Les bits à 1 dans le masque représentent la partie réseau de l'adresse IP et les bits à 0 représentent la partie machine de l'adresse.</strong></h4>
		<p>Prenons un exemple : on associe l'adresse IP 192.168.0.1 au masque 255.255.0.0</p>
		<figure>
			<figcaption>Pour trouver quel partie représente le réseau et quel partie représente la machine on développe en binaire</figcaption>
			<blockquote>
				<p>255.255.0.0-&gt;11111111.11111111.00000000.00000000<br /></p>
				<p>192.168.0.1-&gt;11000000.10101000.00000000.00000001</p>
			</blockquote>
			<p>Il nous dit aussi que les bits à 0 représentent la partie machine de l'adresse. Donc 192.168, et la partie machine est 0.1. </p>
			<p>Cette exemple est très simple car la coupure se situe entre 2 octets. Or il arrive très souvent que la coupure se fasse en plein milieu d'un octet.</p>
		</figure>
		<h5>Le masque de sous-réseau et les difficultés associées...</h5>
		<p>Prenons un exemple en utilisant le masque : 255.255.240.0 et l'adresse IP 192.168.0.1</p>
		<p>Comme on peut s'en douter, la coupure entre les deux parties de l'adresse ne va malheureusement pas se faire entre deux octets distincts, mais bien en plein milieu d'un octet.</p>
		<p>Transformons ces deux nombres en binaire : </p>
		<blockquote>
			<p>192.168.0.1 -&gt; 11000000.10101000.00000000.00000001</p>
			<p>255.255.240.0 -&gt; 11111111.11111111.11110000.00000000</p>
		</blockquote>
		<p>Voici la partie machine : 0000.00000001 et voici la partie réseau 11000000.10101000.0000</p>
		<p>Dans un masque en binaire, il doit y avoir les 1 à gauche et les 0 à droite</p>
		<p>On ne peut pas mélanger les 1 et les 0.</p>
		<p>Ce masque est correct : 11111111.11110000.00000000.00000000</p>
		<p>ce masque n'est pas correct : 11111111.11100011.00000000.00000000</p>
		<p>Ainsi, on retrouvera toujours les mêmes valeurs pour les octets d'un masque, qui sont les suivantes : </p>
		<ul>
			<li>00000000-&gt;0</li>
			<li>10000000-&gt;128</li>
			<li>11000000-&gt;192</li>
			<li>11100000-&gt;224</li>
			<li>11110000-&gt;240</li>
			<li>11111000-&gt;248</li>
			<li>11111100-&gt;252</li>
			<li>11111110-&gt;254</li>
			<li>11111111-&gt;255</li>
		</ul>
		<p>Donc ce masque est correct: 255.255.128.0</p>
		<p>Celui-ci est incorrect : 255.255.173.0</p>
		<p>Celui-ci est incorrect également: 255.128.255.0(Car il mélange des 1 et des 0 128 au milieu)</p>
		<p>Avec le masque 255.255.240.0 et l'adresse IP 192.168.0.1</p>
		<p>Le masque nous apprend que la partie réseau de l'adresse IP est : 1100 0000.1010 1000.0000</p>
		<p>Et que la partie machine peut commencer à 0000.0000 0000 jusqu'à 1111.1111 1111</p>
		<p>Notre plage IP commence donc à l'adresse 192.168.0.0 et se termine à 192.168.15.255</p>
		<p><u>Pour calculer le nombre d'adresse que cela représente</u></p>
		<p>Pour faire ce calcul on va prendre le nombre de bit de la partie machine soit dans exemple : 12 puisque la partie machine représente les zéro du masque 255.255.240.000 soit 1111 1111.1111 1111.1111 0000.0000 0000</p>
		<p>Il y a douze 0 en sachant qu'il y à deux possibilité par bit on fait l'opération $2^{12}$ </p>
		<p><strong>Voici la formule $2^{nb de 0 dans le masque}$ et égale au nombre d'adresse possible</strong></p>
	</article>
</section>
<section id="routage">
	<h1><u>Le routage </u></h1>
	<article>
		<p>Nous verrons notamment : </p>
		<ul>
			<li>comment sont organisées les données au niveau de la couche 3.</li>
			<li>quel matériel est nécessaire pour communiquer d'un réseau à un autre</li>
			<li>comment les machines dialoguent d'un réseau à un autre</li>
		</ul>
		<h3>Un Protocol IP</h3>
		<p>Ainsi nous savons maintenant dialoguer sur notre réseau local grâce à la couche 2.</p>
		<blockquote class="important_definition">
			<p>Pour Rappel, un protocole est un langage. Il permet aux machines qui dialoguent ensemble de se comprendre.</p>
		</blockquote>
		<p>Pour la couche 3 du modèle OSI, c'est le protocole IP, ou Internet Protocol.</p>
		<p>Comme pour la couche 2, nous allons devoir définir de quelles informations nous allons avoir besoin, et dans quel ordre les placer.</p>
		<p>Déjà nous pouvons nous douter que nous allons avoir l'adresse IP de l'émetteur ainsi que celle du récepteur.</p>
		<p>Néanmoins, il va y avoir beaucoup d'autres informations.</p>
		<p>Dans un premier temps, nous n'allons voir que celles qui nous intéressent, et nous ajouterons petit à petit les autres éléments de l'en-tête IP.</p>
		<ul>
			<p>Nous avons donc : </p>
			<li>adresse IP émetteur.</li>
			<li>adresse IP destinataire.</li>
		</ul>
		<blockquote class="question">
			<p>Toutefois, nous avons dit que l'adresse IP devait toujours être accompagnée du masque; Va-t-on avoir le masque aussi dans l'en-tête IP ?</p>
		</blockquote>
		<p>La question à laquelle il va falloir répondre est surtout : est-il nécessaire de connaître le masque d'une machine pour lui envoyer un message?</p>
		<p>Pour y répondre, mettons-nous dans la peau d'une machine qui veut envoyer un message à une autre.</p>
		<p>Nous sommes la machine A qui a pour adresse 192.168.0.1/24 et nous souhaitons envoyer un message à une machine B d'adresse 192.168.1.1/24.</p>
		<p>Ce qui est important pour moi, en tant que machineA, c'est de savoir si la machine B est sur mon réseau. En effet, si elle est sur mon réseau, je lui parlerai grâce à la couche 2. Si elle est sur un autre réseau, il faudra que je fasse appel à la couche 3.</p>
		<p>Pour savoir si la machine B est sur mon réseau. Je regarde la plage d'adresse de mon réseau, et si l'adresse de la machine B appartient à cette plage.</p>
		<p>Pour l'exemple ma plage d'adresse va de 192.168.0.0 à 192.168.0.255. Elle ne contient donc pas l'adresse de la machine B (192.168.1.1).</p>
		<p>Il va donc falloir utiliser la couche 3 pour communiquer avec la machine B.</p>
		<p>Nous allons donc avoir, comme pour la trame de couche 2, un format de message défini par le protocole IP.</p>
		<p>Pour le protocole IP, le message s'appelle un datagramme ou un paquet.</p>
		<h4>Le datagramme</h4>
		<p>Voici la forme qu'il va prendre : </p>
		<table><tr><td>???</td><td>Adresse IP SRC(source)</td><td>Adresse IP DEST(destination)</td><td>Données à envoyer</td></tr></tbody></table>
		<p>Datagramme IP : </p>
		<p>Nous voyons ici que le format général est  proche de celui de la trame Ethernet, mais que les informations contenues sont diffèrentes et dans un ordre diffèrent.</p>
		<p>Si les données ne sont pas dans le même ordre notamment l'addresse source et l'adresse de destination que dans la couche 2 c'est tous simplement que la couche 2 sera lu avant la couche 3 et que dans ce cas l'ordre des données n'a plus la même importance.</p>
		<p>On appelle cela <strong>L'encapsulation</strong></p>
		<p>Pour bien comprendre revoici la schéma du modèle OSI : </p>
		<img src="pages/tcp_ip/shemeOSI.png" alt="shema OSI" style="border-radius: 0px; margin-left: 47%"/>
		<p>Plus précisément, la figure suivante illustre l'envoi ou la réception d'une information.</p>
		<img src="pages/tcp_ip/shemeOSI2.png" alt="schema envoie donne OSI" style="border-radius: 0px; margin-left: 35%"/>
		<p>Comme nous le voyons, un message est envoyé depuis la couche 7 du modèle OSI, et il traverse toutes les couches jusqu'à arriver à la couche 1 pour être envoyé sur le réseau.</p>
		<p>Un en-tête va être ajouté à chaque passage par une couche. On va ainsi accumuler les en-têtes des différentes couches(voir la figure suivante).</p>
		<img src="pages/tcp_ip/shemeOSI3.png" alt="shema encapsulation OSI" style="border-radius: 0px; margin-left: 25%"/>
		<p>Au passage par la couche 4, on ajoutera l'en-tête de couche 4, puis celui de couche 3 en passant par la couche 3, etc...</p>
		<p>Nous voyons clairement qu'au final, ce qui va circuler sur le réseau est une trame de couche 2, qui contient le datagramme de couche 3 (qui lui-même contiendra l'élément de couche 4).</p>
		<table><tr><td>Adresse MAC DST</td><td>Adresse MAC SRC</td><td>Protocole de la couche 3</td><td>Données à envoyer</td><td>CRC</td></table>
		<p>Je nous avait pas dit que dans les données à envoyer, il y avait en fait l'en-tête de couche 3, l'en-tête de couche 4, puis enfin, les données à envoyer.</p>
		<table><tr><td>Adresse MAC DST</td><td>Adresse MAC SRC</td><td>Protocole de couche 3</td><td>en-tête de couche 3</td><td>en-tête de couche 4</td><td>Données à envoyer</td><td>CRC</td></tr></table>
		<p>Pour illustrer les exemples suivants c'est <a href="https://www.wireshark.org/" class="infobull">le logiciel wireshark<span >Télécharger le logiciel</span></a></p>
	</article>
</section>
