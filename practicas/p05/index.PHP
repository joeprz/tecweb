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


<h1>Ejercicio 2</h1>
<?php
$a = "ManejadorSQL";
$b = "MySQL";
$c = &$a;

echo "\$a: $a<br/>";
echo "\$b: $b<br/>";
echo "\$c: $c<br/>";

$a = "PHP server";
$b = &$a;

echo "<br/>Vuelve a mostrar el contenido:<br/>";
echo "\$a: $a<br/>";
echo "\$b: $b<br/>";
echo "\$c: $c<br/>";

echo "<br/>Despues de reasignar y volver a mostrar el contenido a todas las variables se les asigno el texto PHP SERVER<br/>";
// Liberar variables
unset($a, $b, $c);
?>

 <h1>Ejercicio 3</h1>
<?php
$a = "PHP5";
echo "\$a: $a<br/>";
$z[] = &$a;
print_r($z) ;
echo "<br/>";
$b = "5a version de PHP";
echo "\$b: $b<br/>";
$c = $b * 10;
echo "\$c: $c<br/>";
$a .= $b;
echo "\$a: $a<br/>";
$b *= $c;
echo "\$b: $b<br/>";
$z[0] = "MySQL";
print_r($z) ;
// Liberar variables
unset($a, $b, $c, $z);
?>
