<?php
/*requete pour récuperer les 10 derniers messages*/
$adr="/pages/";
$page_focus="first_page.php";
include("bdd/connexion.php");
echo "
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv=\"Content-Type\" content=\"text/html\" charset=\"utf-8\">
		<link rel=\"stylesheet\" type=\"text/css\" href=\"/css/style.css\" />
		<link rel=\"stylesheet\" media=\"all and (max-width: 1655px)\" href=\"/css/style_medium.css\" />
		<link rel=\"stylesheet\" media=\"all and (max-width: 1280px)\" href=\"/css/style_small.css\" />
	</head>
	<body id=\"debut\">
    <header>
        <nav>
            <h1><u><a href=\"/index.php\">Mon Memento</a></u></h1>
            <ul>
                <li><a href=\"index.php?page=pages/script/script.php\">Script Shell</a></li>
                <li><a href=\"index.php?page=pages/php/php.php\">php et MySql</a></li>
                <li><a href=\"index.php?page=pages/POO/poo.php\">POO</a></li>
                <li><a href=\"index.php?page=pages/php/regex.php\">REGEX</a></li>
                <li><a href=\"index.php?page=pages/html/html.php\">html et css</a></li>
                <li><a href=\"index.php?page=pages/javascript/javascript.php\">Javascript</a></li>
				<li><a href=\"index.php?page=pages/AJAX/ajax.php\">AJAX</a></li>
                <li><a href=\"index.php?page=pages/vim/vim.php\">VIM</a></li>
                <li><a href=\"index.php?page=pages/git/git.php\">git et GitHub</a></li>
                <li><a href=\"index.php?page=pages/language_c/langage_c.php\">Langage C</a></li>
                <li><a href=\"index.php?page=pages/makefile/makefile.php\">Makefile</a></li>
                <li><a href=\"index.php?page=pages/bashrc/bashrc.php\">bashrc</a></li>
                <li><a href=\"index.php?page=pages/interface_GUI/gtk_GUI.php\">interface GUI gtk</a></li>
                <li><a href=\"index.php?page=pages/interface_GUI/gui_sdl.php\">interface GUI SDL</a></li>
            </ul>
        </nav>
    </header>
	<div id=\"content\">
	 <aside id=\"image\">
        <img src=\"pages/img/mini_yoda.jpg\" alt=\"maitre yoda\" /><br />
		<a href=\"#top_page\">Revenir tout en haut de la page</a>
     </aside>
	 <section id=\"first_section\">";

	 if (isset($_GET['page'])){
		 $page_focus=$_GET['page'];
	 }
	 include ("$page_focus");

	 echo "
	 </section>
     <aside id=\"chat\">
        <p><u>Petit chat pour dialoguer entre utilisateur :</u></p>
		<fieldset id=\"input_chat\">
			<legend>Mini chat : </legend>
			<form action=\"bdd/insert_donnee.php\" method=\"post\" id=\"form_chat\" >
				<fieldset><label for='pseudo'>Pseudo : </label><input type='text' name='pseudo' id='pseudo' /></fieldset>
				<fieldset><label for='Message'>Message : </label><textarea name='message' id='message'></textarea></fieldset>
				<input id=\"chat_submit\" type='submit' value='Envoyer' />
			</form>
			<fieldset id=\"message_chat\">
				<div>";
				include("bdd/affiche_message.php");
				 echo "</div>
			</fieldset>
		</fieldset>
	</aside>
	</div>
		<script src=\"javascript/refresh.js\"></script>
	 </body>
</html>";
mysql_close();
?>
