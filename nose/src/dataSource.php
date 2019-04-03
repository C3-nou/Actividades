<?php  

namespace ss;

//configuracion de la DB
class dataSource {
    
    private $host;
    private $user;
    private $pass;
    private $database;
    private $port;
    private $conn;
    private $dataQuery;
 
    //contructor   
    public function __construct($host, $user, $pass,$database, $port) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->database = $database;
        $this->port = $port;
        $this->getConection();
    }
    
    //conexion con DB
    private function getConection() {
        $this->conn = mysqli_connect(
            "p:{$this->host}",
            $this->user,
            $this->pass,
            $this->database,
            $this->port);
    }
    
    //Ejecucion de consultas
    public function query($sql) {
        $this->dataQuery = mysqli_query($this->conn, $sql);
    }
    
    //Obtencion de datos
    public function getData() {
        return mysqli_fetch_assoc($this->dataQuery);
    }
    
    //Ejecucion de estructuras sql
    public function execute($sql) {
        mysqli_query($this->conn, $sql);
    }
    
}