<?php
class Empresa {
    private $conexion;
    private $nombre;
    private $direccion;

    public function __construct($conexion, $nombre = null, $direccion = null) {
        $this->conexion = $conexion;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
    }

    // Getters and Setters
    public function getEnombre() {
        return $this->nombre;
    }

    public function setEnombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getEdireccion() {
        return $this->direccion;
    }

    public function setEdireccion($direccion) {
        $this->direccion = $direccion;
    }

    // Insertar Empresa
    public function insertar() {
        $sql = "INSERT INTO empresa (enombre, edireccion) VALUES ('$this->nombre', '$this->direccion')";
        if ($this->conexion->query($sql) === TRUE) {
            echo "Nueva empresa creada exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conexion->error;
        }
    }

    // Actualizar Empresa
    public function actualizar($id) {
        $sql = "UPDATE empresa SET enombre='$this->nombre', edireccion='$this->direccion' WHERE idempresa='$id'";
        if ($this->conexion->query($sql) === TRUE) {
            echo "Empresa actualizada exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conexion->error;
        }
    }

    // Eliminar Empresa
    public function eliminar($id) {
        $sql = "DELETE FROM empresa WHERE idempresa='$id'";
        if ($this->conexion->query($sql) === TRUE) {
            echo "Empresa eliminada exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conexion->error;
        }
    }
    public static function buscar($conexion, $id) {
        $sql = "SELECT * FROM empresa WHERE idempresa='$id'";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $empresa = new Empresa($conexion);
            $empresa->setEnombre($fila['enombre']);
            $empresa->setEdireccion($fila['edireccion']);
            return $empresa;
        } else {
            echo "No se encontraron resultados";
            return null;
        }
    }
    
}
?>
