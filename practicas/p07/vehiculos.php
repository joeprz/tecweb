<?php
// Arreglo asociativo que contiene el parque vehicular
$parqueVehicular = array(
    "ABC1234" => array(
        "Auto" => array(
            "marca" => "HONDA",
            "modelo" => 2020,
            "tipo" => "camioneta"
        ),
        "Propietario" => array(
            "nombre" => "Alfonzo Esparza",
            "ciudad" => "Puebla, Pue.",
            "direccion" => "C.U., Jardines de San Manuel"
        )
    ),
    "DEF5678" => array(
        "Auto" => array(
            "marca" => "MAZDA",
            "modelo" => 2019,
            "tipo" => "sedan"
        ),
        "Propietario" => array(
            "nombre" => "Ma. del Consuelo Molina",
            "ciudad" => "Puebla, Pue.",
            "direccion" => "97 oriente"
        )
    ),
    "GHI9012" => array(
        "Auto" => array(
            "marca" => "TOYOTA",
            "modelo" => 2018,
            "tipo" => "hatchback"
        ),
        "Propietario" => array(
            "nombre" => "Juan Pérez",
            "ciudad" => "Cholula, Pue.",
            "direccion" => "Calle 5 Norte"
        )
    ),
    "JKL3456" => array(
        "Auto" => array(
            "marca" => "NISSAN",
            "modelo" => 2021,
            "tipo" => "sedan"
        ),
        "Propietario" => array(
            "nombre" => "Carla Martínez",
            "ciudad" => "Atlixco, Pue.",
            "direccion" => "Av. Principal 22"
        )
    ),
    "MNO7890" => array(
        "Auto" => array(
            "marca" => "FORD",
            "modelo" => 2017,
            "tipo" => "camioneta"
        ),
        "Propietario" => array(
            "nombre" => "Ana López",
            "ciudad" => "Tehuacán, Pue.",
            "direccion" => "Calle 8 Poniente"
        )
    ),
    "PQR2345" => array(
        "Auto" => array(
            "marca" => "CHEVROLET",
            "modelo" => 2016,
            "tipo" => "hatchback"
        ),
        "Propietario" => array(
            "nombre" => "Roberto Sánchez",
            "ciudad" => "Izúcar de Matamoros, Pue.",
            "direccion" => "Calle Benito Juárez"
        )
    ),
    "STU6789" => array(
        "Auto" => array(
            "marca" => "KIA",
            "modelo" => 2022,
            "tipo" => "sedan"
        ),
        "Propietario" => array(
            "nombre" => "María Fernández",
            "ciudad" => "Huejotzingo, Pue.",
            "direccion" => "Calle Zaragoza"
        )
    ),
    "VWX3456" => array(
        "Auto" => array(
            "marca" => "VOLKSWAGEN",
            "modelo" => 2019,
            "tipo" => "camioneta"
        ),
        "Propietario" => array(
            "nombre" => "Luis Ramírez",
            "ciudad" => "San Martín Texmelucan, Pue.",
            "direccion" => "Avenida 16 de Septiembre"
        )
    ),
    "YZA1234" => array(
        "Auto" => array(
            "marca" => "BMW",
            "modelo" => 2020,
            "tipo" => "sedan"
        ),
        "Propietario" => array(
            "nombre" => "Gabriela Moreno",
            "ciudad" => "Puebla, Pue.",
            "direccion" => "Colonia El Carmen"
        )
    ),
    "BCD5678" => array(
        "Auto" => array(
            "marca" => "AUDI",
            "modelo" => 2021,
            "tipo" => "hatchback"
        ),
        "Propietario" => array(
            "nombre" => "Eduardo Martínez",
            "ciudad" => "Cholula, Pue.",
            "direccion" => "Calle 14 Poniente"
        )
    ),
    "EFG9012" => array(
        "Auto" => array(
            "marca" => "MERCEDES-BENZ",
            "modelo" => 2018,
            "tipo" => "camioneta"
        ),
        "Propietario" => array(
            "nombre" => "Ricardo Gutiérrez",
            "ciudad" => "Puebla, Pue.",
            "direccion" => "Boulevard 5 de Mayo"
        )
    ),
    "HIJ2345" => array(
        "Auto" => array(
            "marca" => "TESLA",
            "modelo" => 2022,
            "tipo" => "sedan"
        ),
        "Propietario" => array(
            "nombre" => "Daniela Ortega",
            "ciudad" => "San Andrés Cholula, Pue.",
            "direccion" => "Calle 2 Sur"
        )
    ),
    "KLM6789" => array(
        "Auto" => array(
            "marca" => "HYUNDAI",
            "modelo" => 2017,
            "tipo" => "hatchback"
        ),
        "Propietario" => array(
            "nombre" => "Miguel Ávila",
            "ciudad" => "Puebla, Pue.",
            "direccion" => "Avenida Las Torres"
        )
    ),
    "NOP3456" => array(
        "Auto" => array(
            "marca" => "SUBARU",
            "modelo" => 2019,
            "tipo" => "camioneta"
        ),
        "Propietario" => array(
            "nombre" => "Laura Rojas",
            "ciudad" => "Atlixco, Pue.",
            "direccion" => "Calle Independencia"
        )
    ),
    "QRS7890" => array(
        "Auto" => array(
            "marca" => "VOLVO",
            "modelo" => 2021,
            "tipo" => "sedan"
        ),
        "Propietario" => array(
            "nombre" => "Jorge León",
            "ciudad" => "Teziutlán, Pue.",
            "direccion" => "Calle Hidalgo"
        )
    )
);

// Verificar si se ha enviado la solicitud de búsqueda por matrícula
if (isset($_POST['matricula']) && !empty($_POST['matricula'])) {
    $matricula = strtoupper(trim($_POST['matricula']));

    // Verificar si la matrícula existe en el arreglo
    if (array_key_exists($matricula, $parqueVehicular)) {
        $vehiculo = $parqueVehicular[$matricula];
        echo "<h2>Detalles del Vehículo con Matrícula: $matricula</h2>";
        echo "<p><strong>Marca:</strong> " . $vehiculo['Auto']['marca'] . "</p>";
        echo "<p><strong>Modelo:</strong> " . $vehiculo['Auto']['modelo'] . "</p>";
        echo "<p><strong>Tipo:</strong> " . $vehiculo['Auto']['tipo'] . "</p>";
        echo "<h3>Propietario</h3>";
        echo "<p><strong>Nombre:</strong> " . $vehiculo['Propietario']['nombre'] . "</p>";
        echo "<p><strong>Ciudad:</strong> " . $vehiculo['Propietario']['ciudad'] . "</p>";
        echo "<p><strong>Dirección:</strong> " . $vehiculo['Propietario']['direccion'] . "</p>";
    } else {
        echo "<p>La matrícula ingresada no se encuentra registrada.</p>";
    }
}
// Verificar si se ha solicitado ver todos los autos registrados
elseif (isset($_POST['verTodos'])) {
    echo "<h2>Lista de Todos los Vehículos Registrados</h2>";
    foreach ($parqueVehicular as $matricula => $vehiculo) {
        echo "<h3>Matrícula: $matricula</h3>";
        echo "<p><strong>Marca:</strong> " . $vehiculo['Auto']['marca'] . "</p>";
        echo "<p><strong>Modelo:</strong> " . $vehiculo['Auto']['modelo'] . "</p>";
        echo "<p><strong>Tipo:</strong> " . $vehiculo['Auto']['tipo'] . "</p>";
        echo "<h4>Propietario</h4>";
        echo "<p><strong>Nombre:</strong> " . $vehiculo['Propietario']['nombre'] . "</p>";
        echo "<p><strong>Ciudad:</strong> " . $vehiculo['Propietario']['ciudad'] . "</p>";
        echo "<p><strong>Dirección:</strong> " . $vehiculo['Propietario']['direccion'] . "</p>";
        echo "<hr>";
    }
}

// Verificar si se ha enviado el formulario para mostrar todos los autos
if (isset($_POST['verTodos'])) {
    echo "<h2>Lista de Todos los Vehículos Registrados</h2>";
    foreach ($parqueVehicular as $matricula => $vehiculo) {
        echo "<h3>Matrícula: $matricula</h3>";
        echo "<p><strong>Marca:</strong> " . $vehiculo['Auto']['marca'] . "</p>";
        echo "<p><strong>Modelo:</strong> " . $vehiculo['Auto']['modelo'] . "</p>";
        echo "<p><strong>Tipo:</strong> " . $vehiculo['Auto']['tipo'] . "</p>";
        echo "<h4>Propietario</h4>";
        echo "<p><strong>Nombre:</strong> " . $vehiculo['Propietario']['nombre'] . "</p>";
        echo "<p><strong>Ciudad:</strong> " . $vehiculo['Propietario']['ciudad'] . "</p>";
        echo "<p><strong>Dirección:</strong> " . $vehiculo['Propietario']['direccion'] . "</p>";
        echo "<hr>";
    }
}
?>