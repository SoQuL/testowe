<?php
/* Smarty version 5.4.1, created on 2024-11-05 16:22:56
  from 'file:C:\xampp\htdocs\php_04_test/app/calc.php' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_672a38505ee5e2_47710810',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '815d7206656a8296f4e4a218dc4bca19490d2aa7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_04_test/app/calc.php',
      1 => 1730819624,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_672a38505ee5e2_47710810 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\php_04_test\\app';
echo '<?php'; ?>

// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';
//załaduj Smarty
require_once _ROOT_PATH.'/lib/smarty/libs/Smarty.class.php';

include _ROOT_PATH.'/app/security/check.php';

//pobranie parametrów
function getParams(&$form){
	$form['amount'] = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
	$form['period'] = isset($_REQUEST['period']) ? $_REQUEST['period'] : null;
	$form['interest_rate'] = isset($_REQUEST['interest_rate']) ? $_REQUEST['interest_rate'] : null;	
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$form,&$infos,&$msgs,&$hide_intro){
    if(!(isset($form['amount']) && isset($form['period']) && isset($form['interest_rate']))){    
        return false;
    }
    
    $hide_intro = true;
    
    if ( $form['amount'] == "") {
            $msgs [] = 'Nie podano kwoty kredytu';
    }
    if ( $form['period'] == "") {
            $msgs [] = 'Nie podano okresu spłacania kredytu';
    }
    if ( $form['interest_rate'] == "") {
            $msgs [] = 'Nie podano oprocentowania kredytu';
    }

    if (count ( $msgs ) != 0) return false;
    
    if (! (is_numeric($form['amount']) && $form['amount']>0)) {
            $msgs [] = 'Kwota kredytu nie jest liczbą dodatnią';
    }
    
    if (! (is_numeric($form['period']) && $form['period']>0)) {
            $msgs [] = 'Okres spłacania kredytu nie jest liczbą dodatnią';
    }
    
    if (! (is_numeric($form['interest_rate']) && $form['interest_rate']>0)) {
            $msgs [] = 'Oprocentowanie nie jest liczbą dodatnią';       
    }
    
    $infos [] = 'Przekazano parametry.';
    
    if (count ( $msgs ) != 0) return false;
    else return true; 
}
	
// wykonaj obliczenia
function process(&$form,&$infos,&$msgs,&$result){
	global $role;
        
	$form['amount'] = intval($form['amount']);
	$form['period'] = intval($form['period']);
        $form['interest_rate'] = floatval($form['interest_rate']);
        
        if ($form['amount'] > 1000000 && $role !== "manager") {
        $msgs[] = "Obliczenia dla kwoty powyżej 1 000 000 może przetworzyć tylko manager banku";
        $result = null;
        return;
        }
        $infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
        $result = (($form['amount'] * $form['interest_rate'])/ 100 + $form['amount']) / ($form['period'] * 12);
}

//inicjacja zmiennych
$form = null;
$infos = array();
$messages = array();
$result = null;
	
getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
	process($form,$infos,$messages,$result);
}

// 4. Przygotowanie danych dla szablonu

$smarty = new Smarty\Smarty();

$smarty->assign('app_root',_APP_ROOT);
$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Przykład 04');
$smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header','Szablony Smarty');

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc.html');<?php }
}
