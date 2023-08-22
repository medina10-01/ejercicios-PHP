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
        <form action="busqueda.php" method='POST'>
            <div class="title"><h1 class="header">Buscar usuarios</h1></div>
            <div class="date_con">
                <input type="text" name="cedula" class="cedula datos" placeholder='Ingrese el número de documento del usuario'>
                <input type="submit" value="Buscar"  class="send">
            </div>
        </form>
    </div>
    <div class="print">
        <table>
            <thead>
                <tr>
                    <th class="espace1">Documento</th>
                    <th class="espace1">Nombres</th>
                    <th class="but">Action</th>
                    <th class="but">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)):  ?>
                    <tr>
                        <td><?= $row['cedula'] ?></td>
                        <td><?= $row['nombre'] ?></td>
                        <td class="atualizar"><a href="update_user.php?id=<?= $row['cedula'] ?>">Actualizar</a></td>
                        <td class="borrar"><a href="delete_user.php?id=<?= $row['cedula'] ?>">Eliminar</a></td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </div>
</body>
</html>

