<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<?php
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

$sql = "SELECT nachname, vorname, plz, lebensalter FROM adressen";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>Nachname</th><th>Vorname</th><th>PLZ</th><th>Lebensalter</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["nachname"]."</td><td> ".$row["vorname"]."</td><td>".$row["plz"]."</td><td> ".$row["lebensalter"]."</td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }

mysqli_close($conn);
?>
</body>
</html>