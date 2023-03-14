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
		$sql = "SELECT * FROM cliente";
		$result = $conn->query($sql);
        
		if ($result->num_rows > 0) {
		    echo "<div><div clas='clearfix'><h1 class='mt-5'>Lista de clientes:</h1><a href='/register_customer.php' class='btn btn-default float-right'>Nuevo cliente</a></div></div>";
		    echo "<table class='table'><thead><tr>";
		    echo "<th>ID</th>";
		    echo "<th>Nombre</th>";
		    echo "<th>Email</th>";
		    echo "<th></th>";
		    echo "</tr></thead>";
		    echo "<tbody>";
        
		    // Se muestra en una tabla la salida de la query
		    while($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>". $row["id"]. "</td>";
			echo "<td>". $row["nombre"]. "</td>";
			echo "<td>". $row["email"]. "</td>";
			echo "<td><a href='/customer_products.php?cliente=".$row["nombre"]."' class='btn btn-default float-right'>Productos comprados</a></td>";
			echo "</tr>";
		    }
		    echo "</tbody>";
		    echo "</table>";
		} else {
            echo "<div><div clas='clearfix'><h1 class='mt-5'>Lista de clientes:</h1><a href='/register_customer.php' class='btn btn-default float-right'>Nuevo cliente</a></div></div>";
		    echo "<div class='alert alert-danger mt-5'><strong>Cliente no registrado</strong></div>";
		}
	}
?>
</main>
<?php include('include/footer.php'); ?>
</body>
</html>
