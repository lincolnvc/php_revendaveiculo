<?php
Class Index {

    public function indexAction() {
        if (isset($_POST['busca']) && !empty($_POST['busca'])) {
            $busca = addslashes($_POST['busca']);
            $this->autos = (new ModelAuto)->get_all_busca($busca);
        } else {
            $this->autos = (new ModelAuto)->get_autos_destaque();
        }
        $dados = $this->get_autos();
        Tpl::View("site/index", $dados);
    }

    public function filtro() {
        $condicao_da_busca = "";
        if (isset($_POST['auto_marca']) && !empty($_POST['auto_marca'])) {
            $auto_marca = intval($_POST['auto_marca']);
            $condicao_da_busca .= " auto_marca = $auto_marca ";
        }
        if (isset($_POST['auto_modelo']) && !empty($_POST['auto_modelo'])) {
            $auto_modelo = intval($_POST['auto_modelo']);
            $condicao_da_busca .= " AND auto_modelo = $auto_modelo ";
        }
        if (isset($_POST['auto_ano']) && !empty($_POST['auto_ano'])) {
            $auto_ano = intval($_POST['auto_ano']);
            $condicao_da_busca .= " AND auto_ano = $auto_ano ";
        }
        if (isset($_POST['auto_preco']) && !empty($_POST['auto_preco'])) {
            $auto_preco = intval($_POST['auto_preco']);
            $condicao_da_busca .= " AND auto_preco <= $auto_preco ";
        }
        if ($condicao_da_busca != "") {
            $this->autos = (new ModelAuto)->get_filtro($condicao_da_busca);
        } else {
            $this->autos = (new ModelAuto)->get_autos_destaque();
        }
        $dados = $this->get_autos();
        Tpl::View("site/index", $dados);
    }

    public function get_autos() {
        $dados = array(
            'auto' => $this->autos['dados'],
            'paginacao' => $this->autos['paginacao'],
            'auto_recente' => (new ModelAuto)->get_autos_recente(),
            'auto_popular' => (new ModelAuto)->get_autos_popular(),
            'auto_topo' => (new ModelAuto)->get_autos_topo(),
            'slide' => (new ModelSlide)->getAll(1),
            'parceiro' => (new ModelSlide)->getAll(5),
            'servico' => (new ModelServico)->getAll(),
            'depoimento' => (new ModelDepoimento)->getAll(),
            'social' => (new ModelSocial)->getById(),
            'marca' => (new ModelMarca)->getAll(),
            'modelo' => (new ModelModelo)->getAll(),
            'agencia' => (new ModelAgencia)->getById(),
            'config' => (new ModelConfig)->getById()
        );
        return $dados;
    }

}
