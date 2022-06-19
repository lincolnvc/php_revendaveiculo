<?php

@session_start();

Class Parceiro extends ModelSlide {

    public function __construct() {
        Sessao::checar();
    }

    public function indexAction() {
        $dados = array(
            'parceiro' => $this->getAll(5)
        );
        Tpl::view("adm/parceiro/index", $dados);
    }

    public function novo() {
        Tpl::view("adm/parceiro/novo");
    }

    public function editar() {
        $this->slide_id = Router::getUri(2);
        $slide = $this->get_by_id();
        $dados = array('slide' => $slide[0]);
        Tpl::view("adm/parceiro/editar", $dados);
    }

    public function incluir() {
        $this->slide_nome = addslashes($_POST['slide_nome']);
        $this->slide_nova = $_POST['slide_nova'];
        $this->slide_local = 5;
        if (isset($_POST['slide_link']) && !empty($_POST['slide_link'])) {
            $this->slide_link = Util::link_externo($_POST['slide_link']);
        }
        $this->slide_foto = '';
        if (isset($_FILES['slide_foto']) && !empty($_FILES['slide_foto'])) {
            $this->slide_foto = Upload::Parceiro($_FILES['slide_foto']);
        }
        $this->add();

        Router::redirect(Router::base() . "/parceiro/?cadastrado");
    }

    public function atualizar() {
        # RECEBE DADOS DO FORM  E SETA VARIAVEIS
        $this->slide_id = intval($_POST['slide_id']);
        $this->slide_nome = $_POST['slide_nome'];
        $this->slide_nova = intval($_POST['slide_nova']);
        $this->slide_local = 5;
        if (isset($_POST['slide_link']) && !empty($_POST['slide_link'])) {
            $this->slide_link = Util::link_externo($_POST['slide_link']);
        }
        $this->slide_foto = null;
        if (isset($_FILES['slide_foto']) && !empty($_FILES['slide_foto']['name'])) {
            $this->slide_foto = Upload::Parceiro($_FILES['slide_foto']);
        }
        $this->update();
        Router::redirect(Router::base() . "/parceiro/?ok");
    }

    public function remover() {
        $this->slide_id = Router::getUri(2);
        $this->del("parceiro");
        Router::redirect(Router::base() . "/parceiro/?removido");
    }

}
