<?php
require_once "app/controllers/ZapatillasController.php";
require_once "app/controllers/CategoriaZapatillasController.php";
require_once "app/controllers/LoginController.php";
$action="home";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if(!empty($_GET['action'])){
    $action=$_GET['action'];
}

$params = explode('/',$action);

switch($params[0]){
    case "tabla":
        $zapatillasController = new ZapatillasController();
        $zapatillasController->mostrarTabla();
        break;
    case "mostrarZapatilla":
        $zapatillasController = new ZapatillasController();
        $zapatillasController->mostrarZapatilla($params[1]);
        break;
    case "mostrarCategorias":
        $categoriaZapatillasController = new CategoriaZapatillasController();
        $categoriaZapatillasController->mostrarCategorias();
        break;
    case "mostrarPorCategoria":
        $zapatillasController = new ZapatillasController();
        $zapatillasController->mostrarPorCategoria($params[1]);
        break;
    case "agregarZapatilla":
        $zapatillasController = new ZapatillasController();
        $zapatillasController->formularioAgregarZapatilla();
        break;
    case "finalizarAgregadoZapatilla":
        $zapatillasController = new ZapatillasController();
        $zapatillasController->agregarZapatilla();
        break;
    case "agregarCategoria":
        $categoriaZapatillasController= new CategoriaZapatillasController();
        $categoriaZapatillasController->formularioAgregarCategoria();
        break;
    case "finalizarAgregadoCategoria":
        $categoriaZapatillasController= new CategoriaZapatillasController();
        $categoriaZapatillasController->agregarCategoria();
        break;
    case "editarZapatilla":
        $zapatillasController=new ZapatillasController();
        $zapatillasController->formularioEditarZapatilla($params[1]);
        break;
    case "finalizarEditadoZapatilla":
        $zapatillasController=new ZapatillasController();
        $zapatillasController->agregarZapatillaEditada($params[1]);
        break;
    case "eliminarZapatilla":
        $zapatillasController=new ZapatillasController();
        $zapatillasController->eliminarZapatilla($params[1]);
        break;
    case "eliminarCategoria":
        $categoriaZapatillasController= new CategoriaZapatillasController();
        $categoriaZapatillasController->eliminarCategoria($params[1]);
        break;
    case "editarCategoria":
        $categoriaZapatillasController= new CategoriaZapatillasController();
        $categoriaZapatillasController->formularioEditarCategoria($params[1]);
    case "finalizarEditadoCategoria":
        $categoriaZapatillasController= new CategoriaZapatillasController();
        $categoriaZapatillasController->finalizarEditadoCategoria($params[1]);
        break;
    case "iniciarSesion":
        $loginController=new LoginController();
        $loginController->login();
        break;
    case "verificarLogin":
        $loginController=new LoginController();
        $loginController->verificarLogin();
        break;
    case "cerrarSesion":
        $loginController=new LoginController();
        $loginController->logout();
        break;
}
