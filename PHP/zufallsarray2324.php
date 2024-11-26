<!DOCTYPE html>
<html>
<body>

<h1>
<?php   

function arrayausgabe ($x_intern){
	$n=count($x_intern);
	echo "(";
	for ($i=0;$i<$n-1;$i++){
		echo $x_intern[$i];
		echo ";";
	}
	echo $x_intern[$n-1];
	echo ")";
}
function radixsort($a_intern){
		
		return $a_intern;
}

function zufallsarray($n_intern){
	$a_intern=array();
	for($i=0;$i<$n_intern;$i++){
		$a_intern[$i]=mt_rand(-99,99);
	}
	return $a_intern;
}

$a=zufallsarray(10000);
arrayausgabe($a);

$startzeit=microtime(true);
$a_sort=selectionsort($a);
$dauer=microtime(true)-$startzeit;
echo "<br>";
arrayausgabe($a_sort);
echo "<br>";
echo "<br>";    
echo $dauer;

?>
</h1>
</body>
</html> 