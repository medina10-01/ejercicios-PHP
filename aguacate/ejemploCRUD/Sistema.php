<?php
require_once("Autoload.php");

$idUser = 11;
$objUsuario = new Usuario();

echo "METODO INSERTAR";
$isert = $objUsuario->insertUsuario("Darickson",123456,"Darickson@info.com","Yamboro");
print_r($isert);

echo "<h1> Todos los usuarios </h1>";
$usuarios = $objUsuario->getUsuarios();
print_r("<pre>");
print_r($usuarios);
print_r("</pre>");

echo "<h1> Usuario por id antes del update </h1>";
$usuario = $objUsuario->getUsuario($idUser);
print_r("<pre>");
print_r($usuario);
print_r("</pre>");

$update = $objUsuario->updateUsuario($idUser,"Diego",123444338383883,"Cam@info.com","NEiva");

echo "<h1> Usuario por id luego del update </h1>";
$usuario = $objUsuario->getUsuario($idUser);
print_r("<pre>");
print_r($usuario);
print_r("</pre>");
/*
echo "<h1> Usuario a eliminar por id </h1>";
//$delete = $objUsuario->deleteUser($idUser);
print_r($delete);
$usuario = $objUsuario->getUsuarios();
print_r("<pre>");
print_r($usuario);
print_r("</pre>");*/
?>