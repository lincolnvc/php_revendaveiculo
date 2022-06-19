<?php

Class ModelShowroom {

    public $showroom_id;
    public $showroom_nome;
    public $showroom_tel;
    public $showroom_cel;
    public $showroom_func;
    public $showroom_obs;

    public function __construct() {
        $this->db = new DB;
    }

    public function getById() {
        $dados = $this->db->fetchAll("SELECT * FROM showroom");
        return $dados;
    }

    public function gravar() {
        $sql = "UPDATE showroom SET showroom_nome = '$this->showroom_nome', showroom_tel = '$this->showroom_tel', showroom_cel = '$this->showroom_cel', showroom_func = '$this->showroom_func', showroom_obs = '$this->showroom_obs' WHERE showroom_id = $this->showroom_id;";
        $this->db->query($sql);
    }

}
