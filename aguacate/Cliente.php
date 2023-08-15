<?php

class Cliente {
    public $nombre;
    public $documento;

    public function __construct($nombre, $documento) {
        $this->nombre = $nombre;
        $this->documento = $documento;
    }

    public function obtenerInfo() {
        return "Nombre: {$this->nombre}, Documento: {$this->documento}";
    }
}

?>
