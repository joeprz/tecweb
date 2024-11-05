<?php
header('Content-Type: application/xhtml+xml; charset=utf-8');

// Verificar si los datos fueron enviados por el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores del formulario
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];

    // Comienza la salida de XHTML
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <title>Resultado de la Evaluación</title>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
</head>
<body>
    <?php
    // Validar si es una persona de sexo femenino entre 18 y 35 años
    if ($sexo == 'femenino' && $edad >= 18 && $edad <= 35) {
        echo '<p>Bienvenida, usted está en el rango de edad permitido.</p>';
    } else {
        echo '<p>Lo siento, usted no cumple con los requisitos.</p>';
    }
    ?>
</body>
</html>
<?php
}
?>