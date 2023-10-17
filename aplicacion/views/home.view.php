<?php

class HomeView {
    public function showHome($productos,$categorias) {
        require 'templates/home.phtml';
    }
    public function showItem($Item){
        require './templates/comprar.producto.phtml';
    }
    public function showError($error) {
        require 'templates/error.phtml';
    }
}