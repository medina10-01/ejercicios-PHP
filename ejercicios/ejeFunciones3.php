<?php
$lista = readline("Escriba una lista de números separados por comas: ");

function ordenarArray($lista) {
    $numeros = explode(",", $lista);

    foreach ($numeros as &$numero) {
        $numero = intval(trim($numero));
    }

    $longitud = count($numeros);
    for ($i = 0; $i < $longitud - 1; $i++) {
        for ($j = 0; $j < $longitud - $i - 1; $j++) {
            if ($numeros[$j] < $numeros[$j + 1]) {
                $temporal = $numeros[$j];
                $numeros[$j] = $numeros[$j + 1];
                $numeros[$j + 1] = $temporal;
            }
        }
    }

    return $numeros;
}

$resultado = ordenarArray($lista);
echo "Lista ordenada: " . implode(", ", $resultado);
?>
