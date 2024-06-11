<?php
class Viaje {
    private $conexion;
    private $destino;
    private $cant_max_pasajeros;
    private $id_empresa;
    private $num_empleado;
    private $importe;

    public function __construct($conexion, $destino = null, $cant_max_pasajeros = null, $id_empresa = null, $num_empleado = null, $importe = null) {
        $this->conexion = $conexion;
        $this->destino = $destino;
        $this->cant_max_pasajeros = $cant_max_pasajeros;
        $this->id_empresa = $id_empresa;
        $this->num_empleado = $num_empleado;
        $this->importe = $importe;
    }

    // Getters and Setters
    public function getDestino() {
        return $this->destino;
    }

    public function setDestino($destino) {
        $this->destino = $destino;
    }

    public function getCantMaxPasajeros() {
        return $this->cant_max_pasajeros;
    }

    public function setCantMaxPasajeros($cant_max_pasajeros) {
        $this->cant_max_pasajeros = $cant_max_pasajeros;
    }

    public function getIdEmpresa() {
        return $this->id_empresa;
    }

    public function setIdEmpresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    public function getNumEmpleado() {
        return $this->num_empleado;
    }

    public function setNumEmpleado($num_empleado) {
        $this->num_empleado = $num_empleado;
    }

    public function getImporte() {
        return $this->importe;
    }

    public function setImporte($importe) {
        $this->importe = $importe;
    }

    // Insertar Viaje
    public function insertar() {
        $sql = "INSERT INTO viaje (vdestino, vcantmaxpasajeros, idempresa, rnumeroempleado, vimporte) VALUES ('$this->destino', '$this->cant_max_pasajeros', '$this->id_empresa', '$this->num_empleado', '$this->importe')";
        if ($this->conexion->query($sql) === TRUE) {
            echo "Nuevo viaje creado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conexion->error;
        }
    }

    // Actualizar Viaje
    public function actualizar($id) {
        $sql = "UPDATE viaje SET vdestino='$this->destino', vcantmaxpasajeros='$this->cant_max_pasajeros', idempresa='$this->id_empresa', rnumeroempleado='$this->num_empleado', vimporte='$this->importe' WHERE idviaje='$id'";
        if ($this->conexion->query($sql) === TRUE) {
            echo "Viaje actualizado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conexion->error;
        }
    }

    // Eliminar Viaje
    public function eliminar($id) {
        $sql = "DELETE FROM viaje WHERE idviaje='$id'";
        if ($this->conexion->query($sql) === TRUE) {
            echo "Viaje eliminado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conexion->error;
        }
    }

    // Buscar Viaje
    public static function buscar($conexion, $id) {
        $sql = "SELECT * FROM viaje WHERE idviaje='$id'";
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
