<?php

// Démarrage de la session
session_start();
$_SESSION['user_id']=1;

use App\Autoloader;
use App\Controllers\MainController;

// Constante contenant le chemin vers index.php
define('ROOT', __DIR__);

require_once ROOT.'/Autoloader.php';
Autoloader::register();


// Séparation des paramètres
$params = explode('/', $_GET['p']);

// Paramètre existe ?
if ($params[0] != '') {

    $controller = '\\App\\Controllers\\'.ucfirst($params[0]).'Controller'; // variable portant le nom du controller à instancier
    
    if (!class_exists($controller, Autoload::class)) {
        http_response_code(404);
        echo 'La page demandée n’existe pas';
        exit;
    }

    $controller = new $controller;
    
    $action = isset($params[1]) ? $params[1] : 'index'; // Si pas de second paramètre, index

    if (method_exists($controller, $action)) { // vérifie si la méthode existe dans la classe
        unset($params[0]);
        unset($params[1]);
        call_user_func_array([$controller, $action], $params); // appel la méthode $action de la classe $controller en lui passant en paramètres $params
        // $controller->$action();
    } else {
        http_response_code(404);
        echo 'La page demandée n’existe pas';
    }

} else {

    $ct = new MainController;
    $ct->index();
}