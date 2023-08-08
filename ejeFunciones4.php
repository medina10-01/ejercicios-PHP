<?php
function sumarNumeros($lista) {
    $nums = explode(",", $lista);

    $suma = 0;
    foreach ($nums as $num) {
        $num = trim($num);
        if (is_numeric($num)) {
            $suma += intval($num);
        } else {
            return false;
        }
    }

    return $suma;
}

$lista = readline("Escriba una lista de números separados por comas: ");

if ($resultado = sumarNumeros($lista)) {
    echo "La suma de los números es: " . $resultado;
} else {
    echo "Error: Ingrese una lista válida de números separados por comas.";
}
?>
