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
        $this->helper->login($username);
    }

    function logout()
    {
        $this->helper->logout();
    }
}
