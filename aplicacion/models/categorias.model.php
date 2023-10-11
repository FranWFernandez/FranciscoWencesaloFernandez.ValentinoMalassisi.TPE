<?php

require_once 'aplicacion/models/config.php'; 

class CategoriasModel {
    private $db;

    function __construct() {
        $this->db = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME .";charset=". DB_Charset . DB_USER . DB_PASS);
    }

    function getCategorias() {
        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();

        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }


    function insertProducto($categoria) {
        $query = $this->db->prepare('INSERT INTO categorias (categoria) VALUES(?)');
        $query->execute([$categoria]);

        return $this->db->lastInsertId();
    }

    
    function deleteProducto($id) {
        $query = $this->db->prepare('DELETE FROM categorias WHERE id = ?');
        $query->execute([$id]);
    }
}