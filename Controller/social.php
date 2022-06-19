<?php

@session_start();

Class Social extends ModelSocial {

    public function __construct() {
        parent:: __construct();
        Sessao::checar();
    }

    public function indexAction() {
        $this->social_id = intval(Router::getUri(2));
        $dados = array(
            'social' => $this->getById()
        );

        Tpl::view("adm/social/index", $dados);
    }

    public function atualizar() {
        # RECEBE DADOS DO FORM  E SETA VARIAVEIS
        $this->social_id = intval($_POST['social_id']);
        $this->social_facebook = Util::link_externo($_POST['social_facebook']);
        $this->social_twitter = Util::link_externo($_POST['social_twitter']);
        $this->social_linkedin = Util::link_externo($_POST['social_linkedin']);
        $this->social_pinterest = Util::link_externo($_POST['social_pinterest']);
        $this->social_google = Util::link_externo($_POST['social_google']);
        $this->social_instagram = Util::link_externo($_POST['social_instagram']);
        $this->social_vimeo = Util::link_externo($_POST['social_vimeo']);
        parent::atualizar();
        Router::redirect(Router::base() . "/social/?ok");
    }

}