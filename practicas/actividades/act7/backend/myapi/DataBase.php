<?php
namespace MyApi;
abstract class DataBase {
    protected $conexion = NULL;
    
    public function __construct($user,$pass,$db) {
        $this->conexion = @mysqli_connect(
            'localhost',
            $user,
            $pass,
            $db
        );

        // Si la conexión falló contendrá false
        if (!$this->conexion) {
            die('Error de conexión (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        }
    }
}
?>