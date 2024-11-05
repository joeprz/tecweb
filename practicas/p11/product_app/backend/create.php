<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
        $nombre = utf8_decode($jsonOBJ->nombre);
        $precio = (float)$jsonOBJ->precio;
        $unidades = (int)$jsonOBJ->unidades;
        $modelo = utf8_decode($jsonOBJ->modelo);
        $marca = utf8_decode($jsonOBJ->marca);
        $detalles = utf8_decode($jsonOBJ->detalles);
        $imagen = $jsonOBJ->imagen;
    
        // VALIDAR SI YA EXISTE EL PRODUCTO (nombre y eliminado = 0)
        $sql = "SELECT 1 FROM productos WHERE nombre = ? AND eliminado = 0";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('s', $nombre);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo json_encode(["error" => "El producto ya existe."]);
        } else {
            // INSERTAR EL PRODUCTO
            $sql = "INSERT INTO productos (nombre, precio, unidades, modelo, marca, detalles, imagen)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param('sdissss', $nombre, $precio, $unidades, $modelo, $marca, $detalles, $imagen);

            if ($stmt->execute()) {
                echo json_encode(["mensaje" => "Producto agregado exitosamente."]);
            } else {
                echo json_encode(["error" => "Error al agregar el producto."]);
            }
        }

        $stmt->close();
        $conexion->close();
    } else {
        echo json_encode(["error" => "No se recibieron datos."]);
    }
?>