<?php
session_start();
require_once 'autoload.php';
require_once 'config/DataBase.php';
require_once 'config/parameters.php';
require_once 'views/layout/header.php';



function Error() {
	$error = new errorController();
	$error ->index();
}

if(isset($_GET['controller'])){
	
	$nombreControlador = $_GET['controller'].'Controller';	
	
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
	
	$nombreControlador = CONTROLLER_DEFAULT;	
	
} else {
	Error();
	exit();
}
if(isset($nombreControlador)&& class_exists($nombreControlador)){	
	
	$controlador = new $nombreControlador();
	
	if(isset($_GET['action'])&& method_exists($controlador, $_GET['action'])){
		$action = $_GET['action'];
		$controlador ->$action();

	}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
		
		$action_defaul = ACTION_DEFAULT;
		$controlador ->$action_defaul();
		
	}elseif(isset($_GET['controller'])){
		$action_defaul = ACTION_DEFAULT;
		$controlador ->$action_defaul();
	}else {
		Error();
	}
	
} else {
	Error();
}

require_once 'views/layout/footer.php';