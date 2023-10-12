<?php

class MarcasView {
    public function showMarcas($marcas) {
        $count = count($marcas);

        require 'templates/listaproductos.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}