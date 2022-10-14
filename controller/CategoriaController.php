<?php
require_once './model/MuebleModel.php';
require_once './view/CategoriaView.php';
require_once './helpers/AuthHelper.php';

class CategoriaController
{
    private $model;
    private $view;
    private $helper;

    function __construct()
    {
        $this->model = new MuebleModel();
        $this->view = new CategoriaView();
        $this->helper = new AuthHelper();
    }

    function mostrarCategorias()
    {
        $cat = $this->model->getCategorias();
        $this->view->mostrarCategorias($cat);
    }

    //para mostrar una categoría individual necesito antes obtener los muebles que le pertenecen (getMueblesCat)
    function mostrarCategoria($id)
    {
        $categoria = $this->model->getCategoria($id);
        $muebles = $this->model->getMueblesCat($id);
        $this->view->mostrarCategoria($categoria, $muebles);
    }

    function addCategoria($categoria, $detalles)
    {
        $this->helper->checkLoggedIn();
        $data = $this->model->addCategoria($categoria, $detalles);
        $this->view->mostrarCategoria($data[0], $data[1]);
    }

    function editCategoria($id_categoria, $categoria, $detalles)
    {
        $this->helper->checkLoggedIn();
        //uso res como un array para resolver la falta de capacidad de return múltiple
        $res = $this->model->updateCategoria($id_categoria, $categoria, $detalles);
        $this->view->mostrarCategoria($res[0], $res[1]);
    }

    function deleteCategoria($id_categoria)
    {
        $this->helper->checkLoggedIn();
        $res = $this->model->deleteCategoria($id_categoria);
        header(BASE_URL . "categorias/");
    }
}
