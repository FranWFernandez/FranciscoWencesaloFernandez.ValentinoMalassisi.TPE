<?php
class ProductosModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_tpe_web2;charset=utf8', 'root', '');
    }

    function getProductos() {
        $query = $this->db->prepare('SELECT * FROM productos');
        $query->execute();

        $productos = $query->fetchAll(PDO::FETCH_OBJ);

        return $productos;
    }


    function insertProducto($producto, $precio, $talle) {
        $query = $this->db->prepare('INSERT INTO productos (producto, precio, talle) VALUES(?,?,?)');
        $query->execute([$producto, $precio, $talle]);

        return $this->db->lastInsertId();
    }

    
    function deleteProducto($id) {
        $query = $this->db->prepare('DELETE FROM productos WHERE id = ?');
        $query->execute([$id]);
    }
}