<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Productos Disponibles</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>
    <h3>Productos disponibles con tope de unidades</h3>
    
    <?php
    // Verifica si el parámetro 'tope' está presente en la URL
    if (isset($_GET['tope'])) {
        $tope = $_GET['tope'];
    } else {
        die('Parámetro "tope" no detectado...');
    }

    if (!empty($tope)) {
        // Crear la conexión con la base de datos
        @$link = new mysqli('localhost', 'root', 'gardenia1115', 'marketzone');
        
        // Comprobar la conexión
        if ($link->connect_errno) {
            die('Falló la conexión: ' . $link->connect_error);
        }

        // Consultar productos con unidades <= tope
        if ($result = $link->query("SELECT * FROM productos WHERE unidades <= $tope")) {
            if ($result->num_rows > 0) {
                // Generar tabla con resultados
                echo '<table class="table table-striped">';
                echo '<thead><tr><th>#</th><th>Nombre</th><th>Marca</th><th>Modelo</th><th>Precio</th><th>Unidades</th><th>Detalles</th></tr></thead>';
                echo '<tbody>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['nombre'] . '</td>';
                    echo '<td>' . $row['marca'] . '</td>';
                    echo '<td>' . $row['modelo'] . '</td>';
                    echo '<td>' . $row['precio'] . '</td>';
                    echo '<td>' . $row['unidades'] . '</td>';
                    echo '<td>' . utf8_encode($row['detalles']) . '</td>';
                    echo '</tr>';
                }

                echo '</tbody></table>';
            } else {
                echo '<p>No se encontraron productos con unidades menores o iguales a ' . $tope . '.</p>';
            }

            // Liberar resultados
            $result->free();
        } else {
            echo '<p>Error en la consulta.</p>';
        }

        // Cerrar la conexión
        $link->close();
    }
    ?>
</body>
</html>
