<?php
    $conexion = @mysqli_connect(
        'localhost',
        'root',
        '',
        'marketzone'
    );

    /**
     * NOTA: si la conexión falló $conexion contendrá false
     **/
    if(!$conexion) {
        die('¡Base de datos NO conectada! Error: ' . mysqli_connect_error());
    } else {
        echo '¡Conexión exitosa a la base de datos!';
    }
?>
