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
    //supuse mejor mostrar todos los muebles después de agregar uno
    function addMueble()
    {
        $this->model->addMueble($_POST['mueble'], $_POST['descripcion'], $_POST['precio'], $_POST['id_categoria']);
        $this->view->mostrarMuebles($this->model->getMuebles(), $this->model->getCategorias());
    }
    //para editar, muestro un form con los campos a pisar en la DB, para que cuando se submittea el form, efectuar la acción SQL
    function startEditMueble($id)
    {
        $this->view->editarMueble($this->model->getMueble($id), $this->model->getCategorias());
    }

    function confirmEditMueble()
    {
        $this->view->mostrarMueble($this->model->updateMueble($_POST['id_mueble'], $_POST['mueble'], $_POST['descripcion'], $_POST['precio'], $_POST['id_categoria']));
    }
    //borrar un mueble (lado N) no tiene requisitos, el checkLoggedIn ya se hizo en el router
    function deleteMueble($id)
    {
        $req = $this->model->deleteMueble($id);
        header("Location: " . BASE_URL . "muebles/");
    }
}
