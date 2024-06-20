<?php

require_once "Persona.php";

class ResponsableV extends Persona {
    private $idResponsable;
    private $numeroLicencia;

    public function __construct($id = null, $nombre = null, $apellido = null, $documento = null, $telefono = null, $idResponsable = null, $numeroLicencia = null) {
        parent::__construct($id, $nombre, $apellido, $documento, $telefono);
        $this->idResponsable = $idResponsable;
        $this->numeroLicencia = $numeroLicencia;
    }

    // Getters y setters
    public function getIdResponsable() {
        return $this->idResponsable;
    }

    public function setIdResponsable($idResponsable) {
        $this->idResponsable = $idResponsable;
    }

    public function getNumeroLicencia() {
        return $this->numeroLicencia;
    }

    public function setNumeroLicencia($numeroLicencia) {
        $this->numeroLicencia = $numeroLicencia;
    }

    // Métodos CRUD para la clase Responsable
    public function insertar($conexion) {
        parent::insertar($conexion);  // Insertar la persona primero
        $sql = "INSERT INTO responsable (idpersona, numeroLicencia) VALUES ('$this->id', '$this->numeroLicencia')";
        if ($conexion->query($sql) === TRUE) {
            $this->idResponsable = $conexion->insert_id;
            echo "Nuevo registro de responsable creado exitosamente";
        } else {
            echo "Error al crear un nuevo registro de responsable: " . $conexion->error;
        }
    }

    public function actualizar($conexion) {
        parent::actualizar($conexion);  // Actualizar la persona primero
        $sql = "UPDATE responsable SET numeroLicencia='$this->numeroLicencia' WHERE idresponsable='$this->idResponsable'";
        if ($conexion->query($sql) === TRUE) {
            echo "Registro de responsable actualizado exitosamente";
        } else {
            echo "Error al actualizar el registro de responsable: " . $conexion->error;
        }
    }

    public function eliminar($conexion) {
        $sql = "DELETE FROM responsable WHERE idresponsable='$this->idResponsable'";
        if ($conexion->query($sql) === TRUE) {
            parent::eliminar($conexion);  // Eliminar la persona después
            echo "Registro de responsable eliminado exitosamente";
        } else {
            echo "Error al eliminar el registro de responsable: " . $conexion->error;
        }
    }

    public static function buscar($conexion, $idResponsable) {
        $sql = "SELECT * FROM responsable WHERE idresponsable='$idResponsable'";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $persona = Persona::buscar($conexion, $fila['idpersona']);
            $responsable = new ResponsableV($persona->getId(), $persona->getNombre(), $persona->getApellido(), $persona->getDocumento(), $persona->getTelefono(), $fila['idresponsable'], $fila['numeroLicencia']);
            return $responsable;
        } else {
            echo "No se encontraron resultados para la búsqueda de responsable";
            return null;
        }
    }
}
