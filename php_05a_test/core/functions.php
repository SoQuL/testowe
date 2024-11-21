<?php
function getFromRequest($param_name){
	return isset($_REQUEST [$param_name]) ? $_REQUEST [$param_name] : null;
}
function checkIfLoggedIn() {
    include_once 'app/controllers/CheckCtrl.class.php';
    $ctrl = new CheckCtrl();
    $ctrl->generateView();
}