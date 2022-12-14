<?php
class UserModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_mueble;charset=utf8', 'root', '');
    }

    function getUsers()
    {
        $req = $this->db->prepare('SELECT * from users');
        if (!empty($req)) {
            return $req;
        }
        return null;
    }

    function getUser($user)
    {
        $req = $this->db->prepare('SELECT * from user WHERE mail = ?');
        $req->execute(array($user));
        $userData = $req->fetch(PDO::FETCH_OBJ);

        return $userData;
    }
}
