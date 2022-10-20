<?php
require_once 'libs/router.php';
require_once 'controller/ApiController.php';

$router = new Router();

$router->addRoute('comments', 'GET', 'CommentApiController', 'getComments');
$router->addRoute('comments/:ID', 'GET', 'CommentApiController', 'getComment');
$router->addRoute('comments', 'POST', 'CommentApiController', 'postComment');
$router->addRoute('comments/:ID', 'DELETE', 'CommentApiController', 'deleteComment');

$method = $_SERVER['REQUEST_METHOD'];

$router->route($_GET['resource'], $method);
