<?php

class AutenticarHelper {

    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($user) {
        AutenticarHelper::init();
        $_SESSION['USER_ID'] = $user->id;
        $_SESSION['USER_EMAIL'] = $user->email; 
    }

    public static function logout() {
        AutenticarHelper::init();
        session_destroy();
    }

    public static function verify() {
        AutenticarHelper::init();
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . '/login');
            die();
        }
    }
}