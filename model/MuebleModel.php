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
        $sentence = $this->db->prepare("SELECT * FROM mueble");
        $sentence->execute();
        $muebles = $sentence->fetchAll(PDO::FETCH_OBJ);

        return $muebles;
    }

    function getMueble($id)
    {
        $sentence = $this->db->prepare("SELECT * FROM mueble WHERE id_mueble = ?");
        $sentence->execute(array($id));
        $mueble = $sentence->fetchAll(PDO::FETCH_OBJ);

        return $mueble;
    }

    function addMueble($nombre, $descripcion, $precio, $id_categoria)
    {
        $sentence = $this->db->prepare("INSERT INTO mueble(nombre, descripcion, precio, id_categoria) VALUES (?, ?, ?, ?)");
        $sentence->execute(array($nombre, $descripcion, $precio, $id_categoria));
    }

    function updateMueble($id_mueble, $nombre, $descripcion, $precio, $id_categoria)
    {
        $sentence = $this->db->prepare("UPDATE mueble SET nombre = ?, descripcion = ?, precio = ?, id_categoria=? WHERE id_mueble=?");
        $sentence->execute(array($id_mueble, $nombre, $descripcion, $precio, $id_categoria));
    }

    function deleteMueble($id_mueble)
    {
        $sentence = $this->db->prepare("DELETE FROM mueble WHERE id_mueble=?");
        $sentence->execute(array($id_mueble));
    }
}
