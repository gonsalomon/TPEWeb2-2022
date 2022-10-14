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
    function mostrarMuebles($muebles)
    {
        $this->smarty->assign('title', 'Lista de muebles');
        $this->smarty->assign('data', $muebles);
        //para evitar el notice
        if (!isset($_SESSION))
            session_start();
        if (isset($_SESSION['user'])) {
            $this->smarty->assign('user', $_SESSION['user']);
        }
        if (isset($_SESSION['err']))
            $this->smarty->assign('err', $_SESSION['err']);
        $this->smarty->assign('presenting', 'muebles');
        $this->smarty->display('templates/table.tpl');
    }
    function mostrarMueble($mueble, $added = null)
    {
        $this->smarty->assign('title', $mueble->mueble);
        $this->smarty->assign('mueble', $mueble);
        if (isset($added))
            $this->smarty->assign('added', true);
        $this->smarty->assign('presenting', 'mueble');
        //para evitar el notice
        if (!isset($_SESSION))
            session_start();
        if (isset($_SESSION['user'])) {
            $this->smarty->assign('user', $_SESSION['user']);
        }
        if (isset($_SESSION['err']))
            $this->smarty->assign('err', $_SESSION['err']);
        $this->smarty->display('templates/elem.tpl');
    }
    function showHome()
    {
        header("Location: " . BASE_URL . "home");
    }
}
