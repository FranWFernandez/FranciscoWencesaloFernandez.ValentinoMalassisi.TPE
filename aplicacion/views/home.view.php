<?php

class HomeView {
    public function showHome($productos) {
        count($productos);
        require './templates/home.phtml';
    }

    public function showError($error) {
        require './templates/error.phtml';
    }
}