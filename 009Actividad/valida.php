<?php
    if(isset($_REQUEST["usrname"]) && isset($_REQUEST["usrpass"]))
    {
        if($_REQUEST["usrname"] == "gabriel")
        {
            if($_REQUEST["usrpass"] == "uteq2021")
            {
                echo "<h1 style='color:darkblue'>BIENVENIDO AL SISTEMA</h1>";
            }
            else
            {
                echo "<h1 style='color:red'>Contraseña incorrecta</h1>";
            }
        }
        else
        {
            echo "<h1 style='color:red'>Usuario incorrecto</h1>";
        }
    }
    else
    {
        echo "<h1 style='color:red'>Es obligatorio escribri un usuario y una contraseña</h1>";
    }
?>