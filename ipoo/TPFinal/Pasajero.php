<?php

require_once "Persona.php";

class Pasajero extends Persona {
    private $numeroPasajero;

    public function __construct($nombre, $apellido, $documento, $telefono, $numeroPasajero) {
        parent::__construct($nombre, $apellido, $documento, $telefono);
        $this->numeroPasajero = $numeroPasajero;
    }

    // Getter y setter para el número de pasajero
    public function getNumeroPasajero() {
        return $this->numeroPasajero;
    }

    public function setNumeroPasajero($numeroPasajero) {
        $this->numeroPasajero = $numeroPasajero;
    }

    // Método para insertar un pasajero en la base de datos
    //modificar id viaje
    
    public function insertar($conexion) {
        $sql = "INSERT INTO pasajero (idpasajero, pdocumento, pnombre, papellido, ptelefono, pnumeropasajero) VALUES ('$this->numeroPasajero','$this->documento', '$this->nombre', '$this->apellido', '$this->telefono', '$this->numeroPasajero')";
        if ($conexion->query($sql) === TRUE) {
            echo "Nuevo registro de pasajero creado exitosamente";
        } else {
            echo "Error al crear un nuevo registro de pasajero: " . $conexion->error;
        }
    }

    // Método para actualizar un pasajero en la base de datos
    public function actualizar($conexion, $documento) {
        $sql = "UPDATE pasajero SET pnombre='$this->nombre', papellido='$this->apellido', ptelefono='$this->telefono', pnumeropasajero='$this->numeroPasajero' WHERE pdocumento='$documento'";
        if ($conexion->query($sql) === TRUE) {
            echo "Registro de pasajero actualizado exitosamente";
        } else {
            echo "Error al actualizar el registro de pasajero: " . $conexion->error;
        }
    }

    // Método para eliminar un pasajero de la base de datos
    public function eliminar($conexion, $documento) {
        $sql = "DELETE FROM pasajero WHERE pdocumento='$documento'";
        if ($conexion->query($sql) === TRUE) {
            echo "Registro de pasajero eliminado exitosamente";
        } else {
            echo "Error al eliminar el registro de pasajero: " . $conexion->error;
        }
    }

    // Método para buscar un pasajero en la base de datos
    public static function buscar($conexion, $documento) {
        $sql = "SELECT * FROM pasajero WHERE pdocumento='$documento'";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            echo "No se encontraron resultados para la búsqueda de pasajero";
            return null;
        }
    }
}
?>
