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
        <form action="busqueda.php" method='POST'>
            <h1>Buscar usuarios</h1>
            <input type="text" name="cedula" class="cedula" placeholder='Ingrese el número de documento'>
            <input type="submit" value="Buscar" >
        </form>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)):  ?>
                    <tr>
                        <td><?= $row['cedula'] ?></td>
                        <td><?= $row['nombre'] ?></td>
                        <td><a href="update_user.php?id=<?= $row['cedula'] ?>">Actualizar</a></td>
                        <td><a href="delete_user.php?id=<?= $row['cedula'] ?>">Eliminar</a></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</body>
</html>

