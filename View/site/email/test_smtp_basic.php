

<?php


//DADOS DO FORMULARIO

$email = $_POST['email'];
$mensagem = nl2br($_POST['mensagem']);
$nome = $_POST['nome'];


//$email = "joao@joao.com";
//$mensagem = "teste";
//$nome = "Rato";

$data = date('d/m/Y H:i');

//enviar para 
$email_destino = "hugo@phpstaff.com.br";


error_reporting(E_STRICT);
date_default_timezone_set('America/Toronto');
require_once('class.phpmailer.php');

$mail             = new PHPMailer();

$mail->IsSMTP();
$mail->Host       = "mail.clares.com.br"; // SMTP server
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "mail.clares.com.br"; // sets the SMTP server
$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
$mail->Username   = "abuse@clares.com.br"; // SMTP account username
$mail->Password   = "010203";        // SMTP account password
$mail->SetFrom('abuse@clares.com.br', 'PHP Staff');

$body = "Nome: $nome <br> Email: $email_destino <br> Mensagem:<br/>$mensagem <br> Data: $data";

$address = "$email_destino";
$mail->AddReplyTo("$email");
$mail->Subject    = "$assunto";
$mail->MsgHTML($mensagem);

$mail->AddAddress($email_destino);

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}

?>

