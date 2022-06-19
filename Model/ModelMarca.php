<?php

Class ModelMarca {

    public $marca_id;
    public $marca_nome;
    public $marca_url;
    public $marca_foto;

    public function __construct() {
        $this->db = new DB;
    }

    public function getAll() {
        $sql = "SELECT * FROM marca ORDER BY marca_nome ASC";
        $dados = $this->db->fetchAll($sql);
        return $dados;
    }

    public function getById() {
        $marca = $this->db->fetchAll("SELECT * FROM marca WHERE marca_id = $this->marca_id");
        return $marca[0];
    }

    
      public function incluir() {
      $sql = "INSERT INTO marca (marca_nome,marca_url,marca_foto) VALUES ( '$this->marca_nome','$this->marca_url','$this->marca_foto');";
      $this->db->query($sql);
      }

      public function atualizar() {
      $sql = "UPDATE marca SET marca_nome = '$this->marca_nome', marca_url = '$this->marca_url' ";
      if ($this->marca_foto != "") {
      $sql .= ",marca_foto = '$this->marca_foto'  ";
      }
      $sql .= " WHERE marca_id = $this->marca_id;";
      $this->db->query($sql);
      }
     

    public function remover() {
        $sql = "DELETE FROM marca WHERE marca_id = $this->marca_id";
        $this->db->query($sql);
    }

}
