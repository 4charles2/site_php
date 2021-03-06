        <section id="top_page">
            <h1><u>Momento de VIM</u></h1>
            <article>
                <ul>
                    <li><a href="#convertion">Convertion de fichier</a></li>
                    <li><a href="#colorSyntax">theme de coloration syntaxique</a></li>
                    <li><a href="#vimrc">Manipulation de vimrc</a></li>
                    <li><a href="#option">La liste des options dans vim</a></li>
                    <li><a href="#racourciTouche">Racourci d'une touche map</a></li>
                    <li><a href="#commande">Utiliser la ligne de commande dans VIM</a></li>
					<li><a href="#incrementation">Incrémenter et décrémenter un chiffre</a></li>
					<li><a href="#list_command">Pour voir la liste des commandes</a></li>
					<li><a href="#calculatrice">Pour utiliser une calculatrice dans vim</a></li>
					<li><a href="#orthographe">Pour activer la correction orthographique</a></li>
                </ul>
            </article>
            <h1 id="vimrc"><u>Manipulation de VIMRC</u></h1>
            <article>
                <p>Mon fichier vimrc</p>
                <p><pre><code>

" Maintainer:	Charles Tognol &lt;charles.tognol@gmail.com&gt;
" Last change:	lundi 27 juin 2016, 18:13:12 (UTC+0200)
"
" To use it, copy it to
"     for Unix and OS/2:  ~/.vimrc
"	      for Amiga:  s:.vimrc
"  for MS-DOS and Win32:  $VIM\_vimrc
"	    for OpenVMS:  sys$login:.vimrc

"Thème de couleur . Dans le dossier /usr/share/vim/vim74/colors
set t_Co=256
"Active le coloration 256 couleur dans le terminal
colorscheme molokai
set nocompatible
"encodage en utf-8
scriptencoding utf-8
set encoding=utf-8
set fileencoding=utf-8
" allow backspacing over everything in insert mode
set backspace=indent,eol,start
"fichier temporaire ne fonctionne plus. (Question de sécurité)
set nobackup " do not keep a backup file, use versions instead
set history=50		" keep 50 lines of command line history
set incsearch		" do incremental searching

" For Win32 GUI: remove 't' flag from 'guioptions': no tearoff menu entries
" let &amp;guioptions = substitute(&amp;guioptions, "t", "", "g")

" Don't use Ex mode, use Q for formatting
map Q gq

" CTRL-U in insert mode deletes a lot.  Use CTRL-G u to first break undo,
" so that you can undo CTRL-U after inserting a line break.
inoremap &lt;C-U&gt; &lt;C-G&gt;u&lt;C-U&gt;

if !exists(":DiffOrig")
	command DiffOrig vert new | set bt=nofile | r ++edit # | 0d_ | diffthis
				\ | wincmd p | diffthis
endif
" In many terminal emulators the mouse works just fine, thus enable it.
set mouse=a
"Active les numéros de ligne
set number
syntax on
set smartindent
"set showmatch		" Show matching brackets.
"set ignorecase		" Do case insensitive matching
"set smartcase		" Do smart case matching
"set incsearch		" Incremental search
"set autowrite		" Automatically save before commands like :next and :make
"set hidden		" Hide buffers when they are abandoned
"Configurer la ligne des status
"affiche la position du cursor numero de ligne et caractère
set ruler "show the cursor position all the time
"affiche les touche entrer en mode commande
set showmode
set showcmd		" display incomplete commands
"La barre de status et l'avant dernier ligne
set laststatus=2
set statusline=%{strftime('%a\ %e\ %b\ %I:%M\ %p')}\ %-3.3n\ %t\ %h%m%r%w\[%{strlen(&amp;ft)?&amp;ft:'none'},
%{&amp;encoding},%{&amp;fileformat}]\ %F%1*%*%10{getfsize(expand('%'))}\ %=%-14.(%l,%c%V%)\ %&lt;%P\

set noswapfile
"Réglage des tabulations ont préfère 4 espaces
set ai "autoindent
"Remplace tab par espace
"set expandtab
set shiftwidth=4
set softtabstop=4
set tabstop=4

"Mettre en surbrillance les caractères non imprimables qui ne devraient pas
"figurer dans le code source.
"Les Espaces en fin de ligne :
highlight NoSpacesEOL ctermbg=red ctermfg=white guibg=#592929
match NoSpacesEOL / \+$/
" If using a dark background within the editing area and syntax highlighting
" turn on this option as well
set background=dark
"Les tabulations en général elle sont interdites, on oblige d'utiliser des
"espaces):
highlight NoTabs ctermbg=red ctermfg=white guibg=#592929
"Dé commenter pour surligné les tabulation en rouge
"match NoTabs /\t/

"Mettre la ligne en cour d'édition en valeur via une couleur
"La longueur maximal d'une ligne en général 80 caractères ou 120 ligne écran
"16/9 Ces Deux ligne affiche sur fond rouge les caractère qui dépassent
set list
"paramètre des caractère non imprimable dans vim
set listchars=nbsp:µ,tab:&gt;-,trail:~,eol:$
highlight OverLength ctermbg=red ctermfg=white guibg=#592929
"Dé commenté pour surligné en rouge tout ce qui dépasse les 80 caractères
"match OverLength /\%80v.*/
set cursorline
set cursorcolumn
hi cursorColumn guibg=#e196f6
hi CursorLine guibg=#e196f6

"Activer la correction orthographique en français
set spelllang=fr spell

"Les abréviation vim
"Les abréviation HTML
iab htmli &lt;!DOCTYPE html&gt;&lt;CR&gt;&lt;html&gt;&lt;CR&gt;&lt;Tab&gt;&lt;head&gt;%&lt;CR&gt;&lt;/head&gt;&lt;CR&gt;&lt;body&gt;&lt;CR&gt;&lt;/body&gt;&lt;CR&gt;&lt;backspace&gt;&lt;/html&gt;&lt;esc&gt;:call search('%')&lt;esc&gt;i&lt;esc&gt;cf%
iab oli &lt;ol&gt;&lt;CR&gt;&lt;Tab&gt;&lt;li&gt;!!&lt;/li&gt;&lt;CR&gt;&lt;li&gt;&lt;/li&gt;&lt;CR&gt;&lt;li&gt;&lt;/li&gt;&lt;CR&gt;&lt;backspace&gt;&lt;/ol&gt;&lt;esc&gt;:call search('!!')
iab uli &lt;ul&gt;&lt;CR&gt;&lt;Tab&gt;&lt;li&gt;!!&lt;/li&gt;&lt;CR&gt;&lt;li&gt;&lt;/li&gt;&lt;CR&gt;&lt;li&gt;&lt;/li&gt;&lt;CR&gt;&lt;backspace&gt;&lt;/ul&gt;&lt;esc&gt;:call search('!!')
iab tablei &lt;table&gt;&lt;CR&gt;&lt;tab&gt;&lt;thead&gt;&lt;CR&gt;&lt;Tab&gt;&lt;tr&gt;&lt;CR&gt;&lt;Tab&gt;&lt;th&gt;!!&lt;/th&gt;&lt;CR&gt;&lt;th&gt;&lt;/th&gt;&lt;CR&gt;&lt;backspace&gt;&lt;/tr&gt;&lt;CR&gt;&lt;backspace&gt;&lt;/thead&gt;
&lt;CR&gt;&lt;tbody&gt;&lt;CR&gt;&lt;Tab&gt;&lt;tr&gt;&lt;CR&gt;&lt;Tab&gt;&lt;td&gt;&lt;/td&gt;&lt;CR&gt;&lt;td&gt;&lt;/td&gt;&lt;CR&gt;&lt;backspace&gt;&lt;/tr&gt;&lt;CR&gt;&lt;tr&gt;&lt;CR&gt;&lt;Tab&gt;&lt;td&gt;&lt;/td&gt;&lt;CR&gt;&lt;td&gt;&lt;/td&gt;&lt;CR&gt;&lt;backspace&gt;&lt;/tr&gt;
&lt;CR&gt;&lt;backspace&gt;&lt;/tbody&gt;&lt;CR&gt;&lt;backspace&gt;&lt;/table&gt;&lt;esc&gt;:call search('!!')
iab img &lt;Esc&gt;^d$i&lt;img src="!!" alt="&lt;Esc&gt;pi" /&gt;&lt;Esc&gt;F!!s&lt;c-o&gt;:call getchar()&lt;esc&gt;

"Les abréviations du langage C
iab maini #include &lt;stdio.h&gt;&lt;CR&gt;#include &lt;stdlib.h&gt;&lt;CR&gt;&lt;cr&gt;int main (void)&lt;CR&gt;{&lt;CR&gt;&lt;tab&gt;w&lt;cr&gt;&lt;backspace&gt;return EXIT_SUCCESS;&lt;CR&gt;}&lt;esc&gt;:call search('w')&lt;esc&gt;i&lt;esc&gt;cfw
iab fori &lt;Esc&gt;^d$ifor(int i=0; i&lt;&lt;Esc&gt;pi; i++)&lt;cr&gt;{&lt;CR&gt;%}&lt;esc&gt;:call search('%')&lt;esc&gt;i&lt;esc&gt;cf%

"Les abréviations de script bash
iab #i #!/bin/bash&lt;cr&gt;&lt;cr&gt;&lt;esc&gt;i
                </code></pre></p>
            </article>
            <h1 id="colorSyntax" ><u>Thème de coloration syntaxique</u></h1>
            <article>
                <p>Chemin pour fichier theme.vim : /usr/share/vim/vim74/colors</p>
                <p>Dans vimrc activé le thème <code>colorscheme NomTheme</code></p>
                <p>Pour les thème récent activer la coloration de 256 couleur</p>
                <p>Dans vimrc activer 256couleurs : <code>set t_Co=256</code></p>
            </article>
        </section>
        <section id="convertion">
            <h1><u>Convertion de fichier avec VIM</u></h1>
            <article>
                <p>Convertir un fichier en héxadécimal :%!xxd</p>
                <p>Convertir un fichier héxadecimal en texte normal :%!xxd -r</p>
                <p>Avec vim on peut convertir les fichiers</p>
                <p>Si vous avez un document DOS et que vous voulez le mettre en UNIX</p>
                <p>:set ff=unix puis sauvegarder le fichier. Pour convertir en DOS :set ff=dos</p>
                <p>Pour définir le type de fichier au démarage de vim dans .vimrc</p>
                <p>Mettre le ligne : set ff=x (avec x= dos, unix, mac)</p>
                <p>Le mieu est de faire une détection de L'OS au démarrage et de l'appliquer</p>
                <p>Vim Peut en dire beaucoup avec :help feature-list</p>
            </article>
            <article>
                <p>Petite précision sur l'encodage et le format avec VIM</p>
                <ul>
                    <li>Le format concerne la structure du fichier, le façon dont sont encoder les fin de lignes. (0x0D0A pour la famille Dos, 0x0A pour le reste du monde)</li>
                    <li>L'encodage des fichiers : il concerne les tables de caractères utilisés pour les fichiers(UTF-8, iso-8859-x etc).
                    Exemple : L'accent é sera encoder en UTF-8 A©
                    </li>
                </ul>
                <p>L'encodage sous VIM se règle avec les variables encoding, fileencoding et fileencodings</p>
                <ol>
                    <li>encoding : détermine l'encodage des caractères utilisé au sein de VIM</li>
                    <li>fileencoding : détermine l'encodage à utiliser lors de la sauvegarde d'un fichier</li>
                    <li>fileencodings : donne une liste des tables utiliser lors de l'édition d'un nouveau fichier. Vim tente d'utiliser la premiere de la liste, puis la seconde, etc ...</li>
                </ol>
                    <p>Exemple pour encoder un fichier en UTF-8 :</p>
                    <p>:set fileencoding=UTF-8 pour le convertir</p>
                    <p>:set fileencoding Pour connaître l'encodage du fichier</p>
                    <p>Pour convertir tous les fichiers d'un repertoire exemple de commande</p>
                    <p><code>find . -iname "*.c" | while read filename; do iconv -f iso-8859-1 -t UTF-8 "$filename" &gt ${filename%.*}_utf8.c ; done</code>
            </article>
        </section>
        <section id="option">
            <h1><u>La liste des options dans VIM</u></h1>
            <article>
                <p>Pour voir la liste des options dans vim :</p>
                <p>:help feature-list</p>
                <p>Exemple d'utilisation de fonction avec vim</p>
                <p>Creer un fichier et ecrire la fonction suivante :</p>
                <p><pre><code> 
"fichier: detecte_os.vim
"doc: help feature-list

"les noms de fonction commencent par une majuscule
function! Detecte_OS()

	if has("unix")
		echo"version Unix detecte"
		set ff=unix
	elseif has("macunix")
		echo "MacOS X dectecte"
		set ff=mac
	else
		echo "Version de vim inconue. Surement Windows."
		set ff=dos
	endif
endfunction</code></pre></p>
                <p>Ce code permet de detecter l'OS automatiquement et de regler la convertion de ficher automatiquement</p>
                <p>Afin de pouvoir l'utiliser deux solutions</p>
                <p>Soit on fait appel a la fonction en commande vim</p>
                <p>Dans un premier on charge le fichier dans vim avec</p>
                <p>:so CheminDuFichier/detecte_os.vim (Nom du fichier)</p>
                <p>Puis on appel la fonction :</p>
                <p>:call Detecte_OS()</p>
                <p>Ou deuxieme possibilite pour une utilisation automatique au demarrage de VIM</p>
                <p>Ecrire dans le fichier .vimrc</p>
                <p><pre><code>so CheminDuFichier/detecte_os/vim
                autocmd VimEnter * call Detecte_OS()</code></pre></p>
            </article>
        </section>
        <section id="racourciTouche">
            <h1><u>Definir le racourci d'une touche avec MAP</u></h1>
            <article>
                <p>Pour définir une racourci sur une touche</p>
                <p>On utilise map</p>
                <p>Exemple : <code>map touche commande</code></p>
                <p>map µ :set cursorline! cursorcolumn&lt;CR&gt;</p>
            </article>
        </section>
        <section id="commande">
            <h1><u>Utiliser les lignes de commandes du terminal dans VIM</u></h1>
            <article>
                <p>Dans Vim on peut utiliser les lignes de commandes classiques du terminal</p>
                <p>Pour les utiliser :!NomCommande </p>
                <p><u>Voici des exemples d'utilisation :</u></p>
                <p><code>:!ls</code></p>
                <p><code>.r !ls /*Ecrira le resultat de la commande à l'emplacement du curseur*/</code></p>
                <p>Pour l'écrire au numéro d'une ligne mettre le numéro de la ligne à la place du point .</p>
                <p><code>:%!egrep -v "^[\t ]*\#"</code></p>
                <p>Ce code va suprimer toutes les lignes d'un fichier débutant par #</p>
                <p>L'option indique que l'on inverse le sens</p>
                <p>egrep filtre toutes les lignes qui commencent par # avec un tab et un espace tout cela zero une ou plusieurs fois avec le signe *\# l'option inverse se sens</p>
                <p>Les lignes qui seront affiché seront toutes les lignes qui ne commencent pas par un #</p>
                <p><code>:w !cmd</code></p>
                <p>On peut utilisé tout ou une partie d'un buffer</p>
                <p>Les résultats des commandes seront affichés dans le terminal et Vim reprendra la main après confirmation de votre part</p>
                <p>Il y à 26 buffers en tous autant que de lettre minuscule</p>
            </article>
        </section>
		<section id="incrementation">
			<h1><u>Pour incrementer un chiffre ou le decrementer</u></h1>
			<article>
				<p>Pour incrementer un chiffre Ctrl-a</p>
				<p>Pour decrementer un chiffre Ctrl-x</p>
			</article>
		</section>
		<section id="list_command">
			<h1><u>Voici comment connaître la liste des commandes de vim</u></h1>
			<article>
				<p><code>:help holy-grail</code></p>
				<p>Permet d'obtenir la liste des commandes disponible pour VIM et vimrc</p>
			</article>
		</section>
		<section id="calculatrice">
			<h1><u>Pour utiliser une calculatrice dans vim</u></h1>
			<article>
				<p>Il est possible d'utiliser une calculatrice dans vim.
				Pour cela ce mettre en mode édition et ensuite faire Ctrl r et = vous pourrez faire votre calcul dans la ligne de commande de vim puis le résultat sera écrit dans le fichier</p>
			</article>
		</section>
		<section id="orthographe">
			<h1><u>Pour activer la corection orthographique</u></h1>
			<article>
				<p>Dans vim on peut activer la corection orthographique avec l'option :set spell</p>
				<p>Pour régler la langue de corection : setlocal spell spelllang=fr</p>
				<p>Pour que ca fonctionne il faut télécharger le dictionnaire français et le placer dans le dossier .vim/spell/</p>
				<p>Il se trouve dans le répertoire de l'utilisateur.</p>
			</article>
		</section>
