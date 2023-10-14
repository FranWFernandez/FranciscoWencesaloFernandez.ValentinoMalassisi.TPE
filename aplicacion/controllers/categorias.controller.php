<?php

require_once 'aplicacion/models/categorias.model.php';
class CategoriasController {
    private $modelCategoria;
    private $viewCategoria;


    public function __construct() {
        $this->modelCategoria = new CategoriasModel();
        $this->viewCategoria = new CategoriasView();
    }


    public function showCategorias() {
        $categorias = $this->modelCategoria->getCategoriasNames();
        $this->viewCategoria->showCategorias($categorias);
    }
}

