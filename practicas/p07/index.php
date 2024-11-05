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
            echo "<p>$numero es múltiplo de 5 y 7</p>";
        } else {
            echo "<p>$numero no es múltiplo de 5 y 7.</p>";
        }
    }
    ?>

    <h2>Ejercicio 2</h2>
    <?php
    $result = secuencia(3); // Llamamos a la función secuencia()
    echo "<p>Secuencia: ";
    foreach ($result['matriz'] as $row) {
        echo implode(', ', $row) . "<br>";
    }
    echo "</p>";
    echo "<p>Iteraciones: {$result['i']}</p>";
    ?>

    <h2>Ejercicio 3</h2>
    <?php
    if (isset($_GET['multiple'])) {
        $multiple = $_GET['multiple'];
        echo "<p>Multiplo (While): " . random($multiple) . "</p>";
        echo "<p>Multiplo (Do-While Loop): " . random($multiple, true) . "</p>"; // Puedes pasar un segundo parámetro para diferenciar el bucle
    }
    ?>

    <h2>Ejercicio 4</h2>
    <table border="1">
        <tr>
            <th>n.</th>
            <th>Caracter</th>
        </tr>
        <?php
        $ascii_array = arreglo();
        foreach ($ascii_array as $key => $value) {
            echo "<tr><td>$key</td><td>$value</td></tr>";
        }
        ?>
    </table>

    <h1>Ejercicio 5: Validación de Edad y Sexo</h1>
    <form action="procesar.php" method="POST">
        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" required /><br />

        <label for="sexo">Sexo:</label>
        <select name="sexo" id="sexo" required>
            <option value="">Seleccione su sexo</option>
            <option value="femenino">Femenino</option>
            <option value="masculino">Masculino</option>
        </select><br />

        <input type="submit" value="Enviar" />
    </form>
    <h2>Ejercicio 6 </h2>

<form action="vehiculos.php" method="post">
    <fieldset>
        <legend>Consultar por Matrícula</legend>
        <label for="matricula">Matrícula:</label>
        <input type="text" id="matricula" name="matricula" required>
        <button type="submit">Consultar</button>
    </fieldset>
</form>

<form action="vehiculos.php" method="post">
    <fieldset>
        <legend>Ver Todos los Vehículos</legend>
        <button type="submit" name="verTodos">Ver Todos</button>
    </fieldset>
</form>
</body>
</html>