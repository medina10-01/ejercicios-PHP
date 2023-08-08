<?php
class Carta {
    public $valor;
    public $palo;

    public function __construct($valor, $palo) {
        $this->valor = $valor;
        $this->palo = $palo;
    }
}

class Baraja {
    public $cartas = array();

    public function __construct() {
        $palos = array('Picas', 'Corazones', 'Diamantes', 'Tréboles');
        $valores = array('As', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K');

        foreach ($palos as $palo) {
            foreach ($valores as $valor) {
                $this->cartas[] = new Carta($valor, $palo);
            }
        }
    }

    public function mezclar() {
        shuffle($this->cartas);
    }

    public function repartir() {
        return array_pop($this->cartas);
    }
}

function evaluarMano($mano) {
    usort($mano, function($a, $b) {
        $valores = array('As', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K');
        return array_search($a->valor, $valores) - array_search($b->valor, $valores);
    });

    if (esEscaleraReal($mano)) {
        return 'Escalera Real';
    } elseif (esEscaleraColor($mano)) {
        return 'Escalera de Color';
    } elseif (esPoker($mano)) {
        return 'Póker';
    } elseif (esFullHouse($mano)) {
        return 'Full House';
    } elseif (esColor($mano)) {
        return 'Color';
    } elseif (esEscalera($mano)) {
        return 'Escalera';
    } elseif (esTrio($mano)) {
        return 'Trío';
    } elseif (esDoblePareja($mano)) {
        return 'Doble Pareja';
    } elseif (esPareja($mano)) {
        return 'Pareja';
    } else {
        return 'Carta Alta';
    }
}

function esEscaleraReal($mano) {
    $valores = array('As', '10', 'J', 'Q', 'K');
    $palos = array();

    foreach ($mano as $carta) {
        if (!in_array($carta->palo, $palos)) {
            $palos[] = $carta->palo;
        }
    }

    return (count($palos) === 1 && esEscalera($mano) && $mano[0]->valor === $valores[0]);
}

function esEscaleraColor($mano) {
    return esEscalera($mano) && esColor($mano);
}

function esPoker($mano) {
    $valores = array_count_values(array_map(function ($carta) {
        return $carta->valor;
    }, $mano));

    return in_array(4, $valores, true);
}

function esFullHouse($mano) {
    $valores = array_count_values(array_map(function ($carta) {
        return $carta->valor;
    }, $mano));

    return in_array(3, $valores, true) && in_array(2, $valores, true);
}

function esColor($mano) {
    $palos = array_count_values(array_map(function ($carta) {
        return $carta->palo;
    }, $mano));

    return in_array(5, $palos, true);
}

function esEscalera($mano) {
    $valores = array('As', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K');

    $index = array_search($mano[0]->valor, $valores, true);

    for ($i = 1; $i < count($mano); $i++) {
        if (($index + $i) >= count($valores) || $mano[$i]->valor !== $valores[$index + $i]) {
            return false;
        }
    }

    return true;
}

function esTrio($mano) {
    $valores = array_count_values(array_map(function ($carta) {
        return $carta->valor;
    }, $mano));

    return in_array(3, $valores, true);
}

function esDoblePareja($mano) {
    $valores = array_count_values(array_map(function ($carta) {
        return $carta->valor;
    }, $mano));

    return count(array_keys($valores, 2)) === 2;
}

function esPareja($mano) {
    $valores = array_count_values(array_map(function ($carta) {
        return $carta->valor;
    }, $mano));

    return in_array(2, $valores, true);
}

$baraja = new Baraja();
$baraja->mezclar();

$manoJugador = array();

for ($i = 0; $i < 5; $i++) {
    $manoJugador[] = $baraja->repartir();
}

foreach ($manoJugador as $carta) {
    echo $carta->valor . ' de ' . $carta->palo . PHP_EOL;
}

echo 'Mejor Combinación: ' . evaluarMano($manoJugador) . PHP_EOL;
?>

