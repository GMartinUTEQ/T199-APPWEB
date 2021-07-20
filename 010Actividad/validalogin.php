<?php

    if(isset($_REQUEST["usralias"]) && isset($_REQUEST["usrpass"]))
    {
        include("conexion.php");

        if($conn->connect_error)
        {
            echo "Se mudió XP";
            die("");
        }
        $usuario = $_REQUEST["usralias"]; //chuchita
        $password = $_REQUEST["usrpass"]; //miriam123

        $sql = "select * from usuario where alias = '$usuario' and pass = md5('$password');";

        $resultado = $conn->query($sql);

        if($resultado->num_rows > 0)
        {
            echo "<h1>Bienvenido al sistema</h1>";
        }
        else
        {
            echo "<h3>Usuario o contraseña incorrectos</h3";
        }

        $conn->close();

    }
?>