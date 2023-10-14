<?php

class MarcaCategoriaView {
    public function showMarcaCategoria($Marcas) {
        $count = count($Marcas);

        require './templates/agregar.producto.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}