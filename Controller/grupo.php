<?php

@session_start();

Class Grupo extends ModelGrupo {

    public function __construct() {
        parent::__construct();
        Sessao::checar();
    }

    public function indexAction() {
        $r  = (new ModelOpcional)->get_lista();
        $dados = array(
            'grupo' => $this->getAll()
        );
        Tpl::view("adm/grupo/index", $dados);
    }

    public function novo() {
        Tpl::view("adm/grupo/novo");
    }

    public function editar() {
        $this->grupo_id = intval(Router::getUri(2));
        Tpl::view("adm/grupo/editar", parent:: editar());
    }

    public function gravar() { //METODO UTILIZADO PARA ATUALIZAR DADOS DE UM REGISTRO - RECEBE COMO PARAMETRO O ID DO REGISTRO (REGISTRO = LINHA DO BANCO) 
        # RECEBE DADOS DO FORM  E SETA VARIAVEIS
        $this->grupo_nome = $_POST['grupo_nome'];
        $this->grupo_id = $_POST['grupo_id'];
        parent::gravar();
        Router::redirect(Router::base() . "/grupo/?ok");
    }

    public function remover() {
        $this->grupo_id = intval(Router::getUri(2));
        parent:: remover();
        Router::redirect(Router::base() . "/grupo/?removido");
    }

}
