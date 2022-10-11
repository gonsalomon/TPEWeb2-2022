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
    }

    function mostrarCategorias()
    {
        $muebles = $this->model->getCategorias();
        $this->view->mostrarCategorias($muebles);
    }

    //para mostrar una categoría necesito antes obtener los muebles que le pertenecen (getMueblesCat)
    function mostrarCategoria($id)
    {
        $categoria = $this->model->getCategoria($id);
        $muebles = $this->model->getMueblesCat($id);
        $this->view->mostrarCategoria($categoria, $muebles);
    }

    function addCategoria($categoria, $detalles)
    {
        $data = $this->model->addCategoria($categoria, $detalles);
        $this->view->mostrarCategoria($data[0], $data[1]);
    }

    function editCategoria($id_categoria, $categoria, $detalles)
    {
        $result = $this->model->updateCategoria($id_categoria, $categoria, $detalles);
        $this->view->mostrarCategoria($result[0], $result[1]);
    }
}
