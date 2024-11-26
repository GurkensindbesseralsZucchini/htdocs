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
form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
</style>
</head>
<body>
<form method="POST">
    <label for="algoname">Wähle einen Algorithmus aus:</label>
    <select name="name" id="algo">
        <option value="">Alle</option>
        <option value="heapsort">Heapsort</option>
        <option value="selectionsort">Selectionsort</option>
        <option value="radixsort">Radixsort</option>
    </select>
    <br><br>
    
    <label for="fall">Wähle einen Fall aus:</label>
    <select name="fall" id="fall">
        <option value="">Alle</option>
        <option value="best">Best Case</option>
        <option value="average">Average Case</option>
        <option value="w">Worst Case</option>
    </select>
    <br><br>
    
    <label for="anzahl">Wähle eine Anzahl aus:</label>
    <select name="anzahl" id="anzahl">
        <option value="">Alle</option>
        <option value="10">10</option>
        <option value="100">100</option>
        <option value="1000">1000</option>
        <option value="10000">10000</option>
        <option value="100000">100000</option>
    </select>
    <br><br>

    <input type="submit" value="submit">
</form>
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

$sql = "SELECT zeit, anzahl, algoname, fall FROM sortieralgo";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>zeit</th><th>anzahl</th><th>algoname</th><th>fall</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["zeit"]."</td><td> ".$row["anzahl"]."</td><td>".$row["algoname"]."</td><td> ".$row["fall"]."</td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }

mysqli_close($conn);
?>
</body>
</html>