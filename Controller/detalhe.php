<?php

Class Detalhe {

    public function indexAction() {
        $this->auto_id = intval(Router::getUri(4));
        $car = new ModelAuto;
        $auto = $car->get_by_id($this->auto_id);
        $foto = $car->get_fotos($this->auto_id);

        $dados = array(
            'auto' => $auto[0],
            'foto' => $foto,
            'auto_topo' => (new ModelAuto)->get_autos_topo(),
            'servico' => (new ModelServico)->getAll(1),
            'social' => (new ModelSocial)->getById(),
            'agencia' => (new ModelAgencia)->getById(),
            'opc' => (new ModelOpcional)->get_lista()
        );
        Tpl::view("site/detalhe", $dados);
    }

    public function enviar() {
        $config = (new ModelSmtp)->get();
       
        

//DADOS DO FORMULARIO
        $email = $_POST['email'];
        $nome = utf8_decode($_POST['nome']);
        $tel = addslashes($_POST['tel']);
        $mensagem = nl2br(utf8_decode($_POST['mensagem']));
        $auto_url = $_POST['auto_url'];
        $modelo = $_POST['modelo'];


//PARAMETROS PARA RECEBIMENTO
        $email_destino = $config[0]->smtp_email; //ONDE CHEGARÁ A MENSAGEM ENVIADA DO CONTATO
        $assunto = $config[0]->smtp_assunto; //ASSUNTO DO EMAIL PODE SER ALTERADO
//INCLUSAO DA LIB PHPMAILER
        require_once('View/site/email/class.phpmailer.php');
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $data = date('d/m/Y H:i');

//CONFIGURACOES DO SERVIDOR SMTP - SERVIDOR DE ENVIO AUTENTICADO

        $mail->SMTPAuth = true;
        $mail->Host = $config[0]->smtp_host; // ENDERECO DO SERVIDOR SMTP 
        $mail->Port = $config[0]->smtp_porta;                  //PORTA SMTP PADRAO  587 OU 25 
        $mail->Username = $config[0]->smtp_email; // CONTA DE EMAIL EXISTENTE NO SERVIDOR 
        $mail->Password = $config[0]->smtp_senha;        // SENHA DA CONTA DE EMAIL QUE FARÁ O ENVIO AUTENTICAD DA MENSAGEM
        $mail->SetFrom($config[0]->smtp_email, utf8_decode($config[0]->smtp_nome)); // EMAIL E NOME DE EXIBICAO EX:  JAO@GMAIL.COM    - JOAO DA SILVA 
//CONTEUDO ENVIADO NO CORPO DA MENSAGEM
        $body  = "<b>Dados do interessado: </b> <br><br>";
        $body .= "<b>Nome:    </b> $nome <br>";
        $body .= "<b>Telefone:    </b> $tel <br>";
        $body .= "<b>Email:   </b> $email <br>";
        $body .= "<b>Mensagem:</b> $mensagem <br>";
        $body .= "<b>Modelo:  </b> $modelo <br>";
        $body .= "<b>Link:    </b> $auto_url <br>";
        $body .= "<b>Data:    </b> $data";
//NAO ALTERAR
        $mail->AddReplyTo("$email");
        $mail->Subject = $assunto;
        $mail->MsgHTML($body);
        $mail->AddAddress($email_destino);
        $mail->AddBCC($config[0]->smtp_bcc);
        //$mail->SMTPDebug = 1;
        if (!$mail->Send()) {
            echo $mail->ErrorInfo;
            exit;
            Router::redirect(Router::base() . "/contato?email-erro");
        } else {
            Router::redirect($auto_url. "/contato?email-sucesso");
        }
    }

}
