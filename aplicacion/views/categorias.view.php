<?php

class CategoriaSView {
    public function showCategorias($categorias) {
        $count = count($categorias);

        require 'templates/listacategorias.phtml';
    }

    public function showByCategorias($itemCat) {
        $count = count($itemCat);

        require 'templates/ShowByCategoria.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}