<?php
class AuthModel
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

    function getByUsername($mail)
    {
        $req = $this->db->prepare('SELECT * from users WHERE mail = ?');
        $req->execute(array($mail));

        $user = $req->fetchAll(PDO::FETCH_OBJ);
        if (isset($user) && !empty($user)) {
            var_dump($user);
            session_start();
            $_SESSION['user'] = $user[0]->mail;

            header('Location: ver');
            return $user;
        } else {
            $this->view->showAuth('Login incorrecto');
        }
    }

    function handleRegister($user, $pass)
    {
    }
}
