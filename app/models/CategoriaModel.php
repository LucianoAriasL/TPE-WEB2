<?php
class CategoriaModel{
    private $db;

    function __construct(){
        $this->db=$this->conectarBase();
    }

    private function conectarBase(){
        $db=new PDO('mysql:host=localhost;'.'dbname=tienda_de_zapatillas;charset=utf8','root','');
        return $db;
    }

    function obtenerTodo(){
        $query=$this->db->prepare('SELECT * FROM categoria_de_zapatillas');
        $query->execute();
        $categorias=$query->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
    }

    function obtenerUno($id){
        $query=$this->db->prepare('SELECT * FROM categoria_de_zapatillas WHERE id_CategoriaDeZapatillas=?');
        $query->execute([$id]);
        $categoria=$query->fetch(PDO::FETCH_OBJ);
        return $categoria;
    }

    function agregarCategoria($categoria){
        $query=$this->db->prepare('INSERT INTO categoria_de_zapatillas (categoria) VALUES (?)');
        $query->execute([$categoria]);
    }

    function eliminarCategoria($id){
        $query=$this->db->prepare('DELETE FROM categoria_de_zapatillas WHERE id_CategoriaDeZapatillas=?');
        $query->execute([$id]);
    }

    function finalizarEditadoCategoria($categoria,$id){
        $query=$this->db->prepare('UPDATE categoria_de_zapatillas SET categoria=? WHERE id_CategoriaDeZapatillas=?');
        $query->execute([$categoria,$id]);
    }
}