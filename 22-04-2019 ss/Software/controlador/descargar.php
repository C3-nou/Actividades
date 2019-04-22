<?php

if(isset($_GET['document'])){
    $name = $_GET['document'];
    header("Content-disposition: attachment; filename=".$name."");
    header("Content-type: application/pdf");
    readfile('../documentos/'.$name);
}

?>