<?php session_start(); ?>
<?php

    $alias = "";
    $alias_bloq = "";
    $editar = "creausuario.php";
    if(isset($_GET["alias"]))
    {
        $alias = $_REQUEST["alias"];
        $alias_bloq = "readonly";
        $editar = "altausuario.php";
    }
  
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Sistema de administración T199</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include("menu.html") ?>

        <!-- Page Content  -->
        <div id="content">

            <?php include("header.php") ?>

            <div class="row">
                <div class="col-sm-2">
                </div>  
                <div class="col-sm-8">
                <h2>Agregar / Modificar Usuarios</h2>
                <form action="<?= $editar; ?>" method="post" class="was-validated">
                    <div class="form-group">
                        <label for="usralias">Nombre de usuario:</label>
                        <input type="text" class="form-control" id="usralias" <?= $alias_bloq; ?> value="<?= $alias; ?>"  name="usralias" required>
                        <div class="valid-feedback">Válido.</div>
                        <div class="invalid-feedback">Este campo es requerido.</div>
                    </div>
                    <div class="form-group">
                        <label for="usrpassuno">Contraseña:</label>
                        <input type="password" class="form-control" id="usrpassuno" name="usrpassuno" required>
                        <div class="valid-feedback">Válido.</div>
                        <div class="invalid-feedback">Este campo es requerido.</div>
                    </div>
                    <div class="form-group">
                        <label for="usrpassdos">Confirme Contraseña:</label>
                        <input type="password" class="form-control" id="usrpassdos" name="usrpassdos" required>
                        <div class="valid-feedback">Válido.</div>
                        <div class="invalid-feedback">Este campo es requerido.</div>
                    </div>
                    <!--div class="form-group form-check">
                        <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember" required> I agree on blabla.
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Check this checkbox to continue.</div>
                    </div-->
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </form>
                </div>
            </div>
            
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>



<?php

    
        
        //insertando los datos de mi conexión.
        include("conexion.php");

        //Validando que si me hayan llegado los campos que ocupo.
        if(isset($_REQUEST["usrpassuno"]) && isset($_REQUEST["usrpassdos"]))
        {
            //Asignando la información que me llegó del post a variables.
            $usralias = $_REQUEST["usralias"];
            $usrpass1 = $_REQUEST["usrpassuno"];
            $usrpass2 = $_REQUEST["usrpassdos"];

            //Validando que las contraseñas no estén vacías, es decir que si se hayan escrito.
            if(!empty($usrpass1) && !empty($usrpass2))
            {
                //Validar que las contraseñas sean iguales
                if($usrpass1 === $usrpass2)
                {
                    //Validar que no tenga errores de conexión a MySQL
                    if($conn->connect_error)
                    {
                        echo "Error al conectar a MySQL" . $conn->connect_error;
                        die("");
                    }

                    //Solo estoy llenando la cadena con el query, no la estoy ejecutando.
                    $cadenamysql = "update usuario set pass = md5('$usrpass1'), ultcambio = now() where alias = '$usralias';";
                    
                    //Ejecutar la consulta y validar que no haya dado error en MySQL
                    if($conn->query($cadenamysql) === TRUE)
                    {
                        echo "<script>alert('Contraseña actualizada exitosamente');window.location='usuarios.php';</script>";
                    }
                    else 
                    {
                        echo "Error al modificar la contraseña: " . $conn->error;
                    }
                }
                else
                {
                    echo "Las contraseñas capturadas no son iguales";
                }
            }
            else
            {
                echo "Favor de escribir las contraseñas";
            }
        }
    

?>