<?php
class Torneo {
    private $partidos;
    private $importePremio;

    public function __construct($partidos = [], $importePremio) {
        $this->partidos = $partidos;
        $this->importePremio = $importePremio;
    }

    public function setPartidos($partidos) {
        $this->partidos = $partidos;
    }

    public function getPartidos() {
        return $this->partidos;
    }

    public function setImportePremio($importePremio) {
        $this->importePremio = $importePremio;
    }

    public function getImportePremio() {
        return $this->importePremio;
    }

    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido) {
        $resultado = null;
        if ($objEquipo1 == $objEquipo2) {
            $resultado = "Un equipo no puede jugar contra sí mismo.";
        }
        if ($objEquipo1->getObjCategoria() != $objEquipo2->getObjCategoria() || $objEquipo1->getCantJugadores() != $objEquipo2->getCantJugadores()) {
            $resultado = "los equipos no tienen la misma categoría o cantidad de jugadores";
        } else {
            $idPartido = count($this->getPartidos()) + 1;
            if ($tipoPartido == 'futbol') {
                $partido = new Futbol($idPartido, $fecha, $objEquipo1, 0, $objEquipo2, 0);
            } else if ($tipoPartido == 'basket') {
                $partido = new Basket($idPartido, $fecha, $objEquipo1, 0, $objEquipo2, 0, 0);
            } else {
                $resultado = " error! los tipos son 'futbol' o 'basket'";
            }
            if ($resultado == null) {
                $partidos = $this->getPartidos();
                $partidos[] = $partido;
                $this->setPartidos($partidos);
                $resultado = $partido;
            }
        }
        return $resultado;
    }

    public function darGanadores($deporte) {
        $ganadores = [];
        foreach ($this->getPartidos() as $partido) {
            $ganador = null;
            if ($deporte == 'futbol' && $partido instanceof Futbol) {
                $ganador = $partido->darEquipoGanador();
            } else if ($deporte == 'basket' && $partido instanceof Basket) {
                $ganador = $partido->darEquipoGanador();
            }
            if ($ganador !== null) {
                if (is_array($ganador)) {
                    foreach ($ganador as $equipo) {
                        $ganadores[] = $equipo;
                    }
                } else {
                    $ganadores[] = $ganador;
                }
            }
        }
        return $ganadores;
    }
    

    public function calcularPremioPartido($partido) {
        $coefPartido = $partido->coeficientePartido();
        $premio = $coefPartido * $this->getImportePremio();
        $resultado = [
            'equipoGanador' => $partido->darEquipoGanador(),
            'premioPartido' => $premio
        ];
        return $resultado;
    }

    public function __toString() {
        $cadena = "Torneo con " . count($this->getPartidos()) . " partidos y premio de " . $this->getImportePremio();
        return $cadena;
    }
}
