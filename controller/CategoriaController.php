<?php
require_once './model/CategoriaModel.php';
require_once './view/CategoriaView.php';

class CategoriaController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new CategoriaModel();
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
