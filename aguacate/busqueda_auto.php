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
    <title>Buscar auto</title>
</head>
<body>
    <div>
        <form action="busqueda_auto.php" method='POST'>
            <h1>Buscar Autos</h1>
            <input type="text" name="placa" class="placa" placeholder='Ingrese la placa'>
            <input type="submit" value="Buscar">
        </form>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>placa</th>
                    <th>Marcar</th>
                    <th>Color</th>
                    <th>Cliente</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)):  ?>
                    <tr>
                        <td><?= $row['placa'] ?></td>
                        <td><?= $row['marca'] ?></td>
                        <td><?= $row['color'] ?></td>
                        <td><?= $row['cliente'] ?></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</body>
</html>
