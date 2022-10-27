<?php
require_once 'controller/MuebleController.php';
require_once 'controller/CategoriaController.php';
require_once 'model/MuebleModel.php';
require_once 'controller/AuthController.php';
require_once 'helpers/AuthHelper.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$mueblec = new MuebleController();
$categoriac = new CategoriaController();
$authc = new AuthController();

$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
        /*autenticación*/
    case 'login':
        $authc->login();
        break;
    case 'logout':
        $authc->logout();
        break;
        /*sección pública*/
    case 'home':
        $mueblec->mostrarMuebles();
        break;
    case 'muebles':
        $mueblec->mostrarMuebles();
        break;
    case 'categorias':
        $categoriac->mostrarCategorias();
        break;
    case 'mueble':
        if (!empty($params[1])) {
            $mueblec->mostrarMueble($params[1]);
        }
        break;
    case 'categoria':
        if (!empty($params[1])) {
            $categoriac->mostrarCategoria($params[1]);
        }
        break;
        /*acciones del admin*/
    case 'addMueble':
        $mueblec->addMueble();
        break;
    case 'addCategoria':
        $categoriac->addCategoria();
        break;
        //para la edición, con edit[elemento]() muestro el template con los valores del elemento
        //después confirmEdit dispara la acción una vez se submittea el form
    case 'editMueble':
        $mueblec->startEditMueble($params[1]);
        break;
    case 'confirmEditMueble':
        $mueblec->confirmEditMueble();
        break;
    case 'editCategoria':
        $categoriac->startEditCategoria($params[1]);
        break;
    case 'confirmEditCategoria':
        $categoriac->confirmEditCategoria();
        break;
        //para el borrado, el mueble (lado N) está sencillo; 
        //con la categoría hago el checkeo dentro del controller si no hay muebles con esa categoría
        //TODO  
    case 'deleteMueble':
        $mueblec->deleteMueble($params[1]);
        break;
    case 'deleteCategoria':
        $categoriac->deleteCategoria($params[1]);
        break;
    default:
        echo ('404 Page not found');
        break;
}
