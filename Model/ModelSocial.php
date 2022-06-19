<?php

Class ModelSocial {

    public $social_id;
    public $social_facebook;
    public $social_twitter;
    public $social_linkedin;
    public $social_pinterest;
    public $social_google;
    public $social_instagram;
    public $social_vimeo;

    public function __construct() {
        $this->db = new DB;
    }

    public function getById() {
        $dados = $this->db->fetchAll("SELECT * FROM social WHERE social_id = 1");
        return $dados[0];
    }

    public function atualizar() {
        $sql = "UPDATE social SET social_twitter = '$this->social_twitter', social_pinterest = '$this->social_pinterest', social_google = '$this->social_google',social_instagram = '$this->social_instagram', social_linkedin = '$this->social_linkedin',social_vimeo = '$this->social_vimeo',social_facebook = '$this->social_facebook' WHERE social_id = 1";
        $this->db->query($sql);
    }

}

