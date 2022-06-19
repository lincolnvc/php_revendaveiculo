<?php

@session_start();

Class Login {

    public function __construct() {
        
    }

    public function indexAction() {
        $dados = array(
            'agencia' => (new ModelAgencia)->getById()
        );
        Tpl::View("adm/home/login", $dados);
    }

    public function entrar() {
        $this->usuario_login = addslashes($_POST['usuario_login']);
        $this->usuario_senha = md5($_POST['usuario_senha']);
        $sql = "SELECT * FROM usuario WHERE usuario_login = '$this->usuario_login' AND usuario_senha = '$this->usuario_senha';";
        $db = new DB;
        $dados = $db->fetchAll($sql);
        if (isset($dados[0])) {
            $_SESSION['__USUARIO__LOGADO__'] = TRUE;
            $_SESSION['__USUARIO__NIVEL__'] = 4;
            $_SESSION['__USUARIO__ID__'] = $dados[0]->usuario_id;
            Router::redirect(Router::base() . "/admin/");
        } else {
            Router::redirect(Router::base() . "/login/?login-incorreto");
        }
    }

    public function logout() {
        if (isset($_SESSION['__USUARIO__LOGADO__'])) {
            unset($_SESSION['__USUARIO__LOGADO__']);
            @session_destroy();
        }
        Router::redirect(Router::base() . "/admin/");
    }

    public function logout_site() {
        if (isset($_SESSION['__USUARIO__LOGADO__'])) {
            unset($_SESSION['__USUARIO__LOGADO__']);
            @session_destroy();
        }
        Router::redirect(Router::base() . "/");
    }

}
