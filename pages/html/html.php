
        <section id="top_page">
           <h1><u>Momento html : </u></h1>
            <article>
                <p><strong>Voici la liste des chapitres et bouts de codes :</strong></p>
				<ul>
					<li><a href="code_in_html.php">Afficher du code Ã  l'utilisateur dans html</a></li>
					<li><a href="#entities">Les entities html lettres avec accents ou symbÃ´le comme &amp;</a></li>
					<li><a href="#encode">DÃ©finir l'encodage du fichier avec la balise meta</a></li>
					<li><a href="#figure">Les figures et figcaption pour attribuer une legende</a></li>
				</ul>
            </article>
        </section>
		<?php include('css.php'); ?>

<section id="encode">
	<h1><u>DÃ©finir l'encodage du fichier avec la balise meta</u></h1>
	<article>
		<p>La suivante pour dÃ©finir l'encodage du texte : <code>&gt;&lt;meta http-equiv="Content-Type" "content="text/html" charset="utf-8" /&gt;</code></p>
		<p>Une remarque si l'Ã©diteur vous donne le choix entre deux type de utf-8 alors choisir celui sans BOM car Le BOM est une indication de l'ordre des octets qui est ajoutÃ©e au dÃ©but du fichier, 
		ce qui fait la fonction header() en php, ne fonctionnera pas car des caractÃ¨res auront dÃ©jÃ  Ã©tÃ© envoyÃ©s, en l'occurence les caractÃ¨res qui composent le BOM</p>
	</article>
</section>

		<section id="entities">
			<h1><u>Liste de quelque entities html :</u></h1>
			<article>
				<p>Pour connaÃ®tre toutes la liste des entities html google</p>
				<table>
					<thead>
						<tr>
							<th>CaractÃ¨re</th>
							<th>HTML</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>&amp;</td>
							<td>&amp;amp;</td>
						</tr>
						<tr>
							<td>&lt;</td>
							<td>&amp;lt;</td>
						</tr>
						<tr>
							<td>&gt;</td>
							<td>&amp;gt;</td>
						</tr>
						<tr>
							<td>Ã©</td>
							<td>&amp;eacute;</td>
						</tr>
						<tr>
							<td>Ã‰</td>
							<td>&amp;Eacute;</td>
						</tr>
						<tr>
							<td>Ã¨</td>
							<td>&amp;egrave;</td>
						</tr>
						<tr>
							<td>Ã¢</td>
							<td>&amp;acirc;</td>
						</tr>
						<tr>
							<td>Ã¯</td>
							<td>&amp;iuml;</td>
						</tr>
						<tr>
							<td>&aelig;</td>
							<td>&amp;aelig;</td>
						</tr>
						<tr>
							<td>Ã‡</td>
							<td>&amp;Ccedil;</td>
						</tr>
						<tr>
							<td>Ã”</td>
							<td>&amp;Ocirc;</td>
						</tr>
					</tbody>
				</table>
			</article>
		</section>
<section id="figure">
	<h1><u>Utilisation de figure et figcaption</u></h1>
	<article>
		<p>Pour attribuer une legende à une image on utilise les balises figure et figcaption</p>
		<p>La balise figure pour former un bloc des elements auquel on souhaite définir une legende</p>
		<p>Pour attribuer la legende c'est la balise figcaption qui n'est pas obligatoire</p>
		<p>Cela peut servir pour diffèrents élements comme les img mais aussi les blocs de code ou encore des schéma et autre ...</p>
		<p>La diffèrence entre aside et figure : </p>
		<p>Ces deux élements sont des unités de contenu mais n'ont pas le même rôle sémantique. Tandis qu'&lt;aside&gt; n'est pas essentiel pour la compréhension de la plage (il ne doit être qu'un apport tangentiel), &lt;figure&gt; est lié à celle-ci : il transmet un contenu pertinent, lié au contenu principal, comme le serait une image classique.</p>
		<ul>
			<h3>Nous pouvons donc résumer la chose comme suit : </h3>
			<li>&lt;aside&gt; : son contenu est périphérique à la page, et son absence ne doit pas gêner la compréhension de celle-ci.</li>
			<li>&lt;figure&gt; : son contenu contribue à donner du sens et de la compréhension à la page, et son emplacement n'est pas déterminant.</li>
		</ul>
		<table>
			<caption>&lt;figure&gt;</caption>
			<thead>
				<tr>
					<th>Propriété</th>
					<th>Détails</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Modèles de contenu autorisés</td>
					<td>Un élément &lt;figcaption&gt; optionnel, suivi par du contenu de flux.</td>
				</tr>
				<tr>
					<td>Parents autorisés</td>
					<td>Tout élément pouvant contenir des éléments du flux</td>
				</tr>
				<tr>
					<td>Omission de balise</td>
					<td>Les balises ouvrantes et fermantes sont obligatoires</td>
				</tr>
				<tr>
					<td>Style par défaut</td>
					<td>figcaption { display:bloc; margin:1em 40px; }</td>
				</tr>
			</tbody>
		</table>	
		<table>
			<caption>&lt;figcaption&gt;</caption>
			<thead>
				<tr>
					<th>Propiété</th>
					<th>Détails</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Modèles de contenu autorisés</td>
					<td>Contenu de flux</td>
				</tr>
				<tr>
					<td>Parents autorisés</td>
					<td>&lt;figure&gt;</td>
				</tr>
				<tr>
					<td>Omission de balise</td>
					<td>Les balises ouvrante et fermantes sont obligatoires</td>
				</tr>
				<tr>
					<td>Style par défaut</td>
					<td>figcaption {display:block;}</td>
				</tr>
			</tbody>
		</table>
	</article>
</section>
