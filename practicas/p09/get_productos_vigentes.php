<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<?php
    @$link = new mysqli('localhost', 'root', 'gardenia1115', 'marketzone');
    if ($link->connect_errno) {
        die('Falló la conexión: '.$link->connect_error);
    }

    $result = $link->query("SELECT * FROM productos WHERE eliminado = 0");
    $row = $result->fetch_all(MYSQLI_ASSOC);

    $link->close();
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Productos Vigentes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <h3>PRODUCTOS VIGENTES</h3>
    <br/>
    <table class="table">
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
            </tr>
        </thead>
        <tbody>
            <?php foreach($row as $value): ?>
            <tr>
                <th scope="row"><?= $value['id'] ?></th>
                <td><?= $value['nombre'] ?></td>
                <td><?= $value['marca'] ?></td>
                <td><?= $value['modelo'] ?></td>
                <td><?= $value['precio'] ?></td>
                <td><?= $value['unidades'] ?></td>
                <td><?= $value['detalles'] ?></td>
                <td><img src="<?= $value['imagen'] ?>" alt="Imagen del producto"></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
