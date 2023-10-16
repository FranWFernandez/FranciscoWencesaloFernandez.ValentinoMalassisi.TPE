<?php

require_once 'aplicacion/models/categorias.model.php';
require_once 'aplicacion/views/categorias.view.php';
class CategoriasController {
    private $viewCategoria;


    public function __construct() {
        $this->viewCategoria = new CategoriasView();
    }


    public function showCategorias() {
        $CategoriasModel = new CategoriasModel();
        $categorias = $CategoriasModel->getCategoriasNames();
        $this->viewCategoria->showCategorias($categorias);

    }
}

