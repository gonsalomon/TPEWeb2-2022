<?php
require_once './model/MuebleModel.php';
require_once './view/CategoriaView.php';
require_once './helpers/AuthHelper.php';

class CategoriaController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new MuebleModel();
        $this->view = new CategoriaView();

        //$authHelper = new AuthHelper();
        //$authHelper->checkLoggedIn();
    }

    function mostrarCategorias()
    {
        $muebles = $this->model->getCategorias();
        $this->view->mostrarCategorias($muebles);
    }

    function mostrarCategoria($id)
    {
        $categoria = $this->model->getCategoria($id);
        $muebles = $this->model->getMueblesCat($id);
        $this->view->mostrarCategoria($categoria, $muebles);
    }
}
