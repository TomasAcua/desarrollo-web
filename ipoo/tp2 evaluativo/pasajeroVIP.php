<?php 
include_once ("pasajeros.php");
class PasajeroVIP extends Pasajero {
    private $numeroViajeroFrecuente;
    private $millasPasajero;

    public function __construct($nombre, $numeroAsiento, $numeroTicket, $numeroViajeroFrecuente, $millasPasajero) {
        parent::__construct($nombre, $numeroAsiento, $numeroTicket);
        $this->numeroViajeroFrecuente = $numeroViajeroFrecuente;
        $this->millasPasajero = $millasPasajero;
    }

    public function darPorcentajeIncremento() {
        $incremento = 35; // Incremento base del 35%
        if ($this->millasPasajero > 300) {
            $incremento = 30; // Incremento adicional del 30% para más de 300 millas
        }
        return $incremento;
    }
}