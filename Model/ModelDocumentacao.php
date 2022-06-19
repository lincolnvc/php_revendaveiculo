<?php

Class ModelDocumentacao {

    public $documentacao_id;
    public $documentacao_nome;

    public function __construct() {
        $this->db = new DB;
    }

    public function getAll() {
        $sql = "SELECT * FROM documentacao ORDER BY documentacao_nome ASC";
        return $dados = $this->db->fetchAll($sql);
    }

}
