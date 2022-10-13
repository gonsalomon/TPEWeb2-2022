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
        $username = $this->model->getUsername($_POST['user']);
        if ($username && password_verify($_POST['password'], $username->password)) {
            session_start();
            $_SESSION['id'] = $username->id;
            $_SESSION['user'] = $username->mail;
            header('Location: ' . BASE_URL);
            die();
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
