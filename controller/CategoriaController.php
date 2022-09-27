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
        $categorias = $this->model->getCategorias();
        //ver qué onda el view x2
    }
}
