<?php

    require_once './aplicacion/models/home.model.php';
    require_once './aplicacion/views/home.view.php';

    class HomeController {
        private $model;
        private $view;
    
        public function __construct() {
            $this->model = new HomeModel();
            $this->view = new HomeView();
        }
        public function showHome() {
            $Productos = $this->model->getProductos();
            $this->view->showHome($Productos);
        }

    }