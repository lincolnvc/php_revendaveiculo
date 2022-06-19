<?php

Class ModelDepoimento {

    public $depoimento_id;
    public $depoimento_nome;
    public $depoimento_desc;
    public $depoimento_foto;

    public function __construct() {
        $this->db = new DB;
    }

    public function getAll() {
        $sql = "SELECT * FROM depoimento ORDER BY depoimento_nome ASC";
        $dados = $this->db->fetchAll($sql);
        return $dados;
    }

    public function getById() {
        $depoimento = $this->db->fetchAll("SELECT * FROM depoimento WHERE depoimento_id = $this->depoimento_id");
        return $depoimento[0];
    }

    
      public function incluir() {
      $sql = "INSERT INTO depoimento (depoimento_nome,depoimento_desc,depoimento_foto) VALUES ( '$this->depoimento_nome','$this->depoimento_desc','$this->depoimento_foto');";
      $this->db->query($sql);
      }

      public function atualizar() {
      $sql = "UPDATE depoimento SET depoimento_nome = '$this->depoimento_nome', depoimento_desc = '$this->depoimento_desc' ";
      if ($this->depoimento_foto != "") {
      $sql .= ",depoimento_foto = '$this->depoimento_foto'  ";
      }
      $sql .= " WHERE depoimento_id = $this->depoimento_id;";
      $this->db->query($sql);
      }
     

    public function remover() {
        $sql = "DELETE FROM depoimento WHERE depoimento_id = $this->depoimento_id";
        $this->db->query($sql);
    }

}
