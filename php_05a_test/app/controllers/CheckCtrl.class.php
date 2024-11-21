<?php
class CheckCtrl{
    public function generateView(){
        session_start();

        // Pobranie roli użytkownika
        $role = isset($_SESSION['role']) ? $_SESSION['role'] : '';

        if ( empty($role) ){
            include 'app/controllers/LoginCtrl.class.php';
            $ctrl = new LoginCtrl();
            $ctrl->generateView();
            exit();
        }
    }
}