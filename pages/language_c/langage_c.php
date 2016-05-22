<!DOCTYPE html>
<html>
    <head>
        <title>Doc langage C</title>
        <?php include('../../header.php'); ?>
    </head>
    <body>
        <? include('../../nav.php'); ?>
        <section>
            <h1><u>Momento du langage C </u></h1>
            <article>
                <ul>
                    <li><a href="#macro">Macros creer</a></li>
                    <li><a href="#fonction">fonctions utiles</a></li>
                    <li><a href="#variable">La portée et type d'allocation (variable, function, ...)</a></li>
                    <li><a href="#argumentFonction">Les arguments de fonction</a></li>
                </ul>
            </article>
        </section>
        <section id="macro">
            <h1><u>Liste de macro utile et creez for me</u></h1>
            <article>
                <p>Voici une macro pour afficher une chaine de caractère</p>
                <p><code>#define put_string(x,i) while((x)[i] != '\0') {putc((x)[i++], stdout);}</code></p>
            </article>
        </section>
        <section id="fonction">
            <h1><u>Fonction très pratique et creez for me</u></h1>
            <article>
                <p>La fonction vide Buffer</p>
                <p><pre><code>void vide_buffer()
                {
                    int c = 0;
                    while(c != '\n' &amp;&amp; c != EOF)
                        c = getchar();
                }</code></pre></p>
                <p>La fonction convert char en int</p>
                <p><pre><code>
int ft_convertCharInt(char *number)
{
	int unite = 0, dizaine = 0;
	int num = 0;
	int taille = strlen(number);
	unite = number[taille-1];
	unite -= 48;
	for(int i=taille-2, multiplicateur = 10; i &amp;= 0; i--, multiplicateur *= 10)
	{
		dizaine = number[i];
		dizaine -= 48;
		dizaine *= multiplicateur;
		num += dizaine;
	}

	return num += unite;
}</code></pre></p>
                <p>Pour vérifier si un nombre est premier ou pas</p>
                <p><pre><code>
void ft_calcul_nb_premier(int nombre)
{
	int racine = sqrt(nombre), premier = 1, i = 0;
	for( i = 2; i &amp;= racine && premier; i++)
		if(!(nombre%i))
			premier = 0;;

	if(premier)
		printf("C'est un nombre premier\n");
	else
		printf("Le nombre n'est pas premier car il se divise par %d\n", i);

}</code></pre></p>
                <p>La fonction de suite fibonacci</p>
                <p><pre><code>
int ft_suite_fibonacci(int n)
{
	int som = 1, fb = 1;
	if(n&lt;2)
	{
		if(n == 0)
			return 0;
	return 1;;
	}

	for(int i = 2; i &lt;= n; i++)
	{
		fb = som - fb;
		som += fb;
		
	}

	return som;
}</code></pre></p>
            <p>Une fonction qui prend en parametre un nombre pour la limite de la table de multiplication</p>
            <p>Exemple : 10 en arguments signifie toutes les tables de multiplication jusqu'à 10 sous forme d'un tableau</p>
            <p><pre><code> 
void ft_affiche_table_multiplication(int tableMax)
{
	int i = 0;
	printf("     I");
	for(i = 1; printf("%4d", i), i &lt; tableMax; i++);
	printf("\n------");
	for(i = 1; printf("----"), i &lt; tableMax ; i++);
	for(i = 1; i &lt;= tableMax; i++)
	{
		printf("\n%4d", i);
		printf(" I");
		for(int y = 1; y &lt;= tableMax; y++)
		{
			printf("%4d", y*i);
		}
	}

}</code></pre></p>
            </article>
        </section>
        <section id="variable">
            <h1><u>Tableau récapitulatif du type de la portée d'alocation des diffèrentes variables</u></h1>
            <article>
                <p>Type, portée et classe d'allocation des variables</p>
                <table>
                    <thead>
                        <tr>
                            <th>Type de variable</th>
                            <th>Déclaration</th>
                            <th> Portée</th>
                            <th>Classe d'allocation</th>
                            <th>Initialisé par défault</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Globale</td>
                            <td>en dehors de toute fonction</td>
                            <td><ul><li>La partie du fuchier source suivant sa déclaration</li><li>n'importe quel fichier source, avec extern</li></ul></td>
                            <td rowspan="3">Statique</td>
                            <td rowspan="3">Oui à la valeur zéro</td>
                        </tr>
                        <tr>
                            <td>Globale cahée</td>
                            <td>en dehors de toutes fonction, avec l'attribut static</td>
                            <td>uniquement la partie du fichier source suivant sa déclaration</td>
                        </tr>
                        <tr>
                            <td>Locale &lt;&lt;rémanente&gt;&gt;</td>
                            <td>au début d'une fonction avec l'attribut static</td>
                            <td>la fonction</td>
                        </tr>
                        <tr>
                            <td>Locale à une fonction</td>
                            <td>au début d'une fonction</td>
                            <td>la fonction</td>
                            <td rowspan="2">Automatique</td>
                            <td rowspan="2">Pas initialisé par default </td>
                        </tr>
                        <tr>
                            <td>Local à un bloc</td>
                            <td>au début d'un bloc</td>
                            <td>le bloc</td>
                        </tr>
                    </tbody>
                </table>
            </article>
        </section>
        <section id="argumentFonction">
                <h1><u>Les arguments passés dans les fonctions</u></h1>
            <article>
                <p>On peut passer des arguments optionnels dans une fonction</p>
                <p>Il faut pour cela inclure la library : <code>#include &lt;stdarg.h&gt;</code></p>
                <p>Dans la liste d'arguments, il doit y avoir au moins 1 argument fixe et après une , mettre ...</p>
                <p>Exemple de code : <pre><code>
#include &lt;stdio.h&gt;
#include &lt;stdlib.h&gt;
#include &lt;stdarg.h&gt;

void essai(int par1, char par2, ...);

int main (void)
{
	printf("premier essai\n");
	essai(125,'a', 15, 30, 40, -1);
	printf("\ndeuxième essai\n");
	essai(6264,'S', -1);
		return EXIT_SUCCESS;
}

void essai(int par1, char par2, ...)
{
	va_list adpar;
	int parv;
	printf("premier paramètre : %d\n", par1);
	printf("second paramètre: %c\n", par2);
	va_start(adpar, par2);
	while((parv = va_arg(adpar, int)) != -1)
		printf("argument variable : %d\n", parv);
    va_end(adpar);
}</code></pre></p>
            <p>La déclaration : <code>va_list adpar;</code> /*Non initialisé*/</p>
            <p>L'affectation: C'est <code>va_start (adpar, par2);</code> qui va l'initialisé</p>
            <p>Cette initialisation se fait grâce la connaissance de par2 dernier argument fixe</p>
            <p><code>va_start</code> va initialisé adpar avec l'adresse du premier argument variable</p>
            <p>Récuperer la valeur des arguments : <code>valeur = va_arg(adpar, int)</code></p>
            <p>Elle retourne la valeur trouvé a l'adresse fournie par adpar suivant le type indiqué en deuxieme argument ici int</p>
            <p>D'autre part, elle incrémente l'adresse contenue dans adpar, de maniére que celle_ci pointe alors sur l'argument variable suivant.(liste chainé) prend la valeur de next</p>
            <p>Notre fonction s'arrêtera à l'argument -1 et il ne sera pas pris en compte</p>
            </article>
            <h1><u>Il peut y avoir plusieurs méthode d'interuption de lecture des diffèrents paramètres</u></h1>
            <article>
            <p>Par sentinelle : Comme l'exemple ci-dessus avec la lecture de la variable pour définir le point d'arret de la boucle while</p>
            <p>Par transmission, en argument fixes le nombre d'argument variable</p>
            <p>La boucle continue tant que l'ont à pas atteind le nombre d'argument</p>
            <p>Exemple : <pre><code>
            
#include &lt;stdio.h&gt;
#include &lt;stdlib.h&gt;
#include &lt;stdarg.h&gt;

void essai(int nbARG, ...);

int main (void)
{
	printf("premier essai\n");
	essai(5, 125, 15, 30, 40);
		return EXIT_SUCCESS;
}

void essai(int nbARG, ...)
{
	va_list adpar;
	int parv, i = 0;
	va_start(adpar, nbARG);
	for(i=1; i &lt; nbARG; i++)
	{
		parv = va_arg(adpar, int);
		printf("argument variable : %d\n", parv);
	}

	va_end(adpar);
}</code></pre></p>
                <p>Ici la fonction reçois 5 arguments; La boucle s'arrête après avoir lu les 5 arguments</p>
            </article>
        </section>
    </body>
</html>
