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
        echo "<div><div clas='clearfix'><h1 class='mt-5'>Lista de pedidos:</h1><a href='/register_order.php' class='btn btn-default float-right'>Nuevo pedido</a></div></div>";

		$sql = "SELECT o.id, c.nombre as nombre_cliente, p.nombre as nombre_producto, p.precio FROM pedido o INNER JOIN cliente c ON c.id=o.id_cliente INNER JOIN producto p ON p.id=o.id_producto";
		$result = $conn->query($sql);
        
		if ($result->num_rows > 0) {

		    echo "<table class='table'><thead><tr>";
		    echo "<th>ID</th>";
		    echo "<th>Cliente</th>";
		    echo "<th>Producto</th>";
		    echo "<th>Total</th>";
		    echo "</tr></thead>";
		    echo "<tbody>";
        
		    // Se muestra en una tabla la salida de la query
		    while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>". $row["id"]. "</td>";
			echo "<td>". $row["nombre_cliente"]. "</td>";
			echo "<td>". $row["nombre_producto"]. "</td>";
			echo "<td>". $row["precio"]. "</td>";
			echo "</tr>";
		    }
		    echo "</tbody>";
		    echo "</table>";
		} else {
            echo "<div class='alert alert-danger mt-5'><strong>Pedido no registrado</strong></div>";
		}


	}
?>
</main>
<?php include('include/footer.php'); ?>
</body>
</html>
