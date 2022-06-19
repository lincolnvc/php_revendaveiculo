<?php

Class Servico {

    public function indexAction() {
        $srvmd = new ModelServico;
        $srvmd->servico_id = intval(Router::getUri(2));
        
        $dados = array(
            'auto' => (new ModelAuto)->get_autos_destaque(),
            'auto_topo' => (new ModelAuto)->get_autos_topo(),
            'parceiro' => (new ModelSlide)->getAll(5),
            'servico' => (new ModelServico)->getAll(1),
            'social' => (new ModelSocial)->getById(),
            'agencia' => (new ModelAgencia)->getById(),
            'srv' => $srvmd->getById()
        );
        Tpl::View("site/servico", $dados);
    }

}
