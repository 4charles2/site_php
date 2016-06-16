
        <section id="top_page">
           <h1><u>Momento html : </u></h1>
            <article>
                <p><strong>Voici la liste des chapitres et bouts de codes :</strong></p>
				<ul>
					<li><a href="code_in_html.php">Afficher du code à l'utilisateur dans html</a></li>
					<li><a href="#entities">Les entities html lettres avec accents ou symbôle comme &amp;</a></li>
					<li><a href="#encode">Définir l'encodage du fichier avec la balise meta</a></li>
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
