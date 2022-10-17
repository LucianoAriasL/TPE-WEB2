<?php
require_once "app/models/CategoriaModel.php";
require_once "app/views/CategoriaView.php";
require_once "app/models/ZapatillasModel.php";
require_once "helpers/UsuarioHelper.php";

class CategoriaZapatillasController {
    private $model;
    private $view;
    private $zapatillasModel;
    private $usuarioHelper;
    function __construct(){
        $this->model=new CategoriaModel();
        $this->view=new CategoriaView();
        $this->zapatillasModel=new ZapatillasModel();
        $this->usuarioHelper=new UsuarioHelper();
    }

    function mostrarCategorias(){
        session_start();
        $categorias=$this->model->obtenerTodo();
        $this->view->mostrarTabla($categorias);
    }

    function formularioAgregarCategoria(){
        session_start();
        if(isset($_SESSION["Usuario"])){
            $this->view->categoriaForm('Agregar');
        }else{
            header('Location: '. BASE_URL .'tabla');
        }
    }

    function agregarCategoria(){
        session_start();
        if (!empty($_POST['categoria'])){
            $categoria=$_POST['categoria'];
            $this->model->agregarCategoria($categoria);         
            header('Location: '. BASE_URL .'agregarCategoria');           
        }
    }

    function eliminarCategoria($id){
        $this->usuarioHelper->chequearLogin();
        $zapatillas=$this->zapatillasModel->obtenerPorCategoria($id);
        if (empty($zapatillas)){
            $this->model->eliminarCategoria($id);
            header('Location: '. BASE_URL .'mostrarCategorias');
        }else
            $this->view->mostrarMensaje('No se puede eliminar la categoria porque tiene zapatillas');

    }

    function formularioEditarCategoria($id){
        $this->usuarioHelper->chequearLogin();
        $categoria=$this->model->obtenerUno($id);
        $this->view->categoriaForm('Editar',$categoria);
    }
    function finalizarEditadoCategoria($id){
        $this->usuarioHelper->chequearLogin();
        if (!empty($_POST['categoria'])) {
            $categoria=$_POST['categoria'];
            $this->model->finalizarEditadoCategoria($categoria,$id);
            header('Location: '. BASE_URL . 'mostrarCategorias');
        }
    }
}