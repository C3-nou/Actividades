<?php


    include_once("clases/source.php");

    class controlador
    {
        //Atributos
        private $usuario;

        //Métodos

        public function __construct()
        {
            $this->usuario = new source();
        }

        public function index()
        {
            $resultado = $this->usuario->listar();
            return $resultado;
        }

        public function crear($nombre, $apellido, $username, $pass, $correo)
        {
            $this->usuario->set("nombre",$nombre);
            $this->usuario->set("apellido",$apellido);
            $this->usuario->set("username",$username);
            $this->usuario->set("pass",$pass);
            $this->usuario->set("correo",$correo);
            

            $resultado = $this->usuario->crear();
            return $resultado;
        }

        public function eliminar($id)
        {
            $this->usuario->set("id",$id);
            $this->usuario->eliminar();
        }

        public function ver($id)
        {
            $this->usuario->set("id",$id);
            $datos = $this->usuario->ver();
            return $datos;
        }
        //llamo al id y todos los campos que serán editados
        public function editar($id, $nombre, $apellido, $username, $pass, $correo)
        {
            $this->usuario->set("id",$id);
            $this->usuario->set("nombre",$nombre);
            $this->usuario->set("apellido",$apellido);
            $this->usuario->set("username",$username);
            $this->usuario->set("pass",$pass);
            $this->usuario->set("correo",$correo);

            $this->usuario->editar();
        }
    }

?>