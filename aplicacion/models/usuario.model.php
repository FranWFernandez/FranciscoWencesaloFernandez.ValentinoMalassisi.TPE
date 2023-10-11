<?php

require_once './aplicacion/models/model.php'; 

class UsuarioModel extends DB {
    public function getByEmail($email) {
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE email = ?');
        $query->execute([$email]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}