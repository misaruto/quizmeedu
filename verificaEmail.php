<?php 
if ((isset($_REQUEST['email']))&&($_REQUEST['email'] != "")) {
	include './configs.php';
	$m = $_REQUEST['email'];
	$query = "SELECT * FROM tbl_usuarios WHERE email = '$m'";
	$result =  mysqli_query($con,$query);
	$row = mysqli_fetch_object($result);
	if (!empty($row)) {
		$codigo = rand(100000,999999);
		$query = "UPDATE `tbl_usuarios` SET `codigo` = '$codigo' WHERE `id` = '$row->id'";
		if (mysqli_query($con,$query)) {

			include 'PHPMailer-master/PHPMailerAutoload.php';


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
			<h2>Recuperação de senha Quiz ME EDU</h2>
			<div style="font-size: 26px">
			'.$row->nome.'
			seu codigo de verificação: 
			</div>
			<div style="width: 130px;height: 38px;font-size: 30px;background-color: #6dd8e4e6;border-style: solid;">
			'.$codigo.'	
			</div>
			<div style="font-size: 20px">
			Por favor não responda esse E-mail.
			</div>
			</div>
			</center>
			</body>
			</html>'; 



			$mail = new PHPMailer();
			/* Montando o Email*/
			$mail->IsSMTP(); /* Ativar SMTP*/
			$mail->SMTPDebug = 0; /* Debugar: 1 = erros e mensagens, 2 = mensagens apenas*/
			$mail->SMTPAuth = true; /* Autenticação ativada */
			$mail->SMTPSecure = 'tls'; /* TLS REQUERIDO pelo GMail*/
			$mail->Host = 'smtp.gmail.com'; /* SMTP utilizado*/
			$mail->Port = 587; /* A porta 465 deverá estar aberta em seu servidor*/
			$mail->Username = 'quizmeedu@gmail.com';
			$mail->Password = 'MISAruto000';
			$mail->CharSet = 'UTF-8'; 
			$mail->SetFrom(GUSER,'Quiz ME EDU');
			$mail->Subject = "Codigo de recuperação Quiz Me EDU.";
			$mail->Body = $body;
			$mail->AddAddress($m);
			$mail->IsHTML(true);




// Opcional: Anexos 
// $mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf"); 

// Envia o e-mail 
			$enviado = $mail->Send(); 

// Exibe uma mensagem de resultado 
			if ($enviado){
				setcookie('uid',$row->id);
				?>1<?php
			} 
			else { 
				echo "Houve um erro enviando o email: ".$mail->ErrorInfo; 
			} 
		}
	}
	else{
		?>
		0
		<?php
	}
}
else{
	?>
	0
	<?php
}
?>