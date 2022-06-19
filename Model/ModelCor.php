<?php

Class ModelCor {

    public $cor_id;
    public $cor_nome;

    public function __construct() {
        $this->db = new DB;
    }

    public function getAll() {
        $sql = "SELECT * FROM cor ORDER BY cor_nome ASC";
        return $dados = $this->db->fetchAll($sql);
    }

    public function getById() {
        $sql = "SELECT * FROM cor WHERE cor_id = $this->cor_id";
        return $dados = $this->db->fetchAll($sql);
    }

    public function gravar() {
        if ($this->cor_id > 0):
            $sql = "UPDATE cor SET cor_nome = '$this->cor_nome' WHERE cor_id = $this->cor_id;";
        else:
            $sql = "INSERT INTO cor (cor_nome) VALUES ( '$this->cor_nome');";
        endif;
        $this->db->query($sql);
    }

    public function remover() {
        $sql = "DELETE FROM cor WHERE cor_id = $this->cor_id";
        $this->db->query($sql);
    }

}
