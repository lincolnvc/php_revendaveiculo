<?php

Class ModelVersao {

    public $versao_modelo;
    public $versao_nome;
    public $versao_url;
    public $versao_id = 0;

    public function __construct() {
        $this->db = new DB;
    }

    public function getAll($c = '*') {
        $sql = "SELECT $c FROM versao INNER JOIN modelo ON (modelo_id = versao_modelo) INNER JOIN marca ON (marca_id = modelo_marca) ORDER BY versao_modelo ASC";
        $dados = $this->db->fetchAll($sql);
        return $dados;
    }

    public function get_by_id() {
        $this->db = new DB;
        $versao = $this->db->fetchAll("SELECT * FROM versao INNER JOIN modelo ON (modelo_id = versao_modelo) INNER JOIN marca ON (marca_id = modelo_marca) WHERE versao_id = $this->versao_id");
        return $versao[0];
    }

    public function gravar() {
        if ($this->versao_id > 0):
            $sql = "UPDATE versao SET versao_modelo = '$this->versao_modelo', versao_nome = '$this->versao_nome', versao_url = '$this->versao_url' WHERE versao_id = $this->versao_id";
        else:
            $sql = "INSERT INTO versao (versao_modelo,versao_nome,versao_url) VALUES ('$this->versao_modelo','$this->versao_nome','$this->versao_url');";
        endif;
        $this->db->query($sql);
    }

    public function remover() {
        $sql = "DELETE FROM versao WHERE versao_id = $this->versao_id";
        $this->db->query($sql);
    }

}
