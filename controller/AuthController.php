<?php
require_once './model/AuthModel.php';
require_once './view/AuthView.php';

class AuthController
{
    private $model;
    private $view;
    function __construct()
    {
        $this->model = new AuthModel();
        $this->view = new AuthView();
    }

    function showAuth()
    {
        //como en php no se puede identificar 2 métodos con el mismo nombre pero distinta signatura, toca pasar null
        //después el mismo método se usa para mostrar un error, por eso la signatura es con 1 parámetro
        $this->view->showAuth(null);
    }

    function handleLogin()
    {
        $username = $_POST['username'];
        $pass = $_POST['pass'];

        $user = $this->model->getByUsername($username);

        if (isset($_SESSION['nombre']) && !empty($_SESSION['nombre'])) {
            session_start();
        }
    }
}
