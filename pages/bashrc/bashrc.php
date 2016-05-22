<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php include('../../header.php'); ?>
    </head>
    <body>
    <?php include('../../nav.php'); ?>
    <section>
        <h1><u>Présentation de bashrc</u></h1>
        <article>
            <p><a href="#bashrc">Mon bashrc</a></p>
        </article>
    </section>
    <section id="bashrc">
        <h1><u>My bashrc</u></h1>
    <article>
    <pre><code>
    " Maintainer:	Bram Moolenaar <Bram@vim.org>
    " Last change:	30 mars 2016
    "
    " To use it, copy it to
    "     for Unix and OS/2:  ~/.vimrc
    "	      for Amiga:  s:.vimrc
    "  for MS-DOS and Win32:  $VIM\_vimrc
    "	    for OpenVMS:  sys$login:.vimrc

    set nocompatible
    "encodage en utf-8
    scriptencoding utf-8
    set encoding=utf-8
    set fileencoding=utf-8
    " allow backspacing over everything in insert mode
    set backspace=indent,eol,start
    "fichier temporaire ne fonctionne plus. (Question de sécurite)
    set nobackup " do not keep a backup file, use versions instead
    set history=50		" keep 50 lines of command line history
    set incsearch		" do incremental searching

    " For Win32 GUI: remove 't' flag from 'guioptions': no tearoff menu entries
    " let &guioptions = substitute(&guioptions, "t", "", "g")

    " Don't use Ex mode, use Q for formatting
    map Q gq

    " CTRL-U in insert mode deletes a lot.  Use CTRL-G u to first break undo,
    " so that you can undo CTRL-U after inserting a line break.
    inoremap <C-U> <C-G>u<C-U>

    if !exists(":DiffOrig")
    command DiffOrig vert new | set bt=nofile | r ++edit # | 0d_ | diffthis
    \ | wincmd p | diffthis
    endif
    " In many terminal emulators the mouse works just fine, thus enable it.
    set mouse=a
    "Active les numéros de ligne
    set number
    set list
    "parametre des caractere non imprimable dans vim
    set listchars=nbsp:µ,tab:>-,trail:~,eol:$
    "Mettre en surbrillance les caractères non-imprimables qui ne devraient pas
    "figurer dans le code source.
    "Les Espaces en fin de ligne :
    highlight NoSpacesEOL ctermbg=red ctermfg=white guibg=#592929
    match NoSpacesEOL / \+$/
    "Les tabulations en general elle sont interdites, on oblige d'utiliser des
    "expaces):
    highlight NoTabs ctermbg=red ctermfg=white guibg=#592929
    match NoTabs / \t/
    syntax on
    set smartindent
    "set showmatch		" Show matching brackets.
    "set ignorecase		" Do case insensitive matching
    "set smartcase		" Do smart case matching
    "set incsearch		" Incremental search
    "set autowrite		" Automatically save before commands like :next and :make
    "set hidden		" Hide buffers when they are abandoned
    "Configurer la ligne des status
    "affiche la position du cursor numero de ligne et caractere
    set ruler "show the cursor position all the time
    "affiche les touche entrer en mode commande
    set showmode
    set showcmd		" display incomplete commands
    "La barre de status et l'avant dernier ligne
    set laststatus=2
    set statusline=%{strftime('%a\ %e\ %b\ %I:%M\ %p')}\ %-3.3n\ %t\ %h%m%r%w\[%{strlen(&ft)?&ft:'none'},%{&encoding},
    %{&fileformat}]\ %F%1*%*%10{getfsize(expand('%'))}\ %=%-14.(%l,%c%V%)\ %<%P\
                   " If using a dark background within the editing area and syntax highlighting
                   " turn on this option as well
                   set background=dark
                   set noswapfile
                   "Raglage des tabulations ont prefere 4 espaces
                   set ai "autoindent
                   set expandtab
                   set shiftwidth=4
                   set softtabstop=4
                   set tabstop=4

                   "La longueur maximal d'une ligne en general 80 caracteres ou 120 ligne ecran
                   "16/9 Ces Deux ligne affiche sur fond rouge les caractere qui depassent
                   highlight OverLength ctermbg=red ctermfg=white guibg=#592929
                   match OverLength /\%80v.*/
                   "Theme de couleur . Dans le dossier /usr/share/vim/vim74/colors
                   set t_Co=256
                   "Active le coloration 256 couleur dans le terminal
                   colorscheme molokai
                   "Mettre la ligne en cour d'edition en valeur via une couleur
                   set cursorline
                   set cursorcolumn
                   hi cursorColumn guibg=#e196f6
                   hi CursorLine guibg=#e196f6

                   "Les abreviation vim
                   ab html <!DOCTYPE html><CR><html><CR><head><CR></head><CR><body><CR></body><CR></html>
                   </code></pre>
                   </article>
                   </section>
    </body>
</html>>
