<?php

session_start();

require_once "../core/Controller.php";
require_once "../core/Model.php";

$controller = $_GET['controller'] ?? 'auth';
$action = $_GET['action'] ?? 'login';

$controllerName = ucfirst($controller) .'Controller';

require_once "../app/controllers/$controllerName.php";

$controllerObject = new $controllerName();

if(!method_exists($controllerObject, $action)) {
    die("Método não encontrado");
}

$controllerObject->$action();