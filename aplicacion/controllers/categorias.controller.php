<?php

require_once 'aplicacion/models/categorias.model.php';
require_once 'aplicacion/views/categorias.view.php';
require_once 'aplicacion/controllers/autenticar.controller.php';
class CategoriasController {
    private $viewCategoria;
    private $modelCategoria;


    public function __construct() {
        AutenticarHelper::verify();
        $this->viewCategoria = new CategoriasView();
        $this->modelCategoria = new CategoriasModel();
    }


    public function showCategorias() {
        $categorias = $this->modelCategoria->getCategoriasNames();
        $this->viewCategoria->showCategorias($categorias);

    }
    public function showByCategorias() {
        $categorias = $this->modelCategoria->getCategoriasNames();
        $this->viewCategoria->showByCategorias($categorias);

    }
    public function addCategoria() {
        if ( empty($_POST['categoriaAdd'])) {
            $this->viewCategoria->showError("Debe completar todos los campos");
        }else {
            $categoriaAdd = $_POST['categoriaAdd'];
            $id = $this->modelCategoria->insertCategoria($categoriaAdd);
            if ($id) {
                header('Location: ' . BASE_URL . '/editarcategorias');
            } else {
                $this->viewCategoria->showError("Error al insertar el categoria");
            }
        }
    }
    public function updateCategoria(){
        if (empty($_POST['id_categoriaEditar']) ||empty($_POST['categoriaEditar']) ) {
            $this->viewCategoria->showError("ERROR EN EDITAR");
        }else {
            $categoriaID = $_POST['id_categoriaEditar'];
            $categoriaEditar = $_POST['categoriaEditar'];
            
            $this->modelCategoria->updateCategoria($categoriaID, $categoriaEditar);
            
            if ($categoriaID) {
                header('Location: ' . BASE_URL . '/editarcategorias');
            } else {
                $this->viewCategoria->showError("Error al insertar el categoria");
            }
        }

    }

    function removeCategoria($id) {
        $this->modelCategoria->DeleteCategoria($id);
        header('Location: ' . BASE_URL . '/editarcategorias');
    }
}

