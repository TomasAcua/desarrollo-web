<?php 

class CuentaBancaria {
    private $numeroCuenta;
    private $objPersona;
    private $saldoActual;
    private $interesAnual;

    public function __construct($numeroCuenta, Persona $persona, $saldoActual, $interesAnual) {
        $this->numeroCuenta = $numeroCuenta;
        $this->objPersona = $persona;
        $this->saldoActual = $saldoActual;
        $this->interesAnual = $interesAnual;
    }

    public function getNumeroCuenta() {
        return $this->numeroCuenta;
    }

    public function setNumeroCuenta($numeroCuenta) {
        $this->numeroCuenta = $numeroCuenta;
    }

    public function getPersona() {
        return $this->objPersona;
    }

    public function setPersona(Persona $persona) {
        $this->objPersona = $persona;
    }

    public function getSaldoActual() {
        return $this->saldoActual;
    }

    public function setSaldoActual($saldoActual) {
        $this->saldoActual = $saldoActual;
    }

    public function getInteresAnual() {
        return $this->interesAnual;
    }

    public function setInteresAnual($interesAnual) {
        $this->interesAnual = $interesAnual;
    }

    public function __toString() {
        return "Número de cuenta: " . $this->numeroCuenta . "\n" .
               "Titular: " . $this->objPersona->getNombre() . " " . $this->objPersona->getApellido() . "\n" .
               "Saldo actual: $" . $this->saldoActual . "\n" .
               "Interés anual: " . $this->interesAnual . "%";
    }
}