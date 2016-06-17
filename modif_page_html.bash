#!/bin/bash

#Suprimer le header(head) de toutes les pages html
#SUprimer le footer(tail) de toutes les pages html
#Mettre tous les contenus des pages html entre balises php

echo "VA suprimer header et footer des pages html dans le dossier site_php-free/site_php"

delete_head_tail_html

function delete_head_tail_html
{
	for fichier in * ; do
		if [ -f "$fichier" ] ; then
#Va supprimer les lignes 1 à 8 dans le fichier
			echo "Traitement du fichier : $fichier"
			#sed -ne '0,/<?php include..nav.php...../p' html.php 

			sed -i '0,/<?php include.*nav.php.*$/c\' "$fichier"
#Va suprimer l'intervalle qui commence à la balise </body> et se termine à la balise </html> par rien
			sed -i '/<\/body>$/,/<\/html>$/c\' "$fichier"
		elif [ -d $fichier ] ; then
			cd $fichier
			ls
			echo "traitement du dossier : $fichier"
			delete_head_tail_html
			cd ..
		fi
		ls
done
}
