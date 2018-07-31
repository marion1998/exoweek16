<?php
/* The tricky thing here is that a leap year in the Gregorian calendar occurs:

on every year that is evenly divisible by 4 except every year that is evenly divisible by 100 unless the year is also evenly divisible by 400 For example, 1997 is not a leap year, but 1996 is. 1900 is not a leap year, but 2000 is. 

La chose délicate ici est qu'une année bissextile dans le calendrier grégorien se produit:

chaque année divisible par 4, sauf chaque année divisible par 100, à moins que l'année ne soit également divisible par 400 Par exemple, 1997 n'est pas une année bissextile, mais 1996 l'est. 1900 n'est pas une année bissextile, mais 2000 l'est.*/
?>

<?php
	$annee = 2016;
if ($annee % 4 == 0 && $annee % 100 != 0 || $annee % 400 == 0) {
	echo("C'est une année bissextile");
} else {
	echo("Ce n'est pas une annee bissextile");
}
?>