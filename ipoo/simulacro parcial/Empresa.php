<?php
include_once 'Venta.php';
include_once 'Moto.php';
class Empresa
{
    private $denominacion;
    private $direccion;
    private $clientes; // Array de objetos Cliente
    private $motos; // Array de objetos Moto
    private $ventas; // Array de objetos Venta

    public function __construct($denominacion, $direccion, $clientes = [], $motos = [], $ventas = [])
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->clientes = $clientes;
        $this->motos = $motos;
        $this->ventas = $ventas;
    }

    // Métodos de acceso
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getClientes()
    {
        return $this->clientes;
    }

    public function addCliente($cliente)
    {
        $this->clientes[] = $cliente;
    }

    public function getMotos()
    {
        return $this->motos;
    }

    public function addMoto($moto)
    {
        $this->motos[] = $moto;
    }

    public function getVentas()
    {
        return $this->ventas;
    }

    public function addVenta($venta)
    {
        $this->ventas[] = $venta;
    }
    public function retornarMoto($codigoMoto)
    {
        $i = 0;
        $encontrado = false;
        $moto = null;
        while ($i < count($this->motos) && !$encontrado) {
            if ($this->motos[$i]->getCodigo() == $codigoMoto) {
                $moto = $this->motos[$i];
                $found = true;
            }
            $i++;
        }
        return $moto;
    }
//modificar
    public function registrarVenta($colCodigosMoto, $objCliente)
    {
        $cod = count($this->ventas);
        $ventaCompleta = 0;
        if (!$objCliente->estaDadoDeBaja()) {
            $venta = new Venta($cod+1, date("y,m,d"), $objCliente);
            for ($i = 0; $i < count($colCodigosMoto); $i++) {
                $codigoProducto = $colCodigosMoto[$i];
                $nuevoProducto = $this->retornarMoto($codigoProducto);
                if ($nuevoProducto != null) {
                    $venta->incorporarMoto($nuevoProducto);
                }
            }
        
            if ($venta->getPrecioFinal() > 0) {
                $this->ventas[] = $venta;
                $ventaCompleta = $venta->getPrecioFinal(); 
            }
        }
        return $ventaCompleta;
    }

    public function retornarVentasXCliente($tipo, $numDoc)
    {
        $ventasCliente = [];
        $i = 0;
        $encontrado = false;
        while ($i < count($this->ventas)) {
            if ($this->ventas[$i]->getCliente()->getTipoDocumento() === $tipo && $this->ventas[$i]->getCliente()->getNumeroDocumento() === $numDoc && !$encontrado) {
                $ventasCliente[] = $this->ventas[$i];
                $encontrado = true;
            }
            $i++;
        }
        return $ventasCliente;
    }
    public function informarSumaVentasNacionales()
    {
        $totalVentasNacionales = 0;
        foreach ($this->ventas as $venta) {
            $totalVentasNacionales += $venta->retornarTotalVentaNacional();
        }
        return $totalVentasNacionales;
    }

    public function informarVentasImportadas()
    {
        $ventasImportadas = [];
        foreach ($this->ventas as $venta) {
            if (count($venta->retornarMotosImportadas()) > 0) {
                $ventasImportadas[] = $venta;
            }
        }
        return $ventasImportadas;
    }

    public function __toString()
    {
        return "Empresa: {$this->denominacion}, Dirección: {$this->direccion}, " .
            "Clientes: " . count($this->clientes) . ", Motos: " . count($this->motos) .
            ", Ventas: " . count($this->ventas);
    }
}
