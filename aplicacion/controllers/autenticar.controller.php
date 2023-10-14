<?php
require_once 'aplicacion/views/autenticar.view.php';
require_once 'aplicacion/models/usuario.model.php';
require_once 'aplicacion/helpers/autenticar.helper.php';

class AutenticarController {
    private $view;
    private $model;

    function __construct() {
        $this->model = new UsuarioModel();
        $this->view = new AutenticarView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function autenticar() {
        $email = $_POST['email'];
        $password = $_POST['password'];
      

        if (empty($email) || empty($password)) {
            $this->view->showLogin('Faltan completar datos');
            die();
        }

        $user = $this->model->getByEmail($email);
        if ($user && password_verify($password, $user->PASSWORD)) {
           
            AutenticarHelper::login($user);
            
           header('Location: ' . BASE_URL . '/editarproductos');
            
        } else {
            $this->view->showLogin('Usuario inválido');
        }
    }

    public function logout() {
        AutenticarHelper::logout();
        header('Location: ' . BASE_URL);    
    }
}