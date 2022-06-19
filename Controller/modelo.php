<?php

@session_start();

Class Modelo extends ModelModelo {

    public function __construct() {
        parent::__construct();
        Sessao::checar();
    }

    public function indexAction() {
        $dados = array(
            'modelo' => $this->getAll()
        );
        Tpl::view("adm/modelo/index", $dados);
    }

    public function novo() {
        $marca = (new ModelMarca)->getAll();
        $dados = array('marca' => $marca);
        Tpl::view("adm/modelo/novo", $dados);
    }

    public function editar() {
        $this->modelo_id = intval(Router::getUri(2));
        Tpl::view("adm/modelo/editar", $this->getById());
    }

    public function incluir() {
        $this->modelo_marca = $_POST['modelo_marca'];
        $this->modelo_nome = $_POST['modelo_nome'];
        $this->modelo_url = Util::slug($this->modelo_nome);
        $this->gravar();
        Router::redirect(Router::base() . "/modelo/?cadastrado");
    }

    public function atualizar() {
        $this->modelo_id = intval($_POST['modelo_id']);
        $this->modelo_marca = $_POST['modelo_marca'];
        $this->modelo_nome = $_POST['modelo_nome'];
        $this->marca_url = Util::slug($this->marca_nome);
        $this->gravar();
        Router::redirect(Router::base() . "/modelo/?ok");
    }

    public function remover() {
        $this->modelo_id = intval(Router::getUri(2));
        parent:: remover();
        Router::redirect(Router::base() . "/modelo/?removido");
    }

}
