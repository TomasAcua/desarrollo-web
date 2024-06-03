<?php
require_once "Medico.php";
require_once "Paciente.php";
require_once "Estudio.php";

class TestClinica {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Operación para ingresar un paciente a la clínica
    public function ingresarPaciente($paciente) {
        $nombre = $paciente->getNombre();
        $nro_paciente = $paciente->getNroPaciente();
        
        $sql = "INSERT INTO pacientes (nombre, nro_paciente) VALUES ('$nombre', '$nro_paciente')";
        if ($this->conexion->query($sql) === TRUE) {
            echo "Paciente ingresado correctamente.";
        } else {
            echo "Error al ingresar paciente: " . $this->conexion->error;
        }
    }

    // Operación para actualizar datos de un paciente
    public function actualizarPaciente($paciente) {
        $id = $paciente->getId();
        $nombre = $paciente->getNombre();
        $nro_paciente = $paciente->getNroPaciente();
        
        $sql = "UPDATE pacientes SET nombre='$nombre', nro_paciente='$nro_paciente' WHERE id=$id";
        if ($this->conexion->query($sql) === TRUE) {
            echo "Datos del paciente actualizados correctamente.";
        } else {
            echo "Error al actualizar datos del paciente: " . $this->conexion->error;
        }
    }

    // Operación para eliminar un paciente
    public function eliminarPaciente($id_paciente) {
        $sql = "DELETE FROM pacientes WHERE id=$id_paciente";
        if ($this->conexion->query($sql) === TRUE) {
            echo "Paciente eliminado correctamente.";
        } else {
            echo "Error al eliminar paciente: " . $this->conexion->error;
        }
    }

    // Operación para ingresar un médico a la clínica
    public function ingresarMedico($medico) {
        $nombre = $medico->getNombre();
        $especialidad = $medico->getEspecialidad();
        
        $sql = "INSERT INTO medicos (nombre, especialidad) VALUES ('$nombre', '$especialidad')";
        if ($this->conexion->query($sql) === TRUE) {
            echo "Médico ingresado correctamente.";
        } else {
            echo "Error al ingresar médico: " . $this->conexion->error;
        }
    }

    // Operación para actualizar datos de un médico
    public function actualizarMedico($medico) {
        $id = $medico->getId();
        $nombre = $medico->getNombre();
        $especialidad = $medico->getEspecialidad();
        
        $sql = "UPDATE medicos SET nombre='$nombre', especialidad='$especialidad' WHERE id=$id";
        if ($this->conexion->query($sql) === TRUE) {
            echo "Datos del médico actualizados correctamente.";
        } else {
            echo "Error al actualizar datos del médico: " . $this->conexion->error;
        }
    }

    // Operación para eliminar un médico
    public function eliminarMedico($id_medico) {
        $sql = "DELETE FROM medicos WHERE id=$id_medico";
        if ($this->conexion->query($sql) === TRUE) {
            echo "Médico eliminado correctamente.";
        } else {
            echo "Error al eliminar médico: " . $this->conexion->error;
        }
    }

    // Operación para incorporar un estudio a la historia clínica de un paciente
    public function incorporarEstudio($estudio) {
        $fecha = $estudio->getFecha();
        $observacion = $estudio->getObservacion();
        $id_medico = $estudio->getIdMedico();
        $id_paciente = $estudio->getIdPaciente();
        
        $sql = "INSERT INTO estudios (fecha, observacion, id_medico, id_paciente) VALUES ('$fecha', '$observacion', '$id_medico', '$id_paciente')";
        if ($this->conexion->query($sql) === TRUE) {
            echo "Estudio incorporado correctamente.";
        } else {
            echo "Error al incorporar estudio: " . $this->conexion->error;
        }
    }

    // Operación para visualizar todos los estudios de un paciente junto a la información del médico responsable
    public function visualizarEstudiosPaciente($id_paciente) {
        $sql = "SELECT e.*, m.nombre AS nombre_medico FROM estudios e INNER JOIN medicos m ON e.id_medico = m.id WHERE e.id_paciente = $id_paciente";
        $result = $this->conexion->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "Fecha del estudio: " . $row["fecha"]. " - Observación: " . $row["observacion"]. " - Médico responsable: " . $row["nombre_medico"]. "<br>";
            }
        } else {
            echo "El paciente no tiene estudios registrados.";
        }
    }
}
?>
