<?php

$routes = require('configs/routes.php');

$method = $_SERVER['REQUEST_METHOD']; // GET ou POST
$methodName = '_'.$method; // _GET ou _POST
$action = $$methodName['action'] ?? '' ; // $$ = voici la variable et puis on donne le nom de la variable qui est lui-même dans une variable = $_GET['action'] ou $_POST['action']
$resource = $$methodName['resource'] ?? '';

// parcourir $routes,
// chaque route est transmise à une fonction permettant de faire des comparaisons pour savoir laquelle correspond à des critères (comparer ce qui est dans $r method avec le contenu de la variable method
// retourne true si 3 bon critères, on garde l'entrée (la $route) correspondante
$route = array_filter($routes, static function($r) use ($method, $action, $resource) {
    return $r['method'] === $method
        && $r['action'] === $action
        && $r['resource'] === $resource;
});

if(!$route) {
    header('Location: index.php');
    exit();
}

return reset($route); // ramène l'array en 1 seule dimension et en extrayant le premier item
