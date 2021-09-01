<?php

session_start();

$start = microtime(true);

require('./vendor/autoload.php');
require 'configs/config.php';
$route = require('utils/router.php');

$controllerName = 'Controllers\\'.$route['controller']; // = \Controllers\Dashboard par ex
$controller = new $controllerName;
$data = call_user_func([$controller ,$route['callback']]);
//$data = call_user_func_array($controller ,$route['callback']);
//var_dump($data);
extract($data, EXTR_OVERWRITE); // = $data = dashboard($pdo);
//var_dump(extract($data, EXTR_OVERWRITE));die();
var_dump($view);
require($view);

$_SESSION['errors'] = [];
$_SESSION['old'] = []; // ancienne données

$end = microtime(true);
$renderTime = ($end - $start) * 1000;
printf('Rendu de la page en %.6f milisecondes', $renderTime); //6 décimales
