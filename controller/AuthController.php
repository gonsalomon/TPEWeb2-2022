<?php
require_once './model/UserModel.php';
require_once './view/AuthView.php';

class AuthController
{
    private $model;
    private $view;
    private $user;

    function __construct()
    {
        $this->model = new UserModel();
        $this->view = new AuthView();
        $this->user = null;
    }

    function showAuth()
    {
        $this->view->showAuth();
    }

    function login($user, $pass)
    {

        $username = $this->model->getUsername($user);
        if ($username && password_verify($pass, $username->password)) {

            session_start();
            $_SESSION['id'] = $username->id;
            $_SESSION['user'] = $username->mail;
            header('Location: ' . BASE_URL);
            die();
        } else {
            $this->view->showAuth('Los datos son incorrectos, intente nuevamente.');
            die();
        }
    }

    function logout()
    {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL);
    }
}
