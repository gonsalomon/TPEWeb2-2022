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
    case 'auth':
        $authc->showAuth();
        break;
    case 'validate':
        $authc->login($_POST['user'], $_POST['password']);
        break;
    case 'logout':
        $authc->logout();
        break;
    case 'home':
    case 'muebles':

        checkLoggedIn();
        $modelc->mostrarMuebles();
        break;
    case 'categorias':
        $categoryc->mostrarCategorias();
        break;
    case 'mueble':
        if (!empty($params[1])) {
            $id = $params[1];
            $modelc->mostrarMueble($id);
        }
        break;
    case 'categoria':
        if (!empty($params[1])) {
            $id = $params[1];
            $categoryc->mostrarCategoria($id);
        }
        break;
    default:
        echo ('404 Page not found');
        break;
}

//verifica que el usuario esté logueado o lo redirecciona caso contrario
function checkLoggedIn()
{
    session_start();
    if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
        session_destroy();
        header('Location: ' . BASE_URL . 'auth');
        die();
    }
}
