<!DOCTYPE html>
<html>
<body>

<h1>
<?php   
function zufallsarray($n) {
    $a = array(); 
    for ($i = 0; $i < $n; $i++) { 
        $a[] = mt_rand(0,1000); 
    }
    return $a; 
}


function arrayausgabe($a) {
    echo "("; 
    for ($i = 0; $i < count($a); $i++) { 
        echo $a[$i]; 
        if ($i < count($a) - 1) { 
            echo ";"; 
        }
    }
    echo ")"; 
}

// Radixsort-Funktion ohne array_fill oder array_merge
function radixsort($a) {
    if (empty($a)) {
        return $a; // Leeres Array zurückgeben
    }

    // Funktion zum Ermitteln der maximalen Ziffernlänge
    function getMaxLength($array) {
        $max = 0;
        for ($i = 0; $i < count($array); $i++) { // Schleife über das Array
            $length = strlen($array[$i]); // Länge bestimmen
            if ($length > $max) { // Wenn diese Länge größer ist
                $max = $length; // Aktualisieren
            }
        }
        return $max; // Das Maximum zurückgeben
    }

    $maxl = getMaxLength($a); // Maximale Länge bestimmen

    // Radixsort-Algorithmus
    for ($i = 1; $i <= $maxl; $i++) { // Schleife über jede Ziffernposition
        // Initialisierung der Eimer für jede Ziffer (0-9)
        $buckets = array(); // Leer-Array für die Eimer
        for ($j = 0; $j < 10; $j++) { // Schleife für 10 Eimer
            $buckets[$j] = array(); // Eimer initialisieren
        }

        // Verteilung der Elemente in die Eimer
        for ($j = 0; $j < count($a); $j++) { // Schleife über das ursprüngliche Array
            $element = $a[$j]; // Aktuelles Element
            $digit = (int) ($element / pow(10, $i - 1)) % 10; // Ziffer bestimmen
            $buckets[$digit][] = $element; // Element zum Eimer hinzufügen
        }

        // Zusammenführen der Elemente aus den Eimern
        $a = array(); // Das ursprüngliche Array leeren
        for ($j = 0; $j < 10; $j++) { // Schleife über die Eimer
            $bucket = $buckets[$j]; // Aktueller Eimer
            for ($k = 0; $k < count($bucket); $k++) { // Schleife über den Eimer
                $a[] = $bucket[$k]; // Element zum ursprünglichen Array hinzufügen
            }
        }
    }

    return $a; // Das sortierte Array zurückgeben
}

$a = zufallsarray(1000);
arrayausgabe($a); 

// Messen der Sortierzeit
$startzeit = microtime(true);
$a_sort = radixsort($a);
$dauer = microtime(true) - $startzeit; 

echo "<br>"; 
arrayausgabe($a_sort); 
echo "<br><br>"; 
echo $dauer; 
?>
</h1>

</body>
</html>
