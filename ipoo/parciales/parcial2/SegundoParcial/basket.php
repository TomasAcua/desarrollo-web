<?php
include_once'Partido.php';
class Basket extends Partido {
    private $cantInfracciones;
    private $coefPenalizacion = 0.75;

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2, $cantInfracciones) {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->cantInfracciones = $cantInfracciones;
    }

    public function setCantInfracciones($cantInfracciones) {
        $this->cantInfracciones = $cantInfracciones;
    }

    public function getCantInfracciones() {
        return $this->cantInfracciones;
    }

    public function coeficientePartido() {
        $coeficientebase = parent::coeficientePartido();
        $coeficiente = $coeficientebase - ($this->coefPenalizacion * $this->getCantInfracciones());
        return $coeficiente;
    }
    public function toString()
    {
        $cadena = parent::__toString();
        $cadena.= "\n Cantidad de Infracciones: ". $this->getCantInfracciones().
        "\n Coeficiente: ". $this->getCoefBase();
    }
}

