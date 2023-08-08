 <?php

$medidasCasa = floatval(readline("Escriba las medidas de su casa: "));

function convertidor($medidas){
    $medidasTotales = $medidas * 2;
    echo $medidasTotales;
}

convertidor($medidasCasa);

?>

