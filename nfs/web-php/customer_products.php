<html>
<head>
    <?php include('include/header.php'); ?>
</head>
<body>
<?php include('include/navbar.php'); ?>
<main class="container">
    <?php
    $servername = "mysql-container";
    $username = "ivan";
    $password = "ivan1234";
    $dbname = "db-lamp";

    // Se crea la conexión con la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Se comprueba la conexión con la base de datos
    if ($conn->connect_error) {
        echo "<div class='alert alert-danger mt-5'>".
            "<strong>Connection failed:</strong> " . $conn->connect_error.
            "</div>";
    } else {
        ?>
        <form action="customer_products.php" method="GET" id="registrationForm">
            <div class="form-group">
                <label for="nombre">Introduzca cliente para buscar las compras realizadas:</label>
                <input type="text" class="form-control" id="cliente" name="cliente">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <?php
        if($_GET && $_GET['cliente']){

            $sql = "SELECT o.id as id_pedido, p.id as id_producto, p.nombre as nombre_producto, p.precio as precio_producto FROM producto p INNER JOIN pedido o ON o.id_producto = p.id WHERE o.id_cliente = (SELECT id FROM cliente where nombre LIKE '%".$_GET['cliente']."%')";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $total = 0;
                echo "<h1 class='mt-5'>Lista de productos comprados por el cliente ".$_GET['cliente'].":</h1>";
                echo "<table class='table'><thead><tr>";
                echo "<th>ID Pedido</th>";
                echo "<th>ID Producto</th>";
                echo "<th>Nombre</th>";
                echo "<th>Precio</th>";
                echo "<th></th>";
                echo "</tr></thead>";
                echo "<tbody>";

                // Se muestra en una tabla la salida de la query
                while($row = $result->fetch_assoc()) {
                    $total = $total + $row["precio_producto"];
                    echo "<tr>";
                    echo "<td>". $row["id_pedido"]. "</td>";
                    echo "<td>". $row["id_producto"]. "</td>";
                    echo "<td>". $row["nombre_producto"]. "</td>";
                    echo "<td>". $row["precio_producto"]. "</td>";
                    echo "</tr>";
                }
                echo "<tr><td colspan='3'><strong>TOTAL</strong></td><td>$total</td></tr>";
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<div class='alert alert-danger mt-5'><strong>El usuario no ha comprado ningún producto</strong></div>";
            }
            $conn->close();
        }
    }
    ?>
</main>
<?php include('include/footer.php'); ?>
</body>
</html>
