<?php

class Reloj {
    private $horas;
    private $minutos;
    private $segundos;
    
    public function __construct($horas = 0, $minutos = 0, $segundos = 0) {
        $this->horas = $horas;
        $this->minutos = $minutos;
        $this->segundos = $segundos;
        
    }
    public function getHoras() {
        return $this->horas;
    }
    
    public function setHoras($horas) {
        $this->horas = $horas;
    }
    
    public function getMinutos() {
        return $this->minutos;
    }
    
    public function setMinutos($minutos) {
        $this->minutos = $minutos;
    }
    
    public function getSegundos() {
        return $this->segundos;
    }
    
    public function setSegundos($segundos) {
        $this->segundos = $segundos;
    }
    
    public function puestaACero() {
        $this->horas = 0;
        $this->minutos = 0;
        $this->segundos = 0;
    }
    
    public function incremento() {
        $this->segundos++;
        if ($this->segundos >= 60) {
            $this->segundos = 0;
            $this->minutos++;
            if ($this->minutos >= 60) {
                $this->minutos = 0;
                $this->horas++;
                if ($this->horas >= 24) {
                    $this->horas = 0;
                }
            }
        }
    }
    
    public function __toString() {
        return " hora: ". $this->horas. " minutos: ". $this->minutos . " segundos: ". $this->segundos;
    }
}
?>
