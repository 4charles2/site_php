	<section id="decimal_binaire">
		<h2><u>Manipuler les calcules binaire</u></h2>
		<article>
			<h3>écrire un nombre négatif</h3>
			<h5>Préparatifs</h5>
			<p>Dans cette page tous les exemples seront réalisé avec des char et n'ont avec des int trop long à écrire à en binaire</p>
			<p><strong>Rappel : Un char = 1 octet soit 8 bits soit 256 valeur diffèrentes.</strong></p>
			<cite>Cependant cela fonctionne avec tous les types de variabless gérant des entiers (char, long, int) mais pas les variables acceptant aussi les nombres à virgule (float, double).</cite>
			<p>En effet, ces derniers ne sont pas codés de la même manière :</p>
			<p>-Les variables pour les entiers sont codées en binaireen utilisant tous les bits pour donner la &laquo;valeur&raquo; du nombre.</p>
			<figure>
			<img src="pages/calcul_binaire/tableau_bit_char.jpg" alt="composition des bits d'un type char" />
			<legend>Plan de Char</legend>
			</figure>
			<p>Ainsi un char qui est(en théorie) codé sur 8 bits pourra avoir 256(28) valeurs différentes.</p>
			<blockquote class="info">
				<p>Ah! Un détail(important) : si le char est employé en tant que &laquo;unsigned&raquo; (variable toujours positive), le bit 7 sert à donner la valeur du nombre mais si on l'utilise en tant que &laquo;signed&raquo;, se bit sert à donner le signe du nombre (0 signifie positif, 1 signifie négatif).</p>
				<p>Ainsi 1000 1111 est à 143 si la variable est non-signée et à -113 dans le cas contraire<em>Plus de détails en fin de page</em></p>
			</blockquote>
			<p>-Par opposition, les variables gérant les nombres à virgule utilisent une partie des bits pour donner la &laquo;valeur&raquo; du nombre et le reste pour donner la position de la virgule.</p>
			<p>Par exemple, pour un nombre codé sur 32 bits (float) :</p>
			<figure>
				<img src="pages/calcul_binaire/nombre_32_bit.jpg" alt="tableau de bit d'un nombre coder sur 32 bit" style="width: 800px"/>
				<legend>Plan de nombre à virgule</legend>
			</figure>
			<p>Les bits 0 à 22 servent à coder le nombre sans tenir compte de la virgule (3616.999 s'écrit donc 3616999).</p>
			<p>Les bits 23 à 30 servent à donner l'exposant (la position de la virgule).</p>
			<p>Le bit 31 sert à préciser le signe.</p>
			<p>Enfin, il faut savoir que ce tutoriel utilise deux notations pour indiquer les bases et les opérations</p>
			<ul>
				<li>La base d'un nombre est indiquée entre parenthèse et indice, cela permet d'éviter toutes confusions.</li>
				<li>Les signes opératoires sont les symboles que l'on trouve sur le pavé numérique du clavier. Ce sont le plus(+) pour l'addition, le moins(-) pour la soustraction, l'astérisque(*) pour la multiplication et la barre oblique (/) pour la division. Cependant, avec l'utilisation de mathjax (script pour intégrer des maths dans le code) dans ce site internet, le signe multiplicatif est la croix traditionnelle.</li>
			</ul>
			<pre><code>$3_{(10)}\times 6_{(10)} = 18_{(10)}$</code></pre>
			<p>Donnera comme résultat  : $3_{(10)}\times 6_{(10)} = 18_{(10)}$</p>
			<p>Le nombre decimal 1 s'écrit en binaire 0000 0001 </p>
			<p>Mais pour écrire -1 on a deux méthodes : une simple que vous aller aimer et une plus compliquée que vous utiliserez.</p>
			<p>Voici la méthode simple.</p>
			<figure>
				<p>On sait que $0-1=-1 donc : </p>
				<p style="text-align: center">+0000 0000<br />- 0000 0001<br />= 1111 1111</p>
				<legend>Soustraction de 1 par 0</legend>
			</figure>
			<p>Si ce n'est pas clair pour vous, vous pouvez imaginer que $0000 0000 = 1 0000 0000$ mais que le 1 &laquo;dépasse&raquo; de la variable donc qu'on ne l'écrit pas.</p>
			<p><strong>Parbleu</strong> ! Mais alors, -1 s'écrit de la même manière que 255 ?!</p>
			<p>Eh oui, c'est pour cela qu'il faut bien comprendre la diffèrence entre les nombres signés et les autres .</p>
			<figure>
				<p>Ainsi : </p> 
				<p style="text-align: center">+1111 1111<br />- 0000 0001<br />= 1111 1111</p>
				<legend>Soustraction de 1 par -1</legend>
			</figure>
			<p>L'opération effectuée est : $-1-1=-2$ d'où $-2_{(2)}=254_{(2)}$</p>
			<p><u>La méthode complément à deux : </u></p>
			<ol>
				<li>Tout d'abord, vérifiez que le nombre à convertir en binaire est négatif. Si le nombre est positif, pas de souci, vous savez normalement le faire.</li>
				<li>Si le nombre est négatif (par exemple -19):</li>
				<ul>
					<li>On convertit sa valeur absolue en binaire. Dans notre cas, on écrit donc 19 en binaire : $19_{(10)}=00010011_{(2)}$</li>
					<li>On inverse tous les bits du nombre : les 0 deviennent des 1 et inversement $00010011{(2)}$ devient $11101100{(2)}$.</li>
					<li>On ajoute 1 au résultat précédent</li>
					<img src="pages/calcul_binaire/calcu_operation.png" alt="operation binaire" style="border-radius: 0px"/>
					<li>$-19_{(10)}=11101101_{(2)}$. Voilà ! C'était pas trop dur, avouez ! C'est juste un peu long .</li>
				</ul>
			</ol>
			<p>Petit détail</p>
			<figure>
				<figcaption>Voici un tableau représentant l'équivalent décimal de la valeur des variables &laquo;signées&raquo; de type char.</figcaption>
				<img style="margin-left: 39%" src="pages/calcul_binaire/tableau_valeur_signe.jpg" alt="tableau des valeur signe" />
				<legend>Calcul 5</legend>
			</figure>
			<p>Comme les nombres négatifs ont toujours un 1 comme bit de poids fort, ils sont représentés au-dessus des nombres positifs dans ce tableau</p>
			<p>Vous constaterez ici que le 0 est considéré comme un nombre positif, donc que ces derniers ne vont que jusqu'à 127 tandis que les négatifs atteignent -128</p>
			<p>Une autre particularité due à cette façon de coder les nombres négatifs est que si une variable atteint le maximum 127 pour un char et et qu'elle est incrémentée, elle passera directement à -128.</p>		<pre><code>
#include &lt;stdio.h&gt;
#include &lt;stdlib.h&gt;

//On depasse la valeur maximum pour la variable Soit 128 
//pour char qui peut aller jusqu'a la valeur 127 mais qui donne 128 résultat avce le zero
//sa provoque un depassement de mémoire
int main (void)
{
	
	char k = 0;
	do
	{
		printf("%d\n", k);
		k++;
	}while(k&gt;=0);
	printf("%d\n", k);
	return EXIT_SUCCESS;
}
		</code></pre>
		<p>Alors que la même chose pour une variable &laquo;unsigned&raquo; la fait repartir à 0.</p>
		<pre><code>
#include &lt;stdio.h&gt;
#include &lt;stdlib.h&gt;

//On depasse la valeur maximum pour la variable Soit 128 pour char 
//qui peut aller jusqu'a la valeur 127 mais qui donne 128 résultat avce le zero
int main (void)
{
	unsigned char k = 0;
	do
	{
		printf("%d\n", k);
		k++;
	}while(k&gt;=0);
	printf("%d\n", k);
	return EXIT_SUCCESS;
}
		</code></pre>
		<p>Ce problème peut aussi se retrouver dans les calculs si le résultat dépasse la valeur maximale permise par la variable, donc <strong>ATTENTION</strong></p>
		<h3>Addition et soustraction</h3>
		<h5>Passons maintenant aux calcul</h5>
		<h6>Les additions</h6>
		<p><u>Table de vérité</u></p>
		<p>Cette table de vérité est une liste des différents résultats qu'un calcul utilisant un certain opérateur peut donner : </p>
		<table>
			<thead>
				<tr>
					<th>Calcul décimal</th>
					<th>Résultat décimal</th>
					<th>Calcul binaire</th>
					<th>Résultat binaire</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>0+0</td>
					<td>0</td>
					<td>0000 + 0000</td>
					<td>0000</td>
				</tr>
				<tr>
					<td>0+1</td>
					<td>1</td>
					<td>0000 + 0001</td>
					<td>0001</td>
				</tr>
				<tr>
					<td>1+0</td>
					<td>1</td>
					<td>0001 + 0000</td>
					<td>0001</td>
				</tr>
				<tr>
					<td>1+1</td>
					<td>2</td>
					<td>0001 + 0001</td>
					<td>0010</td>
				</tr>
			</tbody>
		</table>
		<blockquote class="citation">
			<img src="pages/calcul_binaire/operation.png" alt="operation binaire" class="operation"/>
			<p>Un petit rappel : </p>
			<p>Lorsque vous faites ce calcul, vous savez que 9 plus 4 font 13. Vous mettez donc 3 en bas à droite et vous gardez une retenue. La retenue(ici, 1) s'ajoute au chiffre d'après.</p>
			<p>En binaire, c'est ma même chose :</p>
			<p>Je vous rappelle qu'en binaire il n'y a que deux chiffre. La retenue arrive donc très souvent, il faut pouvoir s'en sortir avec.</p>
		</blockquote>
		<p>Exemple</p>
		<p>On va faire un exemple : 6 + 14 = 20.</p>
		<p>En bianire : </p>
		<p>$6_{(10)}=110_{(2)}14_{(10)}=1110_{(2)}$</p>
		<img src="pages/calcul_binaire/ope1.png" alt="operation binaire" class="operation"/>
		<p>Bit n°0: 0+0=0</p>
		<img src="pages/calcul_binaire/ope2.png" alt="operation binaire" class="operation"/>
		<p>Bit n°1: on tombe sur un cas de retenue. $1_{2)}+1_{(2)}=10_{(2)}$ donc on met le 0 dans le résultat et on garde le 1 en retenue. Ce qui donne donc : </p>
		<img src="pages/calcul_binaire/ope3.png" alt="operation binaire" class="operation" />
		<p>Bit n°2 : le calcul est $1_{(2)}+1_{(2)}$ mais attention, il ne faut pas oublier la retenue du calcul précédent ! Le résultat donne en réalité $1_{(2)}+1_{(2)}+1_{(2)}=11_{(2)}=3_{(10)}$. On met donc 1 dans le résultat et on garde une nouvelle retenue de 1.</p>
		<img src="pages/calcul_binaire/ope4.png" alt="operation binaire" class="operation" />
		<p>Bit n°3 : Le calcul aurait dû être 0+1 mais n'oubliez pas la retenue ! Eh oui ! Le calcul exact est donc $1_{(2)}+1_{(2)}=10_{(2)}$; on met donc 0 au résultat et 1 en retenue. Et comme il n'y a plus rien après, la retenue tombe toute seule au résultat.</p>
		<img src="pages/calcul_binaire/ope5.png" alt="operation binaire" class="operation" />
		<p>Eh voilà ! Vous pouvez vérifier que $20_{(10)}=10100_{(2)}$.</p>
		<h6>Les soustraction</h6>
		<p><u>Table de vérité</u></p>
		<table>
			<thead>
				<tr>
					<th>Calcul décimal</th>
					<th>Résultat décimal</th>
					<th>Calculc binaire</th>
					<th>Résultat binaire</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>0-0</td>
					<td>0</td>
					<td>0000-0000</td>
					<td>0000</td>
				</tr>
				<tr>
					<td>0-1</td>
					<td>-1</td>
					<td>0000-0001</td>
					<td>1111</td>
				</tr>
				<tr>
					<td>1-0</td>
					<td>1</td>
					<td>0001-0000</td>
					<td>0001</td>
				</tr>
				<tr>
					<td>1-1</td>
					<td>0</td>
					<td>0001-0001</td>
					<td>0000</td>
				</tr>
			</tbody>
		</table>
		<p>La deuxième ligne est un peu particulière. Je l'explique : quand vous tombez sur un chiffre qui doit se faire soustraire par un plus grand que lui, vous prenez une dizaine à gauche du chiffre pour pouvoir soustraire.</p>
		<p>Par exemple, quand vous faites :</p>
		<img src="pages/calcul_binaire/ope6.png" alt="operation binaire" class="operation"/>
		<p>5-8 n'est pas facile à réaliser. Mais si l'on prend 15-8, c'est tout de suite plus simple. On a ainsi 15-8=7. Il faut cepandant que l'on retire une dizaine à 45 car en a pris une pour effectuer l'opération précédente, ce qui nous donne :</p>
		<img src="pages/calcul_binaire/ope7.png" alt="operation binaire" class="operation" />
		<p>Et maintenant, il nous reste plus qu'à effectuer la soustraction de dizaines : </p>
		<p>3-2=1 donc 45-28=17</p>
		<p>Eh bien, en binaire, c'est pareil : vous prendrez une paire(paire en binaire, dizaine, dizaine en décimal) au bit supérieur à l'instar du décimal lorsque vous prenez une dizaine. Vous mettrez ensuite ce qu'il reste dans les unités.</p>
		<p>Exemple simple</p>
		<p>Un petit exemple pour mettre ça en pratique.</p>
		<p>$15-{(10)}-6_{(10)}=9_{(10)}$</p>
		<img src="pages/calcul_binaire/ope8.png" alt="operation binaire" class="operation" />
		<p>C'est une soustraction très simple : </p>
		<ul>
			<li>Bit n°0:1-0=1</li>
			<li>Bit n°1:1-1=0</li>
			<li>Bit n°2:1-1=0</li>
			<li>Bit n°3:1-0=1</li>
		</ul>
		<p>Ce qui donne :</p>
		<img src="pages/calcul_binaire/ope9" alt="operation binaire" class="operation"/>
		<p>On vérifie : $9_{(10)}=1001_{(2)}$ ! Nous n'avons pas eu le cas de l'emprunt de dizaine mais il va bien falloir faire un exemple plus compliqué.</p>
		<p>Exemple plus difficile</p>
		<p>$10_{(10)}-5_{(10)}=5_{(10)}$</p>
		<p>$1010_{(10)}-101_{(2)}=101_{(2)}$</p>
		<img src="pages/calcul_binaire/ope10.png" alt="operation binaire" class="operation"/>
		<p>Maintenant, le bit n°1: on a un 1 qui s'est soustrait à droite, donc il n'y est plus. On a donc 0-0 et euh ... le résultat est évident. Sur le dessin, vous pouvez voir que la disparition du 1 est marquée avec une paire en rouge : c'est le -1.</p>
		<img src="pages/calcul_binaire/ope11.png" alt="operation binaire" class="operation" />
		<p>Enfin, on retrouve la même situation qu'au bit n°0:0-1. On prend donc le 1 de gauche et ça donne : </p>
		<p>$10_{(2)}-1_{(2)}=1_{(2)}$.</p>
		<img src="pages/calcul_binaire/ope12.png" alt="operation binaire" class="operation" />
		<p>Eh voilà, c'est fini. Vous pouvez vérifier que $5_{(10)}=101_{(2)}$. Si vous avez compris comment ça marche, vous n'aurez pas de souci avec les divisions !</p>
		<h3>Multiplication et division</h3>
		<h5>Les multiplications</h5>
		<p>Table de vérité</p>
		<table>
			<thead>
				<tr>
					<th>Calcul décimal</th>
					<th>Résultat décimal</th>
					<th>Calcul binaire</th>
					<th>Résultat binaire</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>0 x 0</td>
					<td>0</td>
					<td>0000 x 0000</td>
					<td>0000</td>
				</tr>
				<tr>
					<td>0 x 1</td>
					<td>0</td>
					<td>0000 x 0001</td>
					<td>0000</td>
				</tr>
				<tr>
					<td>1 x 0</td>
					<td>0</td>
					<td>0001 x 0000</td>
					<td>0000</td>
				</tr>
				<tr>
					<td>1 x 1</td>
					<td>1</td>
					<td>0001 x 0000</td>
					<td>0001</td>
				</tr>
			</tbody>
		</table>
		<p>Ça a l'air simple, n'est-ce pas ? Cela est dû a la simplicité de la base 2. En effet, les seules multiplications à effectuer sont par 0 ou par 1.</p>
		<blockquote>
			<p>En fait, ceci constitue la base même des mathématiques élémentaires (c'est vous dire). Pour tout nombre a: a x 0 = 0 et a x 1 = a.</p>
		</blockquote>
		<p>La table de vérité est très simple mais pour les calculs, il y a un détail qui peut réduire à néant votre multiplication si vous le négligez. Il va donc falloir être prudent.</p>
		<p>Exemple : </p>
		<p>Essayons de multiplier 3 par 2 : </p>
		<p>$3_{(10)}\times 2_{(10)}=6_{(10)}11_{(2)}\times 10_{(2)}=?_{(2)}$</p>
		<p>Allons-y:</p>
		<img src="pages/calcul_binaire/ope13" alt="operation binaire" class="operation"/>
		<blockquote>
			<p>Ne vous méprenez pas ! Ici ce sont bien deux nombres en binaire(un 1 et un 0) et pas deux décimaux(onze et dix) même si le calcul est exactement le même !</p>
		</blockquote>
		<p>Ici, on n'a pas que deux bits, ce sera facile.</p>
		<ul>
			<li>Bit n°0 : $11_{(2)}\times 0_{(2)}=0_{(2)}$</li>
			<li>Bit n°1 : $11_{(2)}\times 1_{(2)}=11_{(2)}$</li>
		</ul>
		<p>Il faut cependant faire attention au décalage qui peut tout fausser. Nos résultats sont juste mais la différence entre ces deux calculs est que l'on ne les a pas effectués dans la même colonne (donc ils n'ont pas le même exposant). C'est donc de ce décalage qu'il faut se méfier.</p>
		<p>En images, cela sera sûrement plus clair.</p>
		<img src="pages/calcul_binaire/ope14.png" alt="operation binaire" class="operation" />
		<p>Dans l'ordre, on fait 11 x 0 et on écrit le résultat dans la colonne par laquelle on a commencé (ici, la première).</p>
		<p>Vient le tour du 11 x 1. Mais ce calcul a été commencé à partir de la colonne du 1 donc de la deuxième. Ce décalage fait que l'on doit inscrire le résultat dans la bonne colonne, sinon tout est fichu !</p>
		<p>Et enfin, il suffit simplement d'additionner les résultats en faisant attention à ce sacré décalage.</p>
		<img src="pages/calcul_binaire/ope15.png" alt="operation binaire" class="operation" />
		<p>Constat</p>
		<p>On peut remarquer que : </p>
		<p>$11_{(2)}\times 10_{(2)}=110_{(2)}11_{(10)}\times 10_{(10)}=110_{(10)}$</p>
		<p>Le calcul donne le même résultat dans les deux bases ! </p>
		<p>L'avantage du binaire est qu'il n'y a que deux chiffres, 1 et 0. Multiplier par 1 ou 0 est assez simple. Dans cette logique on peut multiplier par 10 aisément. Si je vous demande de calculer 1011010 x 10, vous y arriverez en quelques secondes.</p>
		<p>Il y a une bonne raison pour laquelle cette méthode peut poser problème : cette technique sera plus compliquée pour une multiplication par 11 voire pire ! Imaginez devoir faire le calcul suivant de tête : </p>
		<img src="pages/calcul_binaire/ope16.png" alt="operation binaire" class="operation" />
		<h5>La Divisions</h5>
		<p>Je ne mets pas de table de vérité, car dans ce cas je ne la trouve pas vraiment utile : on ne parle ici que de la division euclidienne, qui est en fait une suite de soustractions (comme la multiplication est une suite d'additions, d'ailleurs).</p>
		<p>De toute manière, les calculs en binaire utilisent les mêmes méthodes que ceux en base 10.</p>
		<p>Exemple : </p>
		<p>On va prendre un exemple illustrer : 23/5.</p>
		<p>On va déjà le faire en décimal (on commence doucement). Je vous rappelle rapidement comment ça marche : on veut savoir combien de fois rentre 5 dans 23 et combien il reste à la fin. Pour cela, on retranche 5 une fois, on met une partie barre pour compter une fois dans la zone de droite et ainsi de suite jusqu'à ce qu'on atteigne un nombre trop petit pour le soustraire par 5.</p>
		<img src="pages/calcul_binaire/ope17.png" alt="operation binaire" class="operation" />
		<p>Aprés plusieurs soustractions, les calculs donnent :  </p>
		<img src="pages/calcul_binaire/ope18.png" alt="operation binaire" class="operation"/>
		<p>C'est exactement la même chose pour le binaire</p>
		<p>Reprenons notre exemple pour le transformer en binaire.</p>
		<ul>
			<li>$23_{(10)}=10111_{(2)}$</li>
			<li>$5_{(10)}=101_{(2)}$</li>
		</ul>
		<p>Ce qui donne : </p>
		<p style="text-align: center">23 divisé par 5, binaire, étape 1</p>
		<p>Maintenant, il s'agit simplement d'enlever 5 jusqu'à ce que le reste soit plus petit que 5, indiquer le reste, le nombre de fois où 5 est rentré dans 23...</p>
		<p>On soustrait 5, cela donne : </p>
		<p>$23_{(10)}-5_{(10)}=18_{(10)}$ $10111_{(2)}-101_{(2)}=10010_{(2)}$</p>
		<img src="pages/calcul_binaire/ope19.png" alt="operation binaire" class="operation" />
		<p>Simple soustraction, on n'a pas eu besoin de prendre une dizaine. Je ne veux pas m'étendre sur les opérations donc je les mets en secret pour ceux qui veulent.</p>
		<ul>
			<li>$Bit n° 0 : 1_{(2)} - 1_{(2)} = 0_{(2)}$</li>
			<li>$Bit n° 1 : 1_{(2)} - 0_{(2)} = 1_{(2)}$</li>
			<li>$Bit n° 2 : 1_{(2)} - 1_{(2)} = 0_{(2)}$</li>
			<li>$Bit n° 3 : 0_{(2)} - 0_{(2)} = 0_{(2)}$</li>
			<li>$Bit n° 4 : 1_{(2)} - 0_{(2)} = 1_{(2)}$</li>
		</ul>
		<p>on vérifie : $18_{(10)}=10010_{(2)}$</p>
		<p>On a réussi ! On ajoute donc 1 au nombre de fois où 5 est rentré dans 23 et ainsi de suite. Le prochain calcul est donc : $18_{(10)}-5_{(10)}=13_{(10)}$ $10010_{(2)}-101_{(2)}=?_{(2)}$</p>
		<img src="pages/calcul_binaire/ope20.png" alt="operation binaire" class="operation"/>
		<p>Voyons cela bit après bit : </p>
		<p><strong>Bit n°0 :</strong> ça commence fort ! 0-1 ! Comme vous avez sûrement dû le voir dans la partie précédente, le 0 va devoir emprunter à gauche un 1 pour pouvoir soustraire. Ainsi, ce sera plus simple pour lui. On a donc : $10_{(2)}-1_{(2)}=1_{(2)}$.</p>
		<p><strong>Bit n°1 :</strong> on pas trop le choix : le 0 soustrait un 0 et cela donne un 0.</p>
		<p><strong>Bit n°2 :</strong> si vous avez bien suivi, vous voyez que le bit n°2 est un 0 qui doit soustraire un 1. Il va donc pour cela prendre une paire (cela correspond à une dizaine en décimal) à gauche ... Mais à sa gauche, il y a un 0 ! On entre dans un véritable chaîne. Le 0 (bit n°2) va prendre une paire au 0 à gauche (bit n°3) qui va lui même prendre une paire à gauche (bit n°4).</p>
		<p>Je vais maintenant vous donner une astuce qui vous rendra la vie plus facile. Arrivé au bit n°2, oubliez les bits d'avant (0 et 1). Que voyez-vous ?</p>
		<p>$100_{(2)}-1_{(2)}=11_{(2)}4_{(10)}-1_{(10)}=3_{(10)}$</p>
		<p>En image, cela sera sûrement plus clair : </p>
		<img src="pages/calcul_binaire/ope21.png" alt="operation binaire" class="operation" />
		<p>Ainsi si il vous suffit d'inscrire le résultat dans la colonne de départ du calcul et le problème est réglé.</p>
		<p>On vérifie que le résultat obtenu est bien le bon : $13_{(10)}=1101_{(2)}$</p>
		<p>On peut maintenant soustraire une nouvelle fois 5 : $13_{(10)}-5{(10)}=8{(10)}$ $1101_{(2)}-101_{(2)}=?_{(2)}$</p>
		<img src="pages/calcul_binaire/ope22.png" alt="operation binaire" class="operation" />
		<ul>
			<li>Bit n°0 : $1_{(2)}-1_{(2)}=0_{(2)}$</li>
			<li>Bit n°1 : $0_{(2)}-0_{(2)}=0_{(2)}$</li>
			<li>Bit n°2 : $1_{(2)}-1_{(2)}=0_{(2)}$</li>
			<li>Bit n°3 : $1_{(2)}-0_{(2)}=1_{(2)}$</li>
		</ul>
		<p>Vérifions que nous avons correctement calculé : $8_{(10)}=1000_{(2)}$</p>
		<p>Passons donc au calcul suivant : $8_{(10)}-5_{(10)}=3_{(10)}$ $1000_{(2)}-101_{(2)}=?_{(2)}$</p>
		<img src="pages/calcul_binaire/ope23.png" alt="operation binaire" class="operation"/>
		<p>Je pense qu'il est temps que l'on parle de la méthode tricherie. À vrai dire, c'est une méthode que j'emploie souvent car elle m'évite de faire des calculs impossibles. Cette méthode consiste à déduire le résultat binaire de la soustraction grâce à son résultat décimal.</p>
		<p>Ici, on savait que le résultat allait être 3. Il nous suffisait donc de convertir ce nombre en binaire : $3_{(10)}=11_{(2)}$</p>
		<p>On ne se préocupe pas de savoir quels calculs il faut effectuer et on oublie pour toujours momentanément les emprunts.</p>
		<p>Nous en avons fini avec les calculs. Pour terminer l'opération, il nous faut écrire l'équation du calcul.</p>
		<h6>Èquation du calcul</h6>
		<p>Si vous regardez dans l'image du dernier calcul, vous pouvez voir que l'on a compté quatre fois le nombre 5 dans 23 avec un reste de 3. Soit l'équation : $4_{(10)}\times 5_{(10)}+3_{(10)}=23_{(10)}$</p>
		<p>Et donc, en binaire : $100_{(2)}\times 101_{(2)}+11_{(2)}=10111_{(2)}$</p>
		<p>Et donc en binaire : </p>
		<p>Si vous avez compris tout cela et que vous arrivez à le refaire, les divisions n'auront plus de secret pour vous.</p>
		<h3>Divers</h3>
		<p>Petie exemple avec une multiplication très simple : $3_{(10)}\times (-4)_{(10)}=-12_{(10)}$</p>
		<p>$3_{(10)}=11_{(2)}$</p>
		<p>$-4_{(10)}=11111100_{(2)}$</p>
		<p>Le calcul est donc : </p>
		<img src="pages/calcul_binaire/ope24.png" alt="operation binaire" class="operation"/>
		<p>Lorsque le résultat occupe un nombre de bits plus important que les membres de l'opération (comme au-dessus, par exemple), il faut enlever les bits en trop en commençant par ceux de poids forts (ceux de gauche).</p>
		<p>Bien sûr, si votre résultat est trop grand pour la variable et que supprimez les bits supplémentaires, il ne sera plus exact. Pour éviter cela, n'hésitez pas à écrire vos nombres avec un grand nombre de bits.</p>
		</article>
	</section>
