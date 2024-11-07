<?php

use MyApi\Products; 

    include_once __DIR__.'/myapi/Products.php';

    $p = new Products('root', '', 'marketzone');

    if (isset($_POST['id'])) {
        $p->delete($_POST['id']);
        echo $p->getResponse();  // Usar getResponse en lugar de getData
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'ID no proporcionado'), JSON_PRETTY_PRINT);
    }
?>
