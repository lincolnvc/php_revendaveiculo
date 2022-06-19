<?php

@session_start();

Class Smtp extends ModelSmtp {

    public function __construct() {
        parent:: __construct();
        Sessao::checar();
    }

    public function indexAction() {
        $dados = array('smtp' => $this->get());
        Tpl::view("adm/smtp/editar", $dados);
    }

    public function atualizar() {
        $this->smtp_host = $_POST['smtp_host'];
        $this->smtp_email = $_POST['smtp_email'];
        if (isset($_POST['smtp_senha']) && $_POST['smtp_senha'] != "") {
            $this->smtp_senha = $_POST['smtp_senha'];
        }
        $this->smtp_nome = $_POST['smtp_nome'];
        $this->smtp_porta = $_POST['smtp_porta'];
        $this->smtp_bcc = $_POST['smtp_bcc'];
        $this->smtp_assunto = addslashes($_POST['smtp_assunto']);  
        parent::atualizar();
        Router::redirect(Router::base() . "/smtp/?ok");
    }

}
