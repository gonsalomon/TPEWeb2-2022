<?php
//require_once 'libs/router.php';
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

//$router = new Router();

//$router->addRoute('');
//TODO: ver cómo se usa el addRoute (si es la tabla o qué va en el campo #1)

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
        $mueblec->addMueble();
        break;
    case 'addCategoria':
        $categoryc->addCategoria();
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
        $categoryc->startEditCategoria($params[1]);
        break;
    case 'confirmEditCategoria':
        $categoryc->confirmEditCategoria();
        break;
        //para el borrado, el mueble (lado N) está sencillo; 
        //con la categoría hago el checkeo dentro del controller si no hay muebles con esa categoría
        //TODO  
    case 'deleteMueble':
        $mueblec->deleteMueble($params[1]);
        break;
    case 'deleteCategoria':
        $categoryc->deleteCategoria($params[1]);
        break;
    default:
        echo ('404 Page not found');
        break;
}
