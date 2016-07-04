
<section id="top_page">
	<h1><u>Le réseau TCP/IP</u></h1>
	<article>
		<ul>
			<li><a href="#OSI">Modele OSI et TCP/IP (Les couches)</a></li>
			<li><a href="#couche_1">La couche 1 brancher les machine</a></li>
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
				<th>Function</th>
			</tr>
			<tr >
				<td rowspan=4>Couches haute</td>
				<td rowspan="3" bgcolor="#d8ec9b">Donnée</td>
				<td bgcolor="#d8ec9b">7</td>
				<td bgcolor="#d8ec9b">Application</td>
				<td bgcolor="#d8ec9b">Point d'accés aux services réseau</td>
				<tr bgcolor="#d8ec9b">
					<td>6</td>
					<td>Présentation</td>
					<td>Gère le chiffrement et le déchiffrement des données, convertit les données machine en données exploitables par n'importe quelle autre machine</td>
				</tr>
				<tr bgcolor="#d8ec9b">
					<td>5</td>
					<td>Session</td>
					<td>Communication Interhost, gère les sessions entre les diffèrentes applications</td>
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
			<li>Rôle : conecter les machines entre elles sur un réseau local.</li>
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
		<p>Voici un shéma qui explique le fonctionnement des communications sur le réseaux
		<img src="pages/tcp_ip/schema_protocoles.png" alt="shema des protocole tcp ip" ></p>
		<p>Ces applications sont les suivantes : </p>
		<ul>
			<li>FTP : Protocole de transfert de fichiers</li>
			<li>HTTP : Protocole HTTP (Hypertext Transfert Protocol)</li>
			<li>SMTP : Protocole SMTP (Simple Mail Transfert Protocol)</li>
			<li>DNS : Système DNS (Domaine Name Systm)</li>
			<li>TFTP : Protocole TFTP (Trivial File Transfert Protocol) comme ftp mais fonctionne en UDP alors ftp en tcp/ip</li>
		</ul>
		<p>Le modèle TCP/IP met l'accent sur une soupesse maximale, au niveau de la couche application, à l'intention des développeurs de logiciels. La couche transport fait appel à deux protocoles : le protocole TCP (protocole de trasmission) et le protocole UDP (User datagram Protocol). La couche inférieur, soit la couche d'accés au réseau, concerne la technologie LAN ou WLAN utilisée.</p>
		<p>Dans le modèles TCP/IP IP est le seul et unique protocole utilisé, et ce, quels que soit le protocole de transport utilisé et l'application qui demande des services réseau. Il s'agit là d'un choix de conception délibéré. IP est un protocole universel qui permet à tout ordinateur de communiquer en tout temps et en tout lieu.</p>
		<p>Voici un shéma de comparaison des modèles TCP/IP et OSI</p>
		<img src="pages/tcp_ip/comparaison_modele_tcp_ip_et_osi.png" alt="scheme de comapraison entre OSI et TCP IP" />
		<ul>
			<h3><u>Les Similitudes :</u></h3>
			<li>Tous deux comportent des couches</li>
			<li>Tous deux comportent une couche application, bien que chacune fournisse des services très différents</li>
			<li>Tous deux comportent desc ouches réseau et transport comparables</li>
			<li>Tous deux supposent l'utilisation de la technologie de communication de paquets (et non de communication circuits)</li>
			<li>Les professionnels des réseaux doivent connaître les deux modèles</li>
		</ul>
		<ul>
			<h3><u>Les Diffèrences : </u></h3>
			<li>TCP/IP intégre la couche présentation et couche session dans sa couche application</li>
			<li>TCP/IP regroupe les couches physiques et liaison de données OSI au sein d'une seule couche</li>
			<li>TCP/IP semble plus simple, car il comporte moins de couches</li>
			<li>Les protocoles TCP/IP constituent la norme sur laquelle s'est développé Internet. Aussi, le modèle TCP/IP a-t-il bâti sa réputation sur ses protocoles. En revanche, les réseaux ne sont généralement pas architectures autour du protocole OSI, bien le modèle OSI puisse être utilisé comme guide.</li>
		</ul>
		<ol>
			<h3><u>Caracteristiques resume des couches : </u></h3>
			<li>La couche 1 physique est chargée de la transmission effective des signaux entre les interlocuteurs. Son service est limité à l'émission et la réception d'un bit ou d'un train de bit continu (notamment pour les supports synchrones (concentrateur)).</li>
			<li>La couche 2 liaison de données à gère les communications entre 2 machines directement connectées entre elles, ou connectées à un équipement qui émule une connexion directe (commutateur).</li>
			<li>La couche 3 réseau gère les communications de proche en proche, généralement entre machines : routage et adressage des paquets (cf. note ci-dessous).</li>
			<li>La couche 4 transport gère les communications de bout en bout entre processus (programmes en cours d'exécution).</li>
			<li>La couche 5 session gère la synchronisation des échanges et les transactions, permet l'ouverture et la fermeture de session.</li>
			<li>La couche 6 présentation est chargée du codage des données applicatives, précisèment de la conversion entre données manipulées au niveau applicatif et chaînes d'octets effectivement transmises.</li>
			<li>La couche 7 application est le point d'accés aux services réseaux, elle n'a pas de service propre spécifique et entrant dans la portée de la norme.</li>
		</ol>
		<ul>
			<h3>Ce qu'il faut retenir</h3>
			<li>Le modèle OSI est une norme précisant comment les machines doivent communiquer entre elles.</li>
			<li>C'est un modèle théorique, le modèle réellement utilisé étant le modèle TCP/IP.</li>
			<li>Le modèle OSI possède 7 couches.</li>
			<li>Chaque couche a son rôle particulier à accomplir.</li>
			<li>Les couches 1 à 4 sont les couches réseau.</li>
			<li>Les couches réseau offrent le service de communication à la couche applicative.</li>
			<li>Chaue couche est indépendante des autres.</li>
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
		<p>Le rôle principal de la couche 1 est de fournir le support de transmission de la communication.</p>
		<p>La couche 1 aura donc pour but d'acheminer des signaux électriques, des 0 et est des 1 soit par câble ethernet ou wiffi.</p>
		<p>Les 0 et les 1 vont circuler grâce aux diffèrents support de transmission.</p>
		<ul>
			<h3><u>Les matériaux, câbles, etc ... : </u></h3>
			<li> Les câbles coaxiaux : <br />
			<img src="pages/tcp_ip/258382.gif" alt="schema cable coaxial"/>
			Le principe est de faire circuler le signal électrique dans le fil de données central. On se sert du maillage de masse, autrement appelé grille, pour avoir un signal de réfèrence à 0v. On obtient le signal électrique en faisant la diffèrence de potentiel entre le fil de données et la masse.<br /> Le nom scientifique donné au câble coaxial est 10B2 ou 10B5 .<br />
				<ul>
					<li>Le 10 indique le débit en Mbps(mégabits par seconde);</li>
					<li>Le B indique la façon de coder les 0 et les 1, soit ici la bande de Base;</li>
					<li>Le dernier chiffre indique la taille maximale du réseau, exprimée en mètre et divisé par 100.</li>
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
								<li>Pour créer le réseau, on mettait un bouchon sur un côté du té, une carte réseau sur le deuxieme côté (celui du milieu) et un câble sur la dernière prise. L'autre extrémité du câble était branché sur un autre té, et ainsi de suite jusqu'à la fermeture du réseau par un bouchon.<br /> Voici une figure d'exemple de connexion sur un té : <br /><img src="pages/tcp_ip/connexion_te.jpg" alt="figure connexion te"/><br />Et voici le réseau complet sur la figure suivante : <br /><img src="pages/tcp_ip/reseau_coxial_10B2.gif" alt="figure reseau coaxial 10B2" /></li>
							</li>
						</ul>
					</li>
				</ul>
			</li>
			<li>La paire torsadé : <br />
				Le câble à paire torsadées n'est plus un câble coaxial. Il n'y a plus un unique fil dans le câble mais 8 !<br />
				Il sont torsadé deux à deux par paires. D'ou son nom paire torsadé.<br /> Voici une figure : <br /><img src="pages/tcp_ip/cable_paire_torsade.jpg" alt="figure du câble paire torsade" /><br />
				A l'heure actuel nous utilisons deux paires de fils soit 4 fils. Une paire pour recevoir l'info et une paire pour envoyé l'information. Les peuvent être utilent dans l'avenir.<br />
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
				<strong>Ce branchement ne fonctionnera pas car nous avons une paire pour la reception et une paire pour la transmission.</strong><br />
				Hors dans notre schéma la transmission de la machine A et en relation avec la transmission de la machine B et la reception de la machine A et en relation avec la reception de la machine B.<br />
				Un shéma pour mieux comprendre. Tx (transmission et Rx reception) + données et - masse<br />
				<img src="pages/tcp_ip/schema_error_branchement_RJ45.png" alt="schema explicatif de l'erreur de branchement RJ45" /><br />

				Pour résoudre ce probleme il nous faut une prise RJ45 croisé. pour que la transmission de la machine A soit en relation avec la reception de la machine B. Comme sur la figure suivante : <br />
				<img src="pages/tcp_ip/RJ45_croise.png" alt="sch�ma de RJ45 crois�" /><br />
				Il est cependant possible d'utiliser un câble non croisé dans certain cas comme : 
				<ul>
					<li>La prise femelle possède déjà ses connexions transmission et réception inversées.</li>
					<li>Les prises femelles des deux machines interconnecté sont capables de s'adapter et d'inverser les connexions de transmission et réception si besoin.</li>
				</ul>
				Comme dans cette exemple : <br />
				<img src="pages/tcp_ip/inverse_machine_t_r.png" alt="sch�ma inversion de transmission et reception par les machines" /><br />
				Sa fonctionne sur tous matériels récent. Mais dans le cas d'un matériel ancien pour savoir si il faut utiliser du droit ou du croisé il y à une règle. <strong>Je doit utiliser un câble croisé pour connecté deux matériaux de même type.</strong><br />
				Par exemple deux ordinateur, ou deux imprimante 				Par contre, si l'on veut connecter un ordinateur et une imprimante, il va faloir créer deux catégorie.
				<ul>
					<li>Le matériel de connexion : <br />
					Les matériels de connexion sont ceux qui servent à connecter plusieurs machines entre elles, comme les hubs ou les switchs. Voici deux images qui les représentes.<br />
					<figure><img src="pages/tcp_ip/hub.png" alt="un hub" /><figcaption>un Hub</figcaption></figure><br />
					Un hub (concentrateur en français) envoye toutes les informations qu'il reçoit à toutes les machines connecté au hub<br />
					C'est pas le top pour la confidentialité.<br />
					<figure><img src="pages/tcp_ip/switch.png" alt="un switch" /><figcaption>un Switch</figcaption></figure><br />
					</li>
					<li>Le matériel connecté.</li>
					Il représente tous le reste : ordinteur, imprimante, routeur
				</ul>
				La paire torsadé sera remplacé par la fibre optique au fur et à mesure mais ce n'est pas pour tout de suite le remplacement total
			</li>
			<br />
			<li>La Fibre Optique : 
				<p>Avec la fibre optique on transporte des 1 et 0, non plus avec de l'électricité mais avec de la lumière.</p>
				<p>Le nom scietifique de la fibre optique et 1000BF, Du gigabit avec le F pour fibre</p>
				<ul>Il existe aujourd'hui globalement  deux types  de fibre :
					<li>La fibre monomode : 
						<p>La monomode fait passer une seule longueur d'onde luminineuse, soit une seul  couleur. Elle fonctionne avec du laser 
							soit vert, bleu, rouge ...</p>
					</li>
					<li>la fibre multimode
						<p>La multimode fonctionne avec de la lumière blanche, et donc toutes les longueurs d'ondes (la lumiere blanche et la somme de toutes les lumières possibles, comme celle du soleil</p>
					</li>
				</ul>
				<p>La diffèrence entre les deux se situe sur le débit et la distance parcouru.
					La fibre monomode est beaucoup plus performante sur ces deux points.</p>
			</li>	
		</ul>
	</article>
</section>
