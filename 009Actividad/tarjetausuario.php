<?php

    if(isset($_REQUEST["usrnombre"]) && isset($_REQUEST["usrcorreo"]) && isset($_REQUEST["usrtelefono"]))
    {
        $titulos[] = "Nombre completo:"; //0
        $valores[] = $_REQUEST["usrnombre"];//0
        $titulos[] = "Correo: ";//1
        $valores[] = $_REQUEST["usrcorreo"];//1
        $titulos[] = "Teléfono: ";
        $valores[] = $_REQUEST["usrtelefono"];
        $titulos[] = "Usuario: ";
        $valores[] = $_REQUEST["usrusuario"];
        $titulos[] = "Password: ";//4
        $valores[] = "*****";//4
        $titulos[] = "Sexo:";
        $valores[] = devuelvesexo($_REQUEST["sexo"]);
        $titulos[] = "Estado de nacimiento:";
        $valores[] = $_REQUEST["edonac"];

        echo "<table>";
        for($f = 0; $f <= (count($titulos) - 1); $f++)
        {
            echo "<tr><td>". $titulos[$f] . "</td><td>" . $valores[$f] . "</td></tr>";
        }
        echo "</table>";
        
    } 

    function devuelvesexo($clavesexo)
    {
        $texto = "";
        switch($clavesexo)
        {
            case "sexoh":
                $texto = "Hombre";
                break;
            case "sexom":
                $texto = "Mujer";
                break;
            case "sexond":
                $texto = "Prefirió no decir";
                break;
        }
        return $texto;
    }
?>