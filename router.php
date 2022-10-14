<?php
require_once 'controller/MuebleController.php';
require_once 'controller/CategoriaController.php';
require_once 'controller/AuthController.php';
require_once 'helpers/AuthHelper.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$modelc = new MuebleController();
$categoryc = new CategoriaController();
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
        $modelc->mostrarMuebles();
        break;
    case 'muebles':
        $modelc->mostrarMuebles();
        break;
    case 'categorias':
        $categoryc->mostrarCategorias();
        break;
    case 'mueble':
        if (!empty($params[1])) {
            $modelc->mostrarMueble($params[1]);
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
        $modelc->addMueble($params['mueble'], $params['descripcion'], $params['precio'], $params['id_categoria']);
        break;
    case 'addCategoria':
        $authh->checkLoggedIn();
        $categoryc->addCategoria($params['categoria'], $params['detalles']);
        break;
    case 'editMueble':
        $authh->checkLoggedIn();
        //tengo que ver cómo mandar en el form el id del mueble (una variable seteada antes de llamarlo?)
        $modelc->editMueble($params['mueble'], $params['descripcion'], $params['precio'], $params['id_categoria'], $params['id_mueble']);
        break;
    case 'editCategoria':
        $authh->checkLoggedIn();
        $categoryc->editCategoria($params['id_categoria'], $params['categoria'], $params['detalles']);
        break;
    default:
        echo ('404 Page not found');
        break;
}
