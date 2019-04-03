<?php

class Campos{
    
    private $id;
    private $nombre;
    private $apellido;
    private $usuario;
    private $correo;
    private $contrasena;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }

    public function getContrasena(){
        return $this->contrasena;
    }

    public function setContrasena($contrasena){
        $this->contrasena = $contrasena;
    }

}

?>