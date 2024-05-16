<?php 
include_once ("pasajeros.php");
class PasajeroNecesidadesEspeciales extends Pasajero {
    private $requiereSillaRuedas;
    private $requiereAsistencia;
    private $requiereComidaEspecial;

    public function __construct($nombre, $numeroAsiento, $numeroTicket, $requiereSillaRuedas, $requiereAsistencia, $requiereComidaEspecial) {
        parent::__construct($nombre, $numeroAsiento, $numeroTicket);
        $this->requiereSillaRuedas = $requiereSillaRuedas;
        $this->requiereAsistencia = $requiereAsistencia;
        $this->requiereComidaEspecial = $requiereComidaEspecial;
    }

    public function darPorcentajeIncremento() {
        if ($this->requiereSillaRuedas && $this->requiereAsistencia && $this->requiereComidaEspecial) {
            $porcentaje = 30;
        } elseif ($this->requiereSillaRuedas || $this->requiereAsistencia || $this->requiereComidaEspecial) {
            $porcentaje = 15;
        }
        return $porcentaje;
    }
}