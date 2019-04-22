<?php

class Errores{

    public function GenerarAlertas($data){
        switch ($data) {
            case 'vacio':
                echo "<script type='text/javascript'>alert('No puedes enviar campos vacíos.');</script>";
                break;
            case 'cantidadCaracteres':
                echo "<script type='text/javascript'>alert('La cadena de caracteres es muy larga.');</script>";
                break;
            case 'alfanumericos':
                echo "<script type='text/javascript'>alert('La cadena no contiene caracteres alfanuméricos.');</script>";
                break;
            case 'enteros':
                echo "<script type='text/javascript'>alert('El dato ingresado no es un entero.');</script>";
                break;
            case 'caracteresEspeciales':
                echo "<script type='text/javascript'>alert('La cadena de texto contiene caracteres no permitidos.');</script>";
                break;
            case 'checkbox':
                echo "<script type='text/javascript'>alert('Debes de aceptar los terminos y condiciones para continuar.');</script>";
                break;
            default:
                # code...
                break;
        }
    }

}

?>