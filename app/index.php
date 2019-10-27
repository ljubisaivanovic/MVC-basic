<?php

error_reporting(-1);
ini_set('display_errors', 'On');

// user/login
// http://localhost/index.php?p=user/login

require_once('core/Model.php');
require_once('core/Controller.php');
require_once('core/Database.php');

session_start();

define("DB_HOST", "localhost");
define("DB_NAME", "mvc");
define("DB_USER", "root");
define("DB_PASS", "root");

if (isset($_GET['p'])) {
    $action = $_GET['p'];

    if (strpos($action, '/') != false) {
        $action = explode('/', $action);

        $controller = $action[0];
        $method = $action[1];
    } else {
        $controller = $action;
        $method = 'index';
    }

} else {
    $controller = 'home';
    $method = 'index';
}

$controller = ucfirst($controller) . 'Controller';

$path = 'controllers/' . $controller . '.php';

if (file_exists($path)) {
    require_once($path);

    $controller = new $controller;
    if (method_exists($controller, $method)) {
        $controller->$method();
    } else {
        echo "File not found!";
    }
} else {
    echo "File not found!";
}