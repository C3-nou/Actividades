<?php

class conn
{

    //Atributos de la base de datos
    private $dbname;
    private $host;
    private $user;
    private $pass;
    private $port;
    private $conexion;

    //Métodos
    public function __construct()
    {
        $this->dbname = "scrum";
        $this->host = "localhost";
        $this->user = "postgres";
        $this->pass = "1234";
        $this->port = "5432";
        try{
        $this->conexion = new PDO("pgsql:host=".$this->host.
                            ";port=".$this->port.
                            ";dbname=".$this->dbname.
                            ";user=".$this->user.
                            ";password=".$this->pass);
        }catch(Exception $e)
        {
            echo "Tienes el siguiente error:", $e->getMessage();
        }
    }
    
    public function consultaSimple($sql)
    {
        $this->conexion->query($sql);
    }

    public function consultaCompleja($sql)
    {
        $consulta = $this->conexion->query($sql);
        return $consulta;
    }
    
}

?>