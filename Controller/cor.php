<?php

@session_start();

Class Cor extends ModelCor {

    public function __construct() {
        parent::__construct();
        Sessao::checar();
    }

    public function indexAction() {
        $dados = array(
            'cor' => $this->getAll()
        );
        Tpl::view("adm/cor/index", $dados);
    }

    public function novo() {
        Tpl::view("adm/cor/novo");
    }

    public function editar() {
        $this->cor_id = intval(Router::getUri(2));
        Tpl::view("adm/cor/editar", $this->getById());
    }

    public function gravar() {
        $this->cor_id = intval($_POST['cor_id']);
        $this->cor_nome = $_POST['cor_nome'];
        parent::gravar();
        Router::redirect(Router::base() . "/cor/?ok");
    }

    public function remover() {
        $this->cor_id = intval(Router::getUri(2));
        parent:: remover();
        Router::redirect(Router::base() . "/cor/?removido");
    }

}
