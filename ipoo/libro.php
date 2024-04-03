<?php
class Libro {
    private $ISBN;
    private $titulo;
    private $anioEdicion;
    private $editorial;
    private $autor;

    public function __construct($ISBN, $titulo, $anioEdicion, $editorial, $autor) {
        $this->ISBN = $ISBN;
        $this->titulo = $titulo;
        $this->anioEdicion = $anioEdicion;
        $this->editorial = $editorial;
        $this->autor = $autor;
    }

    public function getISBN() {
        return $this->ISBN;
    }

    public function setISBN($ISBN) {
        $this->ISBN = $ISBN;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getAnioEdicion() {
        return $this->anioEdicion;
    }

    public function setAnioEdicion($anioEdicion) {
        $this->anioEdicion = $anioEdicion;
    }

    public function getEditorial() {
        return $this->editorial;
    }

    public function setEditorial($editorial) {
        $this->editorial = $editorial;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function toString() {
        return "ISBN: " . $this->ISBN . ", Título: " . $this->titulo . ", Año de edición: " . $this->anioEdicion . ", Editorial: " . $this->editorial . ", Autor: " . $this->autor;
    }

    public function perteneceEditorial($peditorial) {
        return $this->editorial === $peditorial;
    }

    public function aniosdesdeEdicion() {
        $anioActual = date("Y");
        return $anioActual - $this->anioEdicion;
    }
}

