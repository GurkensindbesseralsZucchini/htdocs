<!DOCTYPE html>
<html>
<head>
	<title>Matrizen addieren</title>
	<style>
		table {border: 2px solid blue;}
		td {border: 2px dotted black;}
	</style>
</head>
<body>

<h1>
<?php

$a=array(array(3,-1,0,4),
		 array(2,1,3,1),
		 array(1,0,-5,1)
	);
$b=array(array(5,5,5,5),
		 array(3,3,3,3),
		 array(2,2,2,2)
	);
$c=array(array(1,2),
		 array(3,4),
		 array(5,6),
		 array(7,8)
	);				 


function matrixausgabe ($a){
	$zeilenanzahl=count($a);
	$spaltenanzahl=count($a[0]);
	echo "<table>";
		for($i=0;$i<$zeilenanzahl;$i++){
			echo "<tr>";
			for($j=0;$j<$spaltenanzahl;$j++){
				echo "<td>".$a[$i][$j]." "."</td>";
			}
			echo "</tr>";
		}
	echo "</table>";
}

function matrixaddition ($a_intern,$b_intern){
	$zeilenanzahl_a=count($a_intern);
	$spaltenanzahl_a=count($a_intern[0]);
	$zeilenanzahl_b=count($b_intern);
	$spaltenanzahl_b=count($b_intern[0]);
	if(($zeilenanzahl_a==$zeilenanzahl_b) && ($spaltenanzahl_a==$spaltenanzahl_b)){
		$summe=array();
		for($i=0;$i<$zeilenanzahl_a;$i++){
			for($j=0;$j<$spaltenanzahl_a;$j++){
				$summe[$i][$j]=$a_intern[$i][$j]+$b_intern[$i][$j];
			}
		}
		matrixausgabe($summe);
//		return($summe);
//optional, falls Summe weiterverwendet werden soll
	}
	else {
		echo "Matrizen können nicht addiert werden!";
	}
}
matrixaddition($a,$b);
matrixaddition($a,$c);


?>
</h1>
</body>
</html>