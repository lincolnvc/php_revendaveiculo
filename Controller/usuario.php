<?php

@session_start();

Class Usuario extends ModelUsuario {

    public function __construct() {
        parent::__construct();
        Sessao::checar();
    }

    public function indexAction() {
        Tpl::view("adm/usuario/index", $this->getAll());
    }

    public function novo() {
        Tpl::view("adm/usuario/novo");
    }

    public function editar() {
        $this->usuario_id = Router::getUri(2);
        Tpl::view("adm/usuario/editar", $this->getById());
    }

    public function incluir() {
        $this->usuario_login = $_POST['usuario_login'];
        $this->usuario_senha = md5($_POST['usuario_senha']);
        parent::incluir();
        Router::redirect(Router::base() . "/usuario/?cadastrado");
    }

    public function atualizar() {
        $this->usuario_id = intval($_POST['usuario_id']);

        $this->usuario_login = $_POST['usuario_login'];
        $db = new DB;
        $sql = "UPDATE usuario SET usuario_login = '$this->usuario_login' WHERE usuario_id = $this->usuario_id;";
        if (isset($_POST['usuario_senha']) && $_POST['usuario_senha'] != "") {
            $this->usuario_senha = md5($_POST['usuario_senha']);
            $sql = "UPDATE usuario SET usuario_login = '$this->usuario_login', usuario_senha  = '$this->usuario_senha' WHERE usuario_id = $this->usuario_id;";
        }
        $db->query($sql);
        Router::redirect(Router::base() . "/usuario/?ok");
    }

    public function remover($usuario_id) {
        $this->usuario_id = Router::getUri(2);
        $this->delete();
        Router::redirect(Router::base() . "/usuario/?removido");
    }

}
