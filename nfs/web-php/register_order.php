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
        if($_POST){

            $sql = "INSERT INTO pedido (id_cliente, id_producto) VALUES ('" . $_POST['id_cliente']. "', '". $_POST['id_producto']. "')";

            if ($conn->query($sql) === TRUE) {
                echo "<h1 class='mt-5'>Tu registro</h1>";
                echo "<div class='card'>";
                echo "<div class='card-header'><a href='/orders.php' class='btn btn-default float-right'>Lista de pedidos</a></div>";
                echo "<div class='card-body'> Tu pedido se ha registrado con éxito.</div>";
                echo "</div>";
            } else {
                echo "<div class='alert alert-danger mt-5'>".
                    "<strong>SQL error:</strong> " . $sql . "<br>". $conn->connect_error.
                    "</div>";
            }
            $conn->close();
        } else{
            $sql_customers = "SELECT id,nombre FROM cliente";
            $customers = $conn->query($sql_customers);

            $sql_products = "SELECT id,nombre FROM producto";
            $products = $conn->query($sql_products);
            ?>
            <h1 class="mt-5">Pedidos registrados</h1>
            <form action="register_order.php" method="POST" id="registrationForm">
                <div class="form-group">
                    <label for="nombre">ID Cliente:</label>
                    <select class="form-control" id="id_cliente" name="id_cliente">
                        <?php
                        if ($customers->num_rows == 0) {
                            echo "<option>No hay clientes disponibles</option>";
                        }else{
                            while($row = $customers->fetch_assoc()) {
                                echo "<option value='".$row["id"]."'>".$row["nombre"]."</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">ID Producto:</label>
                    <select class="form-control" id="id_producto" name="id_producto">
                        <?php
                        if ($products->num_rows == 0) {
                            echo "<option>No hay productos disponibles</option>";
                        }else{
                            while($row = $products->fetch_assoc()) {
                                echo "<option value='".$row["id"]."'>".$row["nombre"]."</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <?php
        }
    }
    ?>
</main>
<?php include('include/footer.php'); ?>
</body>
</html>
