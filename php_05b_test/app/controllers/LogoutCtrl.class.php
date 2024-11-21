<?php

namespace app\controllers;

class LogoutCtrl {
    public function generateView() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        session_destroy();

        header("Location: index.php?action=login");
        exit();
    }
}