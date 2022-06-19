<?php

class Tpl {

	public static function view($tpl, $dados = array()){
		$view = "View/$tpl.php";
		if(file_exists($view)){
			require_once "View/$tpl.php";
		}else{
			echo utf8_decode("Arquivo $view não encontrado no diretório!");
                        exit;
		}
	}
}