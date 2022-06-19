<?php

@session_start();

Class ServicoAdmin extends ModelServico {

    public function __construct() {
        parent:: __construct();
        Sessao::checar();
    }

    public function indexAction() {
        $dados = array(
            'servico' => $this->getAll()
        );
        Tpl::view("adm/servico/index", $dados);
    }

    public function novo() {
        Tpl::view("adm/servico/novo");
    }

    public function editar() {
        $this->servico_id = intval(Router::getUri(2));
        $dados = array('servico' => $this->getById());
        Tpl::view("adm/servico/editar", $dados);
    }

    public function incluir() {
        $this->servico_nome = $_POST['servico_nome'];
        $this->servico_desc = $_POST['servico_desc'];
        $this->servico_foto = '';
        if (isset($_FILES['servico_foto']) && !empty($_FILES['servico_foto']['name'])) {
            $this->servico_foto = Upload::Servico($_FILES['servico_foto'], "servico/");
        }
        parent::incluir();
        Router::redirect(Router::base() . "/servicoAdmin/?cadastrado");
    }

    public function atualizar() {
        $this->servico_id = $_POST['servico_id'];
        $this->servico_nome = $_POST['servico_nome'];
        $this->servico_desc = $_POST['servico_desc'];
        $this->servico_foto = null;
        if (isset($_FILES['servico_foto']) && !empty($_FILES['servico_foto']['name'])) {
            $this->servico_foto = Upload::Servico($_FILES['servico_foto'], "servico/");
        }
        parent::atualizar();
        Router::redirect(Router::base() . "/servicoAdmin/?ok");
    }

    public function remover() {
        $this->servico_id = intval(Router::getUri(2));
        parent:: remover();
        Router::redirect(Router::base() . "/servicoAdmin/?removido");
    }

}
