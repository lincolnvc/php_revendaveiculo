<?php

Class ModelAuto {

    public $auto_id;
    public $auto_versao;
    public $auto_placa;
    public $auto_placa_num;
    public $auto_obs;
    public $auto_foto;
    public $auto_ano;
    public $auto_preco;
    public $auto_estado;
    public $auto_negocicao;
    public $auto_km;
    public $auto_porta;
    public $auto_destaque;
    public $auto_oferta;
    public $auto_opc;
    public $auto_url, $config;
    public $auto_cor;
    public $auto_cambio;
    public $auto_combustivel;
    public $auto_carroceria;
    public $auto_documentacao;
    public $auto_necessidade;
    public $auto_seo_desc;
    public $auto_seo_keys;

    public function __construct() {
        $this->db = new DB;
    }

    public function getAll() {
        $sql = "SELECT * FROM auto "
                . "INNER JOIN versao ON (versao_id = auto_versao) "
                . " INNER JOIN modelo ON (modelo_id = auto_modelo) "
                . " INNER JOIN marca ON (marca_id = auto_marca) "
                . " LEFT JOIN foto ON (foto_auto = auto_id) "
                . " GROUP BY auto_id ORDER BY auto_id DESC, foto_pos ASC ";
        $dados = $this->db->fetchAll($sql);
        return $dados;
    }


    public function get_all_order($order = 'marca_nome ASC, modelo_nome ASC, versao_nome ASC') {
        $sql = "SELECT * FROM auto "
                . "INNER JOIN versao ON (versao_id = auto_versao) "
                . " INNER JOIN modelo ON (modelo_id = auto_modelo) "
                . " INNER JOIN marca ON (marca_id = auto_marca) "
                . " LEFT JOIN foto ON (foto_auto = auto_id) "
                . " GROUP BY auto_id ORDER BY $order ";
        $dados = $this->db->fetchAll($sql);
        return $dados;
    }

    public function get_filtro($condicao) {
        $sql = "SELECT * FROM auto "
                . "INNER JOIN versao ON (versao_id = auto_versao)"
                . " INNER JOIN modelo ON (modelo_id = auto_modelo)"
                . " INNER JOIN marca ON (marca_id = auto_marca) "
                . " INNER JOIN foto ON (auto_id = foto_auto) "
                . " WHERE $condicao "
                . " GROUP BY auto_id ORDER BY versao_modelo ASC";
        $dados = $this->db->fetchAll($sql);
        return array('dados' => $dados, 'paginacao' => $this->db->link);
    }

    public function get_autos_destaque($c = '*') {
        $pag = "SELECT config_detalhe_paginacao FROM config";  
        $paginacao = $this->db->fetchAll($pag);
        $sql = "SELECT $c FROM auto "
                . "INNER JOIN versao ON (versao_id = auto_versao)"
                . " INNER JOIN modelo ON (modelo_id = auto_modelo)"
                . " INNER JOIN marca ON (marca_id = auto_marca) "
                . " LEFT JOIN foto ON (foto_auto = auto_id) "
                . " GROUP BY auto_id ORDER BY auto_id DESC, foto_pos ASC";
        $this->db->url = "";
        $this->db->paginate($paginacao[0]->config_detalhe_paginacao);
        $dados = $this->db->fetchAll($sql);
        return array('dados' => $dados, 'paginacao' => $this->db->link);
    }

    public function get_autos_recente($c = '*') {
        $sql = "SELECT $c FROM auto "
                . "INNER JOIN versao ON (versao_id = auto_versao)"
                . " INNER JOIN modelo ON (modelo_id = auto_modelo)"
                . " INNER JOIN marca ON (marca_id = auto_marca) "
                . " LEFT JOIN foto ON (foto_auto = auto_id) "
                . " GROUP BY auto_id  ORDER BY auto_id DESC LIMIT 0,4";
        $dados = $this->db->fetchAll($sql);
        return $dados;
    }

    public function get_autos_popular($c = '*') {
        $sql = "SELECT $c FROM auto "
                . "INNER JOIN versao ON (versao_id = auto_versao)"
                . " INNER JOIN modelo ON (modelo_id = auto_modelo)"
                . " INNER JOIN marca ON (marca_id = auto_marca) "
                . " LEFT JOIN foto ON (foto_auto = auto_id) "
                . " GROUP BY auto_id  ORDER BY auto_visita DESC LIMIT 0,5";
        $dados = $this->db->fetchAll($sql);
        return $dados;
    }

    public function get_autos_topo($c = '*') {
        $sql = "SELECT $c FROM auto "
                . "INNER JOIN versao ON (versao_id = auto_versao)"
                . " INNER JOIN modelo ON (modelo_id = auto_modelo)"
                . " INNER JOIN marca ON (marca_id = auto_marca) "
                . " LEFT JOIN foto ON (foto_auto = auto_id) "
                . " WHERE auto_topo = 1 "
                . " GROUP BY auto_id ORDER BY auto_id DESC LIMIT 0,16";
        $dados = $this->db->fetchAll($sql);
        return $dados;
    }

    public function get_all_busca($busca) {
        $pag = "SELECT config_detalhe_paginacao FROM config";  
        $paginacao = (int)$this->db->fetchAll($pag);
        $sql = "SELECT * FROM auto "
                . "INNER JOIN versao ON (versao_id = auto_versao) "
                . " INNER JOIN modelo ON (modelo_id = auto_modelo) "
                . " INNER JOIN marca ON (marca_id = auto_marca)  "
                . " LEFT JOIN foto ON (foto_auto = auto_id) "
                . " WHERE versao_nome like'%$busca%' OR modelo_nome like'%$busca%' OR marca_nome like'%$busca%' "
                . " GROUP BY auto_id ORDER BY auto_id DESC, foto_pos ASC";
        $this->db->url = "";
        $this->db->paginate($paginacao);
        $dados = $this->db->fetchAll($sql);
        return array('dados' => $dados, 'paginacao' => $this->db->link);
    }

    public function incluir() {
        $this->auto_preco = Util::to_double($this->auto_preco);
        $sql = "INSERT INTO auto ("
                . "auto_marca, "
                . "auto_modelo, "
                . "auto_versao, "
                . "auto_placa, "
                . "auto_placa_num, "
                . "auto_obs, "
                . "auto_ano, "
                . "auto_preco, "
                . "auto_estado, "
                . "auto_negociacao, "
                . "auto_km, "
                . "auto_porta, "
                . "auto_url, "
                . "auto_destaque, "
                . "auto_oferta, "
                . "auto_cor, "
                . "auto_cambio, "
                . "auto_combustivel, "
                . "auto_carroceria, "
                . "auto_documentacao, "
                . "auto_necessidade,"
                . "auto_seo_desc,"
                . "auto_seo_keys,"
                . "auto_opc) VALUES ('"
                . "$this->auto_marca', "
                . "'$this->auto_modelo', "
                . "'$this->auto_versao', "
                . "'$this->auto_placa', "
                . "'$this->auto_placa_num', "
                . "'$this->auto_obs', "
                . "'$this->auto_ano', "
                . "'$this->auto_preco', "
                . "'$this->auto_estado', "
                . "'$this->auto_negociacao', "
                . "'$this->auto_km', "
                . "'$this->auto_porta', "
                . "'$this->auto_url', "
                . "'$this->auto_destaque', "
                . "'$this->auto_oferta', "
                . "'$this->auto_cor', "
                . "'$this->auto_cambio', "
                . "'$this->auto_combustivel', "
                . "'$this->auto_carroceria', "
                . "'$this->auto_documentacao', "
                . "'$this->auto_necessidade', "
                . "'$this->auto_seo_desc', "
                . "'$this->auto_seo_keys', "
                . "'$this->auto_opc');";
        $this->db->query($sql);
    }

    public function atualizar() {
        $this->auto_preco = Util::to_double($this->auto_preco);
        $sql = "UPDATE auto SET "
                . "auto_marca = '$this->auto_marca', "
                . "auto_modelo = '$this->auto_modelo', "
                . "auto_versao = '$this->auto_versao', "
                . "auto_placa = '$this->auto_placa', "
                . "auto_placa_num = '$this->auto_placa_num', "
                . "auto_obs = '$this->auto_obs', "
                . "auto_ano = '$this->auto_ano', "
                . "auto_preco = '$this->auto_preco', "
                . "auto_estado = '$this->auto_estado', "
                . "auto_negociacao = '$this->auto_negociacao', "
                . "auto_km = '$this->auto_km',"
                . "auto_porta = '$this->auto_porta',"
                . "auto_url = '$this->auto_url', "
                . "auto_destaque = '$this->auto_destaque', "
                . "auto_oferta = '$this->auto_oferta', "
                . "auto_cor = '$this->auto_cor', "
                . "auto_cambio = '$this->auto_cambio',"
                . "auto_combustivel = '$this->auto_combustivel',"
                . "auto_carroceria = '$this->auto_carroceria', "
                . "auto_documentacao = '$this->auto_documentacao', "
                . "auto_necessidade = '$this->auto_necessidade', "
                . "auto_seo_desc = '$this->auto_seo_desc', "
                . "auto_seo_keys = '$this->auto_seo_keys', "
                . "auto_opc = '$this->auto_opc' "
                . "WHERE auto_id = $this->auto_id;";
        $this->db->query($sql);
    }

    public function remover() {
        $sql = "DELETE FROM auto WHERE auto_id = $this->auto_id";
        $this->db->query($sql);
    }

    public function get_fotos($auto_id = null) {
        if ($auto_id != null) {
            $this->auto_id = $auto_id;
        }
        $dados = $this->db->fetchAll("SELECT * FROM foto WHERE foto_auto = $this->auto_id");
        return $dados;
    }

    public function add_foto() {
        $sql = "INSERT INTO foto (foto_auto,foto_url) VALUES ( '$this->foto_auto','$this->foto_url');";
        $this->db->query($sql);
    }

    public function get_by_id($auto_id) {
        $sql = "SELECT * FROM auto "
                . "INNER JOIN versao ON (versao_id = auto_versao)"
                . " LEFT JOIN modelo ON (modelo_id = auto_modelo)"
                . " LEFT JOIN marca ON (marca_id = auto_marca) "
                . " WHERE auto_id = $auto_id "
                . "ORDER BY versao_modelo ASC";
        $dados = $this->db->fetchAll($sql);
        return $dados;
    }

    public function removerFotos() {
        $sql = "SELECT * FROM foto WHERE foto_auto = $this->auto_id";
        $this->db->fetchAll($sql);
        if (isset($this->db->data[0])) {
            foreach ($this->db->data as $f) {
                // monta caminho absoluto do arquivo
                $arquivo = "midias/fotos/$f->foto_url";
                //verifica se arquivo existe
                if (file_exists($arquivo)) {
                    //remove arquivo do disco
                    unlink($arquivo);
                }
            }
            $sql = "DELETE FROM foto WHERE foto_auto = $this->auto_id";
            $this->db->query($sql);
        }
    }

    function remover_foto() {
        $sql = "DELETE FROM foto WHERE foto_id = $this->foto_id";
        $this->db->query($sql);
    }

    public function get_by_auto($pop) {
        $sql = "SELECT * FROM popular LEFT JOIN auto ON (auto_id = popular_auto) WHERE auto_url = '$pop' ORDER BY popular_pos ASC";
        $dados = $this->db->fetchAll($sql);
        return $dados;
    }

}
