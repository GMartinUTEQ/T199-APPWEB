<?php


include("conexion.php");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "update producto set nombre = '" . $_REQUEST["nompro"] . "', precio =  " . $_REQUEST["prepro"] . ", idtalla =  " . $_REQUEST["tallapro"] . ", idmarca = " . $_REQUEST["marcapro"] . " where idproducto = " . $_REQUEST["idpro"] ;

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



?>