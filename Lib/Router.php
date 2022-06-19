<?php

class Router {

    public $uri = array();
    public $controller;
    public $action;
    public $baseuri;
    public $idxbase = 0;
    public $registry;
    public $db;

    static public function base() {
        $uri = ( isset($_GET['rota']) ) ? explode('/', $_GET['rota']) : array('');
        $baseuri = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') .
                (isset($_SERVER['REMOTE_USER']) ? $_SERVER['REMOTE_USER'] . '@' : '') .
                (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'] .
                        (isset($_SERVER['HTTPS']) && $_SERVER['SERVER_PORT'] === 443 ||
                        $_SERVER['SERVER_PORT'] === 80 ? '' : ':' . $_SERVER['SERVER_PORT']))) .
                substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/'));
        return $baseuri;
    }

    static public function link($url) {
        $uri = ( isset($_GET['rota']) ) ? explode('/', $_GET['rota']) : array('');
        $baseuri = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') .
                (isset($_SERVER['REMOTE_USER']) ? $_SERVER['REMOTE_USER'] . '@' : '') .
                (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'] .
                        (isset($_SERVER['HTTPS']) && $_SERVER['SERVER_PORT'] === 443 ||
                        $_SERVER['SERVER_PORT'] === 80 ? '' : ':' . $_SERVER['SERVER_PORT']))) .
                substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/'));
        return "$baseuri/$url";
    }

    static public function redirect($url = '') {
        if (!headers_sent()) {
            header('Location: ' . $url);
            exit;
        } else {
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . $url . '";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
            echo '</noscript>';
        }
    }

    static public function getUri($key) {
        $uri = ( isset($_GET['rota']) ) ? explode('/', $_GET['rota']) : array('');
        if (array_key_exists($key, $uri)) {
            return $uri[$key];
        } else {
            return false;
        }
    }

    static public function getUriParts() {
        return explode('/', $_GET['rota']);
    }

    static public function controller() {
        $idxbase = 0;
         $uri = ( isset($_GET['rota']) ) ? explode('/', $_GET['rota']) : array('');
        $controller = (!isset($uri[$idxbase]) || $uri[$idxbase] == NULL ) ? 'Index' : $uri[$idxbase];
        return ( is_string($controller) ) ? $controller : 'Index';
    }

    static public function action() {
        $idxbase = 0;
        $action = (
                isset($uri[$idxbase + 1]) && strlen($uri[$idxbase + 1]) != 0 && is_string($uri[$idxbase + 1])
                ) ? $uri[$idxbase + 1] : 'indexAction';
        return $action;
    }

}
