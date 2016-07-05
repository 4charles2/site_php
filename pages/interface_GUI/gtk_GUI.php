        <section id="top_page">
            <h1><u>Interface Graphique</u></h1>
            <article>
                <ul>
                    <li><a href="#gtk_gui">GUI GTK</a></li>
                </ul>
            </article>
        </section>
        <section id="gtk_gui">
            <h1><u>interface GUI gtk</u></h1>
            <article>
                <p>Instalation : apt-get install libgtk2.0-dev</p>
                <p>Compilation avec gcc utilisé les flag : gcc $SRC ... $(pkg-config --libs --cflags gtk+-2.0)</p>
                <p>Mon Makefile :<pre><code>
NAME = fenetre
SRC = essaie.c
OBJ = essaie.o

GTK_FLAG = $$(pkg-config --cflags --libs gtk+-2.0)

CFLAG = -Wall -Werror -Wextra -ansi

all : $(NAME)

$(NAME): $(OBJ)
	gcc $(OBJ) $(GTK_FLAG) -o $(NAME)

$(OBJ):
	gcc $(CFLAG) -c $(SRC) $(GTK_FLAG)

clean:
	rm -f *.o

fclean: clean
	rm -f $(NAME)

re: fclean all</code></pre>
</p>
            </article>
            <h1><u>Le code de base à la création d'une fenetre</u></h1>
            <article>
                <p>Mon code primaire pour créer une fenetre</p>
                <p><pre><code>
#include &lt;stdlib.h&gt;
#include &lt;gtk/gtk.h&gt;

int main(int argc, char **argv)
{

	gtk_init(&amp;argc,&amp;argv);

	GtkWidget* label = NULL;
	GtkWidget* MainWindow = NULL;

	MainWindow = gtk_window_new(GTK_WINDOW_TOPLEVEL);
	/*initialisation du label*/
	label = gtk_label_new("Le jeu du Pendu");

	g_signal_connect(G_OBJECT(MainWindow), "delete-event", G_CALLBACK(gtk_main_quit), NULL);

	gtk_window_set_title(GTK_WINDOW(MainWindow), "Jeu du pendu");

	gtk_window_set_default_size(GTK_WINDOW(MainWindow), 800, 500);
	gtk_window_set_position(GTK_WINDOW(MainWindow), GTK_WIN_POS_CENTER_ALWAYS);
	gtk_window_set_icon_from_file(GTK_WINDOW(MainWindow), "pendu.ico", NULL);
	/*bouton fermer*/
	gtk_window_set_deletable(GTK_WINDOW(MainWindow), TRUE);

	/*dfinition des bordure de la fenetre*/
	gtk_window_set_frame_dimensions(GTK_WINDOW(MainWindow), 50,50,50,50);


	/*Rajouter notre label dans la fenetre */
	gtk_container_add(GTK_CONTAINER(MainWindow), label);

	/*Pour afficher tous les widgets dans la fenetre*/
	gtk_widget_show_all(MainWindow);
	gtk_main();

	return EXIT_SUCCESS;
}

/*Si je veux modifier le label*/
/*const variable = gtk_label_set_label(label, "La modification");
Pour aligner le texte soit à droite ou a gauche ALIGNEMENT
void gtk_label_set_justify(label, JType);
Les JType : GTK_JUSTIFY_LEFT Pour aligner le texte à gauche</code></pre></p>
            </article>
            <h1><u>Formatage du texte avec les balise</u></h1>
            <article>
                <p>Avec les balise simples ou courtes</p>
                <ol>
                    <li>&lt;b&gt; Met le texte en gras</li>
                    <li>&lt;i&gt; Mets le texte en italique</li>
                    <li>&lt;u&gt; Souligne le texte</li>
                    <li>&lt;s&gt; Barre le texte</li>
                    <li>&lt;sub&gt; Met le texte en indice</li>
                    <li>&lt;big&gt; Rend la police relativement plus grande (+1)</li>
                    <li>&lt;small&gt; Rend la police relativement plus petite (-1)</li>
                    <li>&lt;tt&gt; Met le texte en télétype</li>
                </ol>
                <p>Avec les attributs span</p>
                <ol>
                    <li>font_family : Nom de la police de caractère</li>
                    <li>face : C'est un autre attribut qui defini la police</li>
                    <li>size : C'est la taille de la police. Ont peut aussi utiliser 'xx-small','x-small','small','medium','large','x-large','xx-large' ou une valeur numerique</li>
                    <li>style : Ddefini le style des caractères : 'normal', 'oblique' ou 'italic'</li>
                    <li>weight : Défini le ton du gras du caractère : 'ultralight', 'light', 'normal', 'blod', 'ultrabold', 'heavy' ou une valeur numérique</li>
                    <li>variant : Met le texte en petites majuscules (smallcaps) ou en normal (normal, valeur par defaut).</li>
                    <li>stretch : Défini l'espacement des lettres: 'ultracondensed','extraexpanded' ou 'ultaexpended' </li>
                    <li>foreground : Defini la couleur du texte en valeur hexadecimale</li>
                    <li>background : Defini la couleur du fond texte en valeur hexadecimal</li>
                    <li>underline : Defini le soulignement du texte : 'single', 'double', 'low', 'none'</li>
                    <li>underline_color : Defini la couleur du soulignement en valeur hexadecimal</li>
                    <li>rise : Defini l'élévation du texte (en indice ou exposant) en valeur décimal (les valeur négatives sont possibles, pour mettre notament notre texte en indice)</li>
                    <li>strikethrough : Pour barrer son texte. la valeur doit être soit TRUE ou FALSE</li>
                    <li>strikethrough_color : Defini la couleur de la ligne qui barre le texte en valeur hexadecimale</li>
                    <li>fallback : Si votre caractère n'est pas disponible dans la police choisie, alors une police qui contient ce caractère sera choisi. Elle est activée par defaut.</li>
                    <li>lang : Defini la langue du texte</li>
                </ol>
                <p>Pour que cela fonctionne il faut indiquer que l'on utilise les fonctions de django</p>
                <p>Pour convertir le texte : Variable = g_locale_to_utf8("texte", balise);</p>
                <p>Puis ensuite prototype = void gtk_label_set_use_markup(GtkLabel *label, gboolean setting);</p>
            </article>
            <article>
                <p>Exemple : <pre><code>#include &lt;stdlib.h&gt;
#include &lt;gtk/gtk.h&gt;

int main(int argc,char **argv)
{
GtkWidget* Fenetre = NULL;
GtkWidget* Label = NULL;
gchar* TexteConverti = NULL;

gtk_init(&amp;argc, &amp;argv);

Fenetre = gtk_window_new(GTK_WINDOW_TOPLEVEL);  // Définition de la fenêtre
gtk_window_set_title(GTK_WINDOW(Fenetre), "Le texte avec les labels"); // Titre de la fenêtre
gtk_window_set_default_size(GTK_WINDOW(Fenetre), 300, 100); // Taille de la fenêtre

TexteConverti = g_locale_to_utf8("&lt;span face=\"Verdana\" foreground=\"#73b5ff\" size=\"xx-large\"&gt;&lt;b&gt;Le site du Zéro&lt;/b&gt;&lt;/span&gt;\n &lt;span face=\"Verdana\" foreground=\"#39b500\" size=\"x-large\"&gt;Le tuto GTK&lt;/span&gt;\n", -1, NULL, NULL, NULL);  //Convertion du texte avec les balises
Label=gtk_label_new(TexteConverti); // Application de la convertion à notre label
g_free(TexteConverti); // Libération de la mémoire

gtk_label_set_use_markup(GTK_LABEL(Label), TRUE); // On dit que l'on utilise les balises pango

gtk_label_set_justify(GTK_LABEL(Label), GTK_JUSTIFY_CENTER); // On centre notre texte

gtk_container_add(GTK_CONTAINER(Fenetre), Label);  // On ajoute le label a l'interieur de 'Fenetre'

gtk_widget_show_all(Fenetre); // On affiche 'Fenetre' et tout ce qu'il contient

g_signal_connect(G_OBJECT(Fenetre), "delete-event", G_CALLBACK(gtk_main_quit), NULL); // Je ne commente pas cette fonction, vous la verrez dans le chapitre suivant.

gtk_main();

return EXIT_SUCCESS;
}
</code></pre></p>
            </article>
            <h1><u>La gestion des evenements</u></h1>
            <article>
                <p>En cour</p>
            </article>
        </section>
