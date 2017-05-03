<?php session_start();
$remet 			= $_POST["remetente"];
$email_remet 	= $_POST["email_remet"];
$fone_remet 	= $_POST["fone_remet"];
$cel_remet 		= $_POST["cel_remet"];
$assunto1 		= $_POST["assunto"];
$corpo1 			= $_POST["corpo_mail"];
$Vai 		= "Nome: $remet\n\nE-mail: $email_remet\n\nTelefone: $fone_remet\n\nCelular: $cel_remet\n\nAssunto: $assunto1\n\nMensagem: $corpo1\n";


/*
$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];
*/

require_once("PHPMailer\PHPMailerAutoload.php");


$mail = new PHPMailer(); 
$mail->isSMTP(); 
$mail->Host = "smtp.gmail.com";
$mail->Port = 587; 
$mail->SMTPSecure = "tls"; 
$mail->SMTPAuth = true; 
$mail->Username = "daniel.damato88@gmail.com"; 
$mail->Password = "daniel31";
$mail->SMTPDebub = 2;


$mail->setFrom('daniel.damato88@gmail.com', 'Ame-Estetica Contato'); $mail->addAddress("ddamato@lemontech.com.br", "HFF"); $mail->Subject = "Ame Estetica, Contatos de Clientes"; $mail->MsgHTML($Vai);
if($mail->send()) { $_SESSION["success"] = 'Mensagem enviada com sucesso!!'; header('Location: index.php'); 
} else {
$_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo; $mail->SMTPDebug = 2; header("Location: contato.php"); } die();


?>
