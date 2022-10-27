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
    function mostrarMuebles($muebles, $categorias)
    {
        $this->smarty->assign('title', 'Lista de muebles');
        $this->smarty->assign('data', $muebles);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('presenting', 'muebles');
        //para evitar el notice de un $_SESSION sin setear
        if (!isset($_SESSION))
            session_start();
        if (isset($_SESSION['user'])) {
            $this->smarty->assign('user', $_SESSION['user']);
            $this->smarty->assign('action', 'mueble');
        }
        if (isset($_SESSION['err'])) {
            $this->smarty->assign('err', $_SESSION['err']);
        }
        $this->smarty->display('templates/table.tpl');
    }
    function mostrarMueble($mueble, $categorias = null)
    {
        $this->smarty->assign('title', $mueble->mueble);
        $this->smarty->assign('mueble', $mueble);
        if (null !== $categorias)
            $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('presenting', 'mueble');
        //para evitar el notice
        if (!isset($_SESSION))
            session_start();
        if (isset($_SESSION['user'])) {
            $this->smarty->assign('user', $_SESSION['user']);
            $this->smarty->assign('action', 'mueble');
        }
        if (isset($_SESSION['err'])) {
            $this->smarty->assign('err', $_SESSION['err']);
        }
        $this->smarty->display('templates/elem.tpl');
    }

    function editarMueble($mueble, $categorias)
    {
        $this->smarty->assign('title', "Editar $mueble->mueble");
        $this->smarty->assign('mueble', $mueble);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('action', 'editMueble');
        //para evitar el notice
        if (!isset($_SESSION))
            session_start();
        if (isset($_SESSION['user']))
            $this->smarty->assign('user', $_SESSION['user']);
        if (isset($_SESSION['err'])) {
            $this->smarty->assign('err', $_SESSION['err']);
        }
        $this->smarty->display('templates/add.tpl');
    }
}
