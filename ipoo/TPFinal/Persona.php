<?php
class Persona {
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $documento;
    protected $telefono;

    public function __construct($id = null, $nombre = null, $apellido = null, $documento = null, $telefono = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->telefono = $telefono;
    }

    // Getters y setters
    public function getId() {
        return $this->id;
    }

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

    // Métodos CRUD para la clase Persona
    public function insertar($conexion) {
        $sql = "INSERT INTO persona (nombre, apellido, documento, telefono) VALUES ('$this->nombre', '$this->apellido', '$this->documento', '$this->telefono')";
        if ($conexion->query($sql) === TRUE) {
            $this->id = $conexion->insert_id;
            echo "Nuevo registro de persona creado exitosamente";
        } else {
            echo "Error al crear un nuevo registro de persona: " . $conexion->error;
        }
    }

    public function actualizar($conexion) {
        $sql = "UPDATE persona SET nombre='$this->nombre', apellido='$this->apellido', documento='$this->documento', telefono='$this->telefono' WHERE idpersona='$this->id'";
        if ($conexion->query($sql) === TRUE) {
            echo "Registro de persona actualizado exitosamente";
        } else {
            echo "Error al actualizar el registro de persona: " . $conexion->error;
        }
    }

    public function eliminar($conexion) {
        $sql = "DELETE FROM persona WHERE idpersona='$this->id'";
        if ($conexion->query($sql) === TRUE) {
            echo "Registro de persona eliminado exitosamente";
        } else {
            echo "Error al eliminar el registro de persona: " . $conexion->error;
        }
    }

    public static function buscar($conexion, $id) {
        $sql = "SELECT * FROM persona WHERE idpersona='$id'";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $persona = new Persona($fila['idpersona'], $fila['nombre'], $fila['apellido'], $fila['documento'], $fila['telefono']);
            return $persona;
        } else {
            echo "No se encontraron resultados para la búsqueda de persona";
            return null;
        }
    }
}
