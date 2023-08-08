<?php
$limite = intval(readline("Escriba un número límite: "));

function FierroAlv($limite) {
    for ($i = 0; $i <= $limite; $i++) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            echo "PesoPluma ";
        } else if ($i % 3 == 0) {
            echo "Peso ";
        } else if ($i % 5 == 0) {
            echo "Pluma ";
        } else {
            echo $i . " ";
        }
    }
}

FierroAlv($limite);
?>
