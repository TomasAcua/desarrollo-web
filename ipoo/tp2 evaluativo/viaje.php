<?php
class Viaje
{
    private $codigo;
    private $destino;
    private $capacidadMaxima;
    private $pasajeros = [];
    private $responsable;
    private $costoViaje;
    private $costoTotalPasajes = 0;

    public function __construct($codigo, $destino, $capacidadMaxima, ResponsableV $responsable, $costoViaje)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->capacidadMaxima = $capacidadMaxima;
        $this->responsable = $responsable;
        $this->costoViaje = $costoViaje;
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
        $añadir = false;
        if ($this->hayPasajesDisponibles() && !$this->estaPasajero($pasajero)) {
            $this->pasajeros[] = $pasajero;
            $this->actualizarCostoTotal($pasajero);
            $añadir = true;
        }
        return $añadir;
    }

    private function estaPasajero($pasajero)
    {
        $esta = false;
        foreach ($this->pasajeros as $p) {
            if ($p->getNumeroTicket() == $pasajero->getNumeroTicket()) {
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

    public function getCostoViaje()
    {
        return $this->costoViaje;
    }

    public function setCostoViaje($costoViaje)
    {
        $this->costoViaje = $costoViaje;
    }

    public function getCostoTotalPasajes()
    {
        return $this->costoTotalPasajes;
    }

    private function actualizarCostoTotal($pasajero)
    {
        $porcentajeIncremento = $pasajero->darPorcentajeIncremento() / 100;
        $costoPasaje = $this->costoViaje * (1 + $porcentajeIncremento);
        $this->costoTotalPasajes += $costoPasaje;
    }

    public function venderPasaje($objPasajero)
    {
        $vendido = false;
        if ($this->añadirPasajero($objPasajero)) {
            $vendido = $this->costoTotalPasajes;
        }
        return $vendido;
    }

    public function hayPasajesDisponibles()
    {
        return count($this->pasajeros) < $this->capacidadMaxima;
    }

    public function __toString()
    {
        $info = "Viaje Código: " . $this->getCodigo() . ", Destino:". $this->getDestino(). ", Capacidad Máxima:". $this->getCapacidadMaxima().", Responsable: ". $this->getResponsable() . "\nPasajeros:\n";
        foreach ($this->pasajeros as $pasajero) {
            $info .= $pasajero . "\n";
        }
        return $info;
    }
}
