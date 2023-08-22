<?php
// Llamar el archivo de conexión
include('conexion.php');

$con = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM autos WHERE placa='$id'";

$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>actualizar</title>
</head>
<body>
    <div>
        <form action="edit_auto.php" method="POST">
            <h1>Editar auto</h1>
            <input type="hidden" name="placa" value='<?= $row['placa'] ?>'>
            <input type="text" name="marca" value='<?= $row['marca'] ?>'>
            <input type="text" name="color" value='<?= $row['color'] ?>'>
            <input type="submit" value="actualizar">
        </form>
    </div>
</body>
</html>
