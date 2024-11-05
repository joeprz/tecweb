<?php
<<<<<<< HEAD
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
=======
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    $data = array(
        'status'  => 'error',
        'message' => 'Ya existe un producto con ese nombre'
    );
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);
        // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
        $sql = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 0";
	    $result = $conexion->query($sql);
        
        if ($result->num_rows == 0) {
            $conexion->set_charset("utf8");
            $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}', 0)";
            if($conexion->query($sql)){
                $data['status'] =  "success";
                $data['message'] =  "Producto agregado";
            } else {
                $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
            }
        }

        $result->free();
        // Cierra la conexion
        $conexion->close();
    }

    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>
>>>>>>> 582d7fbf6bac533394f7ca3b90a344f0693e13a1
