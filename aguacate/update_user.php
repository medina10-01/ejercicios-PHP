<?php
// Llamar el archivo de conexión
include('conexion.php');

$con = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM clientes WHERE cedula='$id'";

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
        <form action="edit_user.php" method="POST">
            <h1>Editar user</h1>
            <input type="hidden" name="cedula" value='<?= $row['cedula'] ?>'>
            <input type="text" name="nombre" value='<?= $row['nombre'] ?>'>
            <input type="submit" value="actualizar">
        </form>
    </div>
</body>
</html>














<?php


// Recorre los 4 pisos
for ($piso = 1; $piso <= 4; $piso++) {
    // Verificar si ya se encontró un puesto disponible en este piso
    $encontrado = false;

    // Recorre los 10 puestos en cada piso
    for ($puesto = 1; $puesto <= 10; $puesto++) {
        // Verifica si el lugar en este puesto ya está ocupado
        $consulta_check = "SELECT * FROM puestos WHERE piso='$piso' AND puestos='$puesto'";
        $resultado_check = mysqli_query($con, $consulta_check);

        
        if ($resultado_check) {
            $fila = mysqli_fetch_assoc($resultado_check);
            if ($fila['estado'] == 0) {
                // El lugar en este puesto está disponible
                $sql = "UPDATE puestos SET estado=1 WHERE piso='$piso' AND puestos='$puesto'";
                $query = mysqli_query($con, $sql);
                if ($query) {
                    header('Location: index.php');
                    $encontrado = true; // Marcar que se encontró un lugar disponible
                    break; // Salir del bucle interno
                } else {
                    echo "Error: " . mysqli_error($con);
                }
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }

    // Si se encontró un lugar disponible, salir del bucle externo
    if ($encontrado) {
        break;
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($con);
?>