<?php
include 'src/funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 7</title>
</head>
<body>
    <h1>Ejercicios</h1>

    <h2>Ejercicio 1</h2>

    <?php
    if (isset($_GET['numero'])) {
        $numero = $_GET['numero'];
        if (multiplo5y7($numero)) {
            echo "<p>$numero es multiplo de 5 y 7</p>";
        } else {
            echo "<p>$numero no es multiplo.</p>";
        }
    }
    ?>

    <h2>Ejercicio 2 </h2>
    <?php
    $result = secuencia(3);
    echo "<p>Secuencia: ";
    foreach ($result['matriz'] as $row) {
        echo implode(', ', $row);
    }
    echo "</p>";
    echo "<p>Iteraciones: {$result['i']}</p>";
    ?>

</body>
</html>
