<?php
/*requete pour récuperer les 10 derniers messages*/
$adr="/pages/";
$page_focus="first_page.php";
include("bdd/connexion.php");
echo "
<!DOCTYPE html>
<html>
	<head>
		<meta charset=\"uft-8\">
		<link rel=\"stylesheet\" type=\"text/css\" href=\"/css/style.css\" />
	</head>
	<body>
    <header>
        <nav id=\"debut\">
            <h1><u><a href=\"/index.php\">Mon Memento</a></u></h1>
            <ul>
                <li><a href=\"".$adr."script/script.php\">Script Shell</a></li>
                <li><a href=\"".$adr."php/php.php\">php et MySql</a></li>
                <li><a href=\"".$adr."POO/poo.php\">POO</a></li>
                <li><a href=\"".$adr."php/regex.php\">REGEX</a></li>
                <li><a href=\"".$adr."html/html.php\">html et css</a></li>
                <li><a href=\"".$adr."javascript/javascript.php\">Javascript</a></li>
                <li><a href=\"".$adr."vim/vim.php\">VIM</a></li>
                <li><a href=\"".$adr."git/Git et Github\">git et GitHub</a></li>
                <li><a href=\"".$adr."language_c/langage_c.php\">Langage C</a></li>
                <li><a href=\"".$adr."makefile/makefile.php\">Makefile</a></li>
                <li><a href=\"".$adr."bashrc/bashrc.php\">bashrc</a></li>
                <li><a href=\"".$adr."interface_GUI/gtk_GUI.php\">interface GUI gtk</a></li>
                <li><a href=\"".$adr."interface_GUI/gui_sdl.php\">interface GUI SDL</a></li>
            </ul>
        </nav>
    </header>
	 <aside id=\"image\">
        <img src=\"/pages/img/mini_yoda.jpg\" alt=\"maitre yoda\" /><br />
		<a href=\"#debut\">Revenir tout en haut de la page</a>
     </aside>
	 <section id=\"first_section\">";

	 include ("$page_focus");

	 echo "
	 </section>
     <aside id=\"chat\">
        <p><u>Petit chat pour dialoguer entre utilisateur :</u></p>
        <form method='post'>
            <label for='pseudo'>Pseudo : </label><input type='text' name='pseudo' id='pseudo' /><br/>
            <label for='Message'>Message : </label><textarea name='message' id='message' rows='20' cols='45'></textarea><br/>
            <input type='submit' value='Envoyer' />
        </form>";
        include("bdd/affiche_message.php");
     echo "</aside>
	 </body>
</html>";
?>
