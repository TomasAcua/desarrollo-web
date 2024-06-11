<?php
require_once "Persona.php";
class ResponsableV extends Persona {
    private $numeroEmpleado;
    private $numeroLicencia;

    public function __construct($nombre, $apellido, $numeroEmpleado, $numeroLicencia) {
        parent::__construct($nombre, $apellido, $numeroEmpleado, null);
        $this->numeroLicencia = $numeroLicencia;
    }

    // Getters and Setters
    public function getNumeroEmpleado() {
        return $this->numeroEmpleado;
    }

    public function setNumeroEmpleado($numeroEmpleado) {
        $this->numeroEmpleado = $numeroEmpleado;
    }

    public function getNumeroLicencia() {
        return $this->numeroLicencia;
    }

    public function setNumeroLicencia($numeroLicencia) {
        $this->numeroLicencia = $numeroLicencia;
    }

    // Insertar ResponsableV
    public function insertar($conexion) {
        $sql = "INSERT INTO responsable (rnumeroempleado, rnumerolicencia, rnombre, rapellido) VALUES ('$this->numeroEmpleado', '$this->numeroLicencia', '$this->nombre', '$this->apellido')";
        if ($conexion->query($sql) === TRUE) {
            echo "Nuevo registro creado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }

    // Actualizar ResponsableV
    public function actualizar($conexion, $numeroEmpleado) {
        $sql = "UPDATE responsable SET rnumerolicencia='$this->numeroLicencia', rnombre='$this->nombre', rapellido='$this->apellido' WHERE rnumeroempleado='$numeroEmpleado'";
        if ($conexion->query($sql) === TRUE) {
            echo "Registro actualizado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }

    // Eliminar ResponsableV
    public function eliminar($conexion, $numeroEmpleado) {
        $sql = "DELETE FROM responsable WHERE rnumeroempleado='$numeroEmpleado'";
        if ($conexion->query($sql) === TRUE) {
            echo "Registro eliminado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }

    // Buscar ResponsableV
    public static function buscar($conexion, $numeroEmpleado) {
        $sql = "SELECT * FROM responsable WHERE rnumeroempleado='$numeroEmpleado'";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            echo "No se encontraron resultados";
            return null;
        }
    }
}
?>
