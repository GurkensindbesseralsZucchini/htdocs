<!DOCTYPE html>
<html>
<head>
    <title>Arrayeingabe</title>
</head>
<body>
<form method="post" >
Anzahl der Elemente des Arrays: <input type="number" name="za" value="<?php if (isset($_POST["za"])) {echo $_POST["za"];}?>">  <br>
Anzahl der Zeilen: <input type="number" name="zr" value="<?php if (isset($_POST["zr"])) {echo $_POST["zr"];}?>">  <br>
<input type="submit"> <br>
</form>
<?php
// Eingabe Matrix A
if (isset($_POST["za"]) && isset($_POST["zr"])) {
    $anzahl = $_POST["za"];
    $zeilen = $_POST["zr"];
    $a = array();
    for ($i = 0; $i < $zeilen; $i++) {
        $a[$i] = array();
        for ($j = 0; $j < $anzahl; $j++) {
            $name = "a" . $i . "_" . $j;
            echo "<input type=\"text\" size=\"5\" name=".$name;
            if (isset($_POST["$name"])) {
                echo " value=\" " . $_POST["$name"] . "\"";
            }
            echo " >";
            if (isset($_POST["$name"])) {
                $a[$i][$j] = $_POST["$name"];
            }
        }
        echo "<br>";
    }
}
// Hier wird form-Tag geschlossen!
echo "</form>";  

function arrayausgabe ($x_intern) {
    $n=count($x_intern);
    echo "(";
    for ($i=0;$i<$n-1;$i++) {
        for ($j=0;$j<$n-1;$j++) {
            echo $x_intern[$i][$j] . "; ";
        }
    }
	echo ")";	
}

if (isset($a) && is_array($a) && count($a)!=0) {
    arrayausgabe($a);
}
?>
</body>
</html>