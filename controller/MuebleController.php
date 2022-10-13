<?php
require_once './model/MuebleModel.php';
require_once './view/MuebleView.php';

class MuebleController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new MuebleModel();
        $this->view = new MuebleView();
    }

    function mostrarMuebles()
    {
        $this->view->mostrarMuebles($this->model->getMuebles());
    }

    function mostrarMueble($id)
    {
        $this->view->mostrarMueble($this->model->getMueble($id));
    }

    function addMueble($mueble, $descripcion, $precio, $id_categoria)
    {
        $this->view->mostrarMueble($this->model->addMueble($mueble, $descripcion, $precio, $id_categoria), true);
    }

    function editMueble($mueble, $descripcion, $precio, $id_categoria, $id_mueble)
    {
        $this->view->mostrarMueble($this->model->updateMueble($mueble, $descripcion, $precio, $id_categoria, $id_mueble));
    }

    function deleteMueble($id)
    {
        $req = $this->model->deleteMueble($id);
        header(BASE_URL . "muebles/");
    }
}
