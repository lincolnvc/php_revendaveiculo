<?php

@session_start();

Class Agencia extends ModelAgencia {

    public function __construct() {
        parent:: __construct();
        Sessao::checar();
    }

    public function indexAction() {
        $dados = array('agencia' => $this->getById());
        Tpl::view("adm/agencia/editar", $dados);
    }

    public function atualizar() {
        $this->agencia_nome = addslashes($_POST['agencia_nome']);
        $this->agencia_titulo = addslashes($_POST['agencia_titulo']);
        $this->agencia_tel = $_POST['agencia_tel'];
        $this->agencia_tel2 = $_POST['agencia_tel2'];
        $this->agencia_tel3 = $_POST['agencia_tel3'];
        $this->agencia_func = $_POST['agencia_func'];
        $this->agencia_end = $_POST['agencia_end'];
        $latlon = Util::getLatLon($this->agencia_end);
        $this->agencia_lat = $latlon->lat;
        $this->agencia_lon = $latlon->lon;
        $this->agencia_desc = addslashes($_POST['agencia_desc']);
        $this->agencia_seo_desc = addslashes($_POST['agencia_seo_desc']);
        $this->agencia_seo_keys = addslashes($_POST['agencia_seo_keys']);
        $this->agencia_foto = '';
        if (isset($_FILES['agencia_foto']) && !empty($_FILES['agencia_foto']['name'])) {
            $this->agencia_foto = Upload::Agencia($_FILES['agencia_foto'], "agencia/");
        }
        $this->gravar();
        Router::redirect(Router::base() . "/agencia/?ok");
    }

}
