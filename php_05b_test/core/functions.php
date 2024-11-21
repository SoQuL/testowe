<?php
function getFromRequest($param_name){
	return isset($_REQUEST [$param_name]) ? $_REQUEST [$param_name] : null;
}
function checkIfLoggedIn() {
    $ctrl = new app\controllers\CheckCtrl();
    $ctrl->generateView();
}