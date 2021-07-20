<?php
    session_start();
    session_destroy();
    session_start();
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
        

        <!-- Page Content  -->
        <div id="content">

        <div class="row">
                <div class="col-sm-2">
                </div>  
                <div class="col-sm-8">
                <div class="text-center">
                    <img style="max-height:150px;margin-top:40px" src="img/Logo_uteq.png"/>
                    <h2 style="margin-top:20px">Acceso al sistema</h2>
                </div>
                <form action="validalogin.php" method="post" class="was-validated">
                    <div class="form-group">
                        <label for="usralias">Nombre de usuario:</label>
                        <input type="text" class="form-control" id="usralias" <?= $alias_bloq; ?> value="<?= $alias; ?>"  name="usralias" required>
                        <div class="valid-feedback">Válido.</div>
                        <div class="invalid-feedback">Este campo es requerido.</div>
                    </div>
                    <div class="form-group">
                        <label for="usrpass">Contraseña:</label>
                        <input type="password" class="form-control" id="usrpass" name="usrpass" required>
                        <div class="valid-feedback">Válido.</div>
                        <div class="invalid-feedback">Este campo es requerido.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
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