<html>
    <head>
        <title>Input Select</title>
    </head> 
    <body>
        <?php
            $targetAction="altaproducto.php";
            $btnSubmit="Guardar";
            $idpro = "";
            $nombrepro ="";
            $preciopro="";
            $idtalla = 0;
            $idmarca = 0;
            if(isset($_REQUEST["idpro"]))
            {
                //Entonces es una edición
                $targetAction="editaproducto.php";
                $btnSubmit="Actualizar";

                include("conexion.php");

                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

                $sql = "select idproducto, nombre, precio, idtalla, idmarca from producto where idproducto = " . $_REQUEST["idpro"];
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $idpro = $row["idproducto"];
                    $nombrepro = $row["nombre"];
                    $preciopro=$row["precio"];
                    $idtalla = $row["idtalla"];
                    $idmarca = $row["idmarca"];
                }
                } else {
                echo "0 results";
                }
                $conn->close();
            }

        ?>
        <form action="<?=$targetAction?>" method="post">
            ID Producto:<br/>
            <input type="text" id="idpro" name="idpro" value="<?= $idpro ?>" readonly/><br/>
            Nombre producto:<br/>
            <input type="text" id="nompro" name="nompro" value="<?= $nombrepro?>"/><br/>
            Precio producto:<br/>
            <input type="text" id="prepro" name="prepro" value="<?= $preciopro ?>"/><br/>
            Marca:<br/>
            <select id="marcapro" name="marcapro">
                <option value="0">== Seleccione una opción ==</option>
                <?php
                    include("conexion.php");

                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "select * from marca";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["idmarca"] . "'>" . $row["marca"] . "</option>";
                    }
                    } else {
                    echo "0 results";
                    }
                    $conn->close();
                ?>
            </select><br/>
            Talla:<br/>
            <select id="tallapro" name="tallapro">
            <option value="0">== Seleccione una opción ==</option>
                <?php
                    include("conexion.php");

                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "select * from talla";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["idtalla"] . "'>" . $row["talla"] . "</option>";
                    }
                    } else {
                    echo "0 results";
                    }
                    $conn->close();
                ?>
            </select><br/>
            <input type="submit" value="<?=$btnSubmit?>"/>
        </form>
    </body>
</html>