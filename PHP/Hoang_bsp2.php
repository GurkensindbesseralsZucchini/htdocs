<!DOCTYPE html>
<html>

<body>
<h1>
<?php 

/*
Hier bitte eine Funktion "summe" einfügen,
die zwei Arrays (von beliebiger aber gleicher Länge) elementweise summiert.
D.h.:\\
- Dieser Funktion wird ein Array  übergeben.\\
- Die Funktion berechnet dann die Summe aller Elemente des Arrays.\\
- Die Funktion liefert den Wert der Summe zurück.\\
*/
$a=array(7,3,1,4); //Das ist die Array hardgecoded
function summe($a_intern){ //Hier erstellen wir eine Function mit dem Namen summe.
	$count=count($a_intern); // Hier zählen wir die Elemente im array.
    $sum=0; //Hier wird eine Variable erstellt und mit dem Wert null belegt
		for ($i=0;$i<$count;$i++){ // Hier beginnt die For-Schleife
            $sum+=$a_intern[$i]; // Hier wird die Zahl des Arrays zur Summe addiert.
            $result=$sum; //Hier weisen wir die aktuelle Summe der Variable $result zu
		}
	return $result;
	}

$result=summe($a); // Hier wird das Ergebnis der Funktion der Variable result zugewiesen
print_r($result); // Hier wird der Wert der Variable ausgerufen



/*
Zum Beispiel sollte durch Aufruf von:

$ergebnis=summe($a);
echo $ergebnis;

nach Ausführung der Datei als Ergebnis "15" angezeigt werden.
*/


?>
</h1>
</body>
</html> 