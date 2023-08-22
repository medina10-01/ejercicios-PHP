<?php
include('conexion.php');

$con = connection();

$id = $_GET['id'];

$sql = "DELETE FROM autos WHERE placa='$id'";

$query = mysqli_query($con, $sql);

if ($query) {
    header('Location: buscar_auto.php');
} else {
    echo "Error: " . mysqli_error($con);
}

?>
