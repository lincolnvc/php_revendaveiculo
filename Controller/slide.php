<?php

@session_start();

Class Slide extends ModelSlide {

    public function __construct() {
        Sessao::checar();
    }

    public function indexAction() {
        $dados = array(
            'slide' => $this->getAll(1)
        );
        Tpl::view("adm/slide/index", $dados);
    }

    public function novo() {
        Tpl::view("adm/slide/novo");
    }

    public function editar() {
        $this->slide_id = Router::getUri(2);
        $slide = $this->get_by_id();
        $dados = array('slide' => $slide[0]);
        Tpl::view("adm/slide/editar", $dados);
    }

    public function incluir() {
        $this->slide_nome = $_POST['slide_nome'];
        $this->slide_nova = intval($_POST['slide_nova']);
        if (isset($_POST['slide_link']) && !empty($_POST['slide_link'])) {
            $this->slide_link = Util::link_externo($_POST['slide_link']);
        }
        $this->slide_local = 1;
        $this->slide_foto = '';
        if (isset($_FILES['slide_foto']) && !empty($_FILES['slide_foto'])) {
            $this->slide_foto = Upload::Slide($_FILES['slide_foto']);
        }
        $this->add();
        Router::redirect(Router::base() . "/slide/?cadastrado");
    }

    public function atualizar() {
        # RECEBE DADOS DO FORM  E SETA VARIAVEIS
        $this->slide_id = intval($_POST['slide_id']);
        $this->slide_nome = $_POST['slide_nome'];
        $this->slide_nova = intval($_POST['slide_nova']);
        $this->slide_local = 1;
        if (isset($_POST['slide_link']) && !empty($_POST['slide_link'])) {
            $this->slide_link = Util::link_externo($_POST['slide_link']);
        }
        $this->slide_foto = null;

        if (isset($_FILES['slide_foto']) && !empty($_FILES['slide_foto']['name'])) {
            $this->slide_foto = Upload::Slide($_FILES['slide_foto']);
        }
        $this->update();

        Router::redirect(Router::base() . "/slide/?ok");
    }

    public function remover() {
        $this->slide_id = Router::getUri(2);
        $this->del("slide");
        Router::redirect(Router::base() . "/slide/?removido");
    }

}
