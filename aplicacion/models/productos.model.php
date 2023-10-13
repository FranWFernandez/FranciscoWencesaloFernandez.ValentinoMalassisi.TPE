<?php

require_once './aplicacion/models/model.php';

class ProductosModel extends DB {

    function getProductos() {
        $query = $this->connect()->prepare('SELECT productos.*, marcas.marca , categorias.categoria 
                                            FROM productos 
                                            INNER JOIN marcas ON productos.id_marca = marcas.id_marca 
                                            INNER JOIN categorias ON productos.id_categoria = categorias.id_categoria');     

        $query->execute();
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }
    public function getItem ($id){
        $query= $this->connect()->prepare('SELECT * productos where id=?');
        $query->execute([$id]);
        $productos = $query->fetch(PDO::FETCH_OBJ);
        return $productos;
    }

    function insertProducto($producto, $precio, $talle, $id_categorias, $id_marcas) {
        $query = $this->connect()->prepare('INSERT INTO `productos` (`Producto`, `Precio`, `Talle`, `id_categoria`, `id_marca`) VALUES(?,?,?,?,?)');
        $query->execute([$producto, $precio, $talle, $id_categorias, $id_marcas]);
        return $this->connect()->lastInsertId();
    }

    
    function deleteProducto($id) {
        $query = $this->connect()->prepare('DELETE FROM productos WHERE id_producto = ?');
        $query->execute([$id]);
    }
}