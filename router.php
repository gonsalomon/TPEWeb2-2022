<?php
require_once 'controller/MuebleController.php';
require_once 'controller/CategoriaController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$mc = new MuebleController();
$cc = new CategoriaController();

$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        echo 'Site under development, please wait for its deployment.';
        break;
    case 'noticia':
        break;
    case 'about':
        break;
    default:
        echo ('404 Page not found');
        break;
}
