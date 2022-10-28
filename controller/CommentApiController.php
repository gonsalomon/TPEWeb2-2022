<?php
require_once 'model/ApiModel.php';
require_once 'view/ApiView.php';

class CommentApiController extends ApiController
{
    function __construct()
    {
        parent::__construct();
        $this->model = new ApiModel();
    }

    //orderBy va a traer un string con el campo por el que quieren ordenar, order (también string) define si es 'ascending' o 'descending'
    function getComments($params = null, $orderBy = null, $order = null)
    {
        $elem = $params['elem'];
        $id = $params['id'];
        if (isset($orderBy)) {
            $comments = $this->model->getComments($elem, $id, $orderBy, $order);
        } else
            $comments = $this->model->getComments($elem, $id);
        !empty($comments) ? $this->view->response($comments, 200) : $this->view->response('No hay comentarios para este elemento.', 404);
    }

    function getComment($params = null,)
    {
        $id = $params[':ID'];
        if (isset($id)) {
            $comment = $this->model->getComment($id);
            $comment ? $this->view->response($comment, 200) : $this->view->response('No se encontró el comentario solicitado.', 404);
        } else {
            $this->view->response('No se solicitó un comentario.', 400);
        }
    }

    function addComment($params = [])
    {
        $body = $this->getData();
        if ((empty($body->id_mueble) && empty($body->id_categoria)) || empty($body->comment))
            $this->view->response('Datos insuficientes, intente de nuevo completando todos.', 400);
        else {
            if (isset($body->id_categoria))
                $id_categoria = $body->id_categoria;
            if (isset($body->id_mueble))
                $id_mueble = $body->id_mueble;
            $comment = $body->comment;

            $res = $this->model->addComment((isset($id_mueble) ? $id_mueble : $id_categoria), $comment, isset($id_mueble) ? 'mueble' : 'categoria');
            $this->getComments();
        }
    }

    function deleteComment($params = null)
    {
        $id = $params[':ID'];
        if (isset($id)) {
            $comment = $this->model->getComment($id);
            if ($comment) {
                $this->model->deleteComment($id);
                $this->view->response($comment, 200);
            } else
                $this->view->response('No se encontró el comentario solicitado.', 404);
        } else
            $this->view->response('Debe indicar qué comentario va a borrar', 400);
    }
}
