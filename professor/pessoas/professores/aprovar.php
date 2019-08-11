<?php 
if ((!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
if (isset($_COOKIE['admid'])) {
	$id = $_COOKIE['admid'];
}
if (isset($_COOKIE['rootid'])) {
	$id = $_COOKIE['rootid'];
}
include '../../../configs.php';

if (isset($_REQUEST['id'])) {
	$uid = $_REQUEST['id'];
	$query = "UPDATE `tbl_professor` SET `confirmado`= '1' WHERE id = '$uid'";
	if (mysqli_query($con, $query)) {	
		$query = "SELECT id FROM tbl_requisicoes where id_user = '$uid' AND posicao = '0'";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_object($result);
		$rid = $row->id;
		$query = "UPDATE `tbl_requisicoes` SET`atendida`= '1' WHERE id = '$rid'";
	
		if (mysqli_query($con, $query)) 
		{
	//descobre o email do usuario
			$query = "SELECT email FROM tbl_professor WHERE id = '$uid'";
			$result = mysqli_query($con,$query);
			$row = mysqli_fetch_object($result);
			$m = $row->email;


			include '../../../PHPMailer-master/PHPMailerAutoload.php';


		// Inicia a classe PHPMailer 
			$mail = new PHPMailer(); 

			define('GUSER', 'quizmeedu@gmail.com');
			define('GPWD', 'MISAruto000');

	// Corpo do email 
			$body = '<!DOCTYPE html>
			<html>
			<head>
			<meta charset="utf-8">
			<title></title>
			</head>
			<body>
			<center>
			<div>
			<h2>Usuário aprovado. Bem vindo ao Quiz ME EDU</h2>
			Parabéns, voce acaba de ser autorizado a acessar o sistema.<br>
			Clique <a href="quizmeedu.ga/professor">AQUI</a> para acessar a área de professor. <br>
			Por favor não responda esse E-mail.
			</div>
			</div>
			</center>
			</body>
			</html>'; 



			$mail = new PHPMailer();
			/* Montando o Email*/
			$mail->IsSMTP(); /* Ativar SMTP*/
			//$mail->SMTPDebug = 1; /* Debugar: 1 = erros e mensagens, 2 = mensagens apenas*/
			$mail->SMTPAuth = true; /* Autenticação ativada */
			$mail->SMTPSecure = 'tls'; /* TLS REQUERIDO pelo GMail*/
			$mail->Host = 'smtp.gmail.com'; /* SMTP utilizado*/
			$mail->Port = 587; /* A porta 465 deverá estar aberta em seu servidor*/
			$mail->Username = 'quizmeedu@gmail.com';
			$mail->Password = 'MISAruto000';
			$mail->CharSet = 'UTF-8'; 
			$mail->SetFrom(GUSER,'Quiz ME EDU');
			$mail->Subject = "Login aprovado - Quiz ME EDU";
			$mail->Body = $body;
			$mail->AddAddress($m);
			$mail->IsHTML(true);




// Opcional: Anexos 
// $mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf"); 

// Envia o e-mail 
			$enviado = $mail->Send(); 

// Exibe uma mensagem de resultado 
			if ($enviado){
				?>
				<script type="text/javascript">
					window.location.assign('./');
				</script>
				<?php
			} 
			else { 
				echo "Houve um erro enviando o email: ".$mail->ErrorInfo; 
			} 
		}	
	}
}
?>