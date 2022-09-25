<?php
require_once '../model/MuebleModel.php';
require_once '../view/MuebleView.php';

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
        //ver qué onda el view
    }
}
