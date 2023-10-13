<?php

class ProductosView {
    public function showProductos($productos,$categorias,$marcas) {
        
        $count = count($productos);       

        require 'templates/listaproductos.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}