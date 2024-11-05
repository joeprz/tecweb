<?php
    // Verificamos si el parámetro "tope" ha sido proporcionado
    if (isset($_GET['tope'])) {
        $tope = $_GET['tope'];
    } else {
        die('Parámetro "tope" no detectado...');
    }

    // Verificamos que el parámetro no esté vacío
    if (!empty($tope)) {
        // Crear objeto de conexión
        @$link = new mysqli('localhost', 'root', 'gardenia1115', 'marketzone');
        if ($link->connect_errno) {
            die('Falló la conexión: ' . $link->connect_error . '<br/>');
        }

        // Consulta para obtener productos con unidades <= tope
        if ($result = $link->query("SELECT * FROM productos WHERE unidades <= $tope")) {
            $productos = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
        }
        // Cerramos la conexión
        $link->close();
    }
?>
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <title>Productos con Unidades <= <?= htmlspecialchars($tope) ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script>
        function show() {
            // Se obtiene el id de la fila donde está el botón presionado
            var rowId = event.target.parentNode.parentNode.id;

            // Se obtienen los datos de la fila en forma de arreglo
            var data = document.getElementById(rowId).querySelectorAll(".row-data");

            // Obtener los valores de cada columna relevante
            var id = document.getElementById(rowId).querySelector("th").innerHTML;
            var name = data[0].innerHTML;
            var brand = data[1].innerHTML;
            var model = data[2].innerHTML;
            var price = data[3].innerHTML;
            var units = data[4].innerHTML;
            var details = data[5].innerHTML;
            var image = document.getElementById(rowId).querySelector("img"); // Verificar si existe una imagen
            var imageUrl = image ? image.src : "";

             // Mostrar una alerta con el nombre del producto
             alert("Nombre: " + name + " ID: " + id);

            // Llamar a la función para enviar los datos al formulario
            send2form(id, name, brand, model, price, units, details, imageUrl);
        }

        function createHiddenInput(name, value) {
            var input = document.createElement("input");
            input.type = 'hidden';
            input.name = name;
            input.value = value;
            return input;
        }

        function send2form(id, name, brand, model, price, units, details, imageUrl) {
        var form = document.createElement("form");
        form.method = 'POST';
        form.action = "http://localhost/tecweb/practicas/P10/formulario_productos_v2.php";

        form.appendChild(createHiddenInput('id', id));
        form.appendChild(createHiddenInput('nombre', name));
        form.appendChild(createHiddenInput('marca', brand));
        form.appendChild(createHiddenInput('modelo', model));
        form.appendChild(createHiddenInput('precio', price));
        form.appendChild(createHiddenInput('unidades', units));
        form.appendChild(createHiddenInput('detalles', details));
        form.appendChild(createHiddenInput('imagen', imageUrl));

        document.body.appendChild(form);
        form.submit();
}


    </script>
</head>
<body>
    <h3>Productos con Unidades <= <?= htmlspecialchars($tope) ?></h3>

    <br />

     <?php if (isset($productos) && count($productos) > 0) : ?>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Unidades</th>
                    <th scope="col">Detalles</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Modificar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $index => $producto) :?>
                    <tr id="row-<?= $index ?>">
                        <th scope="row"><?= htmlspecialchars($producto['id']) ?></th>
                        <td class="row-data"><?= htmlspecialchars($producto['nombre']) ?></td>
                        <td class="row-data"><?= htmlspecialchars($producto['marca']) ?></td>
                        <td class="row-data"><?= htmlspecialchars($producto['modelo']) ?></td>
                        <td class="row-data"><?= htmlspecialchars($producto['precio']) ?></td>
                        <td class="row-data"><?= htmlspecialchars($producto['unidades']) ?></td>
                        <td class="row-data"><?= utf8_encode($producto['detalles']) ?></td>
                        <td><img src="<?= htmlspecialchars($producto['imagen']) ?>" alt="Imagen de <?= htmlspecialchars($producto['nombre']) ?>" style="width:100px;" /></td>
                        <td><input type="button" value="Modificar" onclick="show()" /></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No se encontraron productos con unidades menores o iguales a <?= htmlspecialchars($tope) ?>.</p>
    <?php endif; ?>
</body>
</html>