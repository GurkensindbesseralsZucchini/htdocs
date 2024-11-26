<!DOCTYPE html>
<html>
<body>
<form method="post">
Bitte geben Sie eine Basis ein: <input type="text" name="basis" 
value="<?php if(isset($_POST["basis"])){echo $_POST["basis"];}?>"><br>
Bitte geben Sie die höchste Potenz ein: <input type="text" name="anzahl" 
value="<?php if(isset($_POST["anzahl"])){echo $_POST["anzahl"];}?>"><br>
<input type="submit">
</form>
<h1>
<?php   
//$n=1000;


if(isset($_POST["basis"])AND isset($_POST["anzahl"])){
	$a=$_POST["basis"];
	$n=$_POST["anzahl"];
/*	echo "(";
	$i=0;
	while($i<$n){
		echo $a**$i."; ";
		$i++;
	}
	echo $a**$n;
	echo ")";
*/
	/*$x=array();
	$i=0;
	while($i<=$n){
		$x[]=$a**$i;
		$i++;
	}	
*/
function potenzbasteln ($a_intern, &$n_intern){
    $x=array();
    $i=0;
    while($i<=$n_intern){
        $x[]=$a_intern**$i;
        $i++;
    }
    return $x;
}

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
$x=potenzbasteln ($a,$n);
arrayausgabe($x);
}

?>
</h1>
</body>
</html> 