<html>
<head>
    <?php include('include/header.php'); ?>
</head>
<body>
<?php include('include/navbar.php'); ?>
<main class="container">
<?php
if($_POST){
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
        $sql = "INSERT INTO cliente (nombre, email) VALUES ('" . $_POST['nombre']. "', '". $_POST['email']. "')";

        if ($conn->query($sql) === TRUE) {
            echo "<h1 class='mt-5'>Tu registro</h1>";
            echo "<div class='card'>";
            echo "<div class='card-header'>Hola ". $_POST["nombre"]. "!<a href='/customers.php' class='btn btn-default float-right'>Lista de clientes</a></div>";
            echo "<div class='card-body'>".
                "Tu email ". $_POST["email"]. " se ha registrado con éxito.".
                "</div>";
            echo "</div>";
        } else {
            echo "<div class='alert alert-danger mt-5'>".
                "<strong>SQL error:</strong> " . $sql . "<br>". $conn->connect_error.
                "</div>";
        }
        $conn->close();
    }
}else{
    ?>
    <h1 class="mt-5">Registra un nuevo cliente</h1>
    <form action="register_customer.php" method="POST" id="registrationForm">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <?php
    }
?>
</main>
<?php include('include/footer.php'); ?>
</body>
</html>
