<?php

namespace app\controllers;

//zamieniamy zatem 'require' na 'use' wskazując jedynie przestrzeń nazw, w której znajduje się klasa
use app\forms\CalcForm;
use app\transfer\CalcResult;


class CalcCtrl {
    
    private $form;   //dane formularza (do obliczeń i dla widoku)
    private $result; //inne dane dla widoku
    private $role;
    
    public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new CalcForm();
		$this->result = new CalcResult();
                $this->role = $this->getUserRole();
    }
    
    private function getUserRole() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        return $_SESSION['role'] ?? '';
    }
    
//pobranie parametrów
    public function getParams(){
            $this->form->amount = getFromRequest('amount');
            $this->form->period = getFromRequest('period');
            $this->form->interest_rate = getFromRequest('interest_rate');	
    }

//walidacja parametrów z przygotowaniem zmiennych dla widoku
    public function validate(){
        if(!(isset($this->form->amount) && isset($this->form->period) && isset($this->form->interest_rate))){    
            return false;
        }

        if ( $this->form->amount == "") {
                getMessages()->addError('Nie podano kwoty kredytu');
        }
        if ( $this->form->period == "") {
                getMessages()->addError('Nie podano okresu spłacania kredytu');
        }
        if ( $this->form->interest_rate == "") {
                getMessages()->addError('Nie podano oprocentowania kredytu');
        }

        if (! getMessages()->isError()) {

        if (! (is_numeric($this->form->amount) && $this->form->amount>0)) {
                getMessages()->addError('Kwota kredytu nie jest liczbą dodatnią');
        }

        if (! (is_numeric($this->form->period) && $this->form->period>0)) {
                getMessages()->addError('Okres spłacania kredytu nie jest liczbą dodatnią');
        }

        if (! (is_numeric($this->form->interest_rate) && $this->form->interest_rate>0)) {
                getMessages()->addError('Oprocentowanie nie jest liczbą dodatnią');       
        }
        }

        return ! getMessages()->isError();
    }
	
    public function process(){            
            $this->getparams();

            if ($this->validate()) {
            $this->form->amount = intval($this->form->amount);
            $this->form->period = intval($this->form->period);
            $this->form->interest_rate = floatval($this->form->interest_rate);

            if ($this->form->amount > 1000000 && $this->role !== 'manager') {
            getMessages()->addError("Obliczenia dla kwoty powyżej 1 000 000 może przetworzyć tylko manager banku");
            getMessages()->isError();
            } else{
            getMessages()->addInfo('Parametry poprawne.');
            $this->result->result = (($this->form->amount * $this->form->interest_rate)/ 100 + $this->form->amount) / ($this->form->period * 12);
            
            getMessages()->addInfo('Wykonano obliczenia.');}
            }

        $this->generateView();
    }

    public function generateView(){

            getSmarty()->assign('login_','logout');
            getSmarty()->assign('login2_','Wyloguj');
            getSmarty()->assign('topic','Kalkulator kredytowy');

            getSmarty()->assign('form',$this->form);
            getSmarty()->assign('res',$this->result);

            getSmarty()->display('CalcView.tpl');
    }
}