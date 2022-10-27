<?php
require_once './model/UserModel.php';
require_once './helpers/AuthHelper.php';

class AuthController
{
    private $model;
    private $helper;

    function __construct()
    {
        $this->model = new UserModel();
        $this->helper = new AuthHelper();
    }

    function login()
    {
        $user = $this->model->getUser($_POST['user']);
        if ($user && password_verify($_POST['password'], $user->password)) {
            session_start();
            $_SESSION['id'] = $user->id;
            $_SESSION['user'] = $user->mail;
            $_SESSION['role'] = $user->role;
            header('Location: ' . BASE_URL);
        } else {
            session_start();
            $_SESSION['err'] = 'Usuario o contraseña incorrectos';
            header('Location: ' . BASE_URL);
        }
    }

    function logout()
    {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL);
        die();
    }
}
