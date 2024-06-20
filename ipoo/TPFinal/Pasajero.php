<?php

require_once "Persona.php";

class Pasajero extends Persona {
    private $idPasajero;
    private $idViaje;

    public function __construct($id = null, $nombre = null, $apellido = null, $documento = null, $telefono = null, $idPasajero = null, $idViaje = null) {
        parent::__construct($id, $nombre, $apellido, $documento, $telefono);
        $this->idPasajero = $idPasajero;
        $this->idViaje = $idViaje;
    }

    // Getters y setters
    public function getIdPasajero() {
        return $this->idPasajero;
    }

    public function setIdPasajero($idPasajero) {
        $this->idPasajero = $idPasajero;
    }

    public function getIdViaje() {
        return $this->idViaje;
    }

    public function setIdViaje($idViaje) {
        $this->idViaje = $idViaje;
    }

    // Métodos CRUD para la clase Pasajero
    public function insertar($conexion) {
        parent::insertar($conexion);  // Insertar la persona primero
        $sql = "INSERT INTO pasajero (idpersona, idviaje) VALUES ('$this->id', '$this->idViaje')";
        if ($conexion->query($sql) === TRUE) {
            $this->idPasajero = $conexion->insert_id;
            echo "Nuevo registro de pasajero creado exitosamente";
        } else {
            echo "Error al crear un nuevo registro de pasajero: " . $conexion->error;
        }
    }

    public function actualizar($conexion) {
        parent::actualizar($conexion);  // Actualizar la persona primero
        $sql = "UPDATE pasajero SET idviaje='$this->idViaje' WHERE idpasajero='$this->idPasajero'";
        if ($conexion->query($sql) === TRUE) {
            echo "Registro de pasajero actualizado exitosamente";
        } else {
            echo "Error al actualizar el registro de pasajero: " . $conexion->error;
        }
    }

    public function eliminar($conexion) {
        $sql = "DELETE FROM pasajero WHERE idpasajero='$this->idPasajero'";
        if ($conexion->query($sql) === TRUE) {
            parent::eliminar($conexion);  // Eliminar la persona después
            echo "Registro de pasajero eliminado exitosamente";
        } else {
            echo "Error al eliminar el registro de pasajero: " . $conexion->error;
        }
    }

    public static function buscar($conexion, $idPasajero) {
        $sql = "SELECT * FROM pasajero WHERE idpasajero='$idPasajero'";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $persona = Persona::buscar($conexion, $fila['idpersona']);
            $pasajero = new Pasajero($persona->getId(), $persona->getNombre(), $persona->getApellido(), $persona->getDocumento(), $persona->getTelefono(), $fila['idpasajero'], $fila['idviaje']);
            return $pasajero;
        } else {
            echo "No se encontraron resultados para la búsqueda de pasajero";
            return null;
        }
    }
}
