<html>
    <head>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
            <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    </head>
    <body>
    <div class="card" style="width:80%; margin-top:40px; margin-left:25px">
        <div class="card-header">Reporte de visitas</div>
        <div class="card-body">
        <?php
                include("conexion.php");

                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

                $sql = "select
                (select count(registrado) as nr from visitas where registrado = 0) as noregistrados,
                (select count(registrado) as r from visitas where registrado = 1) as registrados";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<div id='chart_bar'></div>
                            <script>
                            Morris.Bar({
                                element: 'chart_bar',
                                data: [
                                { visitas: 'No Registrados', nb: " . $row["noregistrados"] . " },
                                { visitas: 'Registrados', nb: " . $row["registrados"] . " }
                                ],
                                xkey: 'visitas',
                                ykeys: ['nb'],
                                labels: ['Visitas']
                            });
                            </script>";
                }
                } else {
                echo "0 results";
                }
                $conn->close();
            ?>
        </div>
        <div class="card-footer">Derechos reservados @gmartin @MorrisCharts</div>
    </div>
    </body>
</html>