<?php


include("conexion.php");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(file_exists("uploads/" . $_REQUEST["nomimg"]))
{
    echo "uploads/" . $_REQUEST["nomimg"];
    unlink("uploads/" . $_REQUEST["nomimg"]);
}


$sql = "delete from imagen where idimagen = " . $_REQUEST["idimg"];

if ($conn->query($sql) === TRUE) {
  //echo "<script>window.location.href='listaproducto.php'</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();



?>