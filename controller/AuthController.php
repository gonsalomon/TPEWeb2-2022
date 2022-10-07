<?php
require_once './model/UserModel.php';

class AuthController
{
    private $model;
    private $view;
    private $user;

    function __construct()
    {
        $this->model = new UserModel();
        $this->user = null;
    }

    function login()
    {
        $username = $this->model->getUsername($_POST['user']);
        //primero checkeo que el usuario exista, luego si coinciden las contraseñas
        if ($username && password_verify($_POST['password'], $username->password)) {
            session_start();
            $_SESSION['id'] = $username->id;
            $_SESSION['user'] = $username->mail;
            header('Location: ' . BASE_URL);
        } else {
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
