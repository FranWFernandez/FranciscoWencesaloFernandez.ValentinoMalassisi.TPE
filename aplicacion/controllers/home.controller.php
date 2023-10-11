<?php

    require_once './aplicacion/models/productos.model.php';
    require_once './aplicacion/views/home.view.php';

    class HomeController {
        private $model;
        private $view;
    
        public function __construct() {
            $this->model = new ProductosModel();
            $this->view = new HomeView();
        }
        public function showHome() {
            $Productos = $this->model->getProductos();
            $this->view->showHome($Productos);
        }

    }