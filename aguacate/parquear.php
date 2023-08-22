<?php
include('conexion.php');

$con = connection();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>parquear</title>
</head>
<body>
    <div>
        <form action="nuevo_parqueo.php" method='POST'>
            <h1>asignar puestos</h1>
            <input type="text" name="car_id" class="car_id" placeholder="ingrese la placa del veiculo">
            <!-- <input type="text" name="piso" class="puesto" placeholder="ingrese el piso ">
            <input type="text" name="puesto" class="puesto" placeholder="ingrese el puesto "> -->
            <input type="submit" value="parquear">
        </form>
    </div>
</body>
</html>