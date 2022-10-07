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
        $this->smarty->assign('presenting', 'muebles');
        $this->smarty->display('templates/table.tpl');
    }
    function mostrarMueble($mueble)
    {
        $this->smarty->assign('title', $mueble->nombre);
        $this->smarty->assign('data', $mueble);
        $this->smarty->assign('presenting', 'mueble');
        $this->smarty->display('templates/elem.tpl');
    }
    function showHome()
    {
        header("Location: " . BASE_URL . "home");
    }
}
