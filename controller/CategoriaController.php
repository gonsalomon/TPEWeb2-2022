<?php
require_once './model/MuebleModel.php';
require_once './view/CategoriaView.php';

class CategoriaController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new MuebleModel();
        $this->view = new CategoriaView();
    }

    function mostrarCategorias()
    {
        $muebles = $this->model->getCategorias();
        $this->view->mostrarCategorias($muebles);
    }

    function mostrarCategoria($id)
    {
        $mueble = $this->model->getCategoria($id);
        $this->view->mostrarCategoria($mueble);
    }
}
