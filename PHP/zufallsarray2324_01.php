    <!DOCTYPE html>
    <html>
    <body>

    <h1>
    <?php   

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
    
    function selectionsort($a_intern){
            for ($i=0;$i<count($a_intern);$i++){
                $minstelle=$i;
                for($j=$i+1;$j<count($a_intern);$j++){
                if($a_intern[$j]<$a_intern[$minstelle]){
                        $minstelle=$j;
                    }
                }
                $temp=$a_intern[$i];
                $a_intern[$i]=$a_intern[$minstelle];
                $a_intern[$minstelle]=$temp;		
            }		
            return $a_intern;
    }

    function zufallsarray($n_intern){
        $a_intern=array();
        for($i=0;$i<$n_intern;$i++){
            $a_intern[$i]=mt_rand(1,100);
        }
        return $a_intern;
    }

    //$a=array(34,2,-5,2, 1, 45, 87,-234,21,0,11);
    $a=zufallsarray(100);
    arrayausgabe($a);

    sort($a);
    $startzeit=microtime(true);
    $a_sort=selectionsort($a);
    $dauer=microtime(true)-$startzeit;
    echo "<br>";
    arrayausgabe($a_sort);
    echo "<br>";
    echo "<br>";    
    echo $dauer;

    ?>
    </h1>
    </body>
    </html> 