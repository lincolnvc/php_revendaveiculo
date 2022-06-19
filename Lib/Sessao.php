<?php

@session_start();

class Sessao {

    static public function checar() {
        if (!isset($_SESSION['__USUARIO__LOGADO__'])) {
            Router::redirect(Router::base() . "/login/");
        }
    }

    static public function get_id() {
        if (isset($_SESSION['__USUARIO__ID__'])) {
            return $_SESSION['__USUARIO__ID__'];
        }
    }

    static public function get_nivel() {
        if (isset($_SESSION['__USUARIO__NIVEL__'])) {
            return $_SESSION['__USUARIO__NIVEL__'];
        }
    }

    static public function get_nome() {
        if (isset($_SESSION['__USUARIO__NOME__'])) {
            return $_SESSION['__USUARIO__NOME__'];
        }
    }

    static public function get_nome_first() {
        if (isset($_SESSION['__USUARIO__NOME__'])) {
            return explode(' ', $_SESSION['__USUARIO__NOME__'])[0];
        }
    }

}
