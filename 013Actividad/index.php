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
            $imagenprod = "";
            $idimagen = 0;
            if(isset($_REQUEST["idpro"]))
            {
                //Entonces es una edición
                $targetAction="actualizaproducto.php";
                $btnSubmit="Actualizar";

                include("conexion.php");

                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

                $sql = "select producto.idproducto, nombre, precio, idtalla, idmarca, imagen.url, imagen.idimagen from producto left outer join imagen on imagen.idproducto = producto.idproducto where producto.idproducto = " . $_REQUEST["idpro"];
                //echo $sql; 
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $idpro = $row["idproducto"];
                    $nombrepro = $row["nombre"];
                    $preciopro=$row["precio"];
                    $idtalla = $row["idtalla"]; //2
                    $idmarca = $row["idmarca"]; //3
                    $imagenprod = $row["url"];
                    $idimagen = $row["idimagen"];
                }
                } else {
                echo "0 results";
                }
                $conn->close();
            }

        ?>
        <form action="<?=$targetAction?>" method="post" enctype="multipart/form-data">
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
                        // $idmarca = 3
                        // $row["idmarca"] = 3
                        if($idmarca == $row["idmarca"])
                        {
                            echo "<option selected value='" . $row["idmarca"] . "'>" . $row["marca"] . "</option>";
                        }
                        else
                        {
                            echo "<option value='" . $row["idmarca"] . "'>" . $row["marca"] . "</option>";
                        }
                        
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
                        $selected = "";
                        // $idtalla = 2
                        // $row["idtalla"] = 4
                        if($idtalla == $row["idtalla"])
                        {
                           $selected = "selected";
                        }
                        echo "<option $selected value='" . $row["idtalla"] . "'>" . $row["talla"] . "</option>";
                    }
                    } else {
                    echo "0 results";
                    }
                    $conn->close();
                ?>
            </select><br/>
            Seleccione una imágen del producto:<br/>
            <input type="file" name="fileToUpload" id="fileToUpload"><br/><br/>
            <?php

                if(!is_null($imagenprod) && !empty($imagenprod))
                {
                    echo '
                    <table>
                        <tr>
                            <td><a href="eliminaimagen.php?idimg=' . $idimagen . '&nomimg=' . $imagenprod .  '">Eliminar imagen</a></Td>
                        </tr>
                        <tr>
                           <td> <img style="max-height:100px"  src="uploads/' . $imagenprod . '"/></td>
                        </tr>
                    </table><br/>
                    ';
                }
            ?>
            <input type="submit" value="<?=$btnSubmit?>"/>
        </form>
    </body>
</html>