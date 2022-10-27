<?php
class AuthHelper
{
    function __construct()
    {
    }

    function checkLoggedIn()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            if (!isset($_SESSION['err'])) {
                $_SESSION['err'] = 'Debe iniciar sesión para acceder a esta acción.';
            }
            header('Location: ' . BASE_URL);
            die();
        }
    }
}
