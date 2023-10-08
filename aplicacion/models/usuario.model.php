<?php

class UsuarioModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host='.DB_HOST . ';dbname='. DB_NAME .';charset=' . DB_Charset .',' . DB_USER . ','. DB_PASS);
        /*
        $this->db = new PDO('mysql:host=localhost;dbname=db_tpe_web2;charset=utf8', 'root', '');
        */
    }

    public function getByEmail($email) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE email = ?');
        $query->execute([$email]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}