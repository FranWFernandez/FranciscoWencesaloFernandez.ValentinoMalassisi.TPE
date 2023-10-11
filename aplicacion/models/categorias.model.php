<?php

require_once './aplicacion/models/model.php';

class CategoriasModel extends DB {
    function getCategorias() {
        $query = $this->connect()->prepare('SELECT * FROM categorias');
        $query->execute();

        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }


    function insertProducto($categoria) {
        $query = $this->connect()->prepare('INSERT INTO categorias (categoria) VALUES(?)');
        $query->execute([$categoria]);

        return $this->connect()->lastInsertId();
    }

    
    function deleteProducto($id) {
        $query = $this->connect()->prepare('DELETE FROM categorias WHERE id_categoria = ?');
        $query->execute([$id]);
    }
}