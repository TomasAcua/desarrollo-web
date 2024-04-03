<?php
class Teatro {
    private $nombre;
    private $direccion;
    private $funciones;

    public function __construct($nombre, $direccion, $funciones) {
        $this->setNombre($nombre);
        $this->setDireccion($direccion);
        $this->setFunciones($funciones);
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getFunciones() {
        return $this->funciones;
    }

    public function setFunciones($funciones) {
        $this->funciones = $funciones;
    }

    public function setFuncion($indice, $nombre, $precio) {
        $modificado = false;
        if ($indice >= 0 && $indice < count($this->funciones)) {
            $this->funciones[$indice]['nombre'] = $nombre;
            $this->funciones[$indice]['precio'] = $precio;
            $modificado = true;
        }
        return $modificado;
    }
    

    public function __toString() {
        $info = "Nombre del teatro: " . $this->getNombre() . "\n";
        $info .= "Dirección del teatro: " . $this->getDireccion() . "\n";
        $info .= "Funciones del día:\n";
        foreach ($this->getFunciones() as $indice => $funcion) {
            $info .= "Función " . ($indice + 1) . ": " . $funcion['nombre'] . " - Precio: $" . $funcion['precio'] . "\n";
        }
        return $info;
    }
    
}
