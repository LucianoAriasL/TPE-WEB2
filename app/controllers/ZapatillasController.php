<?php
require_once "app/models/ZapatillasModel.php";
require_once "app/views/ZapatillasView.php";
require_once "app/models/CategoriaModel.php";
require_once "app/views/CategoriaView.php";
require_once "helpers/UsuarioHelper.php";

class ZapatillasController{
    private $model;
    private $view;
    private $categoriaView;
    private $categoriaModel;
    private $usuarioHelper;

    function __construct(){
        $this->model=new ZapatillasModel();
        $this->view=new ZapatillasView();
        $this->categoriaView=new CategoriaView();
        $this->categoriaModel=new CategoriaModel();
        $this->usuarioHelper=new UsuarioHelper();
    }

    function mostrarTabla(){
        session_start();
        $zapatillas=$this->model->obtenerTodo();
        $this->view->mostrarTabla($zapatillas);
    }

    function mostrarZapatilla($id){
        session_start();
        $zapatilla=$this->model->obtenerUno($id);
        $this->view->mostrarZapatilla($zapatilla);
    }

    function mostrarPorCategoria($id){
        session_start();
        $zapatillas=$this->model->obtenerPorCategoria($id);
        $categoria=$this->categoriaModel->obtenerUno($id);
        $this->categoriaView->mostrarZapatillasPorCategoria($zapatillas,$categoria);
    }


    function formularioAgregarZapatilla(){
        $this->usuarioHelper->chequearLogin();
        $categorias=$this->categoriaModel->obtenerTodo();
        $this->view->zapatillaForm('Agregar',$categorias);
    }

    function agregarZapatilla(){
        $this->usuarioHelper->chequearLogin();
        if (!empty($_POST['nombre']) && !empty($_POST['marca'])&& !empty($_POST['precio']) && !empty($_POST['descripcion']) && !empty($_POST['categoria'])){
            $nombre=$_POST['nombre'];
            $marca=$_POST['marca'];
            $precio=$_POST['precio'];
            $descripcion=$_POST['descripcion'];
            $categoria=$_POST['categoria'];
            $this->model->agregarZapatilla($nombre,$marca,$precio,$descripcion,$categoria);
            header('Location: '. BASE_URL . 'agregarZapatilla');
        }
    }

    function formularioEditarZapatilla($id){
        $this->usuarioHelper->chequearLogin();
        $zapatilla=$this->model->obtenerUno($id);
        $categorias=$this->categoriaModel->obtenerTodo();
        $this->view->zapatillaForm('Editar',$categorias,$zapatilla);
    }

    function agregarZapatillaEditada($id){
        $this->usuarioHelper->chequearLogin();
        if (!empty($_POST['nombre']) && !empty($_POST['marca'])&& !empty($_POST['precio']) && !empty($_POST['descripcion']) && !empty($_POST['categoria']))
            $nombre=$_POST['nombre'];
            $marca=$_POST['marca'];
            $precio=$_POST['precio'];
            $descripcion=$_POST['descripcion'];
            $categoria=$_POST['categoria'];
            $this->model->agregarZapatillaEditada($nombre,$marca,$precio,$descripcion,$categoria,$id);
            header('Location: '. BASE_URL . 'tabla');
    }

    function eliminarZapatilla($id){
        $this->usuarioHelper->chequearLogin();
        $this->model->eliminarZapatilla($id);
        header('Location: '. BASE_URL . 'tabla');
    }
}