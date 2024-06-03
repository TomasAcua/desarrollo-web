<?php
class Paciente {
    public $id;
    public $nombre;
    public $nro_paciente;

    public function __construct($id, $nombre, $nro_paciente) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->nro_paciente = $nro_paciente;
    }

    // Métodos de acceso
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getNroPaciente() {
        return $this->nro_paciente;
    }
}
?>
