<?php
class db_connection{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public static function obtenerConexion()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bdviajes";

        $conexion = new mysqli($servername, $username, $password, $dbname);

        if ($conexion->connect_error) {
            die("Connection failed: " . $conexion->connect_error);
        }

        return $conexion;
    }
}