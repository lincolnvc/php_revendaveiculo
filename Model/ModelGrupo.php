<?php

Class ModelGrupo {

    public $grupo_id;
    public $grupo_nome;

    public function __construct() {
        $this->db = new DB;
    }

    public function getAll() {
        $sql = "SELECT * FROM grupo ORDER BY grupo_nome ASC";
        return $dados = $this->db->fetchAll($sql);
    }

    public function editar() {
        $sql = "SELECT * FROM grupo WHERE grupo_id = $this->grupo_id";
        return $dados = $this->db->fetchAll($sql);
    }

    public function gravar() {
        if ($this->grupo_id > 0):
            $sql = "UPDATE grupo SET grupo_nome = '$this->grupo_nome' WHERE grupo_id = $this->grupo_id;";
        else:
            $sql = "INSERT INTO grupo (grupo_nome) VALUES ( '$this->grupo_nome');";
        endif;
        $this->db->query($sql);
    }

    public function incluir() {
        $sql = "INSERT INTO grupo (grupo_nome) VALUES ( '$this->grupo_nome');";
        $this->db->query($sql);
    }

    public function atualizar() { //METODO UTILIZADO PARA ATUALIZAR DADOS DE UM REGISTRO - RECEBE COMO PARAMETRO O ID DO REGISTRO (REGISTRO = LINHA DO BANCO) 
        //MONTA EM UMA STRING UMA CLAUSA (QUERY) SQL 
        $sql = "UPDATE grupo SET grupo_nome = '$this->grupo_nome' WHERE grupo_id = $this->grupo_id;";
        //ENVIA PARA P MYSQL OU PDO  A CLAUSULA/QUERY CRIADA NA STRING $SQL
        $this->db->query($sql);
    }

    public function remover() {
        $autoopc = "DELETE FROM auto_opc WHERE auto_opc_auto = $this->opcional_id";
        $this->db->query($autoopc);
        $autoitem = "DELETE FROM auto_opc WHERE auto_opc_item = $this->opcional_id";
        $this->db->query($autoitem);
        $poc = "DELETE FROM opcional WHERE opcional_id = $this->opcional_id";
        $this->db->query($poc);
        $grupo = "DELETE FROM grupo WHERE grupo_id = $this->grupo_id";
        $this->db->query($grupo);

    }

}
