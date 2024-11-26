<!DOCTYPE html>
<html>
<head>
  <title>Matrixeingabe</title>
  <style>
    table { border: 2px solid blue; }
    td { border: 2px dotted black; }
  </style>
</head>
<body>
<form method="post" >
  Zeilenanzahl Matrix A: <input type="number" name="za" value="<?php if (isset($_POST["za"])) {echo $_POST["za"];}?>"> <br>
  Spaltenanzahl Matrix A: <input type="number" name="sa" value="<?php if (isset($_POST["sa"])) {echo $_POST["sa"];}?>"> <br>
  Zeilenanzahl Matrix B: <input type="number" name="zb" value="<?php if (isset($_POST["zb"])) {echo $_POST["zb"];}?>"> <br>
  Spaltenanzahl Matrix B: <input type="number" name="sb" value="<?php if (isset($_POST["sb"])) {echo $_POST["sa"];}?>"> <br>
  <input type="submit"> <br>

  <?php
  function matrixausgabe($matrix){
    $zeilenanzahl_a=count($matrix);
    $spaltenanzahl_a=count($matrix[0]);

    echo "<table>";
    for($i=0;$i<$zeilenanzahl_a;$i++){
      echo "<tr>";
      for($j=0;$j<$spaltenanzahl_a;$j++){
        echo "<td>".$matrix[$i][$j]." "."</td>";
      }
      echo "</tr>";
    }
    echo "</table>";
  }

  // Eingabe Matrix A
  if (isset($_POST["za"]) && isset($_POST["sa"]) && isset($_POST["zb"]) && isset($_POST["sb"])) {
    $za = $_POST["za"];
    $sa = $_POST["sa"];
    $zb = $_POST["zb"];
    $sb = $_POST["sb"];

    $a=array();
    echo "A: <br>";
    for($i=0;$i<$za;$i++){
      for($j=0;$j<$sa;$j++){
        $name="a".$i."_".$j;
        echo "<input type=\"text\" size=\"5\" name=".$name;
        echo " >";
        if (isset($_POST["$name"])){
          $a[$i][$j]=$_POST["$name"];
        }
      }
      echo "<br>";
    }

    $b=array();
    echo "B: <br>";
    for($i=0;$i<$zb;$i++){
      for($j=0;$j<$sb;$j++){
        $name="a".$i."_".$j;
        echo "<input type=\"text\" size=\"5\" name=".$name;
        echo " >";
        if (isset($_POST["$name"])){
          $b[$i][$j]=$_POST["$name"];
        }
      }
      echo "<br>";
    }

    echo "<p>";
    echo "<input type=\"submit\" value=\"Berechnen\">";
    echo "</form>";

    // Perform calculations & display results

  }

  function matrixaddition ($a_intern,$b_intern){
    $za=count($a_intern);
    $sa=count($a_intern[0]);
    $zb=count($b_intern);
    $sb=count($b_intern[0]);
    if(($za==$zb) && ($sa==$sb)){
      $summe=array();
      for($i=0;$i<$za;$i++){
        for($j=0;$j<$sa;$j++){
            $summe[$i][$j]=$a_intern[$i][$j]+$b_intern[$i][$j];
        }
      }
      matrixausgabe($summe);
    }
    else {
      echo "Matrizen können nicht addiert werden!<br>";
    }
  }
  matrixaddition($a, $b);
  ?>

</body>
</html>