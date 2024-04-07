<?php

class Viaje
{
    private $codigo;
    private $destino;
    private $capacidadMaxima;
    private $pasajeros; //preguntar si llega un array de antes
    private $responsable;

    public function __construct($codigo, $destino, $capacidadMaxima, ResponsableV $responsable)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->capacidadMaxima = $capacidadMaxima;
        $this->pasajeros = array();
        $this->responsable = $responsable;
    }


    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getDestino()
    {
        return $this->destino;
    }

    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    public function getCapacidadMaxima()
    {
        return $this->capacidadMaxima;
    }

    public function setCapacidadMaxima($capacidadMaxima)
    {
        $this->capacidadMaxima = $capacidadMaxima;
    }

    public function getPasajeros()
    {
        return $this->pasajeros;
    }

    public function añadirPasajero($pasajero)
    {
        $agregado = false;
        if (count($this->pasajeros) < $this->capacidadMaxima) {
            if (!$this->estaPasajero($pasajero)) {
                $this->pasajeros[] = $pasajero;
                $agregado = true;
            }
        }
        return $agregado;
    }

    public function estaPasajero($pasajero)
    {
        $esta = false;
        foreach ($this->pasajeros as $p) {
            if ($p->getNumeroDocumento() == $pasajero->getNumeroDocumento()) {
                $esta = true;
            }
        }
        return $esta;
    }

    public function getResponsable()
    {
        return $this->responsable;
    }

    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
    }

    public function __toString()
    {
        $info = "Viaje Código: {$this->codigo}, Destino: {$this->destino}, Capacidad Máxima: {$this->capacidadMaxima}, Responsable: {$this->responsable}\nPasajeros:\n";
        foreach ($this->pasajeros as $pasajero) {
            $info .= $pasajero . "\n";
        }
        return $info;
    }
}
