<?php
// Llamar el archivo de conexión
include('conexion.php');

$con = connection();


$placa = $_POST['placa'];
$marca = $_POST['marca'];
$color = $_POST['color'];

$sql = "UPDATE 	autos SET marca='$marca', color='$color'   WHERE placa='$placa'";

$query = mysqli_query($con, $sql);

if ($query) {
    header('Location: buscar_auto.php');
} else {
    echo "Error: " . mysqli_error($con);
}

?>