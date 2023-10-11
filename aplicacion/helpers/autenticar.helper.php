<?php

class AutenticarHelper {

    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($user) {
        AutenticarHelper::init();
        
        $_SESSION['USER_ID'] = $user->USER_ID;
        $_SESSION['USER_EMAIL'] = $user->USER_EMAIL;
        // var_dump( $_SESSION['USER_ID'],  $_SESSION['USER_EMAIL']);
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