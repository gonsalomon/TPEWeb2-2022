<?php
require_once './libs/smarty-4.2.0/libs/Smarty.class.php';

class AuthView
{
    private $smarty;
    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL', BASE_URL);
    }

    function showAuth($err)
    {
        $this->smarty->display('templates/auth.tpl');
        if (isset($err) && !empty($err)) {
            $this->smarty->assign('err', $err);
            $this->smarty->display('templates/err.tpl');
        }
    }
}
