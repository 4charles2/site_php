        <section id="top_page">
            <h1><u>Construire un makefile :</u></h1>
            <article>
                <p><a href="#makefile_type">Makefile type avancée</a></p>
                <p><a href="#mon_makefile">Mon_makefile</a></p>
                <p><a href="#flags">Liste des flags</a></p>
                <p><a href="#exemple_makefile">exemple de Makefile</a></p>
                <p><a href="#commande_makefile">Commande Makefile</a></p>
                <p><a href="#nommage_variable">Règle des nommages de variable</a></p>
                <blockquote>Pour Voir ce que ferai un Makefile sans l'executer. Faire make -n</blockquote>
            </article>
        </section>
        <section id="flags">
            <h1><u>Voici la liste des flags et leur signification</u></h1>
            <article>
                <p><strong>-W</strong> : active les warnings</p>
                <p><strong>-Wall</strong> : tous les types de warning</p>
                <p><strong>-ansi</strong> : norme du C (d'ou l'interdiction par exemple du // pour les commentaires)</p>
                <p><strong>-pedantic</strong> : flags d'optimisation propres a gcc (exemple : variables non declarees, utilisation de variable sans initialisation)</p>
                <p><strong>-Werror</strong> : transforme les warning en erreur (ca compile pas)</p>
                <p><strong>-Wstrict</strong> : level max du warning ! (exemple : si une fonction n'a pas de parametre, mettre void)</p>
                <p><strong>-g</strong> : Affiche plus de debug quand on utilise gdb. A enlever avant de passer en soutenance !</p>
                <p>Deux flags à n'utilisé que si l'ont est sur de son code</p>
                <p>-02 : Optimise les performances du programme lors de la compilation</p>
                <p>-03 : Optimise lors de la compilation en privilegiant le poids de l'executable.</p>
            </article>
        </section>
        <section id="makefile_type">
            <h1><u>Makefile avancé</u></h1>
            <article>
                <p><pre><code>
#Makefile qui sélectionne tous les fichiers .c dans le répertoire#
#avec condition pour option -g pour deboggage activer par default valeur DEBUG a changer
#Makefile silencieu @ devant les lignes de commande
EXEC=test
CC=gcc
DEBUG=yes
FLAGS=-W -Wall -Werror -Wextra -ansi -pedantic
LDFLAGS=#Pour les boucles for -std=c99 ou pour autre lib -lsdl -LChemin par exemple
SRC=$(wildcard *.c)
OBJ=$(SRC:.c=.o)

ifeq ($(DEBUG),yes)
	CFLAGS= -g $(FLAGS)
else
	CFLAGS= $(FLAGS)
endif

all: $(EXEC) clean
ifeq ($(DEBUG),yes)
	@echo "Generation avec debug"
else
	@echo "Generation sans debug"
endif

$(EXEC): $(OBJ)
	@$(CC) -o $@ $^ $(LDFLAGS)

$(OBJ): $(SRC)
	@$(CC) $^ -c $(CFLAGS)

#regle .PHONY avec dependance des règles qui doivent être éxecuter même si un fichier plus récent existe
.PHONY: clean fclean

clean:
	@rm -rf $(OBJ)

fclean: clean
	rm -rf $(EXEC)
#Mettre le symbole @ devant les ligne de commande afin qu'elle n'apparaise pas dans la console on dit l'echo des lignes des commandes
re: fclean all</code></pre></p>
            </article>
        </section>
        <section id="exemple_makefile">
            <h1><u>Exemple de fonctionnement d'un Makefile</u></h1>
            <article>
                <pre><code>all :
                cc -o machin machin.c

                NAME    =   executable

                SRCS    =   main.c          \
                            autre_fichier.c     \
                            et_voila.c              ## Le dernier n'a pas de '\'

                            OBJS    =   $(SRCS:.c=.o)
                            ## Compile les fichiers .c en .o. Une sorte de precompiation.

                            CC  =   cc

                            CFLAGS  +=  -W -Wall -ansi -pedantic
                            ## Le '+=' permet de ne pas ecraser les flags par defaut.
# Ici je n'ai mis que quelques flags simples, j'en ajouterai dans la suite du cours.

                            LIB    =   -L. -lmalib
                            ## Dans l'exempe, la lib doit se trouver dans le dossier courant.

                            RM =   rm -f
                            ## Le -f evite les messages d'erreurs si on tente d'effacer
                            un fichier qui n'existe pas.
# (En fait, il force la suppression quoi qu'il arrive.)

                            CLEAN  =   clean
                            ## Pas obigatoire mais pratique, permet d'enever les fichiers ~

                            all    :
                            @make $(NAME)
                            ## Contrairement aux dependances, cette methode permet d'afficher
                                d'eventuels messages d'erreur.
                            # Le @ permet de ne pas afficher la commande.
                $(NAME)    :   $(OBJS)
                $(CC) -o $(NAME) $(OBJS) $(LIB)
                ## NB : Pas besoin de mettre $(CFLAGS), ceux-ci se mettent tout seuls.

                 clean   :
                 $(RM) $(OBJS)               ## Cette regle supprime les fichiers .o
                 @$(CLEAN)                # Et celle-ci les fichiers ~

                fclean  :   clean
                ## Cette regle appelle la precedente puis supprime l'executable.
                $(RM) $(NAME)

                re  :   fclean all
                ## Cette regle supprime .o et executable puis recompile le tout.
# Il faut toujours l'utiliser apres modification d'un .h !</code></pre>
            </article>
        </section>
        <section id="commande_makefile">
            <h1><u>Listes des commandes Makefile et leur utilisations :</u></h1>
            <article>
                    <h4>Variable :</h4>
                    <ul>
                            <li>déclaration : Variable = NomVariable</li>
                            <li>Utilisation : $(NomVariable)</li>
                    </ul>
                    <h4>Règle principale nommé (all)</h4>
                    <h4>clean : all </h4>
                        <blockquote>-rm *.o va suprimer tous les fichier .o créer après l'éxecution de all<br />le - devant rm demande à make de ne pas s'arrêté en cas d'erreur lors l'éxecution de cette commande</blockquote>
            </article>
        </section>
        <section id="nommage_variable">
        <h1><u>Les règles utilisée pour nommées les variables</u></h1>
        <article>
        <p>
        <pre><code>pour les variables, on utilisera là aussi des conventions.

        Pour les noms d'exécutables et d'arguments :

        AR : programme de maintenance d'archive (ar) ;

CC : compilateur C (gcc) ;

CXX : compilateur C++ (g++) ;

RM : commande pour effacer un fichier (rm) ;

TEX : programme pour créer un fichier TeX dvi à partir d'un source TeX (latex) ;

ARFLAGS : paramètres à passer au programme de maintenance d'archives ;

CFLAGS : paramètres à passer au compilateur C ;

CXXFLAGS : paramètres à passer au compilateur C++ ;

LDFLAGS : paramètres à passer au compilateur pour l'éditions de liens.

Pour les noms de répertoires et les destinations :

prefix : racine du répertoire d'installation (= /usr/local) ;

exec_prefix : racine pour les binaires (= $(prefix)) ;

bindir : répertoire d'installation des binaires (= $(exec_prefix)/bin);

libdir : répertoire d'installation des librairies (= $(exec_prefix)/lib) ;

datadir :
répertoire d'installation des données statiques pour le programme (= $(exec_prefix)/lib) ;

statedir :
répertoire d'installation des données modifiables par le programme (= $(prefix)/lib);

includedir : répertoire d'installation des en-têtes (= $(prefix)/include) ;

mandir : répertoire d'installation des fichiers de manuel (= $(prefix)/man) ;

manxdir : répertoire d'installation des fichiers de la section x du manuel (= $(prefix)/manx);

infodir : répertoire d'installation des fichiers info (= $(prefix)/info) ;

srcdir: répertoire d'installation des fichiers sources (= $(prefix)/src).

Les variables automatiques

Makefile permet aussi l'utilisation de variables automatiques, 
calculées lors de l'exécution de chaque règle.

$@ : nom de la cible ;

$&lt; : première dépendance de la liste des dépendances ;

$? : les dépendances plus récentes que la cible ;

$^ : toutes les dépendances ;

$* : correspond au ' * ' simple dans le shell, i.e. représente n'importe quel nom.</code></pre></p>
            </article>
        </section>
        <section id="mon_makefile">
            <h1><u>Mon makefile pour compilation langace C</u></h1>
            <article>
                <p><pre><code>
NAME = pendu
SRC = main.c \
      main.h
CC = gcc
CFLAG += -c -Wall -Werror -Wextra
#option -c permet de ne pas linker et de creer les fichiers .o
all : $(NAME)

$(NAME): main.o
	$(CC) main.o -o $(NAME)

main.o:
	$(CC) $(CFLAG) $(SRC)

clean :
	rm -f main.o

fclean : clean
	rm -f $(NAME)

re: fclean all</code></pre></p>
            </article>
        </section>
