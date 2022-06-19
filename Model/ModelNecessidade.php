<?php

Class ModelNecessidade {

    public $necessidade_id;
    public $necessidade_nome;

    public function __construct() {
        $this->db = new DB;
    }

    public function getAll() {
        $sql = "SELECT * FROM necessidade ORDER BY necessidade_nome ASC";
        return $dados = $this->db->fetchAll($sql);
    }

}
