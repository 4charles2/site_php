
        <section id="top_page">
           <h1><u>Momento html : </u></h1>
            <article>
                <p><strong>Voici la liste des chapitres et bouts de codes :</strong></p>
				<ul>
					<li><a href="code_in_html.php">Afficher du code à l'utilisateur dans html</a></li>
					<li><a href="#entities">Les entities html lettres avec accents ou symbôle comme &amp;</a></li>
					<li><a href="#encode">Définir l'encodage du fichier avec la balise meta</a></li>
					<li><a href="#figure">Les figures et figcaption pour attribuer une legende</a></li>
					<li><a href="#special_balise">Les balises de presentation spéciale comme blockquote</a></li>
				</ul>
            </article>
        </section>
		<?php include('css.php'); ?>

<section id="encode">
	<h1><u>Définir l'encodage du fichier avec la balise meta</u></h1>
	<article>
		<p>La suivante pour définir l'encodage du texte : <code>&gt;&lt;meta http-equiv="Content-Type" "content="text/html" charset="utf-8" /&gt;</code></p>
		<p>Une remarque si l'éditeur vous donne le choix entre deux type de utf-8 alors choisir celui sans BOM car Le BOM est une indication de l'ordre des octets qui est ajoutée au début du fichier, 
		ce qui fait la fonction header() en php, ne fonctionnera pas car des caractères auront déjà été envoyés, en l'occurence les caractères qui composent le BOM</p>
	</article>
</section>

		<section id="entities">
			<h1><u>Liste de quelque entities html :</u></h1>
			<article>
				<p>Pour connaître toutes la liste des entities html google</p>
				<table>
					<thead>
						<tr>
							<th>Caractère</th>
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
							<td>é</td>
							<td>&amp;eacute;</td>
						</tr>
						<tr>
							<td>É</td>
							<td>&amp;Eacute;</td>
						</tr>
						<tr>
							<td>è</td>
							<td>&amp;egrave;</td>
						</tr>
						<tr>
							<td>â</td>
							<td>&amp;acirc;</td>
						</tr>
						<tr>
							<td>ï</td>
							<td>&amp;iuml;</td>
						</tr>
						<tr>
							<td>&aelig;</td>
							<td>&amp;aelig;</td>
						</tr>
						<tr>
							<td>Ç</td>
							<td>&amp;Ccedil;</td>
						</tr>
						<tr>
							<td>Ô</td>
							<td>&amp;Ocirc;</td>
						</tr>
					</tbody>
				</table>
			</article>
		</section>
<section id="figure">
	<h1><u>Utilisation de figure et figcaption</u></h1>
	<article>
		<p>Pour attribuer une legende ? une image on utilise les balises figure et figcaption</p>
		<p>La balise figure pour former un bloc des elements auquel on souhaite d?finir une legende</p>
		<p>Pour attribuer la legende c'est la balise figcaption qui n'est pas obligatoire</p>
		<p>Cela peut servir pour diff?rents ?lements comme les img mais aussi les blocs de code ou encore des sch?ma et autre ...</p>
		<p>La diff?rence entre aside et figure : </p>
		<p>Ces deux ?lements sont des unit?s de contenu mais n'ont pas le m?me r?le s?mantique. Tandis qu'&lt;aside&gt; n'est pas essentiel pour la compr?hension de la plage (il ne doit ?tre qu'un apport tangentiel), &lt;figure&gt; est li? ? celle-ci : il transmet un contenu pertinent, li? au contenu principal, comme le serait une image classique.</p>
		<ul>
			<h3>Nous pouvons donc r?sumer la chose comme suit : </h3>
			<li>&lt;aside&gt; : son contenu est p?riph?rique ? la page, et son absence ne doit pas g?ner la compr?hension de celle-ci.</li>
			<li>&lt;figure&gt; : son contenu contribue ? donner du sens et de la compr?hension ? la page, et son emplacement n'est pas d?terminant.</li>
		</ul>
		<table>
			<caption>&lt;figure&gt;</caption>
			<thead>
				<tr>
					<th>Propri?t?</th>
					<th>D?tails</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Mod?les de contenu autoris?s</td>
					<td>Un ?l?ment &lt;figcaption&gt; optionnel, suivi par du contenu de flux.</td>
				</tr>
				<tr>
					<td>Parents autoris?s</td>
					<td>Tout ?l?ment pouvant contenir des ?l?ments du flux</td>
				</tr>
				<tr>
					<td>Omission de balise</td>
					<td>Les balises ouvrantes et fermantes sont obligatoires</td>
				</tr>
				<tr>
					<td>Style par d?faut</td>
					<td>figcaption { display:bloc; margin:1em 40px; }</td>
				</tr>
			</tbody>
		</table>	
		<table>
			<caption>&lt;figcaption&gt;</caption>
			<thead>
				<tr>
					<th>Propi?t?</th>
					<th>D?tails</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Mod?les de contenu autoris?s</td>
					<td>Contenu de flux</td>
				</tr>
				<tr>
					<td>Parents autoris?s</td>
					<td>&lt;figure&gt;</td>
				</tr>
				<tr>
					<td>Omission de balise</td>
					<td>Les balises ouvrante et fermantes sont obligatoires</td>
				</tr>
				<tr>
					<td>Style par d?faut</td>
					<td>figcaption {display:block;}</td>
				</tr>
			</tbody>
		</table>
	</article>
</section>
<section id="special_balise">
	<h1><u>Les balises de présentation du texte comme blockquote </u></h1>
	<article>
		<p>&lt;abbr&gt;	Defines an abbreviation or acronym definie une abbreviation ou un acronyme avec une infobulle</p>
		<p>&lt;address&gt; Defines contact information for the author/owner of a document Definie les informations pour contacter l'auteur ou le propriétaire du document </p>
		<p>&lt;bdo&gt;	Defines the text direction Definies la direction du text comme par exemple &lt;bdo dir="rtl"&gt;texte&lt;bdo&gt; affichera : <bdo dir="rtl">texte</bdo></p>
		<p>&lt;blockquote&gt;	Defines a section that is quoted from another source definie une citation en bloc qui viens d'une autre source qui peut être definie par l'atribut cite exemple &lt;blockquote cite="http://www.openclassroom.com"&gt;Toutes les connaissances résumé sur ce site provienne du site internet openclassroom.com&lt;blockquote&gt; Ce qui donne comme résultat : </p>
		<blockquote cite="http://www.openclassroom.com">Toutes les connaissances résumé sur ce site provienne du site internet openclassroom.com</blockquote>
		<p>&lt;cite&gt;	Defines the title of a work definie le titre d'un travail</p>
		<p>&lt;q&gt;	Defines a short inline quotation definie une citation sur une ligne "citation " </p>
	</article>
</section>
