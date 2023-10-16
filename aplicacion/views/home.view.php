<?php

class HomeView {
    public function showHome($productos,$categorias) {
        require 'templates/home.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}