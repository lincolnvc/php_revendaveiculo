<?php

Class ModelSlide {

    public $slide_id;
    public $slide_nome;
    public $slide_foto = null;
    public $slide_local;
    public $slide_pos;
    public $slide_link;
    public $slide_nova;

    public function getAll($slide_local = 1) {
        $db = new DB;
        $dados = $db->fetchAll("SELECT * FROM slide WHERE slide_local = $slide_local ORDER BY slide_id DESC");
        return $dados;
    }

    public function add() {
        $sql = "INSERT INTO slide (slide_nome,slide_link,slide_foto,slide_local,slide_nova) VALUES ( '$this->slide_nome','$this->slide_link','$this->slide_foto',$this->slide_local,'$this->slide_nova');";
        $db = new DB; //insere na tabela foto 
        $db->query($sql);
    }

    public function get_by_id() {
        $db = new DB;
        return $db->fetchAll("SELECT * FROM slide WHERE slide_id = $this->slide_id");
    }

    public function get_foto_by_id() {
        $db = new DB;
        $foto = $db->fetchAll("SELECT slide_foto FROM slide WHERE slide_id = $this->slide_id");
        return $foto[0]->slide_foto;
    }

    public function update() {
        $sql = "UPDATE slide SET slide_nome = '$this->slide_nome',slide_link = '$this->slide_link', slide_local = $this->slide_local, slide_nova = '$this->slide_nova' ";
        if ($this->slide_foto != null) {
            $sql .= ", slide_foto = '$this->slide_foto'  ";
        }
        $sql .= " WHERE slide_id = $this->slide_id;";
        $db = new DB;
        $db->query($sql);
    }

    public function del($pasta = 'slide') {
        //recupera nome do arquivo/foto
        $slide_foto = $this->get_foto_by_id();
        //concatena possivel caminho do arquivo
        $arquivo = "midias/$pasta/$slide_foto";
        //verifica se arquivo existe no disco
        if (file_exists($arquivo)) {
            //remove arquivo do disco
            unlink($arquivo);
        }
        //remove registro do banco
        $sql = "DELETE FROM slide WHERE slide_id = $this->slide_id";
        $db = new DB;
        $db->query($sql);
    }

}
