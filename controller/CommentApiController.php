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

    function getComments()
    {
        $comments = $this->model->getComments();
        !empty($comments) ? $this->view->response($comments, 200) : $this->view->response(null, 404);
    }

    function getComment($params = null)
    {
        $id = $params[':ID'];
        $comment = $this->model->getComment($id);

        $comment ? $this->view->response($comment, 200) : $this->view->response(null, 404);
    }

    function addComment($params = [])
    {
        $body = $this->getData();

        if ((empty($body->id_mueble) && empty($body->id_categoria)) || empty($body->comment))
            $this->view->response('Datos insuficientes', 400);

        if (isset($body->id_categoria))
            $id_categoria = $body->id_categoria;
        if (isset($body->id_mueble))
            $id_mueble = $body->id_mueble;
        $comment = $body->comment;

        $res = $this->model->addComment((isset($id_mueble) ? $id_mueble : $id_categoria), $comment);
    }

    function deleteComment($params = null)
    {
        $id = $params[':ID'];
        $comment = $this->model->getComment($id);
        if ($comment) {
            $this->model->deleteComment($id);
            $this->view->response($comment, 200);
        } else {
            $this->view->response(null, 404);
        }
    }
}
