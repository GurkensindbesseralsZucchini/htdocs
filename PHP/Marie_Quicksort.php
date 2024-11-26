<!DOCTYPE html>
<html>
<body>

<h1>
<?php   
//ist dafür zuständig, dass das sortierte Array auf der website angezeigt wird
function arrayausgabe($x_intern){
    $n = count($x_intern);
    echo "(";
    for ($i = 0; $i < $n - 1; $i++){
        echo $x_intern[$i];
        echo ";";
    }
    echo $x_intern[$n - 1];
    echo ")";
}

//die Funktion wird eingeführt
function quicksort(&$array, $left, $right) {
    if ($left < $right) { //Abbruchbedingung
        $pivot = partition($array, $left, $right);
        quicksort($array, $left, $pivot - 1);
        quicksort($array, $pivot + 1, $right);
    }
}

//Teilt die Funktion in zwei Teile, dann bestimmt es ein Pivot-Element und durchläuft
//das Array von links nach rechts und plaziert alle Elemente kleiner als das Pivot-Element 
//auf die linke Seite und alle größeren Elemente auf die rechte Seite
function partition($array, $left, $right) {
    $pivot = $array[$right];
    $i = $left - 1;
    for ($j = $left; $j < $right; $j++) {
        if ($array[$j] < $pivot) {
            $i++;
            $temp = $array[$i];
            $array[$i] = $array[$j];
            $array[$j] = $temp;
        }
    }
    $temp = $array[$i + 1];
    $array[$i + 1] = $array[$right];
    $array[$right] = $temp;
    return $i + 1;
}

//generiert ein zufälliges Array der angegebenen Länge
function zufallsarray($n_intern) {
    $array = array();
    for ($i = 0; $i < $n_intern; $i++) {
        $array[$i] = mt_rand(-99, 99);
    }
    return $array;
}

$array = zufallsarray(10);
$startzeit = microtime(true);
quicksort($array, 0, count($array) - 1);
$dauer = microtime(true) - $startzeit;
arrayausgabe($array);
echo "<br>";
echo $dauer;

?>
</h1>
</body>
</html>
