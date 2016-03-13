<!DOCTYPE html>
<html>
	<head>
		<title>Documentation de VIM</title>
		<meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
	</head>
	<body>
        <?php include('../nav.php'); ?>
        <section>
            <h1><u>Momento de VIM</u></h1>
            <article>
                <ul>
                    <li><a href="#colorSyntax">theme de coloration syntaxique</a></li>
                    <li><a href="#vimrc">Manipulation de vimrc</a></li>
                </ul>
            </article>
            <h1 id="vimrc"><u>Manipulation de VIMRC</u></h1>
            <article>
                <p>Mon fichier vimrc</p>
                <p><pre><code>
" An example for a vimrc file.
"
" Maintainer:	Bram Moolenaar <Bram@vim.org>
" Last change:	2011 Apr 15
"
" To use it, copy it to
"     for Unix and OS/2:  ~/.vimrc
"	      for Amiga:  s:.vimrc
"  for MS-DOS and Win32:  $VIM\_vimrc
"	    for OpenVMS:  sys$login:.vimrc

" When started as "evim", evim.vim will already have done these settings.
if v:progname =~? "evim"
	finish
endif

" Use Vim settings, rather than Vi settings (much better!).
" This must be first, because it changes other options as a side effect.
set nocompatible

" allow backspacing over everything in insert mode
set backspace=indent,eol,start

"if has("vms")		J'ai enlever la condition pour que la création de
"fichier temporaire ne fonctionne plus. (Question de sécurite)
set nobackup		" do not keep a backup file, use versions instead
"else
"  set backup		" keep a backup file
"endif
set history=50		" keep 50 lines of command line history
set ruler		" show the cursor position all the time
set showcmd		" display incomplete commands
set incsearch		" do incremental searching

" For Win32 GUI: remove 't' flag from 'guioptions': no tearoff menu entries
" let &guioptions = substitute(&guioptions, "t", "", "g")

" Don't use Ex mode, use Q for formatting
map Q gq

" CTRL-U in insert mode deletes a lot.  Use CTRL-G u to first break undo,
" so that you can undo CTRL-U after inserting a line break.
inoremap <C-U> <C-G>u<C-U>

" In many terminal emulators the mouse works just fine, thus enable it.
if has('mouse')
	set mouse=a
endif

" Switch syntax highlighting on, when the terminal has colors
" Also switch on highlighting the last used search pattern.
if &t_Co > 2 || has("gui_running")
	syntax on
	set hlsearch
endif

" Only do this part when compiled with support for autocommands.
if has("autocmd")

	" Enable file type detection.
	" Use the default filetype settings, so that mail gets 'tw' set to 72,
	" 'cindent' is on in C files, etc.
	" Also load indent files, to automatically do language-dependent indenting.
	filetype plugin indent on

	" Put these in an autocmd group, so that we can delete them easily.
	augroup vimrcEx
		au!

		" For all text files set 'textwidth' to 78 characters.
		autocmd FileType text setlocal textwidth=78

		" When editing a file, always jump to the last known cursor position.
		" Don't do it when the position is invalid or when inside an event handler
		" (happens when dropping a file on gvim).
		" Also don't do it when the mark is in the first line, that is the default
		" position when opening a file.
		autocmd BufReadPost *
					\ if line("'\"") > 1 && line("'\"") <= line("$") |
					\   exe "normal! g`\"" |
					\ endif

	augroup END

else

        set autoindent		" always set autoindenting on

endif " has("autocmd")

" Convenient command to see the difference between the current buffer and the
" file it was loaded from, thus the changes you made.
" Only define it when not defined already.
if !exists(":DiffOrig")
	command DiffOrig vert new | set bt=nofile | r ++edit # | 0d_ | diffthis
				\ | wincmd p | diffthis
endif
"Active les numéros de ligne
set number
" The following are commented out as they cause vim to behave a lot
" differently from regular Vi. They are highly recommended though.
set smartindent
"set showmatch		" Show matching brackets.
"set ignorecase		" Do case insensitive matching
"set smartcase		" Do smart case matching
"set incsearch		" Incremental search
"set autowrite		" Automatically save before commands like :next and :make
"set hidden		" Hide buffers when they are abandoned
"set mouse=a		" Enable mouse usage (all modes) Déjà présent dans une
"méthode 

" If using a dark background within the editing area and syntax highlighting
" turn on this option as well
set background=dark
set noswapfile
set nocompatible

"Mettre en surbrillance les caractères non-imprimables qui ne devraient pas
"figurer dans le code source.
"Les Espaces en fin de ligne :
highlight NoSpacesEOL ctermbg=red ctermfg=white guibg=#592929
match NoSpacesEOL / \+$/
"Les tabulations en general elle sont interdites, on oblige d'utiliser des
"expaces):
highlight NoTabs ctermbg=red ctermfg=white guibg=#592929
match NoTabs / \t/
"Raglage des tabulations ont prefere 4 espaces
set expandtab
set shiftwidth=4
set softtabstop=4
set tabstop=4

"La longueur maximal d'une ligne en general 80 caracteres ou 120 ligne ecran
"16/9 Ces Deux ligne affiche sur fond rouge les caractere qui depassent
highlight OverLength ctermbg=red ctermfg=white guibg=#592929
match OverLength /\%121v.*/
"Theme de couleur . Dans le dossier /usr/share/vim/vim74/colors
set t_Co=256
"Active le coloration 256 couleur dans le terminal
colorscheme molokai "
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
	</body>
</html>
