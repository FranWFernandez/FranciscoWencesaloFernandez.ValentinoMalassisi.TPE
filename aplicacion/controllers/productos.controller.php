<?php
require_once 'aplicacion/models/productos.model.php';
require_once 'aplicacion/models/categorias.model.php';
require_once 'aplicacion/models/marcas.model.php';
require_once 'aplicacion/views/productos.view.php';
require_once 'aplicacion/helpers/autenticar.helper.php';

class ProductosController {
    private $model;
    private $modelMarca;
    private $modelCategoria;
    private $view;
    
    public function __construct() {
        AutenticarHelper::verify();

        $this->model = new ProductosModel();
        $this->modelMarca = new MarcasModel();
        $this->modelCategoria = new CategoriasModel();
        $this->view = new ProductosView();
    }

    public function showProductos() {
        $Productos = $this->model->getProductos();
        $this->view->showProductos($Productos);
    }

    /*public function showMarcas() {
        $marcas = $this->modelMarca->getMarcas();
        $this->view->showProductos($marcas);
    }

    public function showCategorias() {
        $categorias = $this->modelCategoria->getCategorias();
        $this->view->showCategorias($categorias);
    }*/

    public function addProducto() {

        $producto = $_POST['producto'];
        $precio = $_POST['precio'];
        $talle = $_POST['talle'];
        $id_categoria = $_POST['id_categoria'];
        $id_marca = $_POST['id_marca'];


        if (empty($producto) || empty($precio)|| empty($talle)|| empty($id_categoria)|| empty($id_marca)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertProducto($producto, $precio, $talle, $id_categoria, $id_marca);
        if ($id) {
            header('Location: ' . BASE_URL . '/listar');
        } else {
            $this->view->showError("Error al insertar el producto");
        }
    }

    function removeProducto($id) {
        $this->model->deleteProducto($id);
        header('Location: ' . BASE_URL . '/listar');
    }
}