<?php
// including the database connection file
include_once("conexion.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $name=$_POST['name'];
    $apellido=$_POST['apellido'];
    $email=$_POST['email'];
    $username=$_POST['username'];    
    
    // checking empty fields
    if(empty($name) || empty($apellido) || empty($email) || empty($username)) {    
            
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
    } else {    
        //updating the table
        $sql = "UPDATE usuario SET nombre=:name, apellido=:apellido, correo=:email, username=:username WHERE idusuario=:id";
        $query = $pdo->prepare($sql);
                
        $query->bindparam(':id', $id);
        $query->bindparam(':name', $name);
        $query->bindparam(':apellido', $apellido);
        $query->bindparam(':email', $email);
        $query->bindparam(':username', $username);
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
                
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$sql = "SELECT * FROM usuario WHERE idusuario=:id";
$query = $pdo->prepare($sql);
$query->execute(array(':id' => $id));
 
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $name = $row['nombre'];
    $apellido = $row['apellido'];
    $email = $row['correo'];
    $username = $row['username'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Apellido</td>
                <td><input type="text" name="apellido" value="<?php echo $apellido;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
            <tr> 
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo $username;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>