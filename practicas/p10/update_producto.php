<?php

        // Obtener los valores del formulario
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    } else {
        die('Error: No se recibió el ID del producto.');
    }
    $nombre = $_POST['nombre'];
    $marca  = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $detalles = $_POST['detalles'];
    $unidades = $_POST['unidades'];
    $pathImagen = $_POST['imagen'];
    $eliminado = 0;

    // Conectar a la base de datos
    @$link = new mysqli('localhost', 'root', 'gardenia1115', 'marketzone');
    if ($link->connect_errno) {
        die('Falló la conexión: '.$link->connect_error);
    }

    // Ruta por defecto si no se sube una imagen
    $defaultImagePath = 'http://localhost/tecweb/practicas/p09/img/img.png';

    // Verificar si se ha subido una imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        // Información de la imagen subida
        $nombreImagen = $_FILES['imagen']['name'];
        $tmpImagen = $_FILES['imagen']['tmp_name'];
        
        // Mover la imagen a un directorio en el servidor
        $uploadDir = '../p09/img/'; // Carpeta donde se almacenarán las imágenes
        $rutaImagen = $uploadDir . basename($nombreImagen);

        // Intentar mover el archivo subido al directorio de destino
        if (move_uploaded_file($tmpImagen, $rutaImagen)) {
            echo "La imagen ha sido subida correctamente.";
        } else {
            echo "Error al subir la imagen.";
            $rutaImagen = $defaultImagePath; // Usar la imagen por defecto en caso de error
        }
    } else {
        // Si no se ha subido una imagen, usar la ruta por defecto
        $rutaImagen = $defaultImagePath;
    }

    // Preparar la sentencia SQL para actualizar el registro
    $sql = "UPDATE productos SET 
    nombre = '$nombre', 
    marca = '$marca', 
    modelo = '$modelo', 
    precio = $precio, 
    detalles = '$detalles', 
    unidades = $unidades, 
    imagen = '$pathImagen',
    eliminado = '$eliminado'
    WHERE id = $id;";

    if ($link->query($sql)) {
        echo 'Producto actualizado';
    } else {
        echo 'Error al insertar el producto: ' . $link->error;
    }

    // Cierra la conexión
    mysqli_close($link);
?>