<?php
class AuthHelper
{
    function __construct()
    {
    }

    function login($username)
    {
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

    function checkLoggedIn()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL);
            die();
        }
    }
}
