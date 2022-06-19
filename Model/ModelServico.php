<?php

Class ModelServico {

    public $servico_id;
    public $servico_nome;
    public $servico_desc;
    public $servico_foto;

    public function __construct() {
        $this->db = new DB;
    }

    public function getAll() {
        $sql = "SELECT * FROM servico ORDER BY servico_nome ASC";
        $dados = $this->db->fetchAll($sql);
        return $dados;
    }

    public function getById() {
        $servico = $this->db->fetchAll("SELECT * FROM servico WHERE servico_id = $this->servico_id");
        return $servico[0];
    }

    
      public function incluir() {
      $sql = "INSERT INTO servico (servico_nome,servico_desc,servico_foto) VALUES ( '$this->servico_nome','$this->servico_desc','$this->servico_foto');";
      $this->db->query($sql);
      }

      public function atualizar() {
      $sql = "UPDATE servico SET servico_nome = '$this->servico_nome', servico_desc = '$this->servico_desc' ";
      if ($this->servico_foto != "") {
      $sql .= ",servico_foto = '$this->servico_foto'  ";
      }
      $sql .= " WHERE servico_id = $this->servico_id;";
      $this->db->query($sql);
      }
     

    public function remover() {
        $sql = "DELETE FROM servico WHERE servico_id = $this->servico_id";
        $this->db->query($sql);
    }

}
