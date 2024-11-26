<!DOCTYPE html>
<html lang="en">
<body>
<h1>
    <?php
    
    function tablegenerator ($x_intern){
        $zeilen=count($x_intern);
        $spalten=count($x_intern[0]);
        echo "<table>";
        for($i=0;$i<$zeilen;$i++){
            echo "<tr>";
            for($j=0;$j<$spalten;$j++){
           // echo $content." ";
                echo "<td>";
                echo $x_intern [$i][$j];
                echo "</td>";
        }
        //echo "<br>";
        echo "<tr>";
    }
    echo "</table>";

    }
    $x=array(
        array(7,3,1,-4),
        array(0,1,0,0),  
        array(-17,1,1,3)
    );

    tablegenerator($x)


    //print_r($x);
    //echo "<br>";
    //echo $x [2][0];
    ?>
    </h1>
</body>
</html>