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

    function addCategoria()
    {
        $data = $this->model->addCategoria($_POST['categoria'], $_POST['detalles']);
        //muestro la categoría recién añadida con sus respectivos muebles(es probable que no tenga ninguno)
        $this->view->mostrarCategoria($data[0], $data[1]);
    }

    function editCategoria()
    {
        $res = $this->model->updateCategoria($_POST['id_categoria'], $_POST['categoria'], $_POST['detalles']);
        //muestro la categoría recién editada con sus respectivos muebles
        $this->view->mostrarCategoria($res[0], $res[1]);
    }

    function deleteCategoria($id_categoria)
    {
        if (null !== $this->model->getMueblesCat($id_categoria) || empty($this->model->getMueblesCat($id_categoria))) {
            $_SESSION['err'] = 'No se puede borrar una categoría que ya tiene muebles. Intentar borrar los muebles primero, luego la categoría.';
            header(BASE_URL . "categorias/");
        } else {
            $res = $this->model->deleteCategoria($id_categoria);
            header(BASE_URL . "categorias/");
        }
    }
}
