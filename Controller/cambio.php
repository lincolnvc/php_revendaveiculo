<?php

@session_start();

Class Cambio extends ModelCambio {

    public function __construct() {
        parent::__construct();
        Sessao::checar();
    }

    public function indexAction() {
        $dados = array('cambio' => $this->getAll());
        Tpl::view("adm/cambio/index", $dados);
    }

    public function novo() {
        Tpl::view("adm/cambio/novo");
    }

    public function editar() {
        $this->cambio_id = intval(Router::getUri(2));
        Tpl::view("adm/cambio/editar", $this->getById());
    }

    public function gravar() { //METODO UTILIZADO PARA ATUALIZAR DADOS DE UM REGISTRO - RECEBE COMO PARAMETRO O ID DO REGISTRO (REGISTRO = LINHA DO BANCO) 
        # RECEBE DADOS DO FORM  E SETA VARIAVEIS
        $this->cambio_id = intval($_POST['cambio_id']);
        $this->cambio_nome = $_POST['cambio_nome'];
        parent::gravar();
        Router::redirect(Router::base() . "/cambio/?ok");
    }

    public function remover() {
        $this->cambio_id = intval(Router::getUri(2));
        parent::remover();
        Router::redirect(Router::base() . "/cambio/?removido", $dados);
    }

}
