<?php

Class ModelAgencia {

    public $agencia_id;
    public $agencia_nome;
    public $agencia_tel;
    public $agencia_te2;
    public $agencia_te3;
    public $agencia_func;
    public $agencia_lat;
    public $agencia_lon;
    public $agencia_end;
    public $agencia_desc;
    public $agencia_seo_desc;
    public $agencia_seo_keys;
    public $agencia_foto;

    public function __construct() {
        $this->db = new DB;
    }

    public function getById() {
        $dados = $this->db->fetchAll("SELECT * FROM agencia WHERE agencia_id = 1");
        return $dados;
    }

    public function gravar() {
        $sql = "UPDATE agencia SET agencia_titulo = '$this->agencia_titulo', agencia_nome = '$this->agencia_nome', agencia_tel = '$this->agencia_tel', agencia_tel2 = '$this->agencia_tel2',agencia_tel3 = '$this->agencia_tel3',agencia_func = '$this->agencia_func', agencia_lat = '$this->agencia_lat', agencia_lon = '$this->agencia_lon', agencia_end = '$this->agencia_end', agencia_seo_desc = '$this->agencia_seo_desc', agencia_seo_keys = '$this->agencia_seo_keys', agencia_desc = '$this->agencia_desc' ";
        if ($this->agencia_foto != "") {
            $sql .= ",agencia_foto = '$this->agencia_foto'  ";
        }
        $sql .= " WHERE agencia_id = 1;";
        $this->db->query($sql);
    }

}
