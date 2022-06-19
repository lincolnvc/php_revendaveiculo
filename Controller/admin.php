<?php
@session_start();
Class Admin {

    public function __construct() {
        Sessao::checar();
    }

    public function indexAction() {
        Tpl::View("adm/home/index");
    }
}
