<?php

@session_start();

Class Combustivel extends ModelCombustivel {

    public function __construct() {
        parent::__construct();
        Sessao::checar();
    }

    public function indexAction() {
        $dados = array(
            'combustivel' => $this->getAll()
        );
    }

}
