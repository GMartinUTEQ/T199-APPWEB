<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Item - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
    <?php

        if(!isset($_SESSION["CarritoItems"]))
        {
            $_SESSION["CarritoItems"] = 0;
        }
        else
        {
            //echo $_SESSION["CarritoItems"];
        }
    ?>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a href="carrito.php">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?= $_SESSION["CarritoItems"]; ?></span>
                        </button>
                        </a>
                </div>
            </div>
        </nav>
        <!-- Product section-->

        <?php
                    include("conexion.php");
                    
                    if($conn->connect_error)
                    {
                        echo "Error de conexión a MySQL";
                        die("");
                    }

                    if(!isset($_REQUEST["idp"]))
                    {
                        echo "<script>window.location='index.php';</script>";
                    }

                    $cadena = "select * from producto where idproducto =" . $_REQUEST["idp"];
                    
                    $resultado = $conn->query($cadena);

                    if($resultado->num_rows > 0)
                    {
                        
                        while($row = $resultado->fetch_assoc())
                        {
                            echo '<section class="py-5">
                                    <div class="container px-4 px-lg-5 my-5">
                                        <div class="row gx-4 gx-lg-5 align-items-center">
                                            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="' . $row["urlproducto"] . '" alt="..." /></div>
                                            <div class="col-md-6">
                                                <div class="small mb-1">SKU: ' . $row["idproducto"] . '</div>
                                                <h1 class="display-5 fw-bolder">' . $row["nombreproducto"] . '</h1>
                                                <div class="fs-5 mb-5">
                                                    <span class="text-decoration-line-through">$' . number_format((float)($row["precioproducto"] * 1.18), 2, '.', '') . '</span>
                                                    <span>$'. number_format((float)$row["precioproducto"], 2, '.', '') .'</span>
                                                </div>
                                                <p class="lead">'. $row["descripcionproducto"] . '</p>
                                                <div class="d-flex">
                                                    <form method="post" action="agregacarrito.php">
                                                        <input type="number" name="idpro" style="display:none" id="idpro" value="' . $row["idproducto"] . '"/>
                                                        <input class="form-control text-center me-3" min="' . 0 . '" max="' . $row["inventarioproducto"] . '" id="cantpro" name="cantpro" type="number" value="1" style="max-width: 3rem" />
                                                        <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                                            <i class="bi-cart-fill me-1"></i>
                                                            Add to cart
                                                        </button>
                                                    <form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>';
                        }
                    }
                    else
                    {
                        
                    }

                ?>



        
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    

                <?php
                    include("conexion.php");

                    if($conn->connect_error)
                    {
                        echo "Error de conexión a MySQL";
                        die("");
                    }

                    if(!isset($_REQUEST["idp"]))
                    {
                        echo "<script>window.location='index.php';</script>";
                    }

                    $cadena = "select * from producto limit 4";
                    
                    $resultado = $conn->query($cadena);

                    if($resultado->num_rows > 0)
                    {
                        
                        while($row = $resultado->fetch_assoc())
                        {
                            echo '<div class="col mb-5">
                            <div class="card h-100">
                                <!-- Sale badge-->
                                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                                <!-- Product image-->
                                <img class="card-img-top" src="' . $row["urlproducto"] . '" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">' . $row["nombreproducto"] . '</h5>
                                        <!-- Product reviews-->
                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div>
                                        <!-- Product price-->
                                        <span class="text-muted text-decoration-line-through">$' . number_format((float)($row["precioproducto"] * 1.18), 2, '.', '') . '</span><br/>
                                        $' . number_format((float)$row["precioproducto"], 2, '.', '') . '
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                                </div>
                            </div>
                        </div>';
                        }
                    }
                    else
                    {
                        
                    }

                ?>

                    
                    
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
