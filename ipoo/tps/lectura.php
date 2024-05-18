<?php
include 'libro.php';
class Lectura {
    private $libro;
    private $paginaActual;

    public function __construct(Libro $libro, $paginaActual) {
        $this->libro = $libro;
        $this->paginaActual = $paginaActual;
    }

    public function getLibro() {
        return $this->libro;
    }

    public function setLibro(Libro $libro) {
        $this->libro = $libro;
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
        return "Libro: " . $this->libro->getTitulo() . "\n" .
               "Autor: " . $this->libro->getAutor()->getNombre() . " " . $this->libro->getAutor()->getApellido() . "\n" .
               "Página actual: " . $this->paginaActual;
    }
}

