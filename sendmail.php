<?php session_start(); $nome = $_POST["nome"]; $email = $_POST["email"]; $mensagem = $_POST["mensagem"];

require_once("../PHPMailer/PHPMailerAutoload.php");

$mail = new PHPMailer(); $mail->isSMTP(); $mail->Host = "smtp.gmail.com"; $mail->Port = 587; $mail->SMTPSecure = "tls"; $mail->SMTPAuth = true; $mail->Username = "daniel.damato88@gmail.com"; $mail->Password = "daniel31";

$mail->SMTPDebub = 2;

$mail->setFrom('ame@gmail.com', 'Ame-Estetica Contato'); $mail->addAddress("xxxx@yahoo.com", "HFF"); $mail->Subject = "Ame Estetica, Contatos de Clientes"; $mail->MsgHTML("

de: {$nome}email: {$email}mensagem: {$mensagem}"); $mail->AltBody = "de: {$nome}\nemail: {$email}\nmensagem: {$mensagem}";
if($mail->send()) { $_SESSION["success"] = 'Mensagem enviada com sucesso!!'; header('Location: index.php'); } else { $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo; $mail->SMTPDebug = 2; header("Location: contato.php"); } die();
