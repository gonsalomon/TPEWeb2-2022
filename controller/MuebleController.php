<?php
require_once './model/MuebleModel.php';
require_once './view/MuebleView.php';

class MuebleController
{
    private $model;
    private $view;
    private $helper;

    function __construct()
    {
        $this->model = new MuebleModel();
        $this->view = new MuebleView();
        $this->helper = new AuthHelper();
    }

    function mostrarMuebles()
    {
        $this->view->mostrarMuebles($this->model->getMuebles(), $this->model->getCategorias());
    }

    function mostrarMueble($id)
    {
        $this->view->mostrarMueble($this->model->getMueble($id), $this->model->getCategorias());
    }

    function addMueble()
    {
        $this->model->addMueble($_POST['mueble'], $_POST['descripcion'], $_POST['precio'], $_POST['id_categoria']);
        $this->view->mostrarMuebles($this->model->getMuebles());
    }

    function editMueble($id = null)
    {
        if ($id === null) {
            $this->view->mostrarMueble($this->model->updateMueble($_POST['id_mueble'], $_POST['mueble'], $_POST['descripcion'], $_POST['precio'], $_POST['id_categoria']));
        } else {
            $this->view->editarMueble($this->model->getMueble($id), $this->model->getCategorias());
        }
    }

    function deleteMueble($id)
    {
        $req = $this->model->deleteMueble($id);
        header(BASE_URL . "muebles/");
    }
}
