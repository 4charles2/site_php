
<section id="top_page">
	<h1><u>Utilisé git et github pour la sauvegarde et le versioning des ces codes</u></h1>
	<article>
		<h1><u>Voici les commandes disponible sur terre :</u></h1>
		<ul>
			<li><a href="#compte">Création d'un compte</a></li>
			<li><a href="#exclude">Exclure des dossiers ou fichiers depuis le fichier de configuration</a></li>
			<li><a href="#branch">Git branch creer, lister les branches, fusionner, changer de branche</a></li>
			<li><a href="#command_basic">Les commandes basic de git</a></li>
		</ul>
	</article>
</section>

<section id="exclude">
	<h1><u>Liste des noms a exclure de l'index</u></h1>
	<article>
		<p>On peut exclure des fichiers grâce au fichier .gitignore ou exclude qui se trouve dans le dossier .git/info/
		grace à la variable core.excludesFile ou dans ~/.gitconfig</p>
		<p>Soit en indiquant le chemin soit avec des expressions rationnelle</p>
		<p>Voici un exemple de fichier qui ne exclu les fichiers qui commence par une lettre quelconque suivi d'un o ou a puis les fichiers qui se termine par un ~ et le fichier bdd.connexion.php<pre><code>
&gt;# git ls-files --others --exclude-from=.git/info/exclude
&gt;# Lines that start with '#' are comments.
&gt;# For a project mostly in C, the following would be a good set of
&gt;# exclude patterns (uncomment them if you want to use them):
&gt;*.[oa]
&gt;*~
&gt;bdd/connexion.php
		</code></pre></p>
		<p>Cette exclution et valable uniquement dans le dossier courant de git si on veut que cela s'applique à tous les dépôts de l'utilisateur en cours alors aller modifier le fichier dans ~/.gitconfig</p>
	</article>
</section>

<section id="compte">
	<h1><u>Créer un compte afin de pouvoir utiliser github</u></h1>
	<article>
		<p>Pour utiliser git il vous faut un compte sur le site internet github.com afin d'obtenir un espace de stockage gratuitement si vous voulez que votre code soit public ou payant afin de le rendre invisible au public</p>
	</article>
</section>

<section id="branch">
	<h1><u>Creer, Lister, fusionner, changer de branche avec git</u></h1>
	<article>
		<p><u>Pour créer une branche et y basculer tout de suite :</u></p>
		<p>La commande <code>&gt;git checkout -b nomDeBranche</code></p>
		<p>Cette commande est un raccourci de <code>&gt;git branch nomDeBranch</code> qui créer une branche et 
			<code>&gt;git checkout nomdeBranch</code> qui sélectionne le nom de la branch fournie en argument</p>
		<p>Pour qu'il n'y pas de probleme entre basculement de branche il faut s'assurer que notre copie de travail en local soit propre</p>
		<p>Les fichiers et dossiers dans le dépôt local seront automatiquemet mise à jour lors d'un basculement d'une branche à l'autre</p>
		<p><u>Pour Basculer d'une branche à l'autre</u></p>
		<p>Pour obtenir la liste des branch existantent la commande <code>&gt;git branch</code> </p>
		<p>Pour changer de branch git checkout nomDeBranch indique a head de pointer vers la branche fournie en argument.</p>
		<p><u>Pour fusionner deux branches enssemble : </u></p>
		<p>Une fois les modifications effectuées la fusion. se deplacer sur la branch master et executer la commande git merge nomDeBranch</p>
		<p>Si la branche fusionné ne sert plus alors la suprimé avec la commande <code>&gt;git branch -d nomDeBranch</code></p>
		<p>Si ont souhaite rapatrié la branche dans une autre branche faire la fusion de puis la branche devant recevoir la modif</p>
		<p><u>Les conflits de fusion : </u></p>
		<p>Si vous avez modifié différemment la même partie du même fichier dans les deux branches que vous souhaitez fusionner, Git ne 
		sera pas capable de réaliser proprement la fusion.</p>
		<p>Dans ce cas vous aurez un message d'erreur qui ressemble à ceci : <pre><code>
&gt;Auto-merging nomDuFichier
&gt;CONFLICT (content): Merge conflict in nomDuFichier
&gt;Automatic merge failed; fix conflicts and then commit the result.
		</code></pre></p>
		<p>Git n'à pas créer automatiquement le git de fusion. Il a arrêté le processus le temps que vous résolviez le conflit. Lancez git status
		pour voir à tout momment après l'apparition du conflit de fusion quels fichiers n'ont pas été fusionnés:</p>
		<p>Message de git status après une erreur de fusion : <pre><code>
&gt;[master*]$ git status
&gt;nomDuFichier: needs merge
&gt;# On branch master
&gt;# Changes not staged for commit:
&gt;#   (use "git add &lt;file&gt;..." to update what will be committed)
&gt;#   (use "git checkout -- &lt;file&gt;..." to discard changes in working directory)
&gt;#
&gt;#   unmerged:   nomDuFichier
&gt;#
		</code></pre></p>
		<p>Tout ce qui comporte des conflits de fusion et n'a pas été résolu est listé comme unmerged. Git ajoute des marques de conflits standard das les fichiers qui comportent des conflits, pour que vous puissiez les ouvrir et résoudre les conflits manuellement. Votre fichiers contient des sections qui ressemblent à ceci :</p>
		<p><pre><code>
&gt;&lt;&lt;&lt;&lt;&lt;&lt;&lt; HEAD:nomduFichier
&gt;&lt;div id="footer"&gt;contact : email.support@github.com&lt;/div&gt;
&gt;=======
&gt;&lt;div id="footer"&gt;
&gt;  please contact us at support@github.com
&gt;  &lt;/div&gt;
&gt;  &gt;&gt;&gt;&gt;&gt;&gt;&gt; nomDeBranch:nomduFichier
		</code></pre></p>
		<p>Cette résolution comporte des parties de chaque section et des lignes &lt;&lt;&lt;&lt;&lt;&lt;&lt;, ======= et &gt;&gt;&gt;&gt;&gt;&gt;&gt; ont été complètement effacées. Après avoir résolu chacune de ces sections dans chaque fichier comportant un conflit, lancez git add sur chaque fichier pour le marquer comme résolu. Placer le fichier dans l'index marque le conflit comme résolu pour Git. SI vous souhaitez utiliser un outil graphique pour résoudre ces problèmes, vous pouvez lancer git mergetool qui démarre l'outil graphique de fusion approprié et vou spermet de naviguer dans les conflits : </p>
		<p><pre><code>
&gt;$ git mergetool
&gt;
&gt;This message is displayed because 'merge.tool' is not configured.
&gt;See 'git mergetool --tool-help' or 'git help config' for more details.
&gt;'git mergetool' will now attempt to use one of the following tools:
&gt;opendiff kdiff3 tkdiff xxdiff meld tortoisemerge gvimdiff diffuse diffmerge ecmerge p4merge araxis bc3 codecompare vimdiff emerge
&gt;Merging:
&gt;nomDuFichier.format
&gt;
&gt;Normal merge conflict for 'nomDuFichier.format'
&gt;  {local}: modified file
&gt;    {remote}: modified file
&gt;	Hit return to start merge resolution tool (opendiff):
		</code></pre></p>
		<p>SI vous souhaitez utiliser un outil de fusion autre que celui par défaut, vous pouvez voir tous les outils supportés après l'indication of the following tools. Tapez le nom de l'outil que vous préfèreriez utiliser.</p>
		<p>Après avoir quitté l'outil de fusion, Git vous demande si la fusion a été réussie. Si vous répondez par la positive à l'outil, il indexe le fichier pour le marquer comme résolu.</p>
		<p>Vous pouvez lancer à nouveau la commande git status pour vérifier que tous les conflits ont été résolus : </p>
	</article>
</section>

<section id="command_basic">
	<h1><u></u></h1>
	<article>
		<p>Voici une liste des commandes !</p>
		<ul>
			<li>git init : Pour initialiser un dépôt git</li>
			<li>git status pour connaître le status des fichiers en local par rapport au dépôt git</li>
			<li>git add : pour ajouter les fichiers dans l'index de suivi</li>
			<li>git commit : Pour préparer l'envoie des fichiers sur le dépôt avec un log (description et détail de horodatage) </li>
			<li>git push origin master : pour envoyer les fichiers sur le dépôt distant</li>
		</ul>
	</article>
</section>
