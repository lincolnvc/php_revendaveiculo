<?php

Class ModelOpcional {

    public $opcional_id;
    public $opcional_grupo;
    public $opcional_nome;

    public function __construct() {
        $this->db = new DB;
    }

    public function getAll() {
        $sql = "SELECT * FROM opcional LEFT JOIN grupo ON (grupo_id = opcional_grupo) ORDER BY grupo_nome ASC";
        $dados = $this->db->paginate(2)->fetchAll($sql);
        return $dados;
    }

    public function getById() {
        $opcional = $this->db->fetchAll("SELECT * FROM opcional LEFT JOIN grupo ON (grupo_id = opcional_grupo) WHERE opcional_id = $this->opcional_id");
        $dados = array(
            'opcional' => $opcional[0],
        );
        return $dados;
    }

    public function gravar() {
        if ($this->opcional_id > 0):
            $sql = "UPDATE opcional SET opcional_grupo = '$this->opcional_grupo', opcional_nome = '$this->opcional_nome' WHERE opcional_id = $this->opcional_id;";
        else:

            $sql = "INSERT INTO opcional (opcional_grupo,opcional_nome) VALUES ('$this->opcional_grupo','$this->opcional_nome');";
        endif;
        $this->db->query($sql);
    }

    public function remover() {
        $autoopc = "DELETE FROM auto_opc WHERE auto_opc_auto = $this->opcional_id";
        $this->db->query($autoopc);
        $autoitem = "DELETE FROM auto_opc WHERE auto_opc_item = $this->opcional_id";
        $this->db->query($autoitem);
        $poc = "DELETE FROM opcional WHERE opcional_id = $this->opcional_id";
        $this->db->query($poc);
    }

    public function get_by_grupo() {
        $sql = "SELECT * FROM opcional LEFT JOIN grupo ON (grupo_id = opcional_grupo) WHERE opcional_grupo = $this->opcional_grupo ORDER BY opcional_nome ASC, grupo_nome ASC";
        return $this->db->fetchAll($sql);
    }

    public function get_lista() {
        $grupo = (new ModelGrupo)->getAll();
        $all = array();
        foreach ($grupo as $g) {
            $this->opcional_grupo = $g->grupo_id;
            $item = $this->get_by_grupo();
            $all[] = array('grupo' => $g->grupo_nome, 'item' => $item);
        }
        return $all;
    }

}
