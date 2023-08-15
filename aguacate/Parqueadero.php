<?php

include 'Vehiculo.php';
include 'Cliente.php';

class Parqueadero {
    public $tarifaHora = 2; // USD
    public $espacios = array(); // Array de espacios

    public function ingresarVehiculo($piso, $espacio, $vehiculo, $cliente, $horaIngreso) {
        $this->espacios[$piso][$espacio] = array(
            "vehiculo" => $vehiculo,
            "cliente" => $cliente,
            "horaIngreso" => $horaIngreso
        );
    }

    public function calcularValor($horaIngreso, $horaSalida) {
        $horasEstacionado = $horaSalida - $horaIngreso;
        return $this->tarifaHora * $horasEstacionado;
    }

    public function buscarVehiculo($placa) {
        foreach ($this->espacios as $piso => $filas) {
            foreach ($filas as $espacio => $info) {
                if ($info && $info["vehiculo"]->placa == $placa) {
                    return array($piso, $espacio, $info["cliente"], $info["horaIngreso"]);
                }
            }
        }
        return null;
    }
}

?>
