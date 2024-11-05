<?php
<<<<<<< HEAD
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
=======
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    $data = array(
        'status'  => 'error',
        'message' => 'Error en la actualización del producto'
    );

    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JSON A OBJETO
        $jsonOBJ = json_decode($producto);

        // Verificamos que los datos necesarios existan antes de proceder
        if (isset($jsonOBJ->id) && isset($jsonOBJ->nombre) && isset($jsonOBJ->marca) && isset($jsonOBJ->modelo) && isset($jsonOBJ->precio) && isset($jsonOBJ->unidades)) {

            $conexion->set_charset("utf8");

            $sql = "UPDATE productos SET nombre = '{$jsonOBJ->nombre}', marca = '{$jsonOBJ->marca}', modelo = '{$jsonOBJ->modelo}', precio = {$jsonOBJ->precio}, detalles = '{$jsonOBJ->detalles}', unidades = {$jsonOBJ->unidades}, imagen = '{$jsonOBJ->imagen}' WHERE id = '{$jsonOBJ->id}' AND eliminado = 0";

            // Ejecutamos la consulta
            if ($conexion->query($sql)) {
                $data['status'] = "success";
                $data['message'] = "Producto actualizado correctamente";
            } else {
                // Mensaje en caso de error al ejecutar la consulta
                $data['message'] = "ERROR: No se ejecutó $sql. " . mysqli_error($conexion);
            }
        } else {
            $data['message'] = 'Datos incompletos para la actualización';
        }

        // Cierra la conexión
        $conexion->close();
    } else {
        $data['message'] = 'No se recibió información para actualizar';
    }
    
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>
>>>>>>> 582d7fbf6bac533394f7ca3b90a344f0693e13a1
