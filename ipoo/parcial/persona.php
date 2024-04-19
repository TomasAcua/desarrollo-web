<?php
class Persona {
    private $tipoDocumento;
    private $numeroDocumento;
    private $nombre;
    private $apellido;
    private $telefono;

    // Constructor
    public function __construct($tipoDocumento, $numeroDocumento, $nombre, $apellido, $telefono) {
        $this->setTipoDocumento($tipoDocumento);
        $this->setNumeroDocumento($numeroDocumento);
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setTelefono($telefono);
    }

    // Getters y Setters
    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }

    public function setTipoDocumento($tipoDocumento) {
        $this->tipoDocumento = $tipoDocumento;
    }

    public function getNumeroDocumento() {
        return $this->numeroDocumento;
    }

    public function setNumeroDocumento($numeroDocumento) {
        $this->numeroDocumento = $numeroDocumento;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    // Método _toString
    public function __toString() {
        return "Tipo de documento: " . $this->getTipoDocumento() . ", " .
               "Número de documento: " . $this->getNumeroDocumento() . ", " .
               "Nombre: " . $this->getNombre() . ", " .
               "Apellido: " . $this->getApellido() . ", " .
               "Teléfono: " . $this->getTelefono();
    }
}
