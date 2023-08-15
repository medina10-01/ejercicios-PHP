<?php

$palabra = readline("Escriba una palabra para verificar si es palíndroma: ");
$palabraAlrevez = strrev($palabra);

function verificarPalindromo($palabra, $palabraAlrevez) {
    $palabraSinEspacios = str_replace(" ", "", $palabra);
    $palabraAlrevezSinEspacios = str_replace(" ", "", $palabraAlrevez);

    if ($palabraSinEspacios === $palabraAlrevezSinEspacios) {
        echo "La palabra '" . $palabra . "' es un palíndromo.";
    } else {
        echo "La palabra '" . $palabra . "' no es un palíndromo.";
    }
}

verificarPalindromo($palabra, $palabraAlrevez);

?>
