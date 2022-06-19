<?php

Class ModelConfig {

    public $config_id;
    public $config_detalhe_paginacao;

    public function __construct() {
        $this->db = new DB;
    }

    public function getById() {
        $dados = $this->db->fetchAll("SELECT * FROM config WHERE config_id = 1");
        return $dados;
    }

    public function atualizar() {
        $sql = "UPDATE config SET config_detalhe_paginacao = '$this->config_detalhe_paginacao' ";
        $sql .= " WHERE config_id = $this->config_id;";
        $this->db->query($sql);
    }

}
