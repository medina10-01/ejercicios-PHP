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
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div>
        <form action="insert_user.php" method='POST'>
            <div class="title"><h1 class="header">Buscar usuarios</h1></div>
            <div class="buscar_cli">
                <h2>Documento</h2>
                <input type="text" name="cedula" class="cedula datos" placeholder='Ingrese el número de documento'>
                <h2>Nombre</h2>
                <input type="text" name="nombre" class="nombre datos" placeholder='Ingrese el NOMBRE'>
            
            <input class="send" type="submit" value="Registrar">
            </div>
        </form>
    </div>
</body>
</html>
