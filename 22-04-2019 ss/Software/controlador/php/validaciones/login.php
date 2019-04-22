<?php

class LoginValidaciones{

    public function Username($username){
        if ($username) {
            # code...
        }else{
            return false;
        }
    }

    public function Password($password){
        if ($password) {
            # code...
        }else{
            return false;
        }
    }

    public function QuitarMayuscula($username){

    }
}

?>