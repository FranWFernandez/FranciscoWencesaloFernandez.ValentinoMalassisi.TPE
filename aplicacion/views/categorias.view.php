<?php

class CategoriaSView {
    public function showCategorias($categorias) {
        $count = count($categorias);

        require 'templates/listacategorias.phtml';
    }

    public function showMenuCategorias($categorias) {
        $count = count($categorias);

        require 'templates/ShowByCategoria.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}