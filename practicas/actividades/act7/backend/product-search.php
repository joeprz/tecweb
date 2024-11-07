<?php

    use MyApi\Products; 
    
    include_once __DIR__.'/myapi/Products.php';

    // Creamos una instancia de la clase Products
    $products = New Products();
    
    // Llamamos al método search para realizar la búsqueda
    $products->search($_GET['search'] ?? '');

    // Mostramos la respuesta en formato JSON
    echo $products->getResponse();
?>
