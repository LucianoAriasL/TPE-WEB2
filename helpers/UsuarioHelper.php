<?php
class UsuarioHelper{
    function chequearLogin(){
        session_start();
        if((!isset($_SESSION['Usuario']))){
            header("Location: ". BASE_URL ."iniciarSesion");
            die();
        }
    }
}