<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Parqueadero "El Aguacate"</h1>
    </div>
<div class="section">
        <h2>Buscar Vehículo</h2>
        <?php
        // Código para buscar un vehículo
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["buscar"])) {
            $placaBuscada = $_POST["placaBuscada"];
            $infoVehiculo = $parqueadero->buscarVehiculo($placaBuscada);
            
            if ($infoVehiculo) {
                list($piso, $espacio, $cliente, $horaIngreso) = $infoVehiculo;
                echo "<p>Vehículo encontrado:</p>";
                echo "<p>Piso: $piso, Espacio: $espacio</p>";
                echo "<p>{$vehiculo1->obtenerInfo()}</p>";
                echo "<p>{$cliente1->obtenerInfo()}</p>";
                $horaSalida = date("H");
                $valorPagar = $parqueadero->calcularValor($horaIngreso, $horaSalida);
                echo "<p>Hora de ingreso: $horaIngreso, Hora de salida: $horaSalida</p>";
                echo "<p>Valor a pagar: $valorPagar USD</p>";
            } else {
                echo "<p>Vehículo no encontrado.</p>";
            }
        }
        ?>
        <form method="post" action="">
            <label for="placaBuscada">Placa del Vehículo a Buscar:</label>
            <input type="text" id="placaBuscada" name="placaBuscada" required><br>
            
            <button type="submit" name="buscar" class="button">Buscar Vehículo</button>
        </form>
    </div>

    <div class="section">
        <h2>Resultado</h2>
        <div class="result">
            <?php
            // Código para mostrar resultados
            ?>
        </div>
    </div>
</div>
<div class="footer">
    &copy; <?php echo date("Y"); ?> Parqueadero "El Aguacate"
</div>
</body>
</html>