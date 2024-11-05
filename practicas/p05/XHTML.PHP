<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Practica 5</title>
</head>
<body>

<h1>Ejercicio 1</h1>
<?php
$_myvar = "Variable válida";
$_7var = "Variable válida";
$myvar = "Variable válida";
$var7 = "Variable válida";
$_element1 = "Variable válida";
// $house*5 no es una variable válida por el uso de *
// myvar no es una variable valida porque no inicia con $

echo "\$_myvar: $_myvar<br/>";
echo "\$_7var: $_7var<br/>";
echo "\$myvar: $myvar<br/>";
echo "\$var7: $var7<br/>";
echo "\$_element1: $_element1<br/>";

// Liberar
unset($_myvar, $_7var, $myvar, $var7, $_element1);
?>
