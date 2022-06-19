<?php

Class ModelModelo {

    public $modelo_id;
    public $modelo_marca;
    public $modelo_nome;
    public $modelo_url;

    public function __construct() {
        $this->db = new DB;
    }

    public function getAll() {
        $sql = "SELECT * FROM modelo INNER JOIN marca ON (marca_id = modelo_marca) ORDER BY modelo_id DESC";
        return $dados = $this->db->fetchAll($sql);
    }

    public function getById() {
        $modelo = $this->db->fetchAll("SELECT * FROM modelo WHERE modelo_id = $this->modelo_id");
        $marcas = $this->db->fetchAll("SELECT * FROM marca ORDER BY marca_nome ASC");
        $dados = array(
            'modelo' => $modelo[0],
            'marca' => $marcas
        );
        return $dados;
    }

    public function gravar() {
        if ($this->modelo_id > 0):
            $sql = "UPDATE modelo SET modelo_marca = '$this->modelo_marca', modelo_nome = '$this->modelo_nome', modelo_url = '$this->modelo_url' WHERE modelo_id = $this->modelo_id";
        else:
            $sql = "INSERT INTO modelo (modelo_marca,modelo_nome,modelo_url) VALUES ('$this->modelo_marca','$this->modelo_nome','$this->modelo_url');";
        endif;
        $this->db->query($sql);
    }

    public function remover() {
        $sql = "DELETE FROM modelo WHERE modelo_id = $this->modelo_id";
        $this->db->query($sql);
    }

}
