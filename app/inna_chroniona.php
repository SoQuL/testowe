<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';
//załaduj Smarty
require_once _ROOT_PATH.'/lib/smarty/libs/Smarty.class.php';

include _ROOT_PATH.'/app/security/check.php';

// 4. Przygotowanie danych dla szablonu

$smarty = new Smarty\Smarty();

$smarty->assign('app_root',_APP_ROOT);
$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('login_','logout.php');
$smarty->assign('login2_','Wyloguj');
$smarty->assign('topic','Informacje');

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/inna_chroniona.html');