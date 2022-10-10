<?php
class MuebleModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_mueble;charset=utf8', 'root', '');
    }
    //super repetitivo todo, ya sé, abstraerlo sería mejor, pero ya es suficiente
    function getMuebles()
    {
        $req = $this->db->prepare("SELECT * FROM mueble LEFT JOIN categoria ON mueble.id_categoria = categoria.id_categoria");
        $req->execute();

        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    function getMueblesCat($id)
    {
        $req = $this->db->prepare("SELECT * FROM mueble WHERE id_categoria = ?");
        $req->execute(array($id));

        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    function getCategorias()
    {
        $req = $this->db->prepare("SELECT * FROM categoria");
        $req->execute();

        return $req->fetchAll(PDO::FETCH_OBJ);;
    }

    function getMueble($id)
    {
        $req = $this->db->prepare("SELECT * FROM mueble LEFT JOIN categoria ON mueble.id_categoria = categoria.id_categoria WHERE id_mueble = ?");
        $req->execute(array($id));

        return $req->fetch(PDO::FETCH_OBJ);
    }

    function getCategoria($id)
    {
        $req = $this->db->prepare("SELECT * FROM categoria WHERE id_categoria = ?");
        $req->execute(array($id));

        return $req->fetch(PDO::FETCH_OBJ);;
    }

    function addMueble($nombre, $descripcion, $precio, $id_categoria)
    {
        $req = $this->db->prepare("INSERT INTO mueble(nombre, descripcion, precio, id_categoria) VALUES (?, ?, ?, ?)");
        $req->execute(array($nombre, $descripcion, $precio, $id_categoria));
    }

    function addCategoria($nombre, $descripcion)
    {
        $req = $this->db->prepare("INSERT INTO categoria(nombre, descripcion) VALUES (?, ?)");
        $req->execute(array($nombre, $descripcion));
    }

    function updateMueble($id_mueble, $nombre, $descripcion, $precio, $id_categoria)
    {
        $req = $this->db->prepare("UPDATE mueble SET nombre = ?, descripcion = ?, precio = ?, id_categoria=? WHERE id_mueble=?");
        $req->execute(array($id_mueble, $nombre, $descripcion, $precio, $id_categoria));
    }

    function updateCategoria($id_categoria, $nombre, $descripcion)
    {
        $req = $this->db->prepare("UPDATE mueble SET nombre = ?, descripcion = ? WHERE id_categoria = ?");
        $req->execute(array($id_categoria, $nombre, $descripcion));
    }

    function deleteMueble($id_mueble)
    {
        $req = $this->db->prepare("DELETE FROM mueble WHERE id_mueble= ?");
        $req->execute(array($id_mueble));
    }

    function deleteCategoria($id_categoria)
    {
        $req = $this->db->prepare("DELETE FROM categoria WHERE id_categoria = ?");
        $req->execute(array($id_categoria));
    }
}
