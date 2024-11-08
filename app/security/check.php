<?php
require_once dirname(__FILE__).'/../../config.php';
require_once _ROOT_PATH.'/lib/smarty/libs/Smarty.class.php';
//inicjacja mechanizmu sesji
session_start();

//pobranie roli
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';

//jeśli brak parametru (niezalogowanie) to idź na stronę logowania
if ( empty($role) ){
	include _ROOT_PATH.'/app/security/login.php';
	//zatrzymaj dalsze przetwarzanie skryptów
	exit();
}
//jeśli ok to idź dalej