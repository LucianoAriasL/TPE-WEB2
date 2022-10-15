<?php
require_once "libs/Smarty.class.php";
class LoginView{
    private $smarty;

    function __construct(){
        $this->smarty=new Smarty();
    }

    function mostrarLogin($mensaje=''){
        $this->smarty->assign('encabezado','Inicio de Sesion');
        $this->smarty->assign('titulo','Iniciar Sesion');  
        $this->smarty->assign('mensaje',$mensaje);  
        $this->smarty->display('templates/formularioIniciarSesion.tpl');
    }
}