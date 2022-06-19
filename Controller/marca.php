<?php

@session_start();

Class Marca extends ModelMarca {

    public function __construct() {
        parent:: __construct();
        Sessao::checar();
    }

    public function indexAction() {
        $dados = array(
            'marca' => $this->getAll()
        );
        Tpl::view("adm/marca/index", $dados);
    }

    public function novo() {
        Tpl::view("adm/marca/novo");
    }

    public function editar() {
        $this->marca_id = intval(Router::getUri(2));
        Tpl::view("adm/marca/editar", $this->getById());
    }

    public function incluir() {
        $this->marca_nome = $_POST['marca_nome'];
        $this->marca_url = Util::slug($this->marca_nome);
        if (isset($_FILES['marca_foto']) && !empty($_FILES['marca_foto']['name'])) {
            $this->marca_foto = Upload::Enviar($_FILES['marca_foto'], "marca/");
        }
        parent::incluir();
        Router::redirect(Router::base() . "/marca/?cadastrado");
    }

    public function atualizar() {
        $this->marca_id = $_POST['marca_id'];
        $this->marca_nome = $_POST['marca_nome'];
        $this->marca_url = Util::slug($this->marca_nome);
        $this->marca_foto = '';
        if (isset($_FILES['marca_foto']) && !empty($_FILES['marca_foto']['name'])) {
            $this->marca_foto = Upload::Enviar($_FILES['marca_foto'], "marca/");
        }
        parent::atualizar();
        Router::redirect(Router::base() . "/marca/?ok");
    }

    public function remover() {
        $this->marca_id = intval(Router::getUri(2));
        parent:: remover();
        Router::redirect(Router::base() . "/marca/?removido");
    }

}
