<?php

@session_start();

Class Depoimento extends ModelDepoimento {

    public function __construct() {
        parent:: __construct();
        Sessao::checar();
    }

    public function indexAction() {
        $dados = array(
            'depoimento' => $this->getAll()
        );
        Tpl::view("adm/depoimento/index", $dados);
    }

    public function novo() {
        Tpl::view("adm/depoimento/novo");
    }

    public function editar() {
        $this->depoimento_id = intval(Router::getUri(2));
        $dados = array('depoimento' => $this->getById());
        Tpl::view("adm/depoimento/editar", $dados);
    }

    public function incluir() {
        $this->depoimento_nome = $_POST['depoimento_nome'];
        $this->depoimento_desc = addslashes($_POST['depoimento_desc']);
        if (isset($_FILES['depoimento_foto']) && !empty($_FILES['depoimento_foto']['name'])) {
            $this->depoimento_foto = Upload::Depoimento($_FILES['depoimento_foto'], "depoimento/");
        }
        parent::incluir();
        Router::redirect(Router::base() . "/depoimento/?cadastrado");
    }

    public function atualizar() {
        $this->depoimento_id = $_POST['depoimento_id'];
        $this->depoimento_nome = $_POST['depoimento_nome'];
        $this->depoimento_desc = addslashes($_POST['depoimento_desc']);
        $this->depoimento_foto = '';
        if (isset($_FILES['depoimento_foto']) && !empty($_FILES['depoimento_foto']['name'])) {
            $this->depoimento_foto = Upload::Depoimento($_FILES['depoimento_foto'], "depoimento/");
        }
        parent::atualizar();
        Router::redirect(Router::base() . "/depoimento/?ok");
    }

    public function remover() {
        $this->depoimento_id = intval(Router::getUri(2));
        parent:: remover();
        Router::redirect(Router::base() . "/depoimento/?removido");
    }

}
