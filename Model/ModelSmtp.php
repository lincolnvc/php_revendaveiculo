<?php

Class ModelSmtp {

    public $smtp_id;
    public $smtp_host;
    public $smtp_email;
    public $smtp_senha;
    public $smtp_nome;
    public $smtp_porta;
    public $smtp_bcc;
    public $smtp_assunto;

    public function __construct() {
        $this->db = new DB;
    }

    public function get() {
        $dados = $this->db->fetchAll("SELECT * FROM smtp WHERE smtp_id = 1");
        return $dados;
    }

    public function atualizar() {
        $sql = "UPDATE smtp SET smtp_host = '$this->smtp_host', smtp_email = '$this->smtp_email', ";
        if (isset($_POST['smtp_senha']) && $_POST['smtp_senha'] != "") {
            $sql .= " smtp_senha = '$this->smtp_senha', ";
        }
        $sql .= " smtp_nome = '$this->smtp_nome',smtp_porta = '$this->smtp_porta', smtp_bcc = '$this->smtp_bcc', smtp_assunto = '$this->smtp_assunto' WHERE smtp_id = 1;";
        $this->db->query($sql);
    }

}
