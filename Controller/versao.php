<?php

@session_start();

Class Versao extends ModelVersao {

    public function __construct() {
        parent:: __construct();
        Sessao::checar();
    }

    public function indexAction() {
        $dados = array(
            'versao' => $this->getAll()
        );
        Tpl::view("adm/versao/index", $dados);
    }

    public function novo() {
        $modelo = (new ModelModelo)->getAll();
        $dados = array('modelo' => $modelo);
        Tpl::view("adm/versao/novo", $dados);
    }

    public function editar() {
        $this->versao_id = intval(Router::getUri(2));
        $versao = $this->get_by_id();
        $modelo = (new ModelModelo)->getAll();
        $dados = array('versao' => $versao, 'modelo' => $modelo);
        Tpl::view("adm/versao/editar", $dados);
    }

    public function gravar() {
        $this->versao_id = intval($_POST['versao_id']);
        $this->versao_modelo = $_POST['versao_modelo'];
        $this->versao_nome = $_POST['versao_nome'];
        $this->versao_url = Util::slug($this->versao_nome);
        parent::gravar();
        Router::redirect(Router::base() . "/versao/?ok");
    }

    public function remover() {
        $this->versao_id = intval(Router::getUri(2));
        parent:: remover();
        Router::redirect(Router::base() . "/versao/?removido");
    }

}
