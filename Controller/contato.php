<?php

Class Contato {

    public function indexAction() {
        $dados = array(
            'auto' => (new ModelAuto)->get_autos_destaque(),
            'auto_topo' => (new ModelAuto)->get_autos_topo(),
            'parceiro' => (new ModelSlide)->getAll(5),
            'servico' => (new ModelServico)->getAll(1),
            'social' => (new ModelSocial)->getById(),
            'agencia' => (new ModelAgencia)->getById()
        );
        Tpl::View("site/contato", $dados);
    }

    public function enviar() {
        $config = (new ModelSmtp)->get();

//DADOS DO FORMULARIO
        $email = $_POST['email'];
        $nome = utf8_decode($_POST['nome']);
        $tel = addslashes($_POST['tel']);
        $mensagem = nl2br(utf8_decode($_POST['mensagem']));

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
        $body .= "<b>Data:    </b> $data";
//NAO ALTERAR
        $mail->AddReplyTo("$email");
        $mail->Subject = $assunto;
        $mail->MsgHTML($body);
        $mail->AddAddress($email_destino);
        $mail->AddBCC($config[0]->smtp_bcc);
        //$mail->SMTPDebug = 1;
        if (!$mail->Send()) {
            Router::redirect(Router::base() . "/contato?email-erro");
        } else {
            Router::redirect(Router::base() . "/contato?email-sucesso");
        }
    }
}
