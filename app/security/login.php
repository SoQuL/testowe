<?php
require_once dirname(__FILE__).'/../../config.php';
require_once _ROOT_PATH.'/lib/smarty/libs/Smarty.class.php';

//pobranie parametrów
function getParamsLogin(&$form){
	$form['login'] = isset ($_REQUEST ['login']) ? $_REQUEST ['login'] : null;
	$form['pass'] = isset ($_REQUEST ['pass']) ? $_REQUEST ['pass'] : null;
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validateLogin(&$form,&$msgs){
	// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($form['login']) && isset($form['pass']))) {
		//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $form['login'] == "") {
		$msgs [] = 'Nie podano loginu';
	}
	if ( $form['pass'] == "") {
		$msgs [] = 'Nie podano hasła';
	}

	//nie ma sensu walidować dalej, gdy brak parametrów
	if (count ( $msgs ) > 0) return false;

	// sprawdzenie, czy dane logowania są poprawne
	// - takie informacje najczęściej przechowuje się w bazie danych
	//   jednak na potrzeby przykładu sprawdzamy bezpośrednio
	if ($form['login'] == "admin" && $form['pass'] == "admin") {
		session_start();
		$_SESSION['role'] = 'admin';
		return true;
	}
        if ($form['login'] == "manager" && $form['pass'] == "manager") {
		session_start();
		$_SESSION['role'] = 'manager';
		return true;
	}
	if ($form['login'] == "user" && $form['pass'] == "user") {
		session_start();
		$_SESSION['role'] = 'user';
		return true;
	}
	
	$msgs [] = 'Niepoprawny login lub hasło';
	return false; 
}

//inicjacja potrzebnych zmiennych
$form = array();
$messages = array();

// pobierz parametry i podejmij akcję
getParamsLogin($form);


$smarty = new Smarty\Smarty();

$smarty->assign('login2_','Zaloguj');
$smarty->assign('app_root', _APP_ROOT);
$smarty->assign('app_url', _APP_URL);
$smarty->assign('root_path', _ROOT_PATH);
$smarty->assign('login_','login.php');
$smarty->assign('topic','Zaloguj się');
$smarty->assign('form', $form);

// Walidacja i przypisanie wiadomości po walidacji
if (!validateLogin($form, $messages)) {
    // Przypisanie tablicy wiadomości po walidacji, aby zawierała komunikaty o błędach
    $smarty->assign('messages', $messages);

    // jeśli błąd logowania to wyświetl formularz z tekstami z $messages
    $smarty->display(_ROOT_PATH . '/app/security/login.html');
} else {
    // jeśli logowanie się powiodło, wyświetl inną stronę
    $smarty->assign('topic','Kalkulator kredytowy');
    $smarty->assign('login2_','Wyloguj');
    $smarty->display(_ROOT_PATH . '/app/calc.html');
}