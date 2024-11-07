// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "http://localhost/tecweb/practicas/p09/img/img.png"
<<<<<<< HEAD
};

function init() {
    // Muestra el JSON en el campo description al inicializar (opcional)
    // document.getElementById("description").value = JSON.stringify(baseJSON, null, 2);
}

$(document).ready(function() {
    let edit = false;

    console.log('jQuery is Working');
    $('#product-result').hide();
    listarProductos();

        $('#search').keyup(function(e) {
            if ($('#search').val()) {
                let search = $('#search').val();
                console.log(`Buscando productos con el término: ${search}`);
                $.ajax({
                    url: 'backend/product-search.php',
                    type: 'GET',
                    data: { search },
                    success: function(response) {
                        console.log(`Respuesta de búsqueda: ${response}`);
                        let products = JSON.parse(response);
                        let template = '';

=======
  };

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    /*var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;*/
    document.getElementById("description").value = JSON.stringify(baseJSON, null, 2);

    // SE LISTAN TODOS LOS PRODUCTOS
    //listarProductos();
}

$(document).ready(function() {
    let edit = false; 
    init();
    // SE LISTAN TODOS LOS PRODUCTOS
    listarProductos();
    console.log('jQuery is working!');

    $('#product-result').hide();
  
    // Evento de búsqueda al teclear
    $('#search').keyup(function(e) {
        let search = $('#search').val(); // Obtener el valor de búsqueda

        console.log("Buscando:", search); // Imprimir en consola para depuración

        if (search) {
            $.ajax({
                url: 'backend/product-search.php',
                type: 'GET',
                data: { search },
                success: function(response) {
                    console.log("Respuesta del servidor:", response); // Mostrar respuesta
                    try {
                        let products = JSON.parse(response); // Parsear respuesta JSON
                        let template = '';

                        // Verificar si hay productos y crear la plantilla
>>>>>>> 582d7fbf6bac533394f7ca3b90a344f0693e13a1
                        if (products.length > 0) {
                            products.forEach(product => {
                                template += `
                                    <li>
                                        <strong>${product.nombre}</strong><br>
                                        Precio: ${product.precio}<br>
                                        Unidades: ${product.unidades}<br>
                                        Modelo: ${product.modelo}<br>
                                        Marca: ${product.marca}<br>
                                        Detalles: ${product.detalles}<br>
                                        <hr>
                                    </li>
                                `;
                            });
<<<<<<< HEAD
                            $('#product-result').show(); // Muestra los resultados
                            $('#container').html(template); // Muestra los productos en el contenedor
                            $('#products').hide(); // Oculta la tabla de productos
                        } else {
                            $('#product-result').hide(); // Oculta si no hay resultados
                            $('#products').show(); // Muestra la tabla de productos si no hay resultados de búsqueda
                        }
                    }
                });
            } else {
                $('#container').html(''); // Limpia el contenedor si no hay búsqueda
                $('#products').show(); // Muestra la tabla de productos nuevamente
            }
        });

    // Validaciones de los campos (foco)
    $('#name').blur(validateName);
    $('#marca').blur(validateMarca);
    $('#modelo').blur(validateModelo);
    $('#precio').blur(validatePrecio);
    $('#unidades').blur(validateUnidades);
    
    function validateName() {
        let name = $('#name').val();
        
        // Si estamos en modo edición, no verificamos si el nombre ya existe
        if (edit) {
            console.log('Modo edición: se ignora la validación de nombre.');
            return true; // Permitir el nombre actual
        }
        
        if (name === '' || name.length > 100) {
            $('#container').text('Nombre es requerido y debe tener 100 caracteres o menos.');
            $('#product-result').show();
            return false;
        }
    
        console.log('Validando nombre:', name);
        // Validación asincrónica de nombre único
        $.get('backend/product-name.php', { name }, function(response) {
            const data = JSON.parse(response);
            console.log('Respuesta de validación de nombre:', data);
            if (data.exists) {
                $('#container').text('Nombre ya existe. Elige otro nombre.');
                $('#product-result').show();
                return false;
            }
        });
        return true;
    }
    
    

    function validateMarca() {
        if ($('#marca').val() === '') {
            $('#container').text('Marca es requerida.');
            $('#product-result').show();
            return false;
        }
        return true;
    }
    
    function validateModelo() {
        let modelo = $('#modelo').val();
        if (modelo === '' || modelo.length > 25) {
            $('#container').text('Modelo es requerido y debe tener 25 caracteres o menos.');
            $('#product-result').show();
            return false;
        }
        return true;
    }
    
    function validatePrecio() {
        let precio = parseFloat($('#precio').val());
        if (isNaN(precio) || precio <= 99.99) {
            $('#container').text('Precio es requerido y debe ser mayor a 99.99.');
            $('#product-result').show();
            return false;
        }
        return true;
    }
    
    function validateUnidades() {
        let unidades = parseInt($('#unidades').val());
        if (isNaN(unidades) || unidades < 0) {
            $('#container').text('Unidades son requeridas y deben ser mayores o iguales a 0.');
            $('#product-result').show();
            return false;
        }
        return true;
    }

    // * AGREGAR PRODUCTO (envío de formulario) *
    $('#product-form').submit(function(e) {
        e.preventDefault();
        
        // Verificar las validaciones antes de proceder
        Promise.all([
            validateName(),
            validateMarca(),
            validateModelo(),
            validatePrecio(),
            validateUnidades()
        ]).then(results => {
            console.log(`Resultados de validación: ${results}`);
            if (results.includes(false)) {
                $('#container').text('Por favor, corrige los errores antes de enviar.');
                $('#product-result').show();
                return;
            }

            // Verifica si la URL de la imagen está vacía
            let imagen = $('#imagen').val();
            if (!imagen) {
                imagen = "http://localhost/tecweb/practicas/p09/img/img.png"; // URL por defecto
                console.log('Se usará la URL de imagen por defecto:', imagen);
            }

            const postData = {
                nombre: $('#name').val(),
                marca: $('#marca').val(),
                modelo: $('#modelo').val(),
                precio: parseFloat($('#precio').val()),
                detalles: $('#detalles').val(),
                unidades: parseInt($('#unidades').val()),
                imagen: imagen,
                id: $('#product-id').val()
            };
            console.log('Datos a enviar:', postData);
            
            $.ajax({
                url: edit ? 'backend/product-edit.php' : 'backend/product-add.php',
                type: 'POST',
                data: JSON.stringify(postData),
                contentType: 'application/json',
                success: function(response) {
                    console.log(`Respuesta de agregar/editar producto: ${response}`);
                    const res = JSON.parse(response);
                    $('#container').text(res.message);
                    $('#product-result').show();
                    if (res.status === "success") {
                        listarProductos();
                        $('#product-form').trigger('reset');
                        edit = false; // Resetea el estado de edición
                    }
                },
                error: function() {
                    $('#container').text('Error al agregar o editar el producto.');
                    $('#product-result').show();
                }
            });
        });
    });

    // Obtener todos los productos
    function listarProductos() {
        console.log('Obteniendo la lista de productos...');
=======
                            $('#product-result').show(); // Mostrar resultados
                            $('#container').html(template); // Mostrar productos en el contenedor // Ocultar tabla de productos
                        } else {
                            $('#product-result').hide(); // Ocultar si no hay productos
                            $('#products').show(); // Mostrar tabla de productos
                        }
                    } catch (error) {
                        console.error('Error al parsear JSON:', error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error en la búsqueda:', error);
                }
            });
        } else {
            $('#product-result').hide(); // Ocultar resultados si no hay búsqueda
            $('#products').show(); // Mostrar la tabla de productos
        }
    });

// Función para validar el producto
function validarProducto(producto) {
    // Validar nombre
    if (!producto.nombre || producto.nombre.trim() === "") {
        alert('El nombre es requerido.');
        return false;
    }
    if (producto.nombre.length > 100) {
        alert('El nombre debe tener 100 caracteres o menos.');
        return false;
    }

    // Validar marca
    if (!producto.marca) {
        alert('La marca es requerida.');
        return false;
    }

    // Validar modelo
    var alfanumerico = /^[a-zA-Z0-9]+$/;
    if (producto.modelo.length > 25) {
        alert("El modelo debe tener 25 caracteres o menos.");
        return false;
    } else if (!alfanumerico.test(producto.modelo)) {
        alert("El modelo debe ser alfanumérico.");
        return false;
    }

    // Validar precio
    var precioNumerico = parseFloat(producto.precio);
    if (precioNumerico === 0) {
        alert("El precio no puede ser 0.");
        return false;
    } else if (precioNumerico < 99.99) {
        alert("El precio no puede ser menor a 99.99.");
        return false;
    }

    // Validar unidades
    var unidades = parseInt(producto.unidades, 10);
    if (isNaN(unidades) || unidades < 0) {
        alert("Las unidades son requeridas y deben ser un número mayor o igual a 0.");
        return false;
    }

    // Validar detalles
    if (producto.detalles.length >= 200) {
        alert("Los detalles deben tener 250 caracteres o menos.");
        return false;
    }

    // Validar imagen
    if (!producto.imagen) {
        alert("El path de la imagen es requerido.");
        producto.imagen = 'http://localhost/tecweb/practicas/p09/img/img.png'; // Default image path
    }

    return true; // Si todas las validaciones pasan
}

$('#product-form').submit(e => {
    e.preventDefault();
    $('#product-result').hide(); 

    // Obtener los datos del formulario
    let name = $('#name').val().trim(); // Eliminar espacios en blanco
    let descriptionText = $('#description').val().trim(); // Eliminar espacios en blanco
    const contenedor = $('#container');
    contenedor.html(''); // Limpiar el contenedor antes de mostrar nuevos mensajes

    // Intentar parsear la descripción a JSON
    let description;
    try {
        description = JSON.parse(descriptionText);
    } catch (error) {
        // Mostrar mensaje de error en el contenedor en lugar de una alerta
        let template = `<li class="alert alert-danger">La descripción debe estar en formato JSON válido.</li>`;
        contenedor.html(template); // Mostrar el mensaje en el contenedor
        $('#product-result').show(); // Mostrar el contenedor de resultados
        return; // Salir de la función
    }

    // Validar que la estructura del JSON sea correcta
    if (!description.hasOwnProperty('precio') || 
        !description.hasOwnProperty('unidades') || 
        !description.hasOwnProperty('modelo') || 
        !description.hasOwnProperty('marca') || 
        !description.hasOwnProperty('detalles') || 
        !description.hasOwnProperty('imagen')) {
        let template = `<li class="alert alert-danger">La descripción JSON debe contener los campos correctos: precio, unidades, modelo, marca, detalles, imagen.</li>`;
        contenedor.html(template); // Mostrar el mensaje en el contenedor
        $('#product-result').show(); // Mostrar el contenedor de resultados
        return; // Salir de la función
    }

    // Crear objeto producto
    const producto = {
        nombre: name,
        marca: description.marca,
        modelo: description.modelo,
        precio: description.precio,
        detalles: description.detalles,
        unidades: description.unidades,
        imagen: description.imagen,
        id: $('#productId').val() // ID del producto para editar
    };

    // Validar el producto usando la función de validación
    if (!validarProducto(producto)) {
        return; // Si la validación falla, detener el envío
    }

    // Determinar si estamos en modo editar o agregar
    let url = producto.id ? 'backend/product-edit.php' : 'backend/product-add.php';

    // Convertimos los datos a JSON
    const jsonData = JSON.stringify(producto);

    // Enviar la solicitud AJAX
    $.ajax({
        url: url,
        type: 'POST',
        data: jsonData,
        contentType: 'application/json',
        success: function (response) {
            try {
                const res = JSON.parse(response);
                let template = '';
                if (res.status === "success") {
                    let mensaje = producto.id ? 'Producto editado correctamente' : 'Producto agregado correctamente';
                    template = `<li class="alert alert-success"><strong>${mensaje}</strong></li>`;
                    $('#product-form').trigger('reset'); // Reiniciar el formulario
                    init(); // Reiniciar el estado de la aplicación
                    listarProductos(); // Actualizar la lista de productos
                } else {
                    // Mensaje de error en el contenedor
                    template = `<li class="alert alert-danger">${res.message}</li>`;
                }

                // Mostrar el mensaje en el contenedor
                contenedor.html(template);
                $('#product-result').show(); // Mostrar el contenedor de resultados
            } catch (error) {
                console.error("Error al procesar el JSON:", error);
                let errorTemplate = `<li class="alert alert-danger">Error al procesar la respuesta del servidor.</li>`;
                contenedor.html(errorTemplate); // Mostrar error de procesamiento en el contenedor
                $('#product-result').show(); // Mostrar el contenedor de resultados
            }
        },
        error: function (xhr, status, error) {
            console.error('Error al enviar los datos:', error);
            let errorTemplate = `<li class="alert alert-danger">Error al enviar la solicitud. Inténtalo de nuevo.</li>`;
            contenedor.html(errorTemplate); // Mostrar error de solicitud en el contenedor
            $('#product-result').show(); // Mostrar el contenedor de resultados
        }
    });
});





    
    // Obtener todos los productos
    function listarProductos() {
>>>>>>> 582d7fbf6bac533394f7ca3b90a344f0693e13a1
        $.ajax({
            url: 'backend/product-list.php',
            type: 'GET',
            success: function(response) {
<<<<<<< HEAD
                console.log(`Respuesta de listar productos: ${response}`);
=======
>>>>>>> 582d7fbf6bac533394f7ca3b90a344f0693e13a1
                try {
                    let products = JSON.parse(response);
                    let template = '';
                    products.forEach(product => {
                        let descripcion = '';
                        descripcion += '<li>precio: ' + product.precio + '</li>';
                        descripcion += '<li>unidades: ' + product.unidades + '</li>';
                        descripcion += '<li>modelo: ' + product.modelo + '</li>';
                        descripcion += '<li>marca: ' + product.marca + '</li>';
                        descripcion += '<li>detalles: ' + product.detalles + '</li>';
                        template += `
<<<<<<< HEAD
                            <tr productId="${product.id}">
                                <td>${product.id}</td>
                                <td><a href="javascript:void(0);" class="product-item">${product.nombre}</a></td>
                                <td>${descripcion}</td>
                                <td>
                                    <button class="product-delete btn btn-danger">Eliminar</button>
                                </td>
                            </tr>
=======

                                <tr productId="${product.id}">
                                    <td>${product.id}</td>
                                    <td><a href="javascript:void(0);" class="product-item">${product.nombre}</a></td>
                                    <td>${descripcion}</td>
                                    <td>
                                        <button class="product-delete btn btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                        

>>>>>>> 582d7fbf6bac533394f7ca3b90a344f0693e13a1
                        `;
                    });
                    $('#products').html(template);
                } catch (error) {
                    console.error('Error al parsear JSON:', error);
                    console.log('Respuesta recibida:', response);
                }
            }
        });
    }

<<<<<<< HEAD
    // Obtener un Producto por ID
    $(document).on('click', '.product-item', function() { 
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('productId');
        console.log(`Obteniendo el producto con ID: ${id}`);
        
        // Hacemos la petición GET para obtener el producto por su ID
        $.get('backend/product-single.php', { id }, function(response) {   
            console.log(`Respuesta de obtener producto: ${response}`);
            const product = JSON.parse(response);

            // Verificamos si el estado de la respuesta es "success"
            if (product.status === 'success') {
                console.log('Producto obtenido:', product);

                // Rellenar los campos del producto
                $('#name').val(product.producto.nombre);
                $('#marca').val(product.producto.marca);
                $('#modelo').val(product.producto.modelo);
                $('#precio').val(product.producto.precio);
                $('#detalles').val(product.producto.detalles);
                $('#unidades').val(product.producto.unidades);
                $('#imagen').val(product.producto.imagen);
                $('#product-id').val(product.producto.id);

                edit = true;
            } else {
                $('#container').html(product.message);  // En caso de error, muestra el mensaje
                $('#product-result').show();
            }
        });
    });
=======

// Obtener un Producto por ID
$(document).on('click', '.product-item', function() { 
    let element = $(this).closest('tr'); // Obtener la fila más cercana
    let id = $(element).attr('productId'); // Obtener el ID desde el atributo

    console.log("ID del producto: ", id); // Depuración: verifica si el ID se obtiene correctamente

    // Hacemos la petición GET para obtener el producto por su ID
    $.get('backend/product-single.php', { id }, function(response) {   
        console.log("Respuesta del servidor: ", response); // Depuración: muestra la respuesta

        const product = JSON.parse(response);

        // Verificamos si el estado de la respuesta es "success"
        if (product.status === 'success') {
            console.log("Producto encontrado: ", product); // Depuración: muestra el producto encontrado

            $('#name').val(product.producto.nombre); // Rellenar el campo de nombre

            // Convertir los detalles del producto a JSON y mostrarlos en el campo #description
            const description = {
                precio: product.producto.precio,
                unidades: product.producto.unidades,
                modelo: product.producto.modelo,
                marca: product.producto.marca,
                detalles: product.producto.detalles,
                imagen: product.producto.imagen
            };

            // Rellenar el campo de descripción en formato JSON
            $('#description').val(JSON.stringify(description, null, 2)); // Formato JSON bonito
            $('#productId').val(product.producto.id); // Rellenar el ID del producto
            
            edit = true; // Cambiar el estado a edit
        } else {
            alert(product.message);  // En caso de error, muestra el mensaje
        }
    });
});


>>>>>>> 582d7fbf6bac533394f7ca3b90a344f0693e13a1

    // Eliminar un producto
    $(document).on('click', '.product-delete', (e) => {
        if(confirm('¿Estás seguro de que deseas eliminarlo?')) {
<<<<<<< HEAD
            const element = e.currentTarget.closest('tr'); // Cambiar a closest('tr')
            const id = $(element).attr('productId'); // Obtener el ID del producto
            console.log(`Eliminando producto con ID: ${id}`);
            $.post('backend/product-delete.php', { id }, (response) => {
                console.log(`Respuesta de eliminar producto: ${response}`);
=======
            // Usar e.currentTarget para obtener el botón correcto
            const element = e.currentTarget.closest('tr'); // Cambiar a closest('tr')
            const id = $(element).attr('productId'); // Obtener el ID del producto
            $.post('backend/product-delete.php', {id}, (response) => {
                // Procesar la respuesta del servidor
>>>>>>> 582d7fbf6bac533394f7ca3b90a344f0693e13a1
                const res = JSON.parse(response);
                if (res.status === "success") {
                    alert(res.message); // Mostrar mensaje de éxito
                } else {
                    alert(res.message); // Mostrar mensaje de error
                }
                listarProductos(); // Actualizar la lista de productos después de eliminar
            });
        }
    });
<<<<<<< HEAD
});
=======

});
>>>>>>> 582d7fbf6bac533394f7ca3b90a344f0693e13a1
