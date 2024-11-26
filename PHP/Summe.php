<!DOCTYPE html>
<html>

<body>
<form method="post">
Bitte geben sie eine Zahl ein (Basis): <input type="text" name="anzahl" value="<?php if(isset($_POST["anzahl"])){echo($_POST["anzahl"]);}?>"><br>
Bitte geben sie eine Zahl ein (Exponent): <input type="text" name="Exponent" value="<?php if(isset($_POST["Exponent"])){echo($_POST["Exponent"]);}?>"><br>
<input type="submit">
</form>     
    <h1>
    <?php
    if(isset($_POST["anzahl"]) && isset($_POST["Exponent"])) {
        $b=$_POST["anzahl"];
        $n=$_POST["Exponent"];
        $sum=0;
        echo "(";
        $i=0;
        while($i<$n){
            $a=$b**$i;
            $sum=$sum+$b**$i;
            $i++;

            echo "$a;";
                    }
                    echo $b**$n;
                    echo ")";
                }
           /*       

        echo "Die Summe ist " .$sum. "!";
                }
       */
    
    /*$n=1000;
    $sum=0;
    $i=2;
    while($i<=$n){
        $sum+=$i;
        $i+=2;
    }
    /*
    for($i=1;$i<=100;$i++){
        $sum+=$i;
    }

    echo "Die Summe ist " ."$sum". "!";

    for($i=1;$i<=100;$i=$i+1){
        $sum=$sum+$i;
    }
*/
    ?>
    </h1>
</body>
</html>