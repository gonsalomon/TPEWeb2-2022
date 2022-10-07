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

    function getUsername($user)
    {
        $req = $this->db->prepare('SELECT * from user WHERE mail = ?');
        $req->execute(array($user));
        $username = $req->fetch(PDO::FETCH_OBJ);

        return $username;
    }

    function handleRegister($user, $pass)
    {
    }
}
