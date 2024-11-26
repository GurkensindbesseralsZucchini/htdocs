<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Algorithm</title>
</head>
<body>
    <?php
    $a=array(34,2,-5,2,1,45,87,21,0,11);
    function arrayausgabe ($x_intern) {
        $n=count($x_intern);
        echo "(";
        for ($i=0;$i<$n-1;$i++){
            echo $x_intern[$i];
            echo ";";
        }
        echo $x_intern[$n-1];
        echo ")";
    }
    function selectionsort($a) {
        for ($i = 0; $i < count($a); $i++) {
            $min = $i;
            for ($j = $i + 1; $j < count($a); $j++) {
                if ($a[$min] > $a[$j]) {
                    $min = $j;
                }
            }
            $temp = $a[$i];
            $a[$i] = $a[$min];
            $a[$min] = $temp;
        }
        return $a;
    }

    $a=array(34,2,-5,2,1,45,87,21,0,11); 

    $a_sort=selectionsort($a);
    arrayausgabe($a_sort);
    ?>
</body>
</html>