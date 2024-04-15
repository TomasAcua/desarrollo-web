<?php
 class Cliente{
    private $nombre;
    private $apellido;
    private $dadoDeBaja;
    private $tipoDocumento;
    private $numeroDocumento;

    public function __construct($nombre, $apellido, $dadoDeBaja,$tipoDocumento ,$numeroDocumento ){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dadoDeBaja = $dadoDeBaja;
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
    }
public function getNombre(){
    return $this->nombre;
}
public function setNombre($nombre) {
    $this->nombre = $nombre;
}
public function getApeliido(){
    return $this->apellido;
}
public function setApellido($apellido){
    $this->apellido = $apellido;
}
public function estaDadoDeBaja(){
    return $this->dadoDeBaja;
}
public function setDadoDeBaja($dadoDeBaja){
    $this->dadoDeBaja = $dadoDeBaja;
}
public function getTipoDocumento()  {
    return $this->tipoDocumento;
    
}
public function setTipoDocumento($tipoDocumento){
    $this->tipoDocumento = $tipoDocumento;
    
}
public function getNumeroDocumento(){
    return $this->numeroDocumento;
}
public function setNumeroDocumento($numeroDocumento){
    $this->numeroDocumento = $numeroDocumento;

}
public function __toString(){
    $estado = "activo";
    if ($this->dadoDeBaja == true) {
        $estado = "dado de baja";
    }
    return "nombre: ". $this->nombre . "apellido: ". $this->apellido. "estado: ". $estado. "tipo doc: ". $this->tipoDocumento. "numero doc: ". $this->numeroDocumento;
    
}
 }