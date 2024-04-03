<?php
class Libro {
    private $titulo;
    private $autor;
    private $cantidadPaginas;
    private $sinopsis;

    public function __construct($titulo, Persona $autor, $cantidadPaginas, $sinopsis) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->cantidadPaginas = $cantidadPaginas;
        $this->sinopsis = $sinopsis;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function setAutor(Persona $autor) {
        $this->autor = $autor;
    }

    public function getCantidadPaginas() {
        return $this->cantidadPaginas;
    }

    public function setCantidadPaginas($cantidadPaginas) {
        $this->cantidadPaginas = $cantidadPaginas;
    }

    public function getSinopsis() {
        return $this->sinopsis;
    }

    public function setSinopsis($sinopsis) {
        $this->sinopsis = $sinopsis;
    }

    public function __toString() {
        return "Título: " . $this->titulo . "\n" .
               "Autor: " . $this->autor->getNombre() . " " . $this->autor->getApellido() . "\n" .
               "Cantidad de páginas: " . $this->cantidadPaginas . "\n" .
               "Sinopsis: " . $this->sinopsis;
    }
}


