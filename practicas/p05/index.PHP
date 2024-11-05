<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
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
echo "\$_7var: $_7var";
echo "\$myvar: $myvar";
echo "\$var7: $var7";
echo "\$_element1: $_element1";

// Liberar
unset($_myvar, $_7var, $myvar, $var7, $_element1);
?>


<h1>Ejercicio 2</h1>
<?php
$a = "ManejadorSQL";
$b = "MySQL";
$c = &$a;

echo "\$a: $a<br/>";
echo "\$b: $b";
echo "\$c: $c";

$a = "PHP server";
$b = &$a;

echo "Vuelve a mostrar el contenido:";
echo "\$a: $a";
echo "\$b: $b";
echo "\$c: $c";

echo "Despues de reasignar y volver a mostrar el contenido a todas las se les asigno el texto PHP SERVER";
// Liberar
unset($a, $b, $c);
?>

 <h1>Ejercicio 3</h1>
<?php
$a = "PHP5";
echo "\$a: $a<br/>";
$z[] = &$a;
print_r($z) ;
$b = "5a version de PHP";
echo "\$b: $b";
$c = $b * 10;
echo "\$c: $c";
$a .= $b;
echo "\$a: $a";
$b *= $c;
echo "\$b: $b";
$z[0] = "MySQL";
print_r($z) ;
// Liberar
unset($a, $b, $c, $z);
?>

<h1>Ejercicio 4</h1>
<?php
$GLOBALS['a'] = "PHP5";
echo $GLOBALS['a'] . "<br/>";
$GLOBALS['z'][] = &$GLOBALS['a'];
print_r($GLOBALS['z']);
$GLOBALS['b'] = "5a version de PHP";
echo $GLOBALS['b']  ;
$GLOBALS['c'] = $GLOBALS['b'] * 10;
echo $GLOBALS['c'] ;
$GLOBALS['a'] .= $GLOBALS['b'];
echo $GLOBALS['a'] ;
$GLOBALS['b'] *= $GLOBALS['c'];
echo $GLOBALS['b'] ;
$GLOBALS['z'][0] = "MySQL";
print_r($GLOBALS['z']);


// Liberar
unset($GLOBALS['a'], $GLOBALS['b'], $GLOBALS['c'], $GLOBALS['z']);
?>

<h1>Ejercicio 5</h1>
<?php
$a = "7 personas";
echo "\$a: $a<br/>";
$b = (integer) $a;
echo "\$b: $b";
$a = "9E3";
echo "\$a: $a";
$c = (double) $a;
echo "\$c: $c";

// Liberar
unset($a, $b, $c);
?>

<h1>Ejercicio 6</h1>
<?php
$a = "0";
$b = "TRUE";
$c = FALSE;
$d = ($a OR $b);
$e = ($a AND $c);
$f = ($a XOR $b);

var_dump($a, $b, $c, $d, $e, $f);

echo "<br/>Valor booleano de c: " . (int)$c ;
echo "Valor booleano de e: " . (int)$e ;

// Liberar 
unset($a, $b, $c, $d, $e, $f);
?>

<h1>Ejercicio 7</h1>
<?php
echo "Versión: " . $_SERVER['SERVER_SOFTWARE'] . "<br/>";
echo "Nombre servidor: " . PHP_OS ;
echo "Idioma: " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] ;

?>

</body>
</html>