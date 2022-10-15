<?php
require_once "libs/Smarty.class.php";
class CategoriaView{
    private $smarty;

    function __construct(){
        $this->smarty=new Smarty();
    }
    
    function mostrarTabla($categorias){
        $this->smarty->assign('encabezado','Categorias');
        $this->smarty->assign('titulo','Tabla de categorias');    
        $this->smarty->assign('categorias',$categorias);
        $this->smarty->display('templates/categoriasTabla.tpl');
    }

    function mostrarZapatillasPorCategoria($zapatillas,$categoria){
        $this->smarty->assign('encabezado','Categorias');
        $this->smarty->assign('titulo',$categoria->categoria); 
        $this->smarty->assign('zapatillas',$zapatillas);
        $this->smarty->display('templates/mostrarPorCategoria.tpl');
    }

    function categoriaForm($action,$categoria=null){
        $this->smarty->assign('encabezado','Formulario');
        $this->smarty->assign('titulo','Agregar Categoria');
        $this->smarty->assign('action',$action);
        $this->smarty->assign('categoria',$categoria);
        $this->smarty->display('templates/formularioCategoria.tpl');
    }

    function mostrarMensaje($mensaje){
        $this->smarty->assign('encabezado','Error');
        $this->smarty->assign('titulo','');
        $this->smarty->assign('mensaje',$mensaje);
        $this->smarty->display('templates/mostrarMensaje.tpl');
    }
}
