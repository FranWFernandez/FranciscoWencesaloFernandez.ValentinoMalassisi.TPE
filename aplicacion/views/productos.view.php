<?php

class ProductosView {
    public function showProductos($productos) {
        $count = count($productos);

        require 'templates/listaproductos.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}