<?php

class Calculadora {
    private $numero1;
    private $numero2;
    
    public function __construct($numero1, $numero2) {
        $this->numero1 = $numero1;
        $this->numero2 = $numero2;
    }
    
    public function getNumero1() {
        return $this->numero1;
    }
    
    public function setNumero1($numero1) {
        $this->numero1 = $numero1;
    }
    
    public function getNumero2() {
        return $this->numero2;
    }
    
    public function setNumero2($numero2) {
        $this->numero2 = $numero2;
    }
    
    public function sumar() {
        return $this->numero1 + $this->numero2;
    }
    
    public function restar() {
        return $this->numero1 - $this->numero2;
    }
    
    public function multiplicar() {
        return $this->numero1 * $this->numero2;
    }
    
    public function __toString() {
        return "Número 1: " . $this->numero1 . ", Número 2: " . $this->numero2;
    }
}

?>
