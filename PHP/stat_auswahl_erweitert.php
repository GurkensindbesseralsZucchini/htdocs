<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown-Menü</title>
    <style>
        /* Globale Stile */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Stil für das Dropdown-Menü */
        .dropdown {
            margin: 20px;
            font-size: 16px;
        }

        .dropdown select {
            padding: 10px;
            font-size: inherit;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 200px;
            margin-right: 10px;
        }

        .dropdown label {
            font-size: 18px;
            margin-right: 10px;
        }

        .dropdown input[type="submit"] {
            padding: 10px 20px;
            font-size: inherit;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .dropdown input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Stil für die Tabelle */
        .output {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
            font-size: 16px;
        }

        .output th, .output td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .output th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "3hsab2324";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully <br>";

echo "<div class=\"dropdown\">";
echo "<form method=\"post\">";
echo "<label for=\"algoname\">Wähle einen Algorithmus:</label>";
echo "<select id=\"algo\" name=\"algoname\">";
$sql="SELECT DISTINCT algoname FROM sortieralgo";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value=\"".$row["algoname"]."\">".$row["algoname"]."</option>";
    }
} else {
    echo "0 results";
}
echo "</select> ";
echo "<label for=\"anzahl\">Wähle eine Anzahl:</label>";
echo "<select id=\"anzahl\" name=\"anzahl\">";
$sql="SELECT DISTINCT anzahl FROM sortieralgo ORDER BY anzahl";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value=\"".$row["anzahl"]."\">".$row["anzahl"]."</option>";
    }
} else {
    echo "0 results";
}
echo "</select> ";
echo "<label for=\"fall\">Wähle einen Fall:</label>";
echo "<select id=\"fall\" name=\"fall\">";
$sql="SELECT DISTINCT fall FROM sortieralgo";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value=\"".$row["fall"]."\">".$row["fall"]."</option>";
    }
} else {
    echo "0 results";
}
echo "</select> ";
echo "<input type=\"submit\" value=\"Submit\">";
echo "</form>";
echo "</div>";

if (isset($_POST["algoname"]) && isset($_POST["fall"]) && isset($_POST["anzahl"])) {
    $name=$_POST["algoname"];
    $fall=$_POST["fall"];
    $anzahl=$_POST["anzahl"];
 
    echo "<table class=\"output\">";
    echo "<tr><th>Sortieralgorithmus</th><th>Anzahl</th><th>Fall</th><th>Durchschnittliche Laufzeit</th></tr>";
    echo "<tr><td>$name</td><td>$anzahl</td><td>$fall</td>";

    $sql="SELECT AVG(zeit) AS avg_zeit, COUNT(zeit) AS entry_count FROM sortieralgo WHERE algoname='".$name."' AND fall='".$fall."' AND anzahl='".$anzahl."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $avg_zeit = $row["avg_zeit"];
        $entry_count = $row["entry_count"];
        echo "<td>$avg_zeit ($entry_count Einträge)</td>";
    } else {
        echo "<td>0 results</td>";
    }

    echo "</table>";
}

mysqli_close($conn); 
?>

</body>
</html>
