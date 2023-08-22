<?php
function connection() {
    // Estas son las credenciales por defecto de phpMyAdmin
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    // Nombre de la base de datos
    $db = 'aguaate';
    
    // Generar una conexión
    $connect = mysqli_connect($host, $user, $pass);

    // Seleccionar la base de datos y la conexión
    mysqli_select_db($connect, $db);

    // Devolver la conexión
    return $connect;
}
?>
