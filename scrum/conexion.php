<?php
        
        try 
        {
            $dbname = "scrum";
            $host = "localhost";
            $user = "postgres";
            $pass = "1234";
            $port = "5432";
            $pdo = new PDO("pgsql:host=".$host.";port=".$port.";dbname=".$dbname.";user=".$user.";password=".$pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
        catch(PDOException $e)
        {
            echo 'Error al conectarnos: '.$e -> getMessage();
        }
   