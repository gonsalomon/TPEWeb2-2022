<?php

class ApiModel
{
    private $db;
    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_mueble;charset=utf8', 'root', '');
    }

    function getComments()
    {
    }

    function getComment($id_mueble = null, $id_categoria = null, )
    {
    }

    function addComment()
    {
    }

    function deleteComment($id_comment)
    {
    }
}
