<?php
include('conexion.php');

$con = connection();

$id = $_GET['id'];

$sql = "DELETE FROM clientes WHERE cedula='$id'";

$query = mysqli_query($con, $sql);

if ($query) {
    header('Location: index.php');
} else {
    echo "Error: " . mysqli_error($con);
}

?>

