<?php

    require_once './aplicacion/models/productos.model.php';
    require_once './aplicacion/models/categorias.model.php';
    require_once './aplicacion/models/marcas.model.php';
    require_once './aplicacion/views/home.view.php';

    class HomeController {
        private $model;
        private $modelcat;
        private $modelmar;
        private $view;
    
        public function __construct() {
            $this->model = new ProductosModel();
            $this->modelcat = new CategoriasModel();
            $this->modelmar = new MarcasModel();
            $this->view = new HomeView();
        }
        public function showHome() {
            $Productos = $this->model->getProductos();
            $ProductosCat = $this->modelcat->getCategoriasNames();
            $ProductosMar = $this->modelmar->getMarcasNames();
            $this->view->showHome($Productos,$ProductosCat);
        }
        public function showItem($id){
            $Item= $this->model->getItem($id);
            $this->view->showItem($Item);
        }
       
    }