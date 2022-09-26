<?php
class CategoriaModel
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_mueble;charset=utf8', 'root', '');
    }

    function getCategorias()
    {
        $sentence = $this->db->prepare("SELECT * FROM categoria");
        $sentence->execute();
        $categorias = $sentence->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }

    function getCategoria($id)
    {
        $sentence = $this->db->prepare("SELECT * FROM categoria WHERE id__categoria = ?");
        $sentence->execute(array($id));
        $categoria = $sentence->fetchAll(PDO::FETCH_OBJ);

        return $categoria;
    }

    function addCategoria($nombre, $descripcion)
    {
        $sentence = $this->db->prepare("INSERT INTO categoria(nombre, descripcion) VALUES (?, ?)");
        $sentence->execute(array($nombre, $descripcion));
    }

    function updateCategoria($id_categoria, $nombre, $descripcion)
    {
        $sentence = $this->db->prepare("UPDATE mueble SET nombre = ?, descripcion = ? WHERE id_categoria = ?");
        $sentence->execute(array($id_categoria, $nombre, $descripcion));
    }

    function deleteCategoria($id_categoria)
    {
        $sentence = $this->db->prepare("DELETE FROM categoria WHERE id_categoria = ?");
        $sentence->execute(array($id_categoria));
    }
}
