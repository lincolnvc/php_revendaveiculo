<?php

Class ModelUsuario {

    public $usuario_id;
    public $usuario_login;
    public $usuario_senha;

    public function __construct() {
        $this->db = new DB;
    }

    public function getAll() {
        $sql = "SELECT * FROM usuario";
        $dados = $this->db->fetchAll($sql);
        return $dados;
    }

    public function getById() {
        $sql = "SELECT * FROM usuario WHERE usuario_id = $this->usuario_id";
        $dados = $this->db->fetchAll($sql);
        return $dados[0];
    }

    public function incluir() {
        $sql = "INSERT INTO usuario (usuario_login,usuario_senha) VALUES ( '$this->usuario_login','$this->usuario_senha');";
        $this->db->query($sql);
    }

    public function delete() {
        $sql = "DELETE FROM usuario WHERE usuario_id = $this->usuario_id";
        $this->db->query($sql);
    }

}
