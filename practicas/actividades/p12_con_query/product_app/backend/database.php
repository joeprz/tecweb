<?php
    $conexion = @mysqli_connect(
        'localhost',
        'root',
<<<<<<< HEAD
        '',
=======
        'gardenia1115',
>>>>>>> 582d7fbf6bac533394f7ca3b90a344f0693e13a1
        'marketzone'
    );

    /**
     * NOTA: si la conexión falló $conexion contendrá false
     **/
    if(!$conexion) {
<<<<<<< HEAD
        die('¡Base de datos NO conectada! Error: ' . mysqli_connect_error());
    } else {
        echo '¡Conexión exitosa a la base de datos!';
    }
?>
=======
        die('¡Base de datos NO conextada!');
    }
?>
>>>>>>> 582d7fbf6bac533394f7ca3b90a344f0693e13a1
