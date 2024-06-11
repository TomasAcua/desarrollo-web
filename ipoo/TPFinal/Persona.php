<?php
class Persona {
    protected $nombre;
    protected $apellido;
    protected $documento;
    protected $telefono;

    public function __construct($nombre, $apellido, $documento, $telefono) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->telefono = $telefono;
    }

    // Getters and Setters
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getDocumento() {
        return $this->documento;
    }

    public function setDocumento($documento) {
        $this->documento = $documento;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    // Insertar Persona
    public function insertar($conexion) {
        $sql = "INSERT INTO pasajero (pdocumento, pnombre, papellido, ptelefono) VALUES ('$this->documento', '$this->nombre', '$this->apellido', '$this->telefono')";
        if ($conexion->query($sql) === TRUE) {
            echo "Nuevo registro creado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }

    // Actualizar Persona
    public function actualizar($conexion, $documento) {
        $sql = "UPDATE pasajero SET pnombre='$this->nombre', papellido='$this->apellido', ptelefono='$this->telefono' WHERE pdocumento='$documento'";
        if ($conexion->query($sql) === TRUE) {
            echo "Registro actualizado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }

    // Eliminar Persona
    public function eliminar($conexion, $documento) {
        $sql = "DELETE FROM pasajero WHERE pdocumento='$documento'";
        if ($conexion->query($sql) === TRUE) {
            echo "Registro eliminado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }

    // Buscar Persona
    public static function buscar($conexion, $documento) {
        $sql = "SELECT * FROM pasajero WHERE pdocumento='$documento'";
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
