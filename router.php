<?php
require_once 'controller/MuebleController.php';
require_once 'controller/CategoriaController.php';
require_once 'model/MuebleModel.php';
require_once 'controller/AuthController.php';
require_once 'helpers/AuthHelper.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$mueblec = new MuebleController();
$categoryc = new CategoriaController();
$model = new MuebleModel();
$authc = new AuthController();
$authh = new AuthHelper();

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
        $categoryc->mostrarCategorias();
        break;
    case 'mueble':
        if (!empty($params[1])) {
            $mueblec->mostrarMueble($params[1]);
        }
        break;
    case 'categoria':
        if (!empty($params[1])) {
            $categoryc->mostrarCategoria($params[1]);
        }
        break;
        //acciones del admin
    case 'addMueble':
        $authh->checkLoggedIn();
        $mueblec->addMueble();
        break;
    case 'addCategoria':
        $authh->checkLoggedIn();
        $categoryc->addCategoria();
        break;
        //para la edición, con startEdit[elemento]() muestro el template con los valores del elemento
        //en la base de datos, la clave foránea tiene cascade para que el edit de las categorías se refleje en los muebles
    case 'editMueble':
        $authh->checkLoggedIn();
        $mueblec->startEditMueble($params[1]);
        break;
    case 'confirmEditMueble':
        $authh->checkLoggedIn();
        $mueblec->confirmEditMueble();
        break;
    case 'editCategoria':
        $authh->checkLoggedIn();
        $categoryc->startEditCategoria($params[1]);
        break;
    case 'confirmEditCategoria':
        $authh->checkLoggedIn();
        $categoryc->confirmEditCategoria();
        break;
        //para el borrado, el mueble (lado N) está sencillo; 
        //con la categoría hago el checkeo dentro del controller si no hay muebles con esa categoría 
    case 'deleteMueble':
        $authh->checkLoggedIn();
        $mueblec->deleteMueble($params[1]);
        break;
    case 'deleteCategoria':
        $authh->checkLoggedIn();
        $categoryc->deleteCategoria($params[1]);
        break;
    default:
        echo ('404 Page not found');
        break;
}
