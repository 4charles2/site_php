		<script type="text/x-mathjax-config">
		  MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
		  
		</script>
		<script type="text/javascript" async
		  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_CHTML">
		</script>
		<section id="top_page">
			<h1><u>Calcul decimal et binaire ! </u></h1>
			<article>
				<ul>
					<li><a href="#notion_chiffre">La notion de chiffre</a></li>
					<li></li>
				</ul>
			</article>
		</section>
		<section id="notion_chiffre">
			<h1><u>La notion de chiffre : </u></h1>
			<article>
				<p>Tout nombre entier b &gt;= 2 peut être utilidé comme base pour représenter des nombres. Pour pouvoir écrire des nombre en base b, il faut avant tout trouver b symboles diffèrents. Chacun représentera un nombre compris entre zéro et b-1. Ces symbôles sont appelés des chiffres.</p>
				<p>Pour ce faire comprendre on va cependant utilisés des chiffres classique.</p>
				<ul>
					<li>en base $_2$ : 0 et 1</li>
					<li>en base $_8$ : 0, 1, 2, 3, 4, 5, 6, 7</li>
					<li>en base $_{10}$ : 0, 1, 2, 3, 4, 5, 6, 7, 8, 9</li>
					<li>en base $_{16}$ : 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, A, B, C, D, E, F(A pour 10 etc ..)</li>	
				</ul>
				<cite>Pour savoir dans quel base est écrit un nombre on utilise la syntaxe suivante : $101010_2=52_8=42_{10}=2A_{16}$.</cite>
				<figure>
				<p>Pour convertir un nombre ou un chiffre (Max base 36) Il nous faut déjà deux fonctions qui feront la convertion : </p>
				<pre><code>
#include &lt;stdio.h&gt;
#include &lt;stdlib.h&gt;
//Permet de convertir un nombre des base b &lt;= 36
char *tabChiffre = {"0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"};

char chiffre(int nb);
int nombre(char ch);

int main (void)
{
	chiffre(10);
	nombre('A');
	return EXIT_SUCCESS;
}

char chiffre(int nb)
{
	return tabChiffre[nb];
}

int nombre(char ch)
{
	int index = 0;
	while (tabChiffre[index])
	{
		if (tabChiffre[index] == ch){
			return index;}
		index++;
	}
}
				</code></pre>
				</figure>
				<h3><u>Approche mathématique : </u></h3>
				<p>Pour calculer l'entier représenter par une telle écriture, plaçons nous en base b : nous avons b chiffres représentant chacun un nombre entre 0 et b-1. La notation $n = (c_p...c_0)_b$ où les $c_i$ sont des chiffres est en fait un raccourci signifiant $n = n_pb^p + ... + n_2b^2 + n_1b + n_0 = \sum^p_{i=0} n_ib^i$ où $n_i$ est le nombre représenté par le chiffre $c_i$</p>
				<p>Pour mieux comprendre, revenons au nombre quarante-deux. Pour utiliser l'écriture binaire, nous allons avoir besoin des puissances de deux : </p>
				<blockquote>$\begin{matrix} 2^0=1 & 2^1=2 & 2^2=4 & 2^3=8 & 2^4=16 & 2^5=32 & 2^6=64 & 2^7=128 & 2^8=256 & \dots \end{matrix}$</blockquote>
				<p>Vérifions que $101010_2=52_8=42_10=2A_{16}$ : </p>
				<ul>
					<li>$42_{10}=4\times10+2=42$ Donc 42 est bien l'écriture (42 en décimale) de quarante-deux</li>
					<li>$52_8=5\times8+2=42$ 52 en octal est bien égale à $42_{10}$ (42 en décimale)</li>
					<li>$2A_{16}=2\times16+10=42$ 2A héxadécimal est bien égale à $42_{10}$ (42 en décimale)</li>
					<li>$101010_2=1\times2^5+0\times2^4+1\times2^3+0\times2^2+1\times2+0=32+8+2=42$ en binaire 101010 est bien égale à $42_{10}$ (42 en décimale)</p>
				</ul>
				<p>Voici une application algorithmique : </p>
				<pre><code>

#include &lt;stdio.h&gt;
#include &lt;stdlib.h&gt;
#include &lt;string.h&gt;
//Permet de convertir un nombre des base b &lt;= 36
char *tabChiffre = {"0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"};

char chiffre(int nb);
int nombre(char ch);
int lire_rep(char *rep, int b);

int main (void)
{
	printf("Le résultat = %d\n",lire_rep("101010", 2));
	return EXIT_SUCCESS;
}

int lire_rep(char *rep,int b)
{
	int nb_chiff=strlen(rep);
	int somme=0;
	int b_puiss_i=1;
	int c_i = 0;
	for(int index = 0; index &lt; nb_chiff; index++)
	{
		c_i = rep[nb_chiff - index - 1];
		somme = somme + nombre(c_i) * b_puiss_i;
		b_puiss_i = b_puiss_i * b;
	}
	return somme;
}

char chiffre(int nb)
{
	return tabChiffre[nb];
}

int nombre(char ch)
{
	int index = 0;
	while (tabChiffre[index])
	{
		if (tabChiffre[index] == ch){
			return index;}
		index++;
	}
}
				</code></pre>
				<p>Notre calcul revient à calculer la valeur du polynôme $n=n_pX^p+\dots+n_2X^2+n_1X+n_0=\sum^p_{i=0}n_iX^i$ au point b.</p>
				<p>Pour faire le calcul plus efficacement, on peut appliquer la méthode dite de Horner, comme suit.</p>
				<cite>Prenons $n=n_pb^p+n_{p-1}b^{p-1}+\dots+n_1b+n_0$.</cite>
				<p>On peut l'écrire sous la forme $n = (( \dots ((n_p b + n_{p-1}) b + n_{p-2}) b + \dots) b + n_1) b + n_0$</p>
				<p><strong>En faisant les calculs dans cet ordre, on obtient n sans avoir à calculer les puissances de b .</strong></p>
				<p>Par exemple : $101010_2 = ((((1 \times 2 + 0) \times 2 + 1) \times 2 + 0) \times 2 + 1) \times 2 + 0 = 42$ avec un simple calcul mental</p>
				<p>En algorithme : </p>
				<pre><code>
#include &l;stdio.h&gt;
#include &lt;stdlib.h&gt;

//Permet de convertir un nombre des base b &lt;= 36
char *tabChiffre = {"0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"};

char chiffre(int nb);
int nombre(char ch);
int lire_rep(char *rep, int b);

int main (void)
{
	printf("Le résultat = %d\n",lire_rep("101010", 2));
	return EXIT_SUCCESS;
}

int lire_rep(char *rep,int b)
{
	n=0;
	for(int index = 0; rep[index]; index++)
	{
		n = n * b + nombre(rep[index]);
	}
	return n;
}

char chiffre(int nb)
{
	return tabChiffre[nb];
}

int nombre(char ch)
{
	int index = 0;
	while (tabChiffre[index])
	{
		if (tabChiffre[index] == ch){
			return index;}
		index++;
	}
}
			</code></pre>
			<h3><u>Représentation en base b</u></h3>
			<p>Le résultat mathématique fondmental qui permet de justifier notre écriture est le suivant : </p>
			<blockquote>
				<p>Fixons un nombre entier $b\ge2$ qu'on appellera base (b=2,8,10 ou 16 en pratique).</p>
				<p>Alors tout nombre entier n&gt;0 peut se décomposer dans cette base</p>
				<p>Il existe une unique famille de nombres entier $n_0,\dots,n_p$ tels que $n=n_pb^p+\dots+n_2b^2+n_1b+n_0=\sum^p_{i=0}n_ib^i$ avec $0\le n_i\le b-1$ pour tout i et $n_p \ne0$.</p>
				<p>On écrit ce nombre $n=(c_p\dotsc_0)_b$ où $c_i$ est le chiffre représentant le nombre $n_i$ en base b</p>
			</blockquote>
				<h6>Deux information primordiales se cachent dans cette énoncé : </h6>
				<ul>
					<li>Tout entier a une écriture en base b</li>
					<li>Il y a unicité d'une telle écriture</li>
				</ul>
				<h6>Quelque commentaires : </h6>
				<ul>
					<li>Le nombre zéro est un cas particulier qui n'est pas concerné par ce résultat, on le note 0 dans toutes les bases;</li>
					<li>La condition $0\le n_i \le b-1$ signifie que chaque $n_i$ peut être représenté par un chiffre en base b</li>
					<li>La condition $n_p\ne 0$ signifie que le chiffre le plus à gauche n'est pas 0, ce qui est necessaire pour assurer l'unicité de la décomposition car $42_{10}=042{10}=0042_{10}$</li>
					<li>En binaire, le chiffre $c_i$ est appelé bit de poids i (bit: contraction de binary digit, c.-à-d. chiffre binaire en anglais).</li>
					<li>On parle de bit de poids fort ou MSB(Most Significant Bit) pour designer le bit de poids maximal, ici $c_p$</li>
					<li>On parle de bit de poids faible ou LSB(Least Significant Bit) pour désigner le bit de poids minimal, ici $c_0$</li>
				</ul>
				<p>Tout le problème est maintenant de savoir comment caculer les $n_i$ à partir du nombre n pour en déduire les $c_i$. Comme il y a uncité de la décomposition, il suffit d'en trouver une qui convient. Nous verrons deux méthodes pratiques pour y arriver.</p>
				<h3>Nombre de nombres à q chiffres</h3>
				<p>Un autre résultat intéressant est le suivant : </p>
				<blockquote>
					<p>On peut écrire $b^q$ nombre à q chiffres en base b, les chiffres de poids fort étant éventuellement nuls. Ce sont les nombres de 0 à b^q-1.</p>
				</blockquote>
				<p>Autrement dit en base 2 : </p>
				<ul>
					<li>Avec trois bits, on peut écrire les nombres de 0 à 7, il y en a 8;</li>
					<li>Avec quatre bits, on peut écrire les ombres de 0 à 15, il y en a 16</li>
					<li>Avec un octet, c'est-à-dire huit bits, on peut écrire les nombres de 0 à 255, il y en a 256</li>
				</ul>
				<h3><u>Codage par division successives</u></h3>
				<h4>Approche mathématique</h4>
				<p>Pour cette méthode, nous allons utiliser la division euclidienne.</p>
				<cite>Division euclidienne de a par b</cite>
				<blockquote>
					<p>Soit $a\ge0$ et $b\gt 0$. Alors il existe  un unique quotient $q\ge0$ et un unique reste $r\ge0$ avec $r\lt b$ tel que $a=b_q+r$.</p>
				</blockquote>
				<p>Trois choses importantes cette fois : l'existence, l'unicité et le fait que r soit strictement inférieur à b.</p>
				<p>Prenons un nombre n.</p>
				<p>Nous savons qu'il s'écrit $n=n_pb^p+\dots+n_2b^2+n_1b+n_0=\sum^p_{i=0}n_ib^i$ avec $0\le n_i \le b-1$ pour tout i et $n_p\ne0$.</p>
				<p>Nous voulons déterminer les $n_i$.</p>
				<p>En factorisant par b, on obtient $n=b(n_pb^{p-1}+\dots+n_2b+n_1)+n_0$.</p>
				<p>Posons $q = n_p b^{p-1} + \dots + n_2 b + n_1 = \sum_{i=1}^{p}{n_i b^{i-1}}$ et $r=n_0$.</p>
				<p>En remplaçant, on a $n=b_q+r$ avec $r\lt b$ !</p>	
				<p>Ainsi par unicité de la division euclidienn de n par b</p>
				<ul>
					<li>Le reste de cette division est $r=n_0$</li>
					<li>Le quotient est $q=n_pb^{p-1}+\dots+n_2b+n_1=\sum_{i=1}^{p}{n_ib^{i-1}=\sum_{i=0}^{p-1}{n_{i+1}b^i}}$
					</li>
				</ul>
				<p>Ce quotient est un nombre comme un autre, nous pouvons le décomposer dans la base b.</p>
				<p>Mieux encore, nous connaissons déjà son écriture en base b ! </p>
				<p>En effet, on peut écrire que $q = n'_{p-1} b^{p-1} + \dots + n'_1 b + n'_0 = \sum_{i=0}^{p-1}{n'_i b^i}$ en posant $n'_i = n_{i+1}$.</p>
				<p>Autrement dit, si $n=(c_p\dotsc_0)_b$ alors $q=(c_p\dotsc_1)_b$ et $r=(c_0)_b$ où q et r sont respectivement le quotient et le reste de la division euclidienne de n par b.</p>
				<h4>Application pratique</h4>
				<p>Prenons un nombre n s'écrivant $n=(c_p\dotsc_0)_b$ en base b.</p>
				<p>On peut alors montrer qu'en divisant n par b.</p>
				<ul>
					<li>Le reste est $r=(c_0)_b=n_0$</li>
					<li>Le quotient est $q=(c_p\dots c_1)_b$, donc en divisant ce quotient par b.</li>
					<ul>
						<li>Le reste est $r'=(c_1)_b=n_1$</li>
						<li>le quotient est $q'=(c_p\dots c_2)_b$, donc en divisant ce quotient par b</li>
						<ul>
							<li>Le reste est $r''=(c_2)_b=n_2$</li>
							<li>Le quotient est $q''=(c_p\dots c_3)_b$, donc en divisant ce quotient par b</li>
							<ul>
								<li>...</li>
							</ul>
						</ul>
					</ul>
				</ul>
				<p><strong>Le premier reste calculé correspond au dernier chiffre, et non au premier!</strong></p>
				<p>En divisant à chaque fois le quotient précédent par b, on obtient petit à petit les $n_i$, se sont les restes des divisions successives. Il reste un point à préciser : quand doit-on s'arrêter ? En effet, on ne peut pas savoir à l'avance combien de fois nous allons devoir répéter le processus car le paramètre p est un nombre inconnu.</p>
				<p>Puisque $b^p\le n \lt b^{p+1}$, p est la partie entière de $log_b(n)=\frac{ln(n)}{ln(b)}$, mais cette formule est inutile ici.</p>
				<p>En fait, comme la condition $(cp)_b=n_p\ne 0$ est imposée, on aura toujours un quotient strictement positif sauf pour la toute dernière division, pour laquelle on obtiendra $r=(c_p)_b=n_p$ et $q=0$. Il faut donc s'arrêter  dès que l'on obtient un quotient null !</p>
				<h5>En decimmal</h5>
				<p>Pour bien voir qu cette méthode fonctionne, commençons par chercher l'écriture décimale  de quarante-deux.</p>
				<p>Si on divise quarante-deux par 10</p>
				<ul>
					<li>Le reste est $r=2=(c_0)$ donc le dernier chiffre sera 2.</li>
					<li>Le quotient est $q=4$, et en divisant ce quotient par dix</li>
					<ul>
						<li>Le reste est $r'=4=(c_1)$ donc l'avant-dernier chiffre sera un 4</li>
						<li>Le quotient est $q'=0, on s'arrête.</li>
					</ul>
				</ul>
				<p>On obtient (et heureusement!) que quarante-deux s'écrit 42 en base 10 !</p>
				<h5>En binaire</h5>
				<p>Si on divise quarante-deux par deux</p>
				<ul>
					<li>Le reste est $r=0=(c_0)$ donc le dernier chiffre sera un 0</li>
					<li>Le quotient est $q=21$, et en divisant ce quotient par deux </li>
					<ul>
						<li>Le reste est $r'=1=(c_1) donc l'avant-dernier chiffre sera un 1</li>
						<li>Le quotient est $q'=10$, et en divisant ce quotient par deux </li>
						<ul>
							<li>Le reste est $r''=0à(c_2)</li>
							<li>Le quotient est $q''=5$, et en divisant ce quotient par deux</li>
							<ul>
								<li>Le reste est $r_3=1=(c_3)</li>
								<li>Le quotient est $q_3=2$, et en divisant ce quotient par deux .</li>
								<ul>
									<li>Le reste est $r_4=0=(c_4)$ donc l'avant dernier chiffre sera un 1</li>
									<li>Le quotient est $q_4=1$, et en divisant ce quotient par deux.</li>
									<ul>
										<li>Le reste est $r_5=1(c_5)$ donc l'avant dernier chiffre sera un 1</li>
										<li>Le quotient est $q_5=0$, n s'arrête</li>
									</ul>
								</ul>
							</ul>
						</ul>
					</ul>
				</ul>
				<p>En mettant les chiffres dans le bon ordre, on obtient bien que quarante-deux s'écrit 101010 en binaire.</p>
				<figure>
					<figcaption>Pour bien comprendre voici le schema de calcul : </figcaption>
					<img src="pages/calcul_binaire/division_calcule_binaire.png" alt="schema calcule division binaire"/>
				</figure>
				<blockquote>
					<p>Cette méthode a l'avantage d'être simple, puisque la division par deux est facile à réaliser, mais elle necessite de nombreux calculs car les plus petits nombres s'écrivent déjà avec beaucoup de chiffres en binaire. C'est pourquoi il peut être plus avantageux de commencer par écrire le nombre en héxadécimal ou en octal puis d'en déduire l'écriture binaire, ce qui se fait très simplement comme nous le verrons plus loin.</p>
				</blockquote>
				<h5>Application algorithmique</h5>
				<p>Fonction repr_nombre(n,b) prenant en entrée un nombre entier et une base, et retournant une chaîne de caractères représentant le nombre en question dans la base voulue. Cette fonction utilisera la fonction chiffre(n) précédement définie.</p>
				<p>Le résultat de la fonction : </p>
				<pre><code>
#include &lt;stdio.h&gt;
#include &lt;stdlib.h&gt;
#include &lt;string.h&gt;
//Permet de convertir un nombre des base b &lt;= 36
char *tabChiffre = {"0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"};

char chiffre(int nb);
int nombre(char ch);
int lire_rep(char *rep, int b);
char *repr_nombre(int n, int b);

int main (void)
{
	//Convertir binaire en decimal
	printf("Le résultat = %d\n",lire_rep("101010", 2));
	//Convertir un nombre decimal en base préciser
	printf("Le résultat = %s\n", repr_nombre(42, 16));
	return EXIT_SUCCESS;
}

char *repr_nombre(int n, int  b)
{
	//Avec des division euclidienne
	char *rep = malloc(sizeof(char));
	char *tmp;
	int q = n;
	int r = 0;
	int index = 0;
	while(q!=0)
	{
		r = q%b;
		if(!realloc(rep, strlen(rep)+1)){
			printf("erreur realloc");
		}
		tmp = malloc(sizeof(char) * strlen(rep));
		strcat(tmp, rep);
		rep[0] = chiffre(r);
		strcat(rep, tmp);
		free(tmp);
		q = q/b;
	}
	return rep;
}

int lire_rep(char *rep,int b)
{
	//Avec les puissance
	int nb_chiff=strlen(rep);
	int somme=0;
	int b_puiss_i=1;
	int c_i = 0;
	for(int index = 0; index &lt; nb_chiff; index++)
	{
		c_i = rep[nb_chiff - index - 1];
		somme = somme + nombre(c_i) * b_puiss_i;
		b_puiss_i = b_puiss_i * b;
	}
	return somme;
}

char chiffre(int nb)
{
	return tabChiffre[nb];
}

int nombre(char ch)
{
	int index = 0;
	while (tabChiffre[index])
	{
		if (tabChiffre[index] == ch){
			return index;}
		index++;
	}
}
				</code></pre>
				<p>On calcule les quotients et les restes successifs en remplissant au fur et à mesure la chaîne représentative du nombre. Quelque commentaires :</p>
				<ul>
					<li>On utilise une boucle faisant évoluer deux paramètres:</li>
						<ul>
							<li>La chaîne contenant les chiffres qu'on déjà calculés;</li>
							<li>Le quotient q;</li>
						</ul>
					<li>On s'arrête quand q est nul</li>
					<li>Le nombre zéro est un cas particulier à traiter séparement.</li>
				</ul>
				<h3>Codage par une soustraction successives</h3>
				<h5>Méthode générale</h5>
				<p>Le codage par soustractions successives est une méthode pratique simple : on soustrait à chaque fois la puissance de b inférieure la plus proche,jusqu'à obtenir zéro. En regroupant les termes que l'on a soustrait, on obtient les $n_i$</p>
				<p>Cette méthode permet d'écrire rapidement un nombre en base 2, notamment quand celui-ci a beaucoup de zéros dans son écriture binaire. ELle nécessite cependant une connaissance exacte des puissances de b, ce qui explique qu'on l'utilise peu pour les autres bases : les puissances de 2 sont simples à retenir, celles de 8 et de 16 le sont moins.</p>
				<h5>En décimal</h5>
				<p>Écrire quarante-deux en décimal ?</p>
				<p>La puissance de 10 inférieure la plus proche est 10, on peut la soustraire quatre fois et il reste deux.</p>
				<p>Donc $42=4\times 10+2=42_10$, c'est bien l'écriture décimale de quarante-deux.</p>
				<h5>En  Binaire</h5>
				<p>Restons fidèles au nombre quarante-deux.</p>
				<p>La puissance de 2 inférieure la plus proche est 32, on peut la soustraire une fois et il reste 10. Maintenant la puissance inférieur la plus proche est 8, on peut la soustraire une fois et il reste 2, qui est une puissance de 2.</p>
				<p>Donc $42=32+8+2=1\times 2^5+0\times 2^4+1\times 2^3 + 0 \times 2^2+1\times 2 + 0=101010_2$.</p>
				<h3>D'une base à l'autre</h3>
				<p>Nous savons maintenant comment lire et écrire une représentation en base b. Ainsi si nous voullions déduire la représentation binaire d'un nombre de sa représentation héxadécimale, nous pourrions commencer par calculer le nombre puis l'écrire en binaire. <em>En fait, l'étape de calcul est inutile parce qu'il existe une astuce pour passer directement du binaire à l'héxadécimal ou à l'octal et inversement .</em></p>
				<h5>Binaire et hexadécimal</h5>
				<p>Prenons un nombre et décomposons-le dans les bases 2 et 16 :</p>
				<ul>
					<li>$n=b_p2^p+\dots +b_22^2+b_12+b_0=\sum^p_{i=0}b_i2^i$ avec $b_i=0$ ou 1 pour tout i et $b_p\ne 0$</li>
					<li>$n=h_q16^q+\dots +h_216^2+h_116+h_0=\sum^q_{j=0}h_j16^j$ avec $0\le h_j \le 15$ pour tout j et $h_q\ne 0$.</li>
				</ul>
				<p>Comme $2^4=16$ on peut écrire que $n=h_q2^{4q}+\dots +h_22^8+h_12^4+h_0=\sum^q_{j=0}h_j2^{4j}$.</p>
				<p>Or les nombres de 0 à 15 s'écrivent sur 4 bits au plus, donc chaque h_j s'écrit en binaire :</p>
				<p>$h_j = h_{j_3} 2^3 + h_{j_2} 2^2 + h_{j_1} 2 + h_{j_0}$ avec $h_{jk}=0$ ou $1$ pour tout j et pour tout k.</p>
				<p>Donc $n = \sum_{j = 0}^q{(h_{j_3} 2^3 + h_{j_2} 2^2 + h_{j_1} 2 + h_{j_0}) 2^{4j}} = \sum_{j = 0}^q{(h_{j_3} 2^{4j+3} + h_{j_2} 2^{4j+2} + h_{j_1} 2^{4j+1} + h_{j_0} 2^{4j})}$.</p>
				<p>Par unicité de la décomposition de n en base 2, on obtient que :</p>
				<ul>
					<li>$\begin{matrix} b_0 = h_{0_0} & b_1 = h_{0_1} & b_2 h_{0_2} & b_3 = h_{0_3} \end{matrix}$</li>
					<li>$\begin{matrix} b_4 = h_{1_0} & b_5 = h_{1_1} & b_6 h_{1_2} & b_7 = h_{1_3}\end{matrix}$</li>
					<li>$\dots$</li>
				</ul>
				<p>Autrement dit, les chiffres binaires correspondent aux représentations binaires des chiffres hexadécimaux.</p>
				<h5>Application pratique</h5>
				<p>Prenons un nombre écrit en binaire $n=(c_p\dots c_0)_2$ et complétons-le avec des zéros à gaucje jusqu'à obtenir un nombre de chiffres multiple de 4 :</p>
				<p>$n=(c_{4q}\dots c_0)_2$ avec $4_q\ge p$ et $c_i=0$ pour tout $i\gt p$.</p>
				<p>On peut maintenant regrouper les chiffres binaires par groupes de 4 bits consécutifs. Chaque groupe correspond à un nombre entre 0 et 15, donc à un chiffre hexadecimal. SI on remplace chacun de ces groupes par l'écriture hexadecimal du nombre correspondant, on obtient l'écriture en base 16 du nombre binaire.</p>
				<p>Revenons par exemple au nombre quarante-deux, qui s'écrit $101010-2$ en binaire. En complétant par des zéros à gauche, on obtient $00101010_2$. On voit apparaître deux groupes de 4 bits consécutifs : $0010_2=2_16$ et $1010_2=A_16$. En remplaçant chaque groupe par le chiffre hexadecimal correspondant, on obtient $2A_{16}$ et $1010_2=A_{16}$ qui est l'écriture hexadecimal de quarante-deux.</p>
				<p>Réciproquement, considérons un nombre écrit en héxadecimal $n=(c_p\dots c_0)_16$. On obtient son écriture en base 2 en remplaçant chaque chiffre hexadecimal par le nombre écrit sur quatre bits correspondant.</p>
				<blockquote>
					<p>Si le nombre correspondant à un chiffre héxadécimal tient sur un, deux ou trois bits, il faut quand même le remplacer par une écriture sur quatre bits en rajoutant des zéros à gauche.</p>
				</blockquote>
				<p>Ainsi en remplaçant $2_{16} par $0010_2$ et $A_{16}$ par $1010_2$ dans $2A_{16}$, on obtient $00101010_2$ et on peut retirer les zéros inutiles à gauche pour obtenir l'écriture binaire de quarante-deux.</p>
				<h5>Binaire et octal</h5>
				<p>En partant du fait que $2^3=8$, on peut appliquer le même raisonnement que précédemment en regroupant cette fois par groupes de trois bits.</p>
				<p>Partons de $101010_2$. Ici nous n'avons pas besoin de compléter par des zéros à gauche car nous avons déjà un nombre de chiffres multiple de trois. Nous voyons deux groupes de trois bits apparaître : $101_2=5_8$ et $010_2=2_8$. En remplaçant nous obtenons $52_8$ qui est l'écriture octale du nombre quarante-deux.</p>
				<p>Réciproquement en partant de $52_8$ et en remplaçant $5_8$ par $101_2$ et $2_8$ par $010_2$, on obtient $101010_2$ qui est l'écriture binaire de quarante-deux.</p>
				<h3>Représentation en mémoire d'un entier négatif</h3>
				<p>Eh oui, nous n'avons pas encore vu comment le PC pouvait savoir, si un nombre donné était ou non un nombre entier.</p>
				<h5>L'octet non signé</h5>
				<p>C'est ce que nous avons utilisé jusqu'ici : le nombre ne peut être que positif. En contrepartie, il peut utiliser tous les bits de l'octet pour la valeur.</p>
				<h5>L'octet signé</h5>
				<p>Cette représentation, comme l'indique son nom, introduit le signe du nombre dans l'octet.</p>
				<p>Mais comment représenter cela ?</p>
				<p>Pour petre cohérent avec les mathématiques, pour un entier naturel N, il fallait que -N +N vaille 0.</p>
				<p>On a profité d'une petite astuce : le dépassement de mémoire.</p>
				<p>C'est-à-dire, par exemple, l'addition : </p>
				<p>1111<br />+1<br />====<br />0000</p>
			</article>
		</section>
