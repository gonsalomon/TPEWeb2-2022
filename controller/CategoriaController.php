<?php
require_once './model/MuebleModel.php';
require_once './view/CategoriaView.php';
require_once './helpers/AuthHelper.php';

class CategoriaController
{
    private $model;
    private $view;
    private $authh;

    function __construct()
    {
        $this->model = new MuebleModel();
        $this->view = new CategoriaView();
        $this->authh = new AuthHelper();
    }

    function mostrarCategorias()
    {
        if (isset($_SESSION['err']) && $_SESSION['err'] != 'Debe iniciar sesión para acceder a esta acción.') {
            $_SESSION['err'] = null;
        }
        $this->view->mostrarCategorias($this->model->getCategorias());
    }

    //para mostrar una categoría individual necesito antes obtener los muebles que le pertenecen (getMueblesCat)
    function mostrarCategoria($id)
    {
        if (isset($_SESSION['err']) && $_SESSION['err'] != 'Debe iniciar sesión para acceder a esta acción.') {
            $_SESSION['err'] = null;
        }
        $categoria = $this->model->getCategoria($id);
        $muebles = $this->model->getMueblesCat($id);
        $this->view->mostrarCategoria($categoria, $muebles);
    }

    //muestro la categoría recién añadida con sus respectivos muebles(es probable que no tenga ninguno)
    function addCategoria()
    {
        if (isset($_SESSION['err']) && $_SESSION['err'] != 'Debe iniciar sesión para acceder a esta acción.') {
            $_SESSION['err'] = null;
        }
        $this->authh->checkLoggedIn();
        $data = $this->model->addCategoria($_POST['categoria'], $_POST['detalles']);
        $this->view->mostrarCategoria($data[0], $data[1]);
    }

    function startEditCategoria($id)
    {
        if (isset($_SESSION['err']) && $_SESSION['err'] != 'Debe iniciar sesión para acceder a esta acción.') {
            $_SESSION['err'] = null;
        }
        $this->authh->checkLoggedIn();
        $this->view->editarCategoria($this->model->getCategoria($id));
    }

    function confirmEditCategoria()
    {
        if (isset($_SESSION['err']) && $_SESSION['err'] != 'Debe iniciar sesión para acceder a esta acción.') {
            $_SESSION['err'] = null;
        }
        $this->authh->checkLoggedIn();
        $res = $this->model->updateCategoria($_POST['id_categoria'], $_POST['categoria'], $_POST['detalles']);
        //muestro la categoría recién editada con sus respectivos muebles
        $this->view->mostrarCategoria($res[0], $res[1]);
    }

    function deleteCategoria($id_categoria)
    {
        if (isset($_SESSION['err']) && $_SESSION['err'] != 'Debe iniciar sesión para acceder a esta acción.') {
            $_SESSION['err'] = null;
        }
        $this->authh->checkLoggedIn();
        if (null !== $this->model->getMueblesCat($id_categoria) || !empty($this->model->getMueblesCat($id_categoria))) {
            $_SESSION['err'] = 'No se puede borrar una categoría que ya tiene muebles. Intentar borrar los muebles primero, luego la categoría.';
            header("Location: " . BASE_URL . "categorias/");
        } else {
            $res = $this->model->deleteCategoria($id_categoria);
            header("Location: " . BASE_URL . "categorias/");
        }
    }
}
