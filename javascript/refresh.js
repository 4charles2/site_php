function loadFile(file) {
	var xhr = new XMLHttpRequest();
	xhr.open('GET', file);
	xhr.addEventListener('readystatechange', function() { //ongère ici une requête asynchrone
	if(xhr.status === 200) { //Si le fichier est chargé sans erreur
			document.getElementById('message_chat').innerHTML = '<di>' + xhr.responseText + '</div>';
		}else if(xhr.status != 200) { //En cas d'erreur
			alert('Une erreur est survenue !\n\nCode :' + xhr.status + '\nTexte: ' + xhr.statusText);
		}
	});
	xhr.send(null);// La requête est prête, on envoie tout !
}
setInterval( function() { loadFile("bdd/affiche_message.php"); } , 5000);
