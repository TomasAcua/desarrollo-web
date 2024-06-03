<?php
class Medico {
    public $id;
    public $nombre;
    public $especialidad;

    public function __construct($id, $nombre, $especialidad) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->especialidad = $especialidad;
    }

    // Métodos de acceso
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEspecialidad() {
        return $this->especialidad;
    }
}
?>
