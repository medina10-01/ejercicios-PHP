<?php
include('conexion.php');

$con = connection();

if (isset($_POST['cedula'])) {
    $cedula = $_POST['cedula'];
    $sql = "SELECT * FROM clientes WHERE cedula='$cedula'";
} else {
    $sql = "SELECT * FROM clientes";
}

$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Cliente</title>
</head>
<body>
    <div>
        <form action="insert_user.php" method='POST'>
            <h1>Buscar usuarios</h1>
            <input type="text" name="cedula" class="cedula" placeholder='Ingrese el número de documento'>
            <input type="text" name="nombre" class="nombre" placeholder='Ingrese el NOMBRE'>
            <input type="submit" value="Registrar">
        </form>
    </div>
</body>
</html>
