<!DOCTYPE html>
<html>

<body>
 
    <h1>
    <?php
    $a=1000;
    $b=23;
    /*echo $a+$b;*/
    function Summe($a_intern=0, $b_intern=0){
        $summe=$a_intern+$b_intern;
        return $summe;
    }
    function Differenz($a_intern, $b_intern){
        $diff=$a_intern-$b_intern;
        return $diff;
    }
    echo Summe ($a);
    echo "<br>";
    echo Differenz ($a,$b);

    //array
    $x=array("a","b","c");
    print_r($x);


    ?>
    </h1>
</body>
</html>