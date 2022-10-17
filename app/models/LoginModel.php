<?php
class LoginModel{
    private $db;

    function __construct(){ 
        $this->db = $this->conectarBase();
    }

    private function conectarBase(){
        $db= new PDO('mysql:hot=localhost;'.'dbname=tienda_de_zapatillas;charset=utf8','root','');
        return $db;
    }

    function obtenerUsuario($usuario){
        $query=$this->db->prepare('SELECT * FROM usuarios WHERE usuario=?');
        $query->execute([$usuario]);
        $usuarioObtenido=$query->fetch(PDO::FETCH_OBJ);
        return $usuarioObtenido;
    }
}