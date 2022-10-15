<?php
require_once "app/models/LoginModel.php";
require_once "app/views/LoginView.php";

class LoginController{
    private $model;
    private $view;

    function __construct(){
        $this->model=new LoginModel();
        $this->view=new LoginView();
    }

    function login(){
        $this->view->mostrarLogIn();
    }

    function verificarLogin(){
        $usuario=$_POST["usuario"];
        $contraseña=$_POST["contraseña"];
        $dbUsuario=$this->model->obtenerUsuario($usuario);
        if (!empty($dbUsuario)){
            if(password_verify($contraseña,$dbUsuario->contraseña)){
                session_start();
                $_SESSION["Usuario"]=$usuario;
                header('Location: '. BASE_URL .'tabla');
            }else{
                $this->view->mostrarLogIn("Contraseña incorrecta");
            }
        }else{
            $this->view->mostrarLogIn("El usuario no existe");
        }
    }

    function logout(){
        session_start();
        session_destroy();
        header('Location: '. BASE_URL .'tabla');
    }
}