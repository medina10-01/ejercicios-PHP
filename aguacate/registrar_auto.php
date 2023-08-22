<?php
include('conexion.php');

$con = connection();

if (isset($_POST['placa'])) {
    $placa = $_POST['placa'];
    $sql = "SELECT * FROM autos WHERE placa='$placa'";
} else {
    $sql = "SELECT * FROM autos";
}

$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar auto</title>
</head>
<body>
    <div>
        <form action="insert_auto.php" method='POST'>
            <h1>Nuevo registro</h1>
            <input type="text" name="placa" class="placa" placeholder='Ingrese el número de placa'>
            <input type="text" name="marca" class="marca" placeholder='Ingrese la marca'>
            <input type="text" name="color" class="color" placeholder='Ingrese el color'>
            <input type="text" name="cliente" class="cliente" placeholder='Ingrese el documento'>

            <input type="submit" value="Registrar">
        </form>
    </div>
</body>
</html>