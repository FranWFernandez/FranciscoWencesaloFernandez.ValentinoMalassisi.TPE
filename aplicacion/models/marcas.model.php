<?php

require_once './aplicacion/models/model.php';

class MarcasModel extends DB {

    function getMarcasNames() {
        $query = $this->connect()->prepare('SELECT * FROM marcas');
        $query->execute();

        $marcas = $query->fetchAll(PDO::FETCH_OBJ);

        return $marcas;
    }


    // function insertMarca($marca) {
    //     $query = $this->connect()->prepare('INSERT INTO marcas (marca) VALUES(?)');
    //     $query->execute([$marca]);

    //     return $this->connect()->lastInsertId();
    // }

    
    // function deleteMarca($id) {
    //     $query = $this->connect()->prepare('DELETE FROM marcas WHERE id_marca = ?');
    //     $query->execute([$id]);
    // }
}