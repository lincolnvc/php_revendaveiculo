<?php

@session_start();

Class Opcional extends ModelOpcional {

    public function __construct() {
        parent::__construct();
        Sessao::checar();
    }

    public function indexAction() {
        $dados = array(
            'opc' => $this->getAll()
        );
        Tpl::view("adm/opcional/index", $dados);
    }

    public function novo() {
        $grupo = (new ModelGrupo)->getAll();
        $dados = array('grupo' => $grupo);
        Tpl::view("adm/opcional/novo", $dados);
    }

    public function editar() {
        $this->opcional_id = intval(Router::getUri(2));
        Tpl::view("adm/opcional/editar", parent:: getById());
    }

    public function incluir() {
        $this->opcional_grupo = intval($_POST['opcional_grupo']);
        $this->opcional_nome = $_POST['opcional_nome'];
        $this->gravar();
        Router::redirect(Router::base() . "/opcional/?cadastrado");
    }

    public function atualizar() {
        $this->opcional_id = intval($_POST['opcional_id']);
        $this->opcional_grupo = intval($_POST['opcional_grupo']);
        $this->opcional_nome = $_POST['opcional_nome'];
        $this->gravar();
        Router::redirect(Router::base() . "/opcional/?ok");
    }

    public function remover() {
        $this->opcional_id = intval(Router::getUri(2));
        parent::remover();
        Router::redirect(Router::base() . "/opcional/?removido");
    }

    public function grupo() {
        $this->opcional_grupo = intval(Router::getUri(2));
        $opcionais = $this->get_by_grupo();
        //echo Util::printr($opcionais);exit;
        $dados = null;
        if (isset($opcionais[0])):
            $grupo_nome = $opcionais[0]->grupo_nome;
            $dados = array('opc' => $opcionais, 'grupo_nome' => $grupo_nome);
        endif;
        
        Tpl::view("adm/opcional/index", $dados);
    }

}
