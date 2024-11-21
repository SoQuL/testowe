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
		
		$ctrl = new app\controllers\CalcCtrl();
		$ctrl->generateView ();
	break;
        case 'calc' :
                checkIfLoggedIn();
		
		$ctrl = new app\controllers\CalcCtrl();
		$ctrl->generateView ();
	break;
	case 'calcCompute' :
                checkIfLoggedIn();
		
		$ctrl = new app\controllers\CalcCtrl();
		$ctrl->process ();
	break;
	case 'inna' :
                checkIfLoggedIn();
                
		$ctrl = new app\controllers\InnaCtrl();
		$ctrl->generateView();
	break;
        case 'login' :
                $ctrl = new app\controllers\LoginCtrl();
                $ctrl->generateView();
	break;
	case 'logout':
                $ctrl = new app\controllers\LogoutCtrl();
                $ctrl->generateView();
        break;

}
