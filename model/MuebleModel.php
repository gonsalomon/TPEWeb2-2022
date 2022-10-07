<?php
class MuebleModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_mueble;charset=utf8', 'root', '');
    }

    function getMuebles()
    {
        $sentence = $this->db->prepare("SELECT * FROM mueble LEFT JOIN categoria ON mueble.id_categoria = categoria.id_categoria");
        $sentence->execute();
        $muebles = $sentence->fetchAll(PDO::FETCH_OBJ);

        return $muebles;
    }

    function getCategorias()
    {
        $sentence = $this->db->prepare("SELECT * FROM categoria");
        $sentence->execute();
        $categorias = $sentence->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }

    function getMueble($id)
    {
        $sentence = $this->db->prepare("SELECT * FROM mueble WHERE id_mueble = ?");
        $sentence->execute(array($id));
        $mueble = $sentence->fetchAll(PDO::FETCH_OBJ);

        return $mueble;
    }

    function getCategoria($id)
    {
        $sentence = $this->db->prepare("SELECT * FROM categoria WHERE id_categoria = ?");
        $sentence->execute(array($id));
        $categoria = $sentence->fetch(PDO::FETCH_OBJ);

        return $categoria;
    }

    function addMueble($nombre, $descripcion, $precio, $id_categoria)
    {
        $sentence = $this->db->prepare("INSERT INTO mueble(nombre, descripcion, precio, id_categoria) VALUES (?, ?, ?, ?)");
        $sentence->execute(array($nombre, $descripcion, $precio, $id_categoria));
    }

    function addCategoria($nombre, $descripcion)
    {
        $sentence = $this->db->prepare("INSERT INTO categoria(nombre, descripcion) VALUES (?, ?)");
        $sentence->execute(array($nombre, $descripcion));
    }

    function updateMueble($id_mueble, $nombre, $descripcion, $precio, $id_categoria)
    {
        $sentence = $this->db->prepare("UPDATE mueble SET nombre = ?, descripcion = ?, precio = ?, id_categoria=? WHERE id_mueble=?");
        $sentence->execute(array($id_mueble, $nombre, $descripcion, $precio, $id_categoria));
    }

    function updateCategoria($id_categoria, $nombre, $descripcion)
    {
        $sentence = $this->db->prepare("UPDATE mueble SET nombre = ?, descripcion = ? WHERE id_categoria = ?");
        $sentence->execute(array($id_categoria, $nombre, $descripcion));
    }

    function deleteMueble($id_mueble)
    {
        $sentence = $this->db->prepare("DELETE FROM mueble WHERE id_mueble= ?");
        $sentence->execute(array($id_mueble));
    }

    function deleteCategoria($id_categoria)
    {
        $sentence = $this->db->prepare("DELETE FROM categoria WHERE id_categoria = ?");
        $sentence->execute(array($id_categoria));
    }
}
