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
            header('Location: ' . BASE_URL);
            die();
        }
    }
}
