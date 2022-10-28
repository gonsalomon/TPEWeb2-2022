<?php

class ApiModel
{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_mueble;charset=utf8', 'root', '');
    }

    function getComments($elem, $id, $orderBy = null, $order = null)
    {
        if ($elem == 'mueble') {
            $this->db->prepare('SELECT ');
        } else {
        }
    }
    //realmente no tiene mucho sentido traer UN solo comentario en cuanto al uso que le doy (varios comentarios en un mueble/categoría), 
    //pero lo dejo por si lo quieren probar por postman Y porque lo pide el TP
    function getComment($elem, $id)
    {
        if ($elem == 'mueble') {
            $this->db->prepare('SELECT ');
        } else {
        }
    }
    function addComment($elem, $id, $comment)
    {
    }
    //editar un comentario no tiene sentido, sólo dejo que un usuario pueda borrar los suyos propios, y un admin todos
    function deleteComment($id_comment)
    {
    }
}
