<?php
require_once 'aplicacion/controllers/productos.controller.php';
require_once 'aplicacion/controllers/autenticar.controller.php';
require_once 'aplicacion/controllers/home.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}


//mostrar        ->     homeController->showHome();
// listar        ->     productosController->showProductos();
// agregar       ->     productosController->addProducto();
// eliminar/:ID  ->     productosController->removeProducto($id); 
// login         ->     AutenticarController->showLogin();
// autenticar    ->     AutenticarController->autenticar();
// logout        ->     AutenticarController->logout();


$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new homeController();
        $controller->showHome();
        break;
    case 'listar':
        $controller = new productosController();
        $controller->showProductos();
        break;
    case 'agregar':
        $controller = new productosController();
        $controller->addProducto();
        break;
    case 'eliminar':
        $controller = new productosController();
        $controller->removeProducto($params[1]);
        break;
    case 'login':
        $controller = new AutenticarController();
        $controller->showLogin(); 
        break;
    case 'autenticar':
        $controller = new AutenticarController();
        $controller->autenticar();
        break;
    case 'logout':
        $controller = new AutenticarController();
        $controller->logout();
        break;
    default: 
        echo "404 Page Not Found";
        break;
}