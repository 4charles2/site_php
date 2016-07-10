
<section id="top_page">
	<h1><u>Manipulation de l'agent SSH et sécurisation ! </u></h1>
	<article>
		<ul>
			<li><a href="#config">Configurer son ssh</a></li>
	</article>
</section>
<section id="config">
	<h1><u>Configurer son fichier .ssh ou ssh_config</u></h1>
	<article>
		<h3>Pour configurer son ssh deux possibilé : </h3>
		<ol>
			<li>Vous êtes root dans le fichier : /etc/ssh/ssh_config</li>
			<li>Vous n'êtes pas root dans le fichier : ~/.ssh/config</li>
		</ol>
		<p>afin de sécurisé notre connexion ssh et ainsi ne pas être vulnérable aux attaque par force brut sur le compte root via connexion ssh.</p>
		<p>On va interdire la connexion ssh  au compte root avec la ligne : </p>
		<pre><code>PermitRootLogin no</code></pre>
		<p>On peut également n'autoriser la connexion qu'à une d'utilisateur avec la ligne : </p>
		<pre><code>
AllowUsers utilisateur1 utilisateur2@machine utilisateur3 ...
		</code></pre>
		<p>On peut faire la même chose pour un groupe d'utilisateur : </p>
		<pre><code>
AllowGroups sshusers
		</code></pre>
		<p>Il peut aussi être bien de changer le port par défaut. </p>
		<p>De mettre en place le fail2ban qui disconnect l'agent ssh au bout d'un certains nombre d'essais de connexion infructueux (indiquer dans le fichier de config)</p>
		<p>Il y a aussi le port-knocking qui est une méthode permettant de modifier le comportement d'un firewall en temps réel pour provoquer l'ouverture d'un port suite au lancement préalable d'une suite de connexions sur des ports distincts dans le bon ordre, à l'instar d'un code frappé à une porte. Installer le paquet knockd</p>
	</article>
</section>
