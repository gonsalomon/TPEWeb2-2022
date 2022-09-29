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
        $muebles = $this->model->getMuebles();
        $this->view->mostrarMuebles($muebles);
    }

    function mostrarMueble($id)
    {
        $mueble = $this->model->getMueble($id);
        $this->view->mostrarMueble($mueble);
    }
}
