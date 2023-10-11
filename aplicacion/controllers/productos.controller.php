<?php
require_once 'aplicacion/models/productos.model.php';
require_once 'aplicacion/views/productos.view.php';
require_once 'aplicacion/helpers/autenticar.helper.php';

class ProductosController {
    private $model;
    private $view;
    
    public function __construct() {
        AutenticarHelper::verify();

        $this->model = new ProductosModel();
        $this->view = new ProductosView();
    }

    public function showProductos() {
        $Productos = $this->model->getProductos();
        $this->view->showProductos($Productos);
    }

    public function addProducto() {

        $producto = $_POST['producto'];
        $precio = $_POST['precio'];
        $talle = $_POST['talle'];
        $id_categoria = $_POST['categoria'];
        $id_marca = $_POST['marca'];


        if (empty($producto) || empty($precio)|| empty($talle)|| empty($id_categoria)|| empty($id_marca)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertProducto($producto, $precio, $talle, $id_categoria, $id_marca);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar el producto");
        }
    }

    function removeProducto($id) {
        $this->model->deleteProducto($id);
        header('Location: ' . BASE_URL);
    }
}