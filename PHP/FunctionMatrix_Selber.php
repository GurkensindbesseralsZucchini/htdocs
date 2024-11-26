<!DOCTYPE html>
<html lang="en">
<body>
<form method="post">
Bitte geben Sie eine Anzahl ein: <input type="text" name="Anzahl" 
value="<?php if(isset($_POST["Anzahl"])){echo $_POST["Anzahl"];}?>"><br>
Bitte geben Sie den Content ein: <input type="text" name="content" 
value="<?php if(isset($_POST["content"])){echo $_POST["content"];}?>"><br>
<input type="submit">
</form>
<h1>
    <?php
    if(isset($_POST["Anzahl"])AND isset($_POST["content"])){
        $Anzahl=$_POST["Anzahl"];
        $content=$_POST["content"];

    

       // $zeilen=count($x_intern);
        //$spalten=count($x_intern[0]);
        echo "<table>";
        for($i=0;$i<$Anzahl;$i++){
            echo "<tr>";
            for($j=0;$j<$Anzahl-$i;$j++){
           // echo $content." ";
                echo "<td>";
                echo $content;
                echo "</td>";
        }
        //echo "<br>";
        echo "<tr>";
    }
    echo "</table>";

    /*$x=array(
        array(7,3,1,-4),
        array(0,1,0,0),  
        array(-17,1,1,3)
    );
*/


    //print_r($x);
    //echo "<br>";
    //echo $x [2][0];

}
    ?>
    </h1>
</body>
</html>