<!DOCTYPE html>
<html lang="en">
<body>
<form method="post">
Bitte geben Sie eine Anzahl ein: <input type="text" name="Anzahl" 
value="<?php if(isset($_POST["Anzahl"])){echo $_POST["Anzahl"];}?>"><br> <!--- Das sind die Formfelder damit man was eingeben kann ---->
Bitte geben Sie den Content ein: <input type="text" name="content" 
value="<?php if(isset($_POST["content"])){echo $_POST["content"];}?>"><br>
<input type="submit">
</form>
<h1>
    <?php
    if(isset($_POST["Anzahl"])AND isset($_POST["content"])){ // Das isset überprüft ob die Variable gleich Null ist
        $Anzahl=$_POST["Anzahl"]; // Hier definieren wir die Variablen Anzahl 
        $content=$_POST["content"]; // Hier definieren wir die Variablen content

    


        echo "<table>"; // Hier erstellen wir eine Tabelle
        for($i=0;$i<$Anzahl;$i++){ // Die Schleife läuft solange i< gleich die eingegeben Anzahl ist und kriert immer eine weitere Zeile
            echo "<tr>"; // Hier erstellen wir eine Row bzw eine Reihe
            for($j=0;$j<1+$i;$j++){ // Diese For Schleife setzt die Spalten ein.


                echo "<td>"; // Hier öffne ich den Befehl Table Data um Daten einzusetzen
                echo $content; //Hier werden die oben eingebenen Zeichen in eingesetzt
                echo "</td>"; // Hier schließe ich Tabledata.
        }
        echo "<tr>"; // Hier wird die Table Row geschlossen
    }
    echo "</table>"; // Hier wird dei Tabelle geschlossen


}
    ?>
    </h1>
</body>
</html>