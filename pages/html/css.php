<section id="css">
	<h1><u>Momento css3 : </u></h1>
	<article>
		<p><strong>Pour la mise en page du site internet.</strong></p>
		<ul>
			<li><a href="#border">Les bordures css3</a></li>
			<li><a href="#shadow_box">Les box_shadow (ombrage de bordure) </a></li>
			<li><a href="#text_shadow">La propriété text-shadow</a></li>
			<li><a href="#modif_apparence">Changer l'apparence d'un élément suivant un évennement</a></li>
			<li><a href="#overflow">Régler le dépassement de texte des blocks (overflow)</a></li>
			<li><a href="#media_query">Les média querys pour un site responsive (selon la taille de l'écran de l'utilisateur)</a></li>
		</ul>
	</article>
</section>

<section id="media_query">
	<h1><u>Utiliser les médias query pour adapté la mise en forme selon les dimmenssions de l'écran de l'utilisateur.</u></h1>
	<article>
		<p>Il y à diffèrentes méthode d'application des média querry soit en chargeant une feuille de style diffèrentes selon la taille de l'écran ou alors en chargeant uniquement certaine propriété css dans le fichier css par défaut</p>
		<h3><u>Première technique : En chargeant une feuille de style diffèrente</u></h3>
		<p>Pour cela on place une requete de media dans la balise link qui se chargera si cette requête et rempli</p>
		<p>Voici un exemple : <code>&gt;&lt;link rel="stylesheet" media="screen and (max-width: 1280px)" href="petite_resolution.css"/&gt;</code>
		<h3><u>Deuxième technique pour en chargeant directement les règles depuis le fichier css par defaut</u></h3>
		<p>Pour ce faire on place la requete directement dans le fichier css comme ceci : <code>&gt;@media screen and (max-width: 1280px) { écrire les nouvelles propriété css }</code>
		<p>Voici les diffèrentes règles qui éxistent : </p>
		<ul>
			<li>color : gestion de la couleur (bit/pixel)</li>
			<li>height : Hauteur de la zone d'affichage</li>
			<li>width : Largeur de la zone d'affichage</li>
			<li>device-height : Hauteur du pérophérique</li>
			<li>device-width : Largeur du périphérique</li>
			<li>orientation : Orientation du péréphérique (paysage ou portrait)</li>
			<li>Média : (Voici quelque unes des valeurs possibles) 
				<ul>
					<li>screen : écran classique</li>
					<li>handled : périphérique mobile</li>
					<li>print : impression</li>
					<li>tv : télévision</li>
					<li>projection : projecteur</li>
					<li>all : Tous les types d'écrans</li>
				</ul>
			</li>
		</ul>
		<p>On peut rajouté devant pratiquement tous les noms précédents les préfixes min- ou max-</p>
		<p>Voici un liste d'exemple :</p>
		<p><pre><code>
&gt;@media screen and (max-width: 1280px)
#Pour les écrans classique d'une taille maximum 1280px
&gt;@media all and (min-width: 1024px) and (max-width: 1280px)
#Pour tous les types d'écran qui ont une taille entre 1024px et 1280px
&gt;@media tv
#Pour les écrans de téléviseurs
&gt;@media all and (orientation: portrait)
#Pour tous les types d'écrans en orientation portrait</code></pre></p>
		<p>Les règles peuvent être définie par les règles suivantes : </p>
		<ul>
			<li>only : uniquement</li>
			<li>and : et</li>
			<li>not : non</li>
		</ul>
	</article>
</section>

<section id="modif_apparence">
	<h1><u>Pour modifier l'apparence d'un élément suivant un type d'évennement :</u></h1>
	<article>
		<h3><u>Lors du survol (hover) d'un élément :</u></h3>
		<p>Voici un exemple avec le survol d'un lien : <code>&gt;a:hover</code></p>
		<p>Pour modification de style dynamiquement prorpiété à l'éxtérireur de la balise html</p>
		<p><a id="lien_hover" href="#" >Mon lien</a> Ce lien possède la propriété : <code>&gt;hover color: red; </code></p>
		<p id="paragraphe_hover">Ce lien devient rouge et reste souligné quand on le survol. Mais il est également possible d'appliquer cette solution à d'autre élement que des liens comme par exemple ce paragraphe qui possède la propriété suivante : <code>&gt;#paragraphe_hover:hover{ color: green; box-shadow: 8px 8px 1px black; border: 1px solid black; text-shadow: 3px 3px 1px; background-color: white; }</code></p>
		<h3><u>Lors de la sélection (Momment du clic) </u></h3>
		<p>Le pseudo format :active permet la modification de m'apparence lors de la sélection</p>
		<p>Pour modifier la couleur de fond lorsque le visiteur clique sur un lien : </p>
		<p>Exemple : <a id="lien_active" href="" >Monlien qui change de background</a> Ce lien possède les propriété css3 suivante<code>&gt;a:active{ background-color:  #FFCC66; }</code></p>
		<h3><u>Lorsque l'élément possède le focus </u></h3>
		<p>Le pseudo-format :focus désigne lorsque l'élément est séléctionner.</p>
		<p>Comme par exemple Sur ce paragraghe qui lorsqu'il est séléctionné devient propriétaire des propriétés css3 suivante : <a href="" id="paragraphe_focus" >Le lien qui possède le focus</a><code>&gt;#paragraphe_focus:focus{ background-color: white; border radius: 15 px ; box-shadow: 6px 6px 0px gray; border: 1px solid black; }</code></p>
		<h3><u>Lorsque qu'un élement à déjà été visité</u></h3>
		<p>Ont peut changer l'apparence lorsque qu'un élement à déjà été visité</p>
		<p>Exemple avec ce lien <a href="" id="lien_visited">Le Lien déjà visiter</a> qui une fois qu'il à été visité prend les propriété suivante : 
			<code>&gt;#lien_visited:visited{ color: #AAA; }</code>
	</article>
</section>

<section id="overflow">
	<h1><u>Régler le dépassement de texte des diffèrents éléments : (overflow)</u></h1>
	<article>
		<p>La propriété overflow permet d'empêcher le texte de dépasser des élements. Elle peut prendre comme valeur : </p>
		<ul>
			<li>visible(par défaut): Si le texte dépasse alors il reste volontairement visible en dépassant l'élément </li>
			<li>hidden(caché): Le texte qui dépasse sera tous simplement coupé on ne pourra pas voir le texte qui dépasse.</li>
			<li>scroll: Le texte sera coupé mais le navigateur mettra en place une barre de défilement afin de pouvoir naviguer dans le texte et ainsi voir tous le texte même celui qui dépasse.</li>
			<li>auto: c'est le navigateur qui decide il est utile de mettre des barres de defilement</li>
		</ul>
		<p><u>Pour la cesure des mots</u></p>
		<p>word-wrap Permet la coupure des longs mots comme des adresses http ou autre</p>
	</article>
</section>

<section id="shadow_box">
	<h1><u>La propriété box-shadow pour appliqué des ombres au bloc !</u></h1>
	<article>
		<p>La propriété css box-shadow prend quatre valeurs dans l'odre suivant : </p>
		<ul style="box-shadow: 6px 6px 0px black; border: 1px solid black">
			<li>Le décalage horizontale de l'ombre</li>
			<li>Le décalage verticale de l'ombre</li>
			<li>L'adoucissement du dégradé</li>
			<li>La couleur de l'ombre</li>
			<li>Falcultatif option de l'effet</li>
		</ul>
		<p>Exemple d'application sur la liste précédente <code>&gt;box-shadow: 6px 6px 0px black;</code></p>
	</article>
</section>

<section id="text_shadow">
	<h1><u>Appliquer de l'ombre au caracrtère </u></h1>
	<article>
		<p style="text-shadow: 2px 2px 4px green;">Ce texte est écrit avec la propriété css <code>&gt;text-shadow: 2px 2px 4px green</code></p>
		<p style="text-shadow: 2px 2px 0px green;">Ce texte est écrit avec la propriété css <code>&gt;text-shadow: 2px 2px 0px green</code></p>
	</article>
</section>

<section id="border">
	<h1><u>Pour appliquer des bordures : </u></h1>
	<article>
		<p>Ils existent plusieurs possibilités pour appliquer des bordures : </p>
		<p>Il y à les propriétés css dont voici quelques unes</p>
		<ul>
			<li>border-color</li>
			<li>border-width</li>
			<li>border-style</li>
		</ul>
		<p>Il y à la propriété border qui regroupe les propriétés :</p>
		<ul>
			<li>La largeur : Taille en px</li>
			<li>La couleur : rgb() ou nom ou format #hexa</li>
			<li>Le type de bordure : (types existants) 
				<ul>
					<li>none : pas de bordure(par défault)</li>
					<li style="border: 2px solid black">solid : un trait simple</li>
					<li style="border: 2px dotted black">dotted : pointillés</li>
					<li style="border: 2px double black">double : bordure double</li>
					<li style="border: 2px groove black">groove : en relief</li>
					<li style="border: 2px ridge black">ridge : autre effet relief</li>
					<li style="border: 2px inset black">inset : effet 3d global enfoncé</li>
					<li style="border: 2px outset black">outset : effet 3d global surélevé</li>
				</ul>
			</li>
			<li>Exemple : border: 2px solid black;</li>
		</ul>
		<p>Il y à les sélections de bordure pour un modification ciblé : </p>
		<ul>
			<li>border-top (en haut)</li>
			<li>border-bottom(en bas)</li>
			<li>border-left(à gauche)</li>
			<li>border-right(à droite)</li>
		</ul>
		<p>Il est tous à fait possible de mixer les deux : Exemple : <code>border-top-color</code> ne changera que la couleur de la bordure du haut</p>
		<p>Pour ajouter une bordure uniquement à droite et à gauche on invoquera les propriétés css3 suivante.</p>
		<p><code>border-left: 2px solid black;</code> et <code>border-right: 2px dashed black</code></p>
		<p><u>Les bordures arrondie</u></p>
		<p>Pour arrondir les angles border-radius: taillepx;</p>
		<p>Il est possible d'indiquer la taille pour chaque angle : <code>&gt;border-radius: 10px 20px 5px 12px;</code></p>
		<p>Correspond aux taille : en haut à gauche et en haut à droite et bas à droite et bas à gauche</p>
		<p>Il est également possible d'arrondir les angles de façon élliptique</p>
		<p>Avec la syntaxe : <code>&gt;border-radius: 20px / 10px;</code></p>
	</article>
</section>
