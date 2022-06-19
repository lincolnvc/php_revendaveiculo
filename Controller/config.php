<?php

@session_start();

Class Config extends ModelConfig {

    public function __construct() {
        parent:: __construct();
        Sessao::checar();
    }

    public function indexAction() {
        $this->config_id = intval(Router::getUri(2));
        $dados = array('config' => $this->getById());
        Tpl::view("adm/config/editar", $dados);
    }

    public function atualizar() {
        $this->config_id = $_POST['config_id'];
        $this->config_detalhe_paginacao = intval($_POST['config_detalhe_paginacao']);
        parent::atualizar();
        Router::redirect(Router::base() . "/config/?ok");
    }

}
