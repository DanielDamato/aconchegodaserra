<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Contato</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" >
						<h1><a href="index.html">Aconchego da Serra</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>MENU</span></a>
									<div id="menu">
										<ul>
											<li><a href="index.html">Home</a></li>
											<li><a href="generic.html">Contato</a></li>
											<li><a href="elements.html">Como chegar</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Main -->

						<section class="wrapper style4">
							<div class="inner">



<?php session_start(); $nome = $_POST["nome"]; $email = $_POST["email"]; $mensagem = $_POST["mensagem"];

require_once("aconchegodaserra/PHPMailer/PHPMailerAutoload.php");

$mail = new PHPMailer(); $mail->isSMTP(); $mail->Host = "smtp.gmail.com"; $mail->Port = 587; $mail->SMTPSecure = "tls"; $mail->SMTPAuth = true; $mail->Username = "daniel.damato88@gmail.com"; $mail->Password = "daniel31";

$mail->SMTPDebub = 2;

$mail->setFrom('ame@gmail.com', 'Ame-Estetica Contato'); $mail->addAddress("xxxx@yahoo.com", "HFF"); $mail->Subject = "Ame Estetica, Contatos de Clientes"; $mail->MsgHTML("

de: {$nome}email: {$email}mensagem: {$mensagem}"); $mail->AltBody = "de: {$nome}\nemail: {$email}\nmensagem: {$mensagem}";
if($mail->send()) { $_SESSION["success"] = 'Mensagem enviada com sucesso!!'; header('Location: index.php'); } else { $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo; $mail->SMTPDebug = 2; header("Location: contato.php"); } die();
                
?>
                
						</div>
						</section>
					

				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="https://www.facebook.com/aconchegoda.serra.7?fref=ts" target="_blank" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.instagram.com/aconchegodaserracampinp/?hl=pt-br" target="_blank" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="daniel.damato88@gmail.com" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
						</ul>
						<ul class="copyright">
							<li>&copy; Daniel D'Amato</li><li>2017</li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>                
                
