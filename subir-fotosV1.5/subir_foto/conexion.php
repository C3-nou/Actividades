<?php
/*mysql_connect("localhost","root","");
mysql_select_db("subir_foto");*/
try 
        {
            $dbname = "subir_foto";
            $host = "localhost";
            $user = "root";
            $pass = "";
            $port = "";
            
            $pdo = new PDO("mysql:host=".$host.";dbname=".$dbname,$user,$pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        }
        catch(PDOException $e)
        {
            echo 'Error al conectarnos: '.$e -> getMessage();
            
        }

?>
