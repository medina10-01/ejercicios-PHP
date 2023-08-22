<?php
// Llamar el archivo de conexión
include('conexion.php');

$con = connection();


$id = $_POST['cedula'];
$name = $_POST['nombre'];

$sql = "UPDATE 	clientes SET nombre='$name'   WHERE cedula='$id'";

$query = mysqli_query($con, $sql);

if ($query) {
    header('Location: buscar_cliente.php');
} else {
    echo "Error: " . mysqli_error($con);
}

?>