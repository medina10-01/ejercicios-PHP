<?php
include('conexion.php');

$con = connection();

$placa = $_GET['id'];

// Realiza una consulta para obtener los datos del vehículo antes de la actualización
$sql = "SELECT placa, horaIngreso FROM parquear WHERE placa='$placa'";
$query = mysqli_query($con, $sql);

// Verifica si la consulta fue exitosa
if ($query) {
    // Obtiene los datos del vehículo
    $row = mysqli_fetch_array($query);

    // Obtiene la hora de salida
    $horaSalida = date('Y-m-d H:i:s');
    $horaSalidaPrint = date('Y-m-d H:i:s');

    // Actualiza la hora de salida en la base de datos
    $updateSql = "UPDATE parquear SET horaSalida='$horaSalida' WHERE placa='$placa'";
    $updateQuery = mysqli_query($con, $updateSql);

    if (!$updateQuery) {
        // Error en la actualización
        echo "Error en la actualización: " . mysqli_error($con);
    }
} else {
    // Error en la consulta
    echo "Error en la consulta: " . mysqli_error($con);
}

// Calcula la diferencia de tiempo en segundos
$horaIngreso = strtotime($row['horaIngreso']);
$horaSalida = strtotime($horaSalida);
$diferenciaTiempoSegundos = $horaSalida - $horaIngreso;

// Calcula el costo por hora (por ejemplo, $5 por hora)
$costoPorHora = 2;
$costoTotal = ceil($diferenciaTiempoSegundos / 3600) * $costoPorHora;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SALIDA</title>
</head>
<body>
    <div>
        <form action="salir_auto.php">
            <table>
                <thead>
                    <tr>
                        <th>placa</th>
                        <th>hora de ingreso</th>
                        <th>hora de salida</th>
                        <th>valor a pagar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $row['placa']; ?></td>
                        <td><?php echo $row['horaIngreso']; ?></td>
                        <td><?php echo $horaSalidaPrint; ?></td>
                        <td><?php echo "$" . $costoTotal; ?></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>
