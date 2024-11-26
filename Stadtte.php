<?php
// Verhindern von Ausgaben vor dem Header-Redirect

$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "versuch"; 

// Verbindung zur MySQL-Datenbank
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}

// Löschen der bestehenden Daten
$deleteQuery = "DELETE FROM stadttabellen_txt";
if (!mysqli_query($conn, $deleteQuery)) {
    echo "Fehler beim Löschen der Daten: " . mysqli_error($conn) . "<br>";
}

// Pfad zur CSV-Datei
$filePath = "Stadt.csv";  

if (file_exists($filePath) && ($handle = fopen($filePath, "r"))) {
    fgetcsv($handle); // Überspringt die Headerzeile
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $sql = "INSERT INTO stadttabellen_txt (laender, staedte, sehenswuerdigkeiteneins, sehenswuerdigkeitenzwei, sehenswuerdigkeitendrei)
                VALUES ('" . mysqli_real_escape_string($conn, $data[0]) . "',
                        '" . mysqli_real_escape_string($conn, $data[1]) . "',
                        '" . mysqli_real_escape_string($conn, $data[2]) . "',
                        '" . mysqli_real_escape_string($conn, $data[3]) . "',
                        '" . mysqli_real_escape_string($conn, $data[4]) . "')";
        if (!mysqli_query($conn, $sql)) {
            echo "Fehler beim Einfügen in die Datenbank: " . mysqli_error($conn);
        }
    }
    fclose($handle);
} else {
    echo "Fehler: Die Datei wurde nicht gefunden oder konnte nicht geöffnet werden.<br>";
}

mysqli_close($conn);

header("Location: Stadthaha.html"); 
exit(); 
?>
