<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("conexion.php");
 
if(isset($_POST['Submit'])) {    
    $name = $_POST['name'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['pass'];
        
    // checking empty fields
    if(empty($name) || empty($apellido) || empty($email) || empty($username) || empty($password)) {
                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($apellido)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }

        if(empty($username)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }

        if(empty($password)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database        
        $sql = "INSERT INTO usuario(nombre, apellido, correo, username, password) VALUES(:name, :apellido, :email, :username, :password)";
        $query = $pdo->prepare($sql);
                
        $query->bindparam(':name', $name);
        $query->bindparam(':apellido', $apellido);
        $query->bindparam(':email', $email);
        $query->bindparam(':username', $username);
        $query->bindparam(':password', $password);
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>