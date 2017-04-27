<?php

$remet 			= $_POST[remetente];
$email_remet 	= $_POST[email_remet];
$fone_remet 	= $_POST[fone_remet];
$cel_remet 		= $_POST[cel_remet];
$assunto1 		= $_POST[assunto];
$corpo1 			= $_POST[corpo_mail];


$Vai 		= "Nome: $remet\n\nE-mail: $email_remet\n\nTelefone: $fone_remet\n\nCelular: $cel_remet\n\nAssunto: $assunto1\n\nMensagem: $corpo1\n";

require_once("PHPMailer/class.phpmailer.php");

define('GUSER', 'daniel.damato88@gmail.com');	// <-- Insira aqui o seu GMail
define('GPWD', 'daniel31');		// <-- Insira aqui a senha do seu GMail

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
	global $error;
	$mail = new PHPMailer();
	$mail->IsSMTP();		// Ativar SMTP
	$mail->SMTPDebug = 1;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true;		// Autenticação ativada
	$mail->SMTPSecure = 'ssl';	// SSL REQUERIDO pelo GMail
	$mail->Host = 'smtp.gmail.com';	// SMTP utilizado
	$mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
	$mail->Username = GUSER;
	$mail->Password = GPWD;
	$mail->SetFrom($de, $de_nome);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
	$mail->AddAddress($para);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Mensagem enviada!';
		return true;
	}}

// Insira abaixo o email que irá receber a mensagem, o email que irá enviar (o mesmo da variável GUSER), 
//o nome do email que envia a mensagem, o Assunto da mensagem e por último a variável com o corpo do email.

 if (smtpmailer('daniel.damato88@gmail.com', 'daniel.damato88@gmail.com', 'Site-ACC', 'Mensagem do Site', $Vai)) {

	Header("location:https://danieldamato.github.io/aconchegodaserra/"); // Redireciona para uma página de obrigado.

}
if (!empty($error)) echo $error;
?>
