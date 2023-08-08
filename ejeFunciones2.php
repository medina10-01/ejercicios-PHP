<?php

$limite = readline("Escriba un número límite: ");

function generaFibonacci($limite) {
    $num3 = 0;
    $num2 = 1;
    
    while ($num3 <= $limite) {
        echo $num3 . " ";
        $num1 = $num2;
        $num2 = $num3;
        $num3 = $num1 + $num2;
    }
}

generaFibonacci($limite);

?>
