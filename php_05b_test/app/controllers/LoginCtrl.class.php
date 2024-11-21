<?php

namespace app\controllers;

//zamieniamy zatem 'require' na 'use' wskazując jedynie przestrzeń nazw, w której znajduje się klasa
use app\forms\LoginForm;

class LoginCtrl {

    private $form;

    public function __construct() {
        $this->form = new LoginForm();
    }

    // Pobranie parametrów z formularza
    public function getParamsLogin() {
        $this->form->login = getFromRequest('login');
        $this->form->pass = getFromRequest('pass');
    }

    // Walidacja danych logowania
    public function validateLogin() {
        $this->getParamsLogin();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($this->form->login == "") {
            getMessages()->addError('Nie podano loginu');
        }
        if ($this->form->pass  == "") {
            getMessages()->addError('Nie podano hasła');
        }

        // Jeśli wystąpiły błędy, przerywamy walidację
        if (getMessages()->isError()) {
            return false;
        }

        // Sprawdzenie poprawności loginu i hasła
        $users = [
            'admin' => 'admin',
            'manager' => 'manager',
            'user' => 'user'
        ];

        if (isset($users[$this->form->login]) && $users[$this->form->login] === $this->form->pass) {
            session_start();
            $_SESSION['role'] = $this->form->login;
            return true;
        }
        

        getMessages()->addError('Niepoprawny login lub hasło');
        return false;
        }
        return false;
    }

    // Generowanie widoku formularza logowania
    public function generateView() {
        
        if ($this->validateLogin()) {
            getSmarty()->assign('login_','logout');
            getSmarty()->assign('login2_','Wyloguj');
            getSmarty()->assign('topic','Kalkulator kredytowy');
            getSmarty()->assign('role', $_SESSION['role']);
            
            getSmarty()->display('CalcView.tpl');
            exit();
        }
        getSmarty()->assign('login_','login');
        getSmarty()->assign('login2_','Zaloguj');
        getSmarty()->assign('topic','Zaloguj się');
        getSmarty()->assign('form', $this->form);
        getSmarty()->display('LoginView.tpl');
    }
}
