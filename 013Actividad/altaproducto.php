<?

include("conexion.php");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "insert into producto (nombre, precio, idtalla, idmarca) values('" . $_REQUEST["nompro"] . "'," . $_REQUEST["prepro"] . ", " . $_REQUEST["tallapro"] . ", " . $_REQUEST["marcapro"] . ")";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>