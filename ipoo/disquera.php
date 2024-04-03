<?php
include 'personaCB.php';
class Disquera {
    private $horaDesde;
    private $horaHasta;
    private $estado;
    private $direccion;
    private $dueno;

    public function __construct($horaDesde, $horaHasta, $estado, $direccion, Persona $dueno) {
        $this->horaDesde = $horaDesde;
        $this->horaHasta = $horaHasta;
        $this->estado = $estado;
        $this->direccion = $direccion;
        $this->dueno = $dueno;
    }

    public function getHoraDesde() {
        return $this->horaDesde;
    }

    public function setHoraDesde($horaDesde) {
        $this->horaDesde = $horaDesde;
    }

    public function getHoraHasta() {
        return $this->horaHasta;
    }

    public function setHoraHasta($horaHasta) {
        $this->horaHasta = $horaHasta;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getDueno() {
        return $this->dueno;
    }

    public function setDueno(Persona $dueno) {
        $this->dueno = $dueno;
    }

    public function dentroHorarioAtencion($hora, $minutos) {
        if ($this->estado === 'abierta') {
            return ($hora > $this->horaDesde || ($hora == $this->horaDesde && $minutos >= 0)) &&
                   ($hora < $this->horaHasta || ($hora == $this->horaHasta && $minutos <= 0));
        }
        return false;
    }

    public function abrirDisquera($hora, $minutos) {
        if ($this->dentroHorarioAtencion($hora, $minutos)) {
            $this->estado = 'abierta';
            return true;
        }
        return false;
    }

    public function cerrarDisquera($hora, $minutos) {
        if (!$this->dentroHorarioAtencion($hora, $minutos)) {
            $this->estado = 'cerrada';
            return true;
        }
        return false;
    }

    public function __toString() {
        return "Dirección: " . $this->direccion . "\n" .
               "Horario de atención: " . $this->horaDesde . " - " . $this->horaHasta . "\n" .
               "Estado: " . $this->estado . "\n" .
               "Dueño: " . $this->dueno;
    }
}
