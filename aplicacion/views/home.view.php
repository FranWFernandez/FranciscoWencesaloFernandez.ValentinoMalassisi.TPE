<?php

class HomeView {
    public function showHome($productos, $ProductosCat , $ProductosMar) {
        require 'templates/home.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}