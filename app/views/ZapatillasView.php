<?php
require_once "libs/Smarty.class.php";
class ZapatillasView{
    private $smarty;

    function __construct(){
        $this->smarty=new Smarty();
    }
    
    function mostrarTabla($zapatillas){
        $this->smarty->assign('encabezado','Zapatillas de Running');
        $this->smarty->assign('titulo','Tabla de zapatillas');    
        $this->smarty->assign('zapatillas',$zapatillas);
        $this->smarty->display('templates/zapatillasTabla.tpl');
    }

    function mostrarZapatilla($zapatilla){
        $this->smarty->assign('encabezado',$zapatilla->nombre);
        $this->smarty->assign('titulo',$zapatilla->nombre);
        $this->smarty->assign('zapatilla',$zapatilla);
        $this->smarty->display('templates/mostrarZapatilla.tpl');
    }

    function zapatillaForm($action,$categorias,$zapatilla=null){
        $this->smarty->assign('encabezado','Formulario');
        $this->smarty->assign('titulo',$action.' Zapatilla');
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->assign('zapatilla',$zapatilla);
        $this->smarty->assign('action',$action);
        $this->smarty->display('templates/formularioZapatillas.tpl');
    }
}