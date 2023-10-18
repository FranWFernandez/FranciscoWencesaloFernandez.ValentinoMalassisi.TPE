<?php

require_once './aplicacion/models/model.php';

class CategoriasModel extends DB {
    function getCategoriasNames() {
        $query = $this->connect()->prepare('SELECT * FROM categorias');
        $query->execute();

        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }
    

    function insertCategoria($categoria) {
        $query = $this->connect()->prepare('INSERT INTO `categorias` (`categoria`) VALUES(?)');
        $query->execute([$categoria]);
        return $this->connect()->lastInsertId();
    }
    function updateCategoria($id_categoria,$categoria) {
        $query = $this->connect()->prepare('UPDATE categorias SET categoria=? WHERE id_categoria=?');
        $query->execute([$categoria, $id_categoria]);
    }

    
    function deleteCategoria($id) {
        $query = $this->connect()->prepare('DELETE FROM categorias WHERE id_categoria = ?');
        $query->execute([$id]);
    }
}