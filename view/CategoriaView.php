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
        $this->smarty->display('templates/table.tpl');
    }
    function mostrarCategoria($categoria)
    {
        $this->smarty->assign('title', $categoria->nombre);
        $this->smarty->assign('data', $categoria);
        $this->smarty->assign('presenting', 'categoria');
        $this->smarty->display('templates/elem.tpl');
    }
}
