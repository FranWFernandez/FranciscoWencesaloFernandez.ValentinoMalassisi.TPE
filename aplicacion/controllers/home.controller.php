<?php

    require_once './aplicacion/models/productos.model.php';
    // require_once './aplicacion/models/categorias.model.php';
    // require_once './aplicacion/models/marcas.model.php';
    require_once './aplicacion/views/home.view.php';

    class HomeController {
        private $model;
        // private $modelcat;
        // private $modelmar;
        private $view;
    
        public function __construct() {
            $this->model = new ProductosModel();
            // $this->modelcat = new CategoriasModel();
            // $this->modelmar = new MarcasModel();
            $this->view = new HomeView();
        }
        public function showHome() {
            $Productos = $this->model->getProductos();
            // $ProductosCat = $this->modelcat->getCategorias();
            // $ProductosMar = $this->modelmar->getMarcas();
            $this->view->showHome($Productos);
        }

    }