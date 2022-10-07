<?php
require_once 'controller/MuebleController.php';
require_once 'controller/CategoriaController.php';
require_once 'controller/AuthController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$modelc = new MuebleController();
$categoryc = new CategoriaController();
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
    default:
        echo ('404 Page not found');
        break;
}
