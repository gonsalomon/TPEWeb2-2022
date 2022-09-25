<?php
require_once 'controller/MuebleController.php';
require_once 'controller/CategoriaController.php';

$mc = new MuebleController();
$cc = new CategoriaController();

$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        break;
    case 'noticia':
        break;
    case 'about':
        break;
    default:
        echo ('404 Page not found');
        break;
}
