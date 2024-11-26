<?php
// Verhindern von Ausgaben vor dem Header-Redirect

$servername = "localhost";
$username = "root";  // Dein Datenbankbenutzername
$password = "";      // Dein Datenbankpasswort
$dbname = "versuch"; // Deine Datenbank

// Verbindungsaufbau zur MySQL-Datenbank
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verbindung überprüfen
if (!$conn) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}

// Alle Daten aus der Tabelle werden gelöscht, bevor neue Daten eingefügt werden.
$deleteQuery = "DELETE FROM stadttabellen_txt";
if (mysqli_query($conn, $deleteQuery)) {
    echo "Alle bestehenden Daten wurden gelöscht.<br>";
} else {
    echo "Fehler beim Löschen der Daten: " . mysqli_error($conn) . "<br>";
}

// Pfad zur CSV-Datei
$filePath = __DIR__ . "/tabelle.csv";  // Pfad zur Datei

// Überprüfen, ob die Datei existiert
if (file_exists($filePath)) {
    // CSV-Datei verarbeiten
    if (($handle = fopen($filePath, "r")) !== FALSE) {
        fgetcsv($handle); // Überspringt die Headerzeile
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            // Zeile in die Datenbank einfügen
            $laender = mysqli_real_escape_string($conn, $data[0]);
            $staedte = mysqli_real_escape_string($conn, $data[1]);
            $sehenswuerdigkeiteneins = mysqli_real_escape_string($conn, $data[2]);
            $sehenswuerdigkeitenzwei = mysqli_real_escape_string($conn, $data[3]);
            $sehenswuerdigkeitendrei = mysqli_real_escape_string($conn, $data[4]);

            $sql = "INSERT INTO stadttabellen_txt (laender, staedte, sehenswuerdigkeiteneins, sehenswuerdigkeitenzwei, sehenswuerdigkeitendrei)
                    VALUES ('$laender', '$staedte', '$sehenswuerdigkeiteneins', '$sehenswuerdigkeitenzwei', '$sehenswuerdigkeitendrei')";

            if (!mysqli_query($conn, $sql)) {
                echo "Fehler beim Einfügen in die Datenbank: " . mysqli_error($conn);
            }
        }
        fclose($handle);
    } else {
        echo "Fehler beim Öffnen der Datei.<br>";
    }
} else {
    echo "Fehler: Die Datei wurde nicht gefunden.<br>";
}

mysqli_close($conn);

// Hier erfolgt der Redirect nach der Verarbeitung der CSV-Datei
header("Location: Stadthaha.html"); // Seite neu laden (zu deiner HTML-Seite)
// Entfernen des exit(), um zu prüfen, ob das Redirect funktioniert


?>
