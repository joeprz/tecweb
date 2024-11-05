<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de productos</title>
  <style type="text/css">
    ol, ul {
      list-style-type: none;
    }
  </style>

  <script>
    // Validaciones con JavaScript
    function validarFormulario() {
      // Validación del nombre
      const nombre = document.getElementById('form-name').value;
      if (!nombre || nombre.length > 100) {
        alert('El nombre es requerido y debe tener 100 caracteres o menos.');
        return false;
      }

      // Validación de la marca
      const marca = document.getElementById('marca').value;
      if (!marca) {
        alert('La marca es requerida.');
        return false;
      }

      // Validación del modelo
      const modelo = document.getElementById('form-model').value;
      const modeloRegex = /^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]+$/; // Debe contener al menos una letra y un número
      if (!modelo || !modeloRegex.test(modelo) || modelo.length > 25) {
        alert('El modelo es requerido, debe ser alfanumérico, contener al menos una letra y un número, y tener 25 caracteres o menos.');
        return false;
      }

      // Validación del precio
      const precio = parseFloat(document.getElementById('form-price').value);
      if (isNaN(precio) || precio <= 99.99) {
        alert('El precio es requerido y debe ser mayor a 99.99.');
        return false;
      }

      // Validación de los detalles (opcional, pero máximo 250 caracteres)
      const detalles = document.getElementById('form-details').value;
      if (detalles && detalles.length > 250) {
        alert('Los detalles deben tener 250 caracteres o menos.');
        return false;
      }

      // Validación de las unidades
      const unidades = parseInt(document.getElementById('form-units').value);
      if (isNaN(unidades) || unidades < 0) {
        alert('Las unidades son requeridas y deben ser un número mayor o igual a 0.');
        return false;
      }

      // Validación de la imagen
      const imagen = document.getElementById('form-image').value;
      if (!imagen) {
        document.getElementById('form-image').value = 'http://localhost/tecweb/practicas/p09/img/img.png';
      }

      return true; // Si todas las validaciones pasan
    }
  </script>

</head>

<body>
  <h1>Registro de productos</h1>

  <?php
  // Variables para manejar datos de entrada
  $id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : (isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '');
  $nombre = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : (isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : '');
  $marca = isset($_POST['marca']) ? htmlspecialchars($_POST['marca']) : (isset($_GET['marca']) ? htmlspecialchars($_GET['marca']) : '');
  $modelo = isset($_POST['modelo']) ? htmlspecialchars($_POST['modelo']) : (isset($_GET['modelo']) ? htmlspecialchars($_GET['modelo']) : '');
  $precio = isset($_POST['precio']) ? htmlspecialchars($_POST['precio']) : (isset($_GET['precio']) ? htmlspecialchars($_GET['precio']) : '');
  $unidades = isset($_POST['unidades']) ? htmlspecialchars($_POST['unidades']) : (isset($_GET['unidades']) ? htmlspecialchars($_GET['unidades']) : '');
  $detalles = isset($_POST['detalles']) ? htmlspecialchars($_POST['detalles']) : (isset($_GET['detalles']) ? htmlspecialchars($_GET['detalles']) : '');
  $imagen = isset($_POST['imagen']) ? htmlspecialchars($_POST['imagen']) : (isset($_GET['imagen']) ? htmlspecialchars($_GET['imagen']) : '');
  ?>

  <form id="formularioProductos" action="http://localhost/tecweb/practicas/P10/update_producto.php" method="post" enctype="multipart/form-data" onsubmit="return validarFormulario()">

    <fieldset>
      <legend>Información del Producto</legend>
      <ul>
        <li>
          <label for="form-id">ID:</label>
          <input type="hidden" name="id" id="form-id" value="<?= $id ?>">
        </li>

        <li>
          <label for="form-name">Nombre:</label>
          <input type="text" name="nombre" id="form-name" value="<?= $nombre ?>">
        </li>

        <li>
          <label for="marca">Marca:</label>
          <select name="marca" id="marca">
            <option value="">Seleccione una marca</option>
            <option value="Apple" <?= $marca == 'Apple' ? 'selected' : '' ?>>Apple</option>
            <option value="Samsung" <?= $marca == 'Samsung' ? 'selected' : '' ?>>Samsung</option>
            <option value="LG" <?= $marca == 'Xiaomi' ? 'selected' : '' ?>>LG</option>
          </select>
        </li>

        <li>
          <label for="form-model">Modelo:</label>
          <input type="text" name="modelo" id="form-model" value="<?= $modelo ?>">
        </li>

        <li>
          <label for="form-price">Precio:</label>
          <input type="number" name="precio" id="form-price" value="<?= $precio ?>">
        </li>

        <li>
          <label for="form-units">Unidades:</label>
          <input type="number" name="unidades" id="form-units" value="<?= $unidades ?>">
        </li>

        <li>
          <label for="form-details">Detalles:</label><br>
          <textarea name="detalles" rows="4" cols="60" id="form-details" placeholder="No más de 250 caracteres de longitud"><?= $detalles ?></textarea>
        </li>

        <li>
          <label for="form-image">Path de la Imagen:</label>
          <input type="text" name="imagen" id="form-image" value="<?= $imagen ?>">
        </li>
      </ul>
    </fieldset>

    <p>
      <input type="submit" value="Registrar Producto">
      <input type="reset" value="Limpiar Formulario">
    </p>

  </form>
</body>

</html>
