<!DOCTYPE html>
<html>
        <head>
            <title>SDL GUI</title>
            <?php include('../../header.php'); ?>
        </head>
        <body>
            <?php include('../../nav.php'); ?>
            <section>
                <h1><u>Interface Graphique SDL</u></h1>
                <article>
                   <ul> 
                       <li><a href="#instalation" >Instalation</a></li>
                       <li><a href="#Initialisation">Initialisation</a></li>
                       <li><a href="#Makefile">Makefile exemple</a></li>
                       <li><a href="#canevas_SDL">Conevas SDL</a></li>
                       <li><a href="#Erreur">Gerer les erreurs</a></li>
                       <li><a href="#fenetre">Ouvrir une fenetre</a></li>
                       <li><a href="#manipulation_basique">Manipulation Basique</a></li>
                       <li><a href="#manipulation_surface">Manipulation des surface</a></li>
                       <li><a href="#Gestion_couleurs">La Gestion des couleur</a></li>
                       <li><a href="#creation_surface">Creation de surface</a></li>
                       <li><a href="#Gestion_image_bmp">Gestion des images BMP</a></li>
                       <li><a href="#creation_icone">Creation d'un icone</a></li>
                       <li><a href="#gestion_transparence">Gestion de la transparence</a></li>
                       <li><a href="#SDL_image">Accepter tous les format d'image avec SDL_Image</a></li>
                       <li><a href="#evenements">Traiter les évenements</a></li>
                       <li><a href="#souri">Gérer les évenements souri</a></li>
                       <li><a href="#screen_event">Les évenements de la fenetre</a></li>
                       <li><a href="#time">La Gestion du temps</a></li>
                   </ul>
                </article>
            </section>
            <section id="instalation">
                <h1><u>Instalation</u></h1>
                <article>
                    <p>La telecharger et puis l'instaler dans le dossier du compilateur exemple : include/SDL et lib.</p>
                    <p>Pour la compilation le flag LDFLAGS</p>
                    <p>Documentation technique : <a href="https://www.libsdl.org">libsdl.org</a></p>
                </article>
            </section>
            <section id="Initialisation">
                <h1><u>Initialisation :</u></h1>
                <article>
                    <table>
                        <tr>
                            <th>Fonction</th>
                            <th>Description</th>
                        </tr>
                        <tbody>
                            <tr>
                                <td>SDL_Init()</td>
                                <td>Elle prend un paramettre fonction à initier</td>
                            </tr>
                            <tr>
                                <td colspan="2">Elle créer des mallocs pour les contantes ci-dessous</td>
                            </tr>
                            <tr>
                                <td>SDL_INIT_VIDEO</td>
                                <td>Chargement système d'affichage (vidéo)</td>
                            </tr>
                            <tr>
                                <td>SDL_INIT_AUDIO</td>
                                <td>Chargement système de du son</td>
                            </tr>
                            <tr>
                                <td>SDL_INIT_CDROM</td>
                                <td>Chargement système de CDROM pour manipuler le lecteur</td>
                            </tr>
                            <tr>
                                <td>SDL_INIT_JOYSTICK</td>
                                <td>Chargement système de gestion du joystick</td>
                            </tr>
                            <tr>
                                <td>SDL_INIT_TIMER</td>
                                <td>Chargement système de timer. Pour gerer le temps dans le programme</td>
                            </tr>
                            <tr>
                                <td>SDL_INIT_EVERTHING</td>
                                <td>Chargement de tous  système listé ci-dessus</td>
                            </tr>
                            <tr>
                                <td>SDL_Quit()</td>
                                <td>Pour fermer tout les Constantes. creer des free</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                            <td colspan="2">Exemple d'utilisation : SDL_Init(SDL_INIT_EVERTHING); Charge tous les systèmes</td>
                        </tr>
                        </tfoot>
                    </table>
                    <blockquote>
                        <p>Pour charger plusieurs Constante SDL_Init(SDL_INIT_VIDEO | SDL_INIT_AUDIO);</p>
                    </blockquote>
                </article>
            </section>
            <section id="Makefile">
                 <h1><u>Voici un fichier Makefile pour projet SDL</u></h1>
                <article>
                   <p><pre><code> 
CPP=gcc    #Commande du compilateur
CFLAGS=-O3 #Option d'optimisation du programme
LDFLAGS=-lSDL -lSDL_mixer #Linker
EXEC=nomProgramme  #Nom du programme à modifier

all: ${EXEC}

${EXEC}: ${EXEC}.o
	${CPP} $(CFLAGS) -o ${EXEC} ${EXEC}.o ${LDFLAGS}

${EXEC}.o: ${EXEC}.c
	${CPP} $(CFLAGS) -o ${EXEC}.o -c ${EXEC}.c


clean:	
	rm -fr *.o

mrproper: clean
rm -fr ${EXEC}</code></pre></p>
                </article>
            </section>
            <section id="canevas_SDL">
                <h1><u>Canevas de programme SDL</u></h1>
                <article>
                <p><pre><code>#include &lt;SDL/SDL.h&gt;

int main(int argc,char **argv)
{
    if(SDL_Init(SDL_INIT_VIDEO) == -1)
    {
        fprintf(stderr, "erreur d'initialisation de la SDL ; %s \n", SDL_GetError());
        exit(EXIT_FAILLURE);
        /*Renvoie l'erreur produit sur la sortie standard erreur*/
    }
    SDL_Quit();

    return EXIT_SUCCESS;
}</code></pre></p>
                </article>
            </section>
            <section id="Erreur">
                    <h1><u>Gerer les erreurs</u></h1>
                    <article>
                        <p>La fonction renvoie une valeur pour vérifier les erreurs.</p>
                        <p>-1 en cas d'erreur et 0 si tout c'est bien passé</p>
                        <p>Pour afficher les message d'erreur soit un fichier avec fprint();</p>
                        <p>Ou sur la sortie standard d'erreur</p>
                        <p>exemple : fprintf(stderr, "erreur d'initialisation de la SDL : %s \n", SDL_GetError());</p>
                    </article>
            </section>
        <section id="fenetre">
            <h1><u>Ouvrir une fenetre</u></h1>
            <article>
                <p>On initialise la video.</p>
                <p>Puis ont indique avec la fonction SDL_SetVideoMode() ces quatres paramètre</p>
                <ol>
                    <li>la largeur de la fenetre désiré en pixel</li>
                    <li>La hauteur de la fenetre</li>
                    <li>Le nombre de couleur affichables (en bits / pixel) 32 bits / pixel et le maximum</li>
                    <li>Les options (flags)</li>
                </ol>
                <table>
                    <tr>
                        <th>Les flags</th>
                        <th>Description</th>
                    </tr>
                    <tr>
                        <td>SDL_HWSURFACE</td>
                        <td>Les données seront chargées dans la mémoire vidéo</td>
                    </tr>
                    <tr>
                        <td>SDL_SWSURFACE</td>
                        <td>Les données seront chargé dans la mémoire système</td>
                    </tr>
                   <tr>
                        <td>SDL_RESIZABLE</td>
                        <td>La fenetre sera redimensionnable. Par default elle ne l'est pas</td>
                   </tr>
                   <tr>
                        <td>SDL_NOFRAME</td>
                        <td>La fenetre n'aura pas de barre de titre ni de bordure</td>
                   </tr>
                    <tr>
                        <td>SDL_FULLSCREEN</td>
                        <td>mode plein écran</td>
                    </tr>
                    <tr>
                        <td>SDL_DOUBLEBUF</td>
                        <td>mode double buffering. C'est une technique très utilisée dans les jeux 2D</td>
                    </tr>
                    <tr>
                        <td colspan="2">Permet un deplacement des objets plus fluides sans scintillement</td>
                    </tr>
                </table>
                <blockquote>
                    <p>Exemple : SDL_SetVideoMode(640, 480, 32, SDL_HWSURFACE | SDL_RESIZABLE | SDL_DOUBLEBUF);</p>
                    <p>Va créer un fenetre de 640 * 480 pixel avec 32 bits de couleur / pixel et chargera dans la mémoire vidéo.</p>
                    <p>avec une fenetre redimensionnable et un fonctionnement en double buffer</p>
                </blockquote>
            </article>
        </section>
        <section id="manipulation_basique">
            <h1><u>Les manipulation basique indispensable</u></h1>
            <article>
                <p>changer le titre de la fenetre et de l'icône</p>
                <p>Fonction SDL_WM_SetCaption() Elle prend deux parametre : Le titre de la fenetre et le titre de l'icône</p>
            </article>
        </section>
        <section id="manipulation_surface">
            <h1><u>Manipulation des surfaces</u></h1>
            <article>
                <p>La première surface à connaître et la surface screen qui corespond à l'écran dans la fenetre créer</p>
                <p>Toute surface sera mémorisé dans une variable de type SDL_Surface</p>
                <p>exemple : SDL_Surface *ecran = NULL;</p>
                <p>C'est un pointeur car c'est la SDL qui réservé l'espace necessaire avec malloc suivant les dimenssions que l'on lui attribura</p>
                <p>La fonction SDL_SetVideoMode() renvoie un pointeur su rla surface de l'écran</p>
                <p>Ont va donc pouvoir récuperer cette valeur pour l'envoyé à notre surface ecran</p>
                <p>Exemple : ecran = SDL_SetVideoMode(640, 480, 32, SDL_HWSURFACE);</p>
                <p>ecran vaudra NULL si SDL n'a pas réussi a charger la surface ou une autre valeur si elle à réussi</p>
            </article>
        </section>
        <section id="Gestion_couleurs">
            <h1><u>La Gestion des couleurs</u></h1>
            <article>
                <p>Pour colorer la surface avec une couleur unies : SDL_FillRect() Remplir rectangle</p>
                <p>Elle prend trois prametres : un pointeur sur la surface à colorer</p>
                <p>La partie de la surface qui doit être colorer</p>
                <p>La couleur à utiliser pour remplir la surface</p>
                <p>SDL_FillRect(surface, NULL, couleur);</p>
                <p>En SDL une couleur et stocker dans un nombre de type Uint32</p>
                <p>Uint32 pour 4octets</p>
                <p>Uint16 pour 2octets</p>
                <p>Uint8 pour 1octets</p>
                <p>Plus d'info dans le fichier SDL_types.h</p>
                <blockquote>
                    <p>La couleur se definie avec une fonction qui retourne un Uint32</p>
                    <p>SDL_MapRGB(SDL_Surface *surface[-&gt;format], couleur r, couleur g, couleur b</p>
                    <p>exemple : Uint32 couleur = SDL_MapRGB(screen-&gt;format, 38, 196, 236);</p>
                </blockquote>
                <blockquote>
                    <p><strong>voici une fonction pour definir la couleur d'une surface selectionné</strong>
                    <pre><code>SDL_FillRect(SDL_Surface *surface, NULL, SDL_MapRGB(surface-&gt;format, r, g, b));
SDL_Surface *screen = surface;
SDL_Fill_Rect(screen, NULL, SDL_MapRGB(screen-&gt;format, 32, 196, 236));
Apres ont met a jour l'écran SDL_Flip(screen);</code></pre></p>
                <blockquote>
            </article>
        </section>
        <section id="creation_surface">
            <h1><u>Creation de surface dans la fenetre</u></h1>
            <article>
                <p>SDL_Surface *rectangle = NULL</p>
                <p>SDL_CreateRGBSurface(Constante SDL, width, height, couleur bits/pixel, 0,0,0,0)</p>
                <p>rectangle = SDL_CreateRGBSurface(SDL_HWSURFACE, 220, 180, 32, 0, 0, 0, 0);</p>
                <p>il fraudra penser a liberer la memoire alouer une fois sont utilisation de la surface terminé</p>
                <p>Avec SDL_FreeSurface(rectangle)</p>
                <p>Une fois que la surface à été créer il faut la blitter sur une autre surface ou la fenetre pour la voir</p>
                <p>Par exemple SDL_BlitSurface(rectangle, NULL, screen, SDL_Rect &amp;position);</p>
                <p>SDL_Rect position est une structure que j'ai appeler ici position</p>
                <p>Il faut la declarer et lui donner des valeurs .</p>
                <p>Par exemple : position.x = 0; position.y = 0</p>
            </article>
        </section>
        <section id="Gestion_image_bmp">
            <h1><u>Gestion des image BMP</u></h1>
            <article>
                <p>Il faut utilisez une fonction qui charger dans l'image dans une surface</p>
                <p>masurface = SDL_LoadBMP("image.bmp");</p>
                <p>Pas besoin des fonctions : SDL_Create ou SDL_FillRect</p>
                <p>Par contre il faut la SDL_Blit</p>
            </article>
        </section>
        <section id="creation_icone">
            <h1><u>Creation d'un icone</u></h1>
            <article>
                <p>Pour créer un icone ont utilise la fonction SDL_WM_SetIcon(SDL_LoadBMP("img"), NULL);</p>
                <p>Atention cette fonction doit être déclaré avant SDL_SetVideoMode</p>
            </article>
        </section>
        <section>
            <h1><u>Gestion de la transparence</u></h1>
            <article id="gestion_transparence">
                <p>Pour gérer la transparence on utilise la fonction :</p>
                <p>Exemple réalisé avec avec une surface nommé SDL_Surface *personnage</p>
                <p>SDL_SetColorKey(personnage, SDL_SRCCOLORKEY, SDL_MapRGB(personnage-&gt;format, 0, 0, 255))</p>
                <p>Cette Fonction permet de gere la transparence sur une couleur</p>
                <p>Notament pour le fond d'une image c'est très pratique</p>
                <p>Puis ont blitte la surface sur la fentre</p>
                <p>SDL_BlitSurface(perosonnage, NULL, screen, &amp;position_personnage);</p>
                <h4>La transparence alpha (de l'image complete)</h4>
                <p>Pour donner une impression que une surface se melange avec une autre</p>
                <p>Ont utilise la fonction SDL_SetAlpha(personnage, SDL_SRCALPHA, 190);</p>
            </article>
        </section>
        <section id ="SDL_image">
            <h1><u>Accepter tous les format d'image avec SDL_image</u></h1>
            <article>
                <p>Il faut instaler la libs SDL_image </p>
                <p>Elle accepte tous les formats d'image et gère la transcparence des image</p>
                <p>Apres instalation inclure &lt;SDL/SDL_image.h&gt; </p>
                <p>Nom du paquet insntnalé lisdl-image1.2-dev</p>
                <p>Charger une image fonction : IMG_load(NameFile); </p>
                <p>Ont peut rendre l'image plus ou moins transparente avec SDL_SetAlpha(SDL_SURFACE*, SDL_SRCALPHA, 122);</p>
            </article>
        </section>
        <section id="evenements">
            <h1><u>Traiter les evennements</u></h1>
            <article>
                <h4>Pour récuperer un evenement</h4>
                <p>La variable d'événement</p>
                <p>SDL_Event NameEvent</p>
                <p>SDL_WaitEvent pour attendre un evenement le programme ce met en pause</p>
                <p>SDL_PollEvent vérifie si un evenement à eu lieu sinon rend la main au programm</p>
                <p>SDL_PollEvent ne met pas en pause le programme pratique dans le cas d'un tetris</p>
                <p>Pour verifier si tel evenement c'est produit un switch(Evenement.type)</p>
                <p>Evenement case SDL_QUIT:< br/>Si l'utilisateur appuie sur la croix de la fenetre< br />break;</p>
            </article>
                <p><a href="https://user.oc-static.com/ftp/mateo21/sdlkeysym.html">Liste de tous les mots clé</a></p>
            <article>
                <h4>Evenement Clavier</h4>
                <p>Deux type d'évenement générer par le clavier :</p>
                <p>Il y à l'évenement SDL_KEYDOWN et SDL_KEYUP</p>
                <p>Si l'utilisateur presse sur la touche ou la relache</p>
                <p>Utilidé le switch pour vérifier l'évenement</p>
            </article>
                <p><a href="https://wiki.libsdl.org/SDL_Keycode?highlight=%28\bCategoryEnum\b%29|%28SDLEnumTemplate%29">Liste doc officel</a></p>
            <article>
            <h4>Pour récuperer la valeur des touches enfoncer ou relacher</h4>
                <p>La valeur de la touche se trouve <code>Evenement.key.keysym.sym</code></p>
                <p>Voir les liens ci-dessus pour la liste complète des valeurs possibles</p>
                <p>Cette variable contient la valeur de la touche</p>
                <p>Exemple de code pour quitter le programme après avoir apuiyez sur la touche echap</p>
                <p><pre><code>int continuer = 1;
                SDL_Event Evenement;
while(continuer)
{
    SDL_WaitEvent(&amp;Evenement); //Atend un evenement
    switch(Evenement.type)
    {
        case SDL_QUIT://Si l'utilisateur click sur la croix
            continuer =0;
            break;
        case SDL_KEYDOWN://Si l'utilisateur apuie sur une touche
            switch(Evenement.key.keysym.sym)
            {
                case SDLK_ESCAPE://Si l'utilisateur appuie sur la touche echap
                    continuer = 0;
                    break;
            }
            break;
    }
    //Ont quitte la boucle si l'utilisateur appuie sur la croix ou sur la touche echap
}</code></pre>
            <p>Afin de pouvoir rester appuyez sur une touche il faut utiliser la fonction : SDL_EnableKeyRepeat</p>
            <p>Cette fonction permet d'activer la répitition des touches</p>
            <p>Ont peut l'appeler quand ont veux le mieu et tout de même de l'appeler avant la boucle </p>
            <p>Elle prend deux parametres le premier la duré en milisecondes avant activation de la répitition</p>
            <p>Le deuxieme la duree en milisecondes avant chaque répétition</p>
            <p><em>Exemple : SDL_EnableKeyRepeat(10, 10);</em></p>
            </article>
        </section>
        <section id="souri">
            <h1><u>Gérer les événements souris :</u></h1>
            <article>
                <p>Elle peut gérer trois types d'évenements</p>
                <ol>
                    <li>SDL_MOUSEBUTTONDOWN : Lorsque l'ont clique avec la souris</li>
                    <li>SDL_MOUSEBUTTONUP : Lorsqu'on relâche le bouton de la souris</li>
                    <li>SDL_MOUSEMOTION : Lorsque l'ont déplace la souris</li>
                </ol>
                <p>Pour récuperer l'évenement SDL_MOUSSEBUTTON* Evenement.button.button</p>
                <ol>
                    <li>SDL_BUTTON_LEFT : clic avec le bouton gauche de la souris</li>
                    <li>SDL_BUTTON_MIDDLE : clic avec le bouton du milieu de la souris</li>
                    <li>SDL_BUTTON_RIGTH : clic avec le bouton droit de la souris</li>
                    <li>SDL_BUTTON_WHEELUP : molette de la souris vers le haut</li>
                    <li>SDL_BUTTON_WHEELDOWN : molette de la souris vers le bas</li>
                </ol>
                <p>Pour recupere l'évenement SDL_MOUSEMOTION Evenement.motion.x ou y ou autre</p>
                <ol>
                    <li>Evenement.motion.x pour récupere positon de déplacement</li>
                    <li>Evenement.motion.y pour récupere position de déplacement</li>
                </ol>
            </article>
            <h4><u>Exemple de code :</u></h4>
            <article>
                <p><pre><code>int continuer = 0;
SDL_Event Evenement;
SDL_EnableKeyReapeat(10, 100);//Pour la répétition des évenements

while(continuer)
{
    SDL_WaitEvent(&amp;Evenement);
    switch(Evenement.type)
    {
        case SDL_MOUSEBUTTONUP://lorsque l'ont relache le bouton de la souris
            switch(Evenement.button.button)
            {
                case SDL_BUTTON_RIGHT:
                    continuer = 0;
                    break;
            }
            break;
    }
    //Si l'utilisateur clic sur le boutton droit au momment ou il sera relacher alors le programme s'ârretera
}
            </code></pre></p></article>
            <h4><u>Récuperer les coordonnées de la souris</u></h4>
            <article>
                <p>Pour récupérer les coordonnées de la souri au momment du clic</p>
                <p>Evenement.button.x et Evenement.button.y</p>
                <p>Pour récupérer les coordonnées lors du mouvement</p>
                <p>Evenement.motion.x et Evenement.motion.y</p>
                <p>Atention s'utilise avec le type SDL_MOUSEMOTION</p>
                <p>Pas avec SDL_MOUSSEBUTTON*</p>
            </article>
            <h4><u>Autres Fonctions pour la souris :</u></h4>
            <article>
                <p>Masquer le curseur ou le faire réaparaitre</p>
                <p>Ont appelle la fonction SDL_ShowCursor()</p>
                <p>Avec en paramètre soit : </p>
                <p>SDL_DISABLE : Pour le masquer</p>
                <p>SDL_ENABLE : Pour l'afficher</p>
                <p>Pour Placer la souri la ou ont le souhaite</p>
                <p>SDL_WarpMouse(screen-&gt;w / 2, screen-&gt;h /2);
            </article>
        </section>
        <section id="screen_event">
        <h1><u>Les evenements de la fenetre</u></h1>
            <article>
                <ul>
                    <li>Redimensionement de la fenetre< br/>Il faut utilisé le FLAG SDL_RESIZABLE dans setVideo< br/>
                    Une fois activé ont modifie la taille avec Evenement.resize.w et Evenement.rezise.h
                    </li>
                    <li>Le type d'evenement SDL_ACTIVEEVENT et généré lorsque la visibilité de la fenêtre est changé
                        <ol>
                            <li>Les différent evenement de type SDL_ACTIVEEVENT</li>
                            <li>event.active.gain : indique si l'évenement est un gain ou une perte de focus</li>
                            <li>event.active.state : return les types d'evenement produits
                                <ol>
                                    <li>SDL_APPMOUSEFOCUS : Le curseur de la souri vient de rentrer ou de sortir de la fenetre</li>
                                    <li>SDL_APPINPUTFOCUS : L'aplication vient de recevoir le focus du clavier ou de la perdre</li>
                                    <li>SDL_APPACTIVE : l'application à été icônifiée réduit en barre des taches</li>
                                    <li>Il n'y a qu'un signe &amp;
                                    <pre><code>if((event.active.state &amp; SDL_APPMOUSEFOCUS) == SDL_APPMOUSEFOCUS))
{
    if(event.active.gain == 0)
        pause = 1; //la fenetre et réduite
    else if (event.active.gain == 1)
        pause = 0; //La fenetre et restauré
}</code></pre>
                                    </li>
                                </ol>
                            </li>
                        </ol>
                    </li>
                </ul>
            </article>
        </section>
        <section id="time">
            <h1><u>La Gestion du temps</u></h1>
            <article>
                <p>Pour géré le temp avec SDL</p>
                <p>Deux fonctions utilies</p>
                <p>Deux fonctions utiles</p>
                <p>SDL_Delay Permet de mettre le programme en pause un certains nombre de millisecandes</p>
                <p>SDL_GetTicks retourne le nombre de millisecondes écoulées depuis le lancement du programme</p>
                <p>Exemple : <code>SDL_Delay(1000);</code> va mettre en pause le programme pour une durée de 1 seconde</p>
                <p>Exemple : <code>SDL_GetTicks();</code> Renvoie le temp écoulé en Uint32</p>
            </article>
        </section>
        </body>
</html>
