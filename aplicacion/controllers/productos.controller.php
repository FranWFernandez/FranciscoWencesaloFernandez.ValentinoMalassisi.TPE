<?php

require_once 'aplicacion/models/productos.model.php';
require_once 'aplicacion/models/marcas.model.php';
require_once 'aplicacion/models/categorias.model.php';
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
        $CategoriasModel = new CategoriasModel();
        $MarcasModel = new MarcasModel();
        $categorias = $CategoriasModel->getCategoriasNames();
        $marcas = $MarcasModel->getMarcasNames();
        $productos = $this->model->getProductos();
        $this->view->showProductos($productos,$categorias,$marcas);
    }

    
    public function addProducto() {
        if (empty($_POST['producto']) || empty($_POST['precio'])|| empty($_POST['talle'])|| empty($_POST['id_categoria'])|| empty($_POST['id_marca'])) {
            $this->view->showError("Debe completar todos los campos");
        }else {
            $producto = $_POST['producto'];
            $precio = $_POST['precio'];
            $talle = $_POST['talle'];
            $id_categorias = $_POST['id_categoria'];
            $id_marcas = $_POST['id_marca'];
            $id = $this->model->insertProducto($producto, $precio, $talle, $id_categorias, $id_marcas);
            if ($id) {
                header('Location: ' . BASE_URL . '/editarproductos');
            } else {
                $this->view->showError("Error al insertar el producto");
            }
        }
    }
    public function updateProducto(){
        if (empty($_POST['id_productoEditar']) ||empty($_POST['productoEditar']) || empty($_POST['precioEditar'])|| empty($_POST['talleEditar'])|| empty($_POST['id_categoriaEditar'])|| empty($_POST['id_marcaEditar'])) {
            $this->view->showError("ERROR EN EDITAR");
        }else {
            $id = $_POST ['id_productoEditar'];
            $producto = $_POST['productoEditar'];
            $precio = $_POST['precioEditar'];
            $talle = $_POST['talleEditar'];
            $id_categorias = $_POST['id_categoriaEditar'];
            $id_marcas = $_POST['id_marcaEditar'];
            
            $this->model->UpdateProducto($id,$producto, $precio, $talle, $id_categorias, $id_marcas);
            
            if ($id) {
                header('Location: ' . BASE_URL . '/editarproductos');
            } else {
                $this->view->showError("Error al editar el producto");
            }
        }

    }

    public function showByCategorias($id_categoria) {
        $producto = $this->model->getByCategoria($id_categoria);
        $this->view->showByCategorias($producto);
    }

    function removeProducto($id) {
        $this->model->deleteProducto($id);
        header('Location: ' . BASE_URL . '/editarproductos');
    }
}