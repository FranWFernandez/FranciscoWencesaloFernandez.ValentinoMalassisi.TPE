<?php
require_once 'aplicacion/models/config.php';

class ProductosModel {
    private $db;

    function __construct() {
        $this->db = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME .";charset=". DB_Charset . DB_USER . DB_PASS);
        /*
        $this->db = new PDO('mysql:host=localhost;dbname=db_tpe_web2;charset=utf8mb4', 'root', '');
        */
    }

    function getProductos() {
        $query = $this->db->prepare('SELECT productos.*, id_categoria FROM productos 
                                    INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria
                                    , id_marca FROM productos INNER JOIN marcas ON productos.id_marca = marcas.id_marca');


        /*SELECT CategoryName, ProductName
            FROM Categories INNER JOIN Products
            ON Categories.CategoryID = Products.CategoryID;
            */
        $query->execute();
        
        $productos = $query->fetchAll(PDO::FETCH_OBJ);

        return $productos;
    }


    function insertProducto($producto, $precio, $talle, $id_categoria, $id_marca) {
        $query = $this->db->prepare('INSERT INTO productos (producto, precio, talle, id_categoria, id_marca) VALUES(?,?,?,?,?)');
        $query->execute([$producto, $precio, $talle, $id_categoria, $id_marca]);

        return $this->db->lastInsertId();
    }

    
    function deleteProducto($id) {
        $query = $this->db->prepare('DELETE FROM productos WHERE id = ?');
        $query->execute([$id]);
    }
}