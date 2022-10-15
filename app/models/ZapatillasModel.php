<?php
class ZapatillasModel{
    private $db;

    function __construct(){ //estableciendo la conexion con la base de datos
        $this->db = $this->conectarBase();
    }

    private function conectarBase(){
        $db= new PDO('mysql:hot=localhost;'.'dbname=tienda_de_zapatillas;charset=utf8','root','');
        return $db;
    }

    function obtenerTodo(){
        $query=$this->db->prepare('SELECT * FROM zapatillas JOIN categoria_de_zapatillas ON categoria_de_zapatillas.id_CategoriaDeZapatillas=zapatillas.id_CategoriaDeZapatillas_fk');
        $query->execute();
        $zapatillas=$query->fetchAll(PDO::FETCH_OBJ);
        return $zapatillas;
    }

    function obtenerUno($id){
        $query=$this->db->prepare('SELECT * FROM zapatillas JOIN categoria_de_zapatillas ON categoria_de_zapatillas.id_CategoriaDeZapatillas=zapatillas.id_CategoriaDeZapatillas_fk WHERE id_zapatilla=?');
        $query->execute([$id]);
        $zapatilla=$query->fetch(PDO::FETCH_OBJ);
        return $zapatilla;
    }

    function obtenerPorCategoria($id){
        $query=$this->db->prepare('SELECT * FROM zapatillas JOIN categoria_de_zapatillas ON categoria_de_zapatillas.id_CategoriaDeZapatillas=zapatillas.id_CategoriaDeZapatillas_fk WHERE id_CategoriaDeZapatillas_fk=?');
        $query->execute([$id]);
        $zapatillas=$query->fetchAll(PDO::FETCH_OBJ);
        return $zapatillas;
    }

    function agregarZapatilla($nombre,$marca,$precio,$descripcion,$categoria){
        $query=$this->db->prepare('INSERT INTO zapatillas (nombre,marca,precio,descripcion,id_CategoriaDeZapatillas_fk) VALUES (?,?,?,?,?)');
        $query->execute([$nombre,$marca,$precio,$descripcion,$categoria]);
    }

    function agregarZapatillaEditada($nombre,$marca,$precio,$descripcion,$categoria,$id){
        $query=$this->db->prepare('UPDATE zapatillas SET nombre=?,marca=?,precio=?,descripcion=?,id_CategoriaDeZapatillas_fk=? WHERE id_zapatilla=?');
        $query->execute([$nombre,$marca,$precio,$descripcion,$categoria,$id]);
    }

    function eliminarZapatilla($id){
        $query=$this->db->prepare('DELETE FROM zapatillas WHERE id_zapatilla=?');
        $query->execute([$id]);
    }
}