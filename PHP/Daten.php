<!DOCTYPE html>
<html>
<body>
<form method="post" >
Geben sie ihren Nachnamen ein: <input type="text" name="Nachname" value="<?php if (isset($_POST["Nachname"])) {echo $_POST["Nachname"];}?>">  <br>
Geben sie ihren Vornamen ein: <input type="text" name="Vorname" value="<?php if (isset($_POST["Vorname"])) {echo $_POST["Vorname"];}?>">  <br>
Geben sie ihre PLZ ein: <input type="text" name="PLZ" value="<?php if (isset($_POST["PLZ"])) {echo $_POST["PLZ"];}?>">  <br>
Geben sie ihr Altern ein: <input type="text" name="alter" value="<?php if (isset($_POST["alter"])) {echo $_POST["alter"];}?>">  <br>
<input type="submit"> <br>
<?php

if (isset($_POST["Nachname"]) && isset($_POST["Vorname"]) && isset($_POST["PLZ"]) && isset($_POST["alter"])) {
    $nachname = $_POST["Nachname"];
    $vorname = $_POST["Vorname"];
    $plz = $_POST["PLZ"];
    $alter = $_POST["alter"];
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "3hsab2324";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO adressen (nachname, vorname, plz, lebensalter) VALUES ('$nachname', '$vorname', '$plz', '$alter')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
</body>
</html>