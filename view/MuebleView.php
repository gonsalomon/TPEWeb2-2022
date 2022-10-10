<?php
require_once './libs/smarty-4.2.0/libs/Smarty.class.php';

class MuebleView
{
    private $smarty;
    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL', BASE_URL);
    }
    function mostrarMuebles($muebles, $err = null)
    {
        $this->smarty->assign('title', 'Lista de muebles');
        $this->smarty->assign('data', $muebles);
        if (isset($_SESSION)) {
            $this->smarty->assign('user', $_SESSION['user']);
        }
        $this->smarty->assign('presenting', 'muebles');
        $this->smarty->display('templates/table.tpl');
    }
    function mostrarMueble($mueble)
    {
        $this->smarty->assign('title', $mueble->mueble);
        $this->smarty->assign('mueble', $mueble);
        $this->smarty->assign('presenting', 'mueble');
        $this->smarty->display('templates/elem.tpl');
    }
    function showHome()
    {
        header("Location: " . BASE_URL . "home");
    }
}
