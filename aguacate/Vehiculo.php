<?php

class Vehiculo {
    public $placa;
    public $marca;
    public $color;

    public function __construct($placa, $marca, $color) {
        $this->placa = $placa;
        $this->marca = $marca;
        $this->color = $color;
    }

    public function obtenerInfo() {
        return "Placa: {$this->placa}, Marca: {$this->marca}, Color: {$this->color}";
    }
}

?>
