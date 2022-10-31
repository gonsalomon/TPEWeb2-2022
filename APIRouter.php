<?php
require_once 'libs/router.php';
require_once 'controller/ApiController.php';

$router = new Router();

$router->addRoute('comments', 'GET', 'CommentApiController', 'getComments');
//no sé para qué querrías un solo comentario por su id, no tiene mucho sentido pero está ahí para la corrección del TP
$router->addRoute('comments/:ID', 'GET', 'CommentApiController', 'getComment');
$router->addRoute('comments', 'POST', 'CommentApiController', 'addComment');
$router->addRoute('comments/:ID', 'DELETE', 'CommentApiController', 'deleteComment');

$method = $_SERVER['REQUEST_METHOD'];

$router->route($_GET['resource'], $method);
