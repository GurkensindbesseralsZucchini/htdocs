<html>
<body>
<h1>
Das Programm wird einige Zeit rechnen! <br>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "3hsab2324"; // Name der Datenbank; Muss VORHER in phpMyAdmin angelegt werden!
// Weiters muss eine Tabelle 'sortier' mit 4 Spalten angelegt werden:
// name VARCHAR 50
// anzahl INT
// laufzeit FLOAT
// fall VARCHAR 50


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully <br>";


  
  function arraybau ($anzahl_intern){
    $x=array();
    for($i=0;$i<$anzahl_intern;$i++){
      $x[]=mt_rand(0,99);
    }
    return ($x);
  }

  
  function arrayausgabe($array_intern){
    $ausgabe="(";
    $i=0;
    while($i < count($array_intern)-1){
      $ausgabe=$ausgabe.$array_intern[$i].";";
      $i=$i+1;
    }
    $ausgabe=$ausgabe.$array_intern[$i].")";
    echo $ausgabe."<p>";
  }

  function selectionsort($x){
    $n=count($x);
    $i=0;
    while ($i < $n) {
      $min=$x[$i];
	    for ($j=$i+1; $j < $n; $j++) {
	  	  if ($min > $x[$j]) { $a=$min; $min=$x[$j]; $x[$j]=$a; }
		  }	
		  $x[$i]=$min;
	  $i++;
    }
    return ($x);
  }
    function MaxHeapify(&$data, $heapSize, $index) {
   $left = ($index + 1) * 2 - 1;
   $right = ($index + 1) * 2;
   $largest = 0;
 
   if ($left < $heapSize && $data[$left] > $data[$index])
      $largest = $left;
   else
      $largest = $index;
 
   if ($right < $heapSize && $data[$right] > $data[$largest])
      $largest = $right;
 
   if ($largest != $index)
   {
      $temp = $data[$index];
      $data[$index] = $data[$largest];
      $data[$largest] = $temp;
 
      MaxHeapify($data, $heapSize, $largest);
   }
}
 
function HeapSort(&$data) {
   $count = count($data);
   $heapSize = $count;
 
   for ($p = ($heapSize - 1) / 2; $p >= 0; $p--)
      MaxHeapify($data, $heapSize, $p);
 
   for ($i = $count - 1; $i > 0; $i--)
   {
      $temp = $data[$i];
      $data[$i] = $data[0];
      $data[0] = $temp;
 
      $heapSize--;
      MaxHeapify($data, $heapSize, 0);
   }
}

if (!function_exists('getMaxLength')) {
  function getMaxLength($array) {
      $max = 0;
      for ($i = 0; $i < count($array); $i++) {
          $length = strlen($array[$i]);
          if ($length > $max) {
              $max = $length;
          }
      }
      return $max;
  }
}

function radixsort($a) {
  if (empty($a)) {
      return $a; // Leeres Array zurückgeben
  }

  $maxl = getMaxLength($a); // Maximale Länge bestimmen

  // Radixsort-Algorithmus
  for ($i = 1; $i <= $maxl; $i++) {
      $buckets = array(); // Eimer für jede Ziffer (0-9)
      for ($j = 0; $j < 10; $j++) {
          $buckets[$j] = array(); // Eimer initialisieren
      }

      // Verteilung der Elemente in die Eimer
      for ($j = 0; $j < count($a); $j++) {
          $element = $a[$j];
          $digit = (int) ($element / pow(10, $i - 1)) % 10;
          $buckets[$digit][] = $element;
      }

      // Zusammenführen der Elemente aus den Eimern
      $a = array(); // Das ursprüngliche Array leeren
      for ($j = 0; $j < 10; $j++) {
          $bucket = $buckets[$j];
          for ($k = 0; $k < count($bucket); $k++) {
              $a[] = $bucket[$k];
          }
      }
  }

  return $a; // Das sortierte Array zurückgeben
}
 

//Hier werden die Längen, der zu sorierenden Arrays festgelegt
//anzahl=50000 geht nur bei Algorithmen mit Kompelxität O(n*log(n)) wie Heapsort, Quicksort, Mergesort,...
// bei Komplexität O(n^2) wie Bubblesort, Selectionsort,etc. wird vermutlich (je nach Rechner) bei 10000 bei vielen Wiederholungen(!)
// die Kapazität erschöpft sein
//Man kann auch am XAMPP-Control-Panel->Apache->Config in der Datei php.ini die
//max_execution_time=30 auf max_execution_time=60 oder mehr setzen und warten...
//Und man braucht ja nicht nur Zeit zum Sortieren, sondern zum Erstellen der Arrays, in die Datenbank schreiben, usw.

$anzahlen=array(10,100,1000,10000,100000);
//$anzahlen=array(10,100,1000,10000,50000);

// Die while-Schleife durchläuft alle Einträge von $anzahlen
$i=0;
while($i< count($anzahlen)){
  // 20 Wiederholungen für Durchschnittswert
  for ($j=1;$j<=20;$j++){

    //1) Average:
	//zu sortierendes Array erstellen:
    $data=arraybau($anzahlen[$i]);
	
	$anfang=microtime(true); // Laufzeitmessung  starten
    radixsort($data); //Sortieren
    $laufzeit=microtime(true)-$anfang; // Laufzeitmessung beenden: 
    $sql = "INSERT INTO sortieralgo (zeit, anzahl, algoname, fall)
	VALUES ($laufzeit, $anzahlen[$i],'radixsort' , 'average')"; //Eintrag in Datenbank erstellen
    if (mysqli_query($conn, $sql)) {
       //echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
	//2) Best Case:
    //schon sortiertes Array erstellen
    sort($data);
	$anfang=microtime(true); // Laufzeitmessung  starten
    radixsort($data); //Sortieren
    $laufzeit=microtime(true)-$anfang; // Laufzeitmessung beenden: 
    $sql = "INSERT INTO sortieralgo (zeit, anzahl, algoname, fall)  
	VALUES ($laufzeit, $anzahlen[$i], 'radixsort', 'best')"; //Eintrag in Datenbank erstellen
    if (mysqli_query($conn, $sql)) {
       //echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
	//3) Worst Case:
	//absteigend sortiertes Array erstellen
	rsort($data);
	$anfang=microtime(true); // Laufzeitmessung  starten
    radixsort($data); //Sortieren
    $laufzeit=microtime(true)-$anfang; // Laufzeitmessung beenden: 
    $sql = "INSERT INTO sortieralgo (zeit, anzahl, algoname, fall)
	VALUES ($laufzeit, $anzahlen[$i], 'radixsort', 'worst')"; //Eintrag in Datenbank erstellen
    if (mysqli_query($conn, $sql)) {
       //echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }  
 } //end for

$i++;  
} //end while
mysqli_close($conn); 
?>
</h1>
</body>
</html