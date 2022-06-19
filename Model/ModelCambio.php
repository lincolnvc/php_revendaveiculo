<?php

Class ModelCambio {

    public $cambio_id = null;
    public $cambio_nome;

    public function __construct() {
        $this->db = new DB;
    }

    public function getAll() {
        $sql = "SELECT * FROM cambio ORDER BY cambio_nome ASC";
        return $dados = $this->db->fetchAll($sql);
    }

    public function gravar() {
        if ($this->cambio_id > 0):
            $sql = "UPDATE cambio SET cambio_nome = '$this->cambio_nome' WHERE cambio_id = $this->cambio_id";
        else :
            $sql = "INSERT INTO cambio (cambio_nome) VALUES ( '$this->cambio_nome');";
        endif;
        $this->db->query($sql);
    }

    public function getById() {
        $sql = "SELECT * FROM cambio WHERE cambio_id = $this->cambio_id";
        return $dados = $this->db->fetchAll($sql);
    }

    public function remover() {
        $sql = "DELETE FROM cambio WHERE cambio_id = $this->cambio_id";
        return $dados = $this->db->query($sql);
    }

}
