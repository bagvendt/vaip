<?php

error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 'on');

define('VIEWS',       'views');
define('CONTROLLERS', 'controllers');
define('MODELS',      'models');

require_once 'Views.php';
require_once 'Models.php';
require_once 'Controllers.php';
require_once 'Route.php';

function main() {
    session_start();
    $views  = new Views();
    $models = new Models('localhost', 'hallas', '40352246', 'thehallas');
    $route  = new Route($_SERVER['REQUEST_URI']);
    
    require_once CONTROLLERS .'/'. $route->getParam(1) .'.php';
    $controller = eval('return new '. $route->getParam(1) .'($views, $models, $route);');
    
    if(!$route->getParam(2)) {
        $controller->index();
    } else {
        eval('$controller->'. $route->getParam(2) .'();');
    }
    
    $views->render();
}

main();

?>
