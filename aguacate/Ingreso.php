<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Parqueadero "El Aguacate"</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Parqueadero "El Aguacate"</h1>
    </div>

    <div class="section">
        <h2>Ingreso de Vehículo</h2>
        <?php
        // Código para ingresar un vehículo
        include 'Parqueadero.php';
        
        $parqueadero = new Parqueadero();
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ingresar"])) {
            $placa = $_POST["placa"];
            $marca = $_POST["marca"];
            $color = $_POST["color"];
            $nombreCliente = $_POST["nombreCliente"];
            $documentoCliente = $_POST["documentoCliente"];
            $horaIngreso = $_POST["horaIngreso"];
            
            $vehiculo = new Vehiculo($placa, $marca, $color);
            $cliente = new Cliente($nombreCliente, $documentoCliente);
            
            $parqueadero->ingresarVehiculo(0, 0, $vehiculo, $cliente, $horaIngreso);
            
            echo "<p>Vehículo ingresado correctamente.</p>";
        }
        ?>
        <form method="post" action="">
            <label for="placa">Placa:</label>
            <input type="text" id="placa" name="placa" required><br>
            
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" required><br>
            
            <label for="color">Color:</label>
            <input type="text" id="color" name="color" required><br>
            
            <label for="nombreCliente">Nombre del Cliente:</label>
            <input type="text" id="nombreCliente" name="nombreCliente" required><br>
            
            <label for="documentoCliente">Documento del Cliente:</label>
            <input type="text" id="documentoCliente" name="documentoCliente" required><br>
            
            <label for="horaIngreso">Hora de Ingreso:</label>
            <input type="number" id="horaIngreso" name="horaIngreso" required><br>
            
            <button type="submit" name="ingresar" class="button">Ingresar Vehículo</button>
        </form>
        </div>
    </div>

    

<div class="footer">
    &copy; <?php echo date("Y"); ?> Parqueadero "El Aguacate"
</div>

</body>
</html>
