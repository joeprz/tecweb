<?php
    use MyApi\Products; 

    // Incluye el archivo de la clase Products
    include_once __DIR__.'/myapi/Products.php';

    $products = New Products();

    $products->edit(file_get_contents('php://input'));

    echo $products->getResponse();
?>