<?php
include('conexion.php');

$con = connection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];

    $sql = "INSERT INTO clientes (cedula, nombre) VALUES ('$cedula', '$nombre')";

    $query = mysqli_query($con, $sql);

    if ($query) {
        header('Location: index.php'); 
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Acceso no válido.";
}
?>

