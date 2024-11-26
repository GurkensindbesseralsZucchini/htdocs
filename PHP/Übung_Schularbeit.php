<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
Bitte geben Sie eine Anzahl ein: <input type="text" name="Anzahl" 
value="<?php if(isset($_POST["Anzahl"])){echo $_POST["Anzahl"];}?>"><br>
Bitte geben Sie den Bausteinlinks ein: <input type="text" name="bausteinlinks" 
value="<?php if(isset($_POST["bausteinlinks"])){echo $_POST["bausteinlinks"];}?>"><br>
Bitte geben Sie die Bausteinmitte ein: <input type="text" name="bausteinmitte" 
value="<?php if(isset($_POST["bausteinmitte"])){echo $_POST["bausteinmitte"];}?>"><br>
Bitte geben Sie den Bausteinrechts ein: <input type="text" name="bausteinrechts" 
value="<?php if(isset($_POST["bausteinrechts"])){echo $_POST["bausteinrechts"];}?>"><br>
<input type="submit">
</form>
<h1>
    <?php
    if(isset($_POST["Anzahl"])AND isset($_POST["bausteinlinks"])AND isset($_POST["bausteinmitte"])AND isset($_POST["bausteinrechts"])){
        $Anzahl=$_POST["Anzahl"];
        $bausteinlinks=$_POST["bausteinlinks"];
        $bausteinmitte=$_POST["bausteinmitte"];
        $bausteinrechts=$_POST["bausteinrechts"];


    

        echo "<table>";
        for($i=0;$i<$Anzahl;$i++){
            echo "<tr>";
            for($j=1;$j<$Anzahl-$i;$j++){
                echo "<td>";
                echo $bausteinlinks;
                echo "</td>";
                }
        echo "<td>";
        echo $bausteinmitte;
        echo "</td>";
        for($j=$Anzahl;$j<$Anzahl+$i;$j++){
            echo "<td>";
            echo $bausteinrechts;
            echo "</td>";
        }
        echo "</tr>";
        //echo "<br>";


    }
    echo "</table>";


}

$array1 = array(1, 2, 3, 4, 5);
$array2 = array(5,4,3,2,1);

function arraysumme ($array1, $array2){
   $count = count($array1);
    for   ($i=0; $i < $count; $i++) {
        // Die Summe der Elemente an jeder Position berechnen
        $sum = $array1[$i] + $array2[$i];
        $result[] = $sum; // Die Summe dem Ergebnisarray hinzufügen
    }

    return $result;
}

$result = arraysumme($array1, $array2);
echo "Die Summen der Elemente an jeder Position sind: ";
print_r($result);


    ?>
    </h1>
</body>
</html>