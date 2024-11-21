<?php
require_once 'init.php';
// Skrypt kontrolera głównego jako jedyny "punkt wejścia" inicjuje aplikację.

// Inicjacja ładuje konfigurację, definiuje funkcje getConf(), getMessages() oraz getSmarty(),
// pozwalające odwołać się z każdego miejsca w systemie do obiektów konfiguracji, messages i smarty.

// Ponadto ładuje skrypt funkcji pomocniczych (functions.php) oraz wczytuje parametr 'action' do zmiennej $action.
// Wystarczy już tylko podjąć decyzję co zrobić na podstawie $action.

// Dodatkowo zmieniono organizację kontrolerów i widoków. Teraz wszystkie są w odpowiednio nazwanych folderach w app

//2. wykonanie akcji
switch ($action) {
	default : // 'calc'
                checkIfLoggedIn();
		
		include_once 'app/controllers/CalcCtrl.class.php';
		// utwórz obiekt i uzyj
		$ctrl = new CalcCtrl ();
		$ctrl->generateView();
	break;
        case 'calc' :
                checkIfLoggedIn();
		
		include_once 'app/controllers/CalcCtrl.class.php';
		// utwórz obiekt i uzyj
		$ctrl = new CalcCtrl ();
		$ctrl->generateView ();
	break;
	case 'calcCompute' :
                checkIfLoggedIn();
		
		include_once 'app/controllers/CalcCtrl.class.php';
		// utwórz obiekt i uzyj
		$ctrl = new CalcCtrl ();
		$ctrl->process ();
	break;
	case 'inna' :
                checkIfLoggedIn();
                
		include_once 'app/controllers/InnaCtrl.class.php';
		// utwórz obiekt i uzyj
		$ctrl = new InnaCtrl ();
		$ctrl->generateView();
	break;
        case 'login' :
                require_once 'app/controllers/LoginCtrl.class.php';

                // utwórz obiekt i użyj
                $ctrl = new LoginCtrl();
                $ctrl->generateView();
	break;
	case 'logout':
                require_once 'app/controllers/LogoutCtrl.class.php';
                $ctrl = new LogoutCtrl();
                $ctrl->generateView();
        break;

}
