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
			</article>
		</section>
