<?php

Class ModelCombustivel {

    public $combustivel_id;
    public $combustivel_nome;

    public function __construct() {
        $this->db = new DB;
    }

    public function getAll() {
        $sql = "SELECT * FROM combustivel ORDER BY combustivel_nome ASC";
        return $dados = $this->db->fetchAll($sql);
    }

}
