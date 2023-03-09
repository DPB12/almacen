<?php

class Objetos {

    private $id;
    private $nombre;
    private $decripcion;
    private $cantidad;
    private $ubicacion;
    private $entrada;
    private $salida;

  

    public function __construct ($datos){
        $this -> id = $datos['id'];
        $this -> nombre = $datos['nombre'];
        $this -> descripcion = $datos['descripcion'];
        $this -> cantidad = $datos['cantidad'];
        $this -> ubicacion = $datos['ubicacion'];
        $this -> entrada = $datos['entrada'];
        $this -> salida = $datos['salida'];

    }

    public function getId() {
        return $this -> id;
    }
    
    public function getNombre() {
        return $this -> nombre;
    }

    public function getDescripcion() {
        return $this -> descripcion;
    }

    public function getCantidad() {
        return $this -> cantidad;
    }

    public function getUbicacion() {
        return $this -> ubicacion;
    }

    public function getEntrada() {
        return $this -> entrada;
    }

    public function getSalida() {
        return $this -> salida;
    }

} 

?>