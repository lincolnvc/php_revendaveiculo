<?php

Class Sobre {

    public function indexAction() {
        $dados = array(
            'auto' => (new ModelAuto)->get_autos_destaque(),
            'auto_recente' => (new ModelAuto)->get_autos_recente(),
            'auto_topo' => (new ModelAuto)->get_autos_topo(),
            'parceiro' => (new ModelSlide)->getAll(5),
            'servico' => (new ModelServico)->getAll(1),
            'social' => (new ModelSocial)->getById(),
            'agencia' => (new ModelAgencia)->getById()
        );
        Tpl::View("site/sobre", $dados);
    }

}
