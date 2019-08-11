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

if ((isset($_COOKIE['id']))&&(isset($_REQUEST['motivo']))) {
	$id = $_COOKIE['id'];
	$motivo = $_REQUEST['motivo'];
	setcookie('id','');
	//descobre o email do usuario
	$query = "SELECT email FROM tbl_professor WHERE id = '$id'";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_object($result);
	$m = $row->email;
	$query = "DELETE FROM`tbl_professor` WHERE id = '$id'";
	if (mysqli_query($con, $query)) {
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
		<h2>Login reprovado - Quiz ME EDU</h2>
		Sua requisição para se tornar um professor foi negada, tente novamente.<br>
			<h3>Motivo</h3>
			'.$motivo.'<br>
		Clique <a href="quizmeedu.ga/professor/cadp.php">AQUI</a> para acessar a área de cadastro de professores.<br>
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
		$mail->Subject = "Login reprovado";
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
	else{	
		?>
		<script type="text/javascript">
			alert('Não foi possivel apagar o usuário. Tente novamente');
			window.location.assign('./');
		</script>
		<?php
	}

}
else{
	?>
	<script type="text/javascript">
		alert('Usuário não selecionado.');
		window.location.assign('./');
	</script>
	<?php
}
?>