<?php
include_once'Partido.php';
class Futbol extends Partido {
    private $coefMenores = 0.13;
    private $coefJuveniles = 0.19;
    private $coefMayores = 0.27;

    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2) {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
    }
    public function setCoefMenores($coefMenores) {
        $this->coefMenores = $coefMenores;
    }

    public function getCoefMenores() {
        return $this->coefMenores;
    }

    public function setCoefJuveniles($coefJuveniles) {
        $this->coefJuveniles = $coefJuveniles;
    }

    public function getCoefJuveniles() {
        return $this->coefJuveniles;
    }

    public function setCoefMayores($coefMayores) {
        $this->coefMayores = $coefMayores;
    }

    public function getCoefMayores() {
        return $this->coefMayores;
    }
    
    public function coeficientePartido() {
        $categoria = $this->getObjEquipo1()->getObjCategoria()->getDescripcion();
        $coeficienteCategoria = 0;
        if ($categoria == 'Menores') {
            $coeficienteCategoria = $this->coefMenores;
        } else if ($categoria == 'Juveniles') {
            $coeficienteCategoria = $this->coefJuveniles;
        } else if ($categoria == 'Mayores') {
            $coeficienteCategoria = $this->coefMayores;
        }
        $coeficiente = $coeficienteCategoria * ($this->getCantGolesE1() + $this->getCantGolesE2()) * ($this->getObjEquipo1()->getCantJugadores() * 2);
        return $coeficiente;
    }
    public function toString()
    {
        $cadena = parent::__toString();
        $cadena.= "\n Coeficiente menores: ". $this->getCoefMenores().
        "\n Coeficiente Juveniles: ". $this->getCoefJuveniles().
        "\n Coeficiente Mayores: ". $this->getCoefMayores();
    }
}

