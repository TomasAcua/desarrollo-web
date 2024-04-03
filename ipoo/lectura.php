<?php
include 'libro.php';
class Lectura {
    private $objLibro;
    private $paginaActual;

    public function __construct(Libro $libro, $paginaActual) {
        $this->objLibro = $libro;
        $this->paginaActual = $paginaActual;
    }

    public function getLibro() {
        return $this->objLibro;
    }

    public function setLibro(Libro $libro) {
        $this->objLibro = $libro;
    }

    public function getPaginaActual() {
        return $this->paginaActual;
    }

    public function setPaginaActual($paginaActual) {
        $this->paginaActual = $paginaActual;
    }

    public function siguientePagina() {
        $this->paginaActual++;
        return $this->paginaActual;
    }

    public function retrocederPagina() {
        if ($this->paginaActual > 1) {
            $this->paginaActual--;
        }
        return $this->paginaActual;
    }

    public function irPagina($pagina) {
        $this->paginaActual = $pagina;
        return $this->paginaActual;
    }

    public function __toString() {
        return "Libro: " . $this->objLibro->getTitulo() . "\n" .
               "Página actual: " . $this->paginaActual;
    }
}

