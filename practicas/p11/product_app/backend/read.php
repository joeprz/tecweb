<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();

    
    // SE VERIFICA HABER RECIBIDO EL PARAMeTRO A BUSCAR
    if( isset($_POST['busqueda']) ) {
        $busqueda = $_POST['busqueda'];
        // SE ESCAPA EL TÉRMINO PARA EVITAR INYECCIÓN SQL
        $busqueda = $conexion->real_escape_string($busqueda);
        //QUERY PARA BUSCAR POR nombre, marca y detalles
        $query = "SELECT * FROM productos WHERE nombre LIKE '%{$busqueda}%' OR marca LIKE '%{$busqueda}%'
        OR detalles LIKE '%{$busqueda}%'";

        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        if ( $result = $conexion->query($query) ) {
            // SE OBTIENEN LOS RESULTADOS
			//$row = $result->fetch_array(MYSQLI_ASSOC);

            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $producto = array();
                foreach ($row as $key => $value) {
                    $producto[$key] = utf8_encode($value);
                }
                $data[] = $producto;
            }
			$result->free();
		} else {
            die('Query Error: '.mysqli_error($conexion));
        }
		$conexion->close();
    } 
    
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>