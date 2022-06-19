<?php

Class ModelCarroceria {

    public $carroceria_id;
    public $carroceria_nome;

    public function __construct() {
        $this->db = new DB;
    }

    public function getAll() {
        $sql = "SELECT * FROM carroceria ORDER BY carroceria_nome ASC";
        return $dados = $this->db->fetchAll($sql);
    }

}
