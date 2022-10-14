<?php
require_once './libs/smarty-4.2.0/libs/Smarty.class.php';

class CategoriaView
{
    private $smarty;
    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('BASE_URL', BASE_URL);
    }
    function mostrarCategorias($categorias)
    {
        $this->smarty->assign('title', 'Lista de categorías');
        $this->smarty->assign('data', $categorias);
        $this->smarty->assign('presenting', 'categorias');
        //para evitar el notice
        if (!isset($_SESSION))
            session_start();
        if (isset($_SESSION['user'])) {
            $this->smarty->assign('user', $_SESSION['user']);
        }
        if (isset($_SESSION['err']))
            $this->smarty->assign('err', $_SESSION['err']);
        $this->smarty->display('templates/table.tpl');
    }
    function mostrarCategoria($categoria, $muebles)
    {
        $this->smarty->assign('title', $categoria->categoria);
        $this->smarty->assign('data', $categoria);
        $this->smarty->assign('muebles', $muebles);
        $this->smarty->assign('presenting', 'categoria');
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
}
