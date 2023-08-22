<?php
include('conexion.php');

$con = connection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $placa = $_POST['placa'];
    $marca = $_POST['marca'];
    $color = $_POST['color'];
    $cliente = $_POST['cliente'];

    $sql = "INSERT INTO autos(placa,marca,color,cliente) VALUES ('$placa', '$marca','$color','$cliente')";

    $query = mysqli_query($con, $sql);

    if ($query) {
        header('Location: index.php'); // Redirige de vuelta a la página de búsqueda
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Acceso no válido.";
}
?>