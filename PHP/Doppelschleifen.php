<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table {border: 2px solid blue;}
        td { border: 2px dotted black;}
    </style>
</head>
<body>
<h1>
<?php
    $zeilen=3;
    $spalten=4;
    $content="Hello";

    echo "<table>";
    for($i=0;$i<$zeilen;$i++){
        echo "<tr>";
        for($j=0;$j<$spalten;$j++){
           // echo $content." ";
           echo "<td>";
           echo $content;
           echo "</td>";
        }
        //echo "<br>";
        echo "<tr>";
    }
    echo "</table>";
?>
</h1>
<table border="6">
  <tr>
    <td>Hello</td>
    <td>Hello</td>
    <td>Hello</td>
    <td>Hello</td>
  </tr>
  <tr>
    <td>Hello</td>
    <td>Hello</td>
    <td>Hello</td>
    <td>Hello</td>
  </tr>
  <tr>
    <td>Hello</td>
    <td>Hello</td>
    <td>Hello</td>
    <td>Hello</td>
  </tr>
</table>
</body>
</html>