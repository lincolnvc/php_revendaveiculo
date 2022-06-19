<?php

@session_start();

Class Auto extends ModelAuto {

    public function __construct() {
        parent::__construct();
        Sessao::checar();
    }

    public function indexAction() {
        $this->auto_id = intval(Router::getUri(2));
        $dados = array(
            'auto' => $this->get_all_order(),
            'foto' => $this->get_fotos()
        );
        Tpl::view("adm/auto/index", $dados);
    }

    public function novo() {
        $marca = (new ModelMarca)->getAll();
        $modelo = (new ModelModelo)->getAll();
        $versao = (new ModelVersao)->getAll();
        $cor = (new ModelCor)->getAll();
        $cambio = (new ModelCambio)->getAll();
        $combustivel = (new ModelCombustivel)->getAll();
        $carroceria = (new ModelCarroceria)->getAll();
        $documentacao = (new ModelDocumentacao)->getAll();
        $necessidade = (new ModelNecessidade)->getAll();
        $opc = (new ModelOpcional)->get_lista();
        $dados = array(
            'marca' => $marca,
            'modelo' => $modelo,
            'versao' => $versao,
            'cor' => $cor,
            'cambio' => $cambio,
            'combustivel' => $combustivel,
            'carroceria' => $carroceria,
            'documentacao' => $documentacao,
            'necessidade' => $necessidade,
            'opc' => $opc
        );
        Tpl::view("adm/auto/novo", $dados);
    }

    public function editar() {
        $this->auto_id = intval(Router::getUri(2));
        $versao = (new ModelVersao)->getAll();
        $marca = (new ModelMarca)->getAll();
        $modelo = (new ModelModelo)->getAll();
        $cor = (new ModelCor)->getAll();
        $cambio = (new ModelCambio)->getAll();
        $combustivel = (new ModelCombustivel)->getAll();
        $carroceria = (new ModelCarroceria)->getAll();
        $documentacao = (new ModelDocumentacao)->getAll();
        $necessidade = (new ModelNecessidade)->getAll();
        $opc = (new ModelOpcional)->get_lista();
        $auto = $this->get_by_id($this->auto_id);
        $dados = array(
            'marca' => $marca,
            'modelo' => $modelo,
            'versao' => $versao,
            'cor' => $cor,
            'cambio' => $cambio,
            'combustivel' => $combustivel,
            'carroceria' => $carroceria,
            'documentacao' => $documentacao,
            'necessidade' => $necessidade,
            'auto' => $auto[0],
            'opc' => $opc
        );
        Tpl::view("adm/auto/editar", $dados);
    }

    public function remover() {
        $this->auto_id = intval(Router::getUri(2));
        parent::remover();
        Router::redirect(Router::base() . "/auto/?removido");
    }

    public function incluir() {
        $this->auto_marca = intVal($_POST['auto_marca']);
        $this->auto_modelo = intVal($_POST['auto_modelo']);
        $this->auto_versao = intVal($_POST['auto_versao']);
        $this->auto_placa = $_POST['auto_placa'];
        $this->auto_placa_num = $_POST['auto_placa_num'];
        $this->auto_obs = addslashes($_POST['auto_obs']);
        $this->auto_ano = $_POST['auto_ano'];
        $this->auto_preco = $_POST['auto_preco'];
        $this->auto_estado = intVal($_POST['auto_estado']);
        $this->auto_negociacao = intVal($_POST['auto_negociacao']);
        $this->auto_km = $_POST['auto_km'];
        $this->auto_porta = $_POST['auto_porta'];
        $this->auto_url = Util::slug($this->auto_versao);
        $this->auto_destaque = intVal($_POST['auto_destaque']);
        $this->auto_oferta = intVal($_POST['auto_oferta']);
        $this->auto_cor = intVal($_POST['auto_cor']);
        $this->auto_cambio = intVal($_POST['auto_cambio']);
        $this->auto_combustivel = intVal($_POST['auto_combustivel']);
        $this->auto_carroceria = intVal($_POST['auto_carroceria']);
        $this->auto_documentacao = intVal($_POST['auto_documentacao']);
        $this->auto_necessidade = intVal($_POST['auto_necessidade']);
        $this->auto_seo_desc = addslashes($_POST['auto_seo_desc']);
        $this->auto_seo_keys = addslashes($_POST['auto_seo_keys']);
        $this->auto_opc = "";
        if (!empty($_POST['auto_opc'])) {
            $this->auto_opc = implode("|", $_POST['auto_opc']);
        }
        parent::incluir();
        Router::redirect(Router::base() . "/auto/?cadastrado");
    }

    public function atualizar() {
        $this->auto_id = intval($_POST['auto_id']);
        $this->auto_marca = intVal($_POST['auto_marca']);
        $this->auto_modelo = intVal($_POST['auto_modelo']);
        $this->auto_versao = intVal($_POST['auto_versao']);
        $this->auto_placa = $_POST['auto_placa'];
        $this->auto_placa_num = $_POST['auto_placa_num'];
        $this->auto_obs = $_POST['auto_obs'];
        $this->auto_ano = $_POST['auto_ano'];
        $this->auto_preco = $_POST['auto_preco'];
        $this->auto_estado = $_POST['auto_estado'];
        $this->auto_negociacao = intVal($_POST['auto_negociacao']);
        $this->auto_km = $_POST['auto_km'];
        $this->auto_porta = $_POST['auto_porta'];
        $this->auto_url = Util::slug($this->auto_versao);
        $this->auto_destaque = intVal($_POST['auto_destaque']);
        $this->auto_oferta = intVal($_POST['auto_oferta']);
        $this->auto_cor = intVal($_POST['auto_cor']);
        $this->auto_cambio = intVal($_POST['auto_cambio']);
        $this->auto_combustivel = intVal($_POST['auto_combustivel']);
        $this->auto_carroceria = intVal($_POST['auto_carroceria']);
        $this->auto_documentacao = intVal($_POST['auto_documentacao']);
        $this->auto_necessidade = intVal($_POST['auto_necessidade']);
        $this->auto_seo_desc = $_POST['auto_seo_desc'];
        $this->auto_seo_keys = $_POST['auto_seo_keys'];
        $this->auto_opc = "";
        if (!empty($_POST['auto_opc'])) {
            $this->auto_opc = implode("|", $_POST['auto_opc']);
        }
        parent:: atualizar();
       Router::redirect(Router::base() . "/auto/$this->auto_id/?ok");
    }

    public function foto() {
        $this->auto_id = intval(Router::getUri(2));
        $auto = $this->get_by_id($this->auto_id);
        $dados = array(
            'auto' => $auto[0],
            'foto' => $this->get_fotos()
        );
        Tpl::view("adm/auto/foto", $dados);
    }

    public function foto_incluir() {
        $midia = explode("/Controller", __DIR__);
        $diretorio = $midia[0] . "/midias/fotos/";
        $array_extensao = explode(".", $_FILES['file']['name']); //retorna um array separando os . (pontos) do nome do arquivo
        $extensao = $array_extensao[count($array_extensao) - 1]; //retorna o ultimo indice do array  ex: jpg
        if (!empty($_FILES)) {   //verifica se arquivo foi enviado
            $arquivo_temporario = $_FILES['file']['tmp_name']; //retorna nome temporario do arquivo (dado binarios)
            $arquivo_nome = uniqid(md5($_FILES['file']['name'])) . "." . $extensao; //gera um nome unico para o arquivo . extensao
            $arquivo_final = $diretorio . $arquivo_nome;  // cria um caminho absoluto para o arquivo  ex /var/html/projeto/fotos/nomedoarquivo.extensao
            move_uploaded_file($arquivo_temporario, $arquivo_final); //move o arquivo para o diretorio especificado
        }
        $this->foto_auto = intval(Router::getUri(2)); //recupera o id da noticia passada no url 
        $this->foto_url = $arquivo_nome; // retorna apenas o nome do arquivo para gravar na tabela fotos 
        $this->add_foto();
        echo json_encode(array('foto_auto' => $this->foto_auto, 'foto_url' => $this->foto_url));
    }

    public function removerFotos() {
        $this->auto_id = intval(Router::getUri(2));
        parent::removerFotos();
    }

    public function remover_uma_foto() {
        $this->foto_id = Router::getUri(2);
        $foto_url = Router::getUri(3);
        $foto_auto = Router::getUri(4);
        $arquivo = "midias/fotos/$foto_url";
        //verifica se arquivo existe
        if (file_exists($arquivo)) {
            //remove arquivo do disco
            unlink($arquivo);
        }
        $this->remover_foto();
    }

}
