<?php

class MarcasModel extends DB {

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
        $query = $this->db->prepare('DELETE FROM marcas WHERE id_marca = ?');
        $query->execute([$id]);
    }
}