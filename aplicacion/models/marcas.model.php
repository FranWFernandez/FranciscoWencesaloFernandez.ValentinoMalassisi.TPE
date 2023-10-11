<?php

require_once 'aplicacion/models/config.php'; 

class MarcasModel {
    private $db;

    function __construct() {
        //$this->db = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME .";charset=". DB_Charset . DB_USER . DB_PASS);
        $this->db = new PDO('mysql:host=localhost;dbname=db_tpe_web2;charset=utf8mb4', 'root', '');
    }

    function getMarcas() {
        $query = $this->db->prepare('SELECT * FROM marcas');
        $query->execute();

        $marcas = $query->fetchAll(PDO::FETCH_OBJ);

        return $marcas;
    }


    function insertMarca($marca) {
        $query = $this->db->prepare('INSERT INTO marcas (marca) VALUES(?)');
        $query->execute([$marca]);

        return $this->db->lastInsertId();
    }

    
    function deleteMarca($id) {
        $query = $this->db->prepare('DELETE FROM marcas WHERE id = ?');
        $query->execute([$id]);
    }
}