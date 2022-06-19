<?php
error_reporting(E_ALL);
require 'Lib/RouterController.php';
$r = new RouterController;
$controller = $r->controller();
$action = $r->action();


$controller = new $controller;
( method_exists($controller, $action) ) ? $controller->$action() : $controller->indexAction();

function __autoload($className) {
    $r = new RouterController;
    //procura primeiro na raiz da app
    $classpath = array('Lib', 'helpers', 'Model', 'Controller');
    $classFile = $className . ".php";
    $loaded = false;
    foreach ($classpath as $path) {
        $mod_path = __DIR__ . "/$path" . "/$classFile";
        if (is_readable("$mod_path")) {
            require "$mod_path";
            $loaded = true;
            break;
            //return false;
        }
        if (is_readable("$path$classFile")) {
            require "$path$classFile";
            $loaded = true;
            break;
            //return false;
        }
    }        
    $reserved = array('finfo');
    if ($loaded == false && !in_array("$className", $reserved)) {
        $baseurl = $r->base();
        //@Router::redirect("$baseurl/404.php?return=$baseurl");
        exit;
    }
}