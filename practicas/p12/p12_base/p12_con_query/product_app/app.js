// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
};

$(document).ready(function () {
    // Inicializa la página al cargar
    init();

    // Funcionalidad de búsqueda en tiempo real
    $('#search').on('input', function () {
        buscarProducto($(this).val());
    });

    // Funcionalidad para agregar un producto
    $('#product-form').submit(function (e) {
        e.preventDefault();
        agregarProducto();
    });

    // Funcionalidad para eliminar un producto (delegación de eventos)
    $('#products').on('click', '.product-delete', function () {
        let id = $(this).closest('tr').attr('productId');
        eliminarProducto(id);
    });
});

// Función para inicializar la página y cargar la lista de productos
function init() {
    // Muestra el JSON base en el <textarea>
    var JsonString = JSON.stringify(baseJSON, null, 2);
    $('#description').val(JsonString);

    // Carga la lista de productos no eliminados
    listarProductos();
}

// Función para listar los productos no eliminados
function listarProductos() {
    $.ajax({
        url: './backend/product-list.php',
        method: 'GET',
        contentType: 'application/x-www-form-urlencoded',
        success: function (response) {
            let productos = JSON.parse(response);
            if (Object.keys(productos).length > 0) {
                let template = '';
                productos.forEach(function (producto) {
                    let descripcion = `
                        <li>precio: ${producto.precio}</li>
                        <li>unidades: ${producto.unidades}</li>
                        <li>modelo: ${producto.modelo}</li>
                        <li>marca: ${producto.marca}</li>
                        <li>detalles: ${producto.detalles}</li>`;
                    
                    template += `
                        <tr productId="${producto.id}">
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                            <td><button class="product-delete btn btn-danger">Eliminar</button></td>
                        </tr>`;
                });
                $('#products').html(template);
            }
        }
    });
}

// Función para buscar productos no eliminados en tiempo real
function buscarProducto(search) {
    $.ajax({
        url: './backend/product-search.php',
        method: 'GET',
        data: { search: search },
        contentType: 'application/x-www-form-urlencoded',
        success: function (response) {
            let productos = JSON.parse(response);
            let template = '';
            let template_bar = '';
            productos.forEach(function (producto) {
                let descripcion = `
                    <li>precio: ${producto.precio}</li>
                    <li>unidades: ${producto.unidades}</li>
                    <li>modelo: ${producto.modelo}</li>
                    <li>marca: ${producto.marca}</li>
                    <li>detalles: ${producto.detalles}</li>`;
                
                template += `
                    <tr productId="${producto.id}">
                        <td>${producto.id}</td>
                        <td>${producto.nombre}</td>
                        <td><ul>${descripcion}</ul></td>
                        <td><button class="product-delete btn btn-danger">Eliminar</button></td>
                    </tr>`;
                
                template_bar += `<li>${producto.nombre}</li>`;
            });
            $('#products').html(template);
            $('#container').html(template_bar);
            $('#product-result').removeClass('d-none').addClass('d-block');
        }
    });
}

// Función para agregar un producto
function agregarProducto() {
    let productoJsonString = $('#description').val();
    let finalJSON = JSON.parse(productoJsonString);
    finalJSON['nombre'] = $('#name').val();
    productoJsonString = JSON.stringify(finalJSON, null, 2);

    $.ajax({
        url: './backend/product-add.php',
        method: 'POST',
        contentType: "application/json;charset=UTF-8",
        data: productoJsonString,
        success: function (response) {
            let respuesta = JSON.parse(response);
            let template_bar = `
                <li style="list-style: none;">status: ${respuesta.status}</li>
                <li style="list-style: none;">message: ${respuesta.message}</li>`;
            
            $('#container').html(template_bar);
            $('#product-result').removeClass('d-none').addClass('d-block');
            
            listarProductos();  // Actualiza la lista de productos
        }
    });
}

// Función para eliminar un producto
function eliminarProducto(id) {
    if (confirm("¿De verdad deseas eliminar el Producto?")) {
        $.ajax({
            url: './backend/product-delete.php',
            method: 'GET',
            data: { id: id },
            contentType: 'application/x-www-form-urlencoded',
            success: function (response) {
                let respuesta = JSON.parse(response);
                let template_bar = `
                    <li style="list-style: none;">status: ${respuesta.status}</li>
                    <li style="list-style: none;">message: ${respuesta.message}</li>`;
                
                $('#container').html(template_bar);
                $('#product-result').removeClass('d-none').addClass('d-block');
                
                listarProductos();  // Actualiza la lista de productos
            }
        });
    }
}
