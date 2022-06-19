<?php

class RouterController {

    public $uri = array();
    public $controller;
    public $action;
    public $baseuri;
    public $idxbase = 0;
    public $registry;
    public $db;

    public function __construct() {
        $this->uri = ( isset($_GET['rota']) ) ? explode('/', $_GET['rota']) : array('');
        $this->base();
    }

    public function base() {
        $uri = ( isset($_GET['rota']) ) ? explode('/', $_GET['rota']) : array('');
        $baseuri = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') .
                (isset($_SERVER['REMOTE_USER']) ? $_SERVER['REMOTE_USER'] . '@' : '') .
                (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'] .
                        (isset($_SERVER['HTTPS']) && $_SERVER['SERVER_PORT'] === 443 ||
                        $_SERVER['SERVER_PORT'] === 80 ? '' : ':' . $_SERVER['SERVER_PORT']))) .
                substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/'));
        return $baseuri;
    }

    public function link($url) {
        $uri = ( isset($_GET['rota']) ) ? explode('/', $_GET['rota']) : array('');
        $baseuri = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') .
                (isset($_SERVER['REMOTE_USER']) ? $_SERVER['REMOTE_USER'] . '@' : '') .
                (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'] .
                        (isset($_SERVER['HTTPS']) && $_SERVER['SERVER_PORT'] === 443 ||
                        $_SERVER['SERVER_PORT'] === 80 ? '' : ':' . $_SERVER['SERVER_PORT']))) .
                substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/'));
        return "$baseuri/$url";
    }

    public function redirect($url = '') {
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

    public function getUri($key) {
        $this->uri = ( isset($_GET['rota']) ) ? explode('/', $_GET['rota']) : array('');
        if (array_key_exists($key, $this->uri)) {
            return $this->uri[$key];
        } else {
            return false;
        }
    }

    public function getUriParts() {
        return explode('/', $_GET['rota']);
    }

    public function controller() {
        $this->controller = (!isset($this->uri[$this->idxbase]) || $this->uri[$this->idxbase] == NULL ) ? 'Index' : $this->uri[$this->idxbase];
        return ( is_string($this->controller) ) ? $this->controller : 'Index';
    }

    public function action() {
        $this->action = (
                isset($this->uri[$this->idxbase + 1]) && strlen($this->uri[$this->idxbase + 1]) != 0 && is_string($this->uri[$this->idxbase + 1])
                ) ? $this->uri[$this->idxbase + 1] : 'indexAction';
        return $this->action;
    }

}
