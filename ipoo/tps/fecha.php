<?php
class Fecha {
    private $dia;
    private $mes;
    private $anio;
    
    public function __construct($dia, $mes, $anio) {
        $this->setDia($dia);
        $this->setMes($mes);
        $this->setAnio($anio);
    }
    
    public function getDia() {
        return $this->dia;
    }
    
    public function setDia($dia) {
        $this->dia = $dia;
    }
    
    public function getMes() {
        return $this->mes;
    }
    
    public function setMes($mes) {
        $this->mes = $mes;
    }
    
    public function getAnio() {
        return $this->anio;
    }
    
    public function setAnio($anio) {
        $this->anio = $anio;
    }
    
    public function obtenerFechaAbreviada() {
        return $this->getDia() . '/' . $this->getMes() . '/' . $this->getAnio();
    }
    
    public function obtenerFechaExtendida() {
        $nombres_meses = [
            1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril',
            5 => 'mayo', 6 => 'junio', 7 => 'julio', 8 => 'agosto',
            9 => 'septiembre', 10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre'
        ];
        return $this->getDia() . ' de ' . $nombres_meses[$this->getMes()] . ' de ' . $this->getAnio();
    }
    
    public function incremento($dias) {
        $nuevoDia = $this->getDia() + $dias;
        while ($nuevoDia > $this->diasEnMes($this->getMes(), $this->getAnio())) {
            $nuevoDia -= $this->diasEnMes($this->getMes(), $this->getAnio());
            $nuevoMes = $this->getMes() + 1;
            $nuevoAnio = $this->getAnio();
            if ($nuevoMes > 12) {
                $nuevoMes = 1;
                $nuevoAnio++;
            }
            $this->setMes($nuevoMes);
            $this->setAnio($nuevoAnio);
        }
        $this->setDia($nuevoDia);
    }
    
    public function esBisiesto($anio) {
        $respuesta = false;
        if (($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 400 == 0)){
            $respuesta = true;
        }       
        return $respuesta;
}
    
    public function diasEnMes($mes, $anio) {
        $f = 28;
        if ($this->esBisiesto($anio)) {
            $f = 29;
        }
        $dias_mes = [
            1 => 31, 2 => $f, 3 => 31,
            4 => 30, 5 => 31, 6 => 30, 7 => 31, 8 => 31, 9 => 30, 10 => 31, 11 => 30, 12 => 31
        ];
        return $dias_mes[$mes];
    }
    
    public function __toString() {
        return $this->obtenerFechaAbreviada();
    }
}

