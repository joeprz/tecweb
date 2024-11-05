<?php
require_once __DIR__ . '/database.php';

$response = [
    'status'  => 'error',
    'message' => 'Error al actualizar el producto'
];

$inputData = file_get_contents('php://input');

if ($inputData) {
    $productData = json_decode($inputData);

    if (isset($productData->id, $productData->nombre, $productData->marca, $productData->modelo, $productData->precio, $productData->unidades)) {
        $conexion->set_charset("utf8");

        $sql = sprintf(
            "UPDATE productos SET nombre = '%s', marca = '%s', modelo = '%s', precio = %d, detalles = '%s', unidades = %d, imagen = '%s' WHERE id = '%s' AND eliminado = 0",
            $conexion->real_escape_string($productData->nombre),
            $conexion->real_escape_string($productData->marca),
            $conexion->real_escape_string($productData->modelo),
            $conexion->real_escape_string($productData->precio),
            $conexion->real_escape_string($productData->detalles ?? ''),
            $conexion->real_escape_string($productData->unidades),
            $conexion->real_escape_string($productData->imagen ?? ''),
            $conexion->real_escape_string($productData->id)
        );

        if ($conexion->query($sql)) {
            $response['status'] = 'success';
            $response['message'] = 'Producto actualizado exitosamente';
        } else {
            $response['message'] = "Error al ejecutar la consulta: " . $conexion->error;
        }
    } else {
        $response['message'] = 'Datos insuficientes para la actualización';
    }

    $conexion->close();
} else {
    $response['message'] = 'No se recibió información de producto para actualizar';
}


echo json_encode($response, JSON_PRETTY_PRINT);
?>
