<?php
require_once __DIR__ . '/database.php';

// Respuesta inicial de error
$response = [
    'status'  => 'error',
    'message' => 'Ya existe un producto con ese nombre'
];

// Obtener los datos enviados en JSON
$inputData = file_get_contents('php://input');

if ($inputData) {
    // Decodificar el JSON
    $productData = json_decode($inputData);

    if (isset($productData->nombre, $productData->marca, $productData->modelo, $productData->precio, $productData->unidades)) {
        $conexion->set_charset("utf8");

        // Comprobar si el nombre del producto ya existe
        $sqlCheck = sprintf(
            "SELECT * FROM productos WHERE nombre = '%s' AND eliminado = 0",
            $conexion->real_escape_string($productData->nombre)
        );
        $result = $conexion->query($sqlCheck);

        if ($result->num_rows === 0) {
            // Si no existe, insertar el producto
            $sqlInsert = sprintf(
                "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) VALUES ('%s', '%s', '%s', %d, '%s', %d, '%s', 0)",
                $conexion->real_escape_string($productData->nombre),
                $conexion->real_escape_string($productData->marca),
                $conexion->real_escape_string($productData->modelo),
                $conexion->real_escape_string($productData->precio),
                $conexion->real_escape_string($productData->detalles ?? ''),
                $conexion->real_escape_string($productData->unidades),
                $conexion->real_escape_string($productData->imagen ?? '')
            );

            if ($conexion->query($sqlInsert)) {
                $response['status'] = 'success';
                $response['message'] = 'Producto agregado exitosamente';
            } else {
                $response['message'] = "Error al ejecutar la consulta: " . $conexion->error;
            }
        } else {
            $response['message'] = 'Ya existe un producto con ese nombre';
        }

        $result->free();
    } else {
        $response['message'] = 'Datos insuficientes para agregar el producto';
    }

    $conexion->close();
} else {
    $response['message'] = 'No se recibió información para agregar un producto';
}

// Convertir la respuesta en JSON
echo json_encode($response, JSON_PRETTY_PRINT);
?>
