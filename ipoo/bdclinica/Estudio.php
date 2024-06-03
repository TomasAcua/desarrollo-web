<?php
class Estudio {
    public $id;
    public $fecha;
    public $observacion;
    public $id_medico;
    public $id_paciente;

    public function __construct($id, $fecha, $observacion, $id_medico, $id_paciente) {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->observacion = $observacion;
        $this->id_medico = $id_medico;
        $this->id_paciente = $id_paciente;
    }

    // Métodos de acceso
    public function getId() {
        return $this->id;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getObservacion() {
        return $this->observacion;
    }

    public function getIdMedico() {
        return $this->id_medico;
    }

    public function getIdPaciente() {
        return $this->id_paciente;
    }
}
?>
