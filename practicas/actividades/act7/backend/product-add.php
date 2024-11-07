<?php
// Importa la clase Products del namespace MyApi
use MyApi\Products;

    include_once __DIR__.'/myapi/Products.php';

    $products = New Products('root', '', 'marketzone');

    $products->add(file_get_contents('php://input'));

    echo $products->getResponse();

?>