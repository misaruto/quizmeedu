<?php 
if ((isset($_REQUEST['n']))&&(isset($_REQUEST['m']))&&(isset($_REQUEST['l']))&&(isset($_REQUEST['senha']))) {
	$lattes ="";
	$desc = "";
	if (isset($_REQUEST['lattes'])) {
		$lattes = $_REQUEST['lattes'];
	}
	else{
		if (isset($_REQUEST['desc'])) {
			$desc = $_REQUEST['desc'];
		}
		else{
			header('location:./');
		}
	}
	$n = $_REQUEST['n'];
	$m = $_REQUEST['m'];
	$l = $_REQUEST['l'];
	$s = $_REQUEST['senha'];
	include '../configs.php';
	$sql = "SELECT login FROM tbl_professor";
	$q = mysqli_query($con, $sql);
	$e = 0;
	while ($row = mysqli_fetch_object($q)) {
		if ($l == $row->login) {
			?>
			<script type="text/javascript">
				alert('O login já está sendo usado.');
				window.location.assign('./cadp.php?n="<?=$n?>"&m="<?=$m?>');
			</script>
			<?php
			$e=1;
		}
	}

	$senha = md5($s);
	if (($n != "")&&($m != "")&&($l != "")&&($s != "")&&($e==0)) {
		$codigo = rand(100000,999999);
		$query = "INSERT INTO `tbl_professor`(`nome`, `email`, `login`, `senha`, `adm`,`descricao`,`lattes`,`codigo`,`verificado`, `confirmado`) VALUES ('$n','$m','$l','$senha','0','$desc','$lattes','$codigo','0','0')";
		if (mysqli_query($con, $query)) {
			$query = "SELECT * FROM tbl_professor WHERE login = '$l'";
			$result = mysqli_query($con,$query);
			$row = mysqli_fetch_object($result);
			$query = "INSERT INTO `tbl_requisicoes`(`posicao`, `porque`, `id_user`, `atendida`, `aprovada_adm`, `id_adm`, `aprovada_root`, `id_root`) VALUES('0','Recem cadastrado, decidir aprovar ou não','$row->id','0','0','0','0','0')";
	
			if (mysqli_query($con, $query)) {
				include '../PHPMailer-master/PHPMailerAutoload.php';


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
				<h2>Verrificação de E-Mail Quiz ME EDU</h2>
				<div style="font-size: 26px">
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
			//$mail->SMTPDebug = 1; /* Debugar: 1 = erros e mensagens, 2 = mensagens apenas*/
				$mail->SMTPAuth = true; /* Autenticação ativada */
				$mail->SMTPSecure = 'tls'; /* TLS REQUERIDO pelo GMail*/
				$mail->Host = 'smtp.gmail.com'; /* SMTP utilizado*/
				$mail->Port = 587; /* A porta 465 deverá estar aberta em seu servidor*/
				$mail->Username = 'quizmeedu@gmail.com';
				$mail->Password = 'MISAruto000';
				$mail->CharSet = 'UTF-8'; 
				$mail->SetFrom(GUSER,'Quiz ME EDU');
				$mail->Subject = "Codigo de segurança para cadastro.";
				$mail->Body = $body;
				$mail->AddAddress($m);
				$mail->IsHTML(true);




// Opcional: Anexos 
// $mail->AddAttachment("/home/usuario/public_html/documento.pdf", "documento.pdf"); 

// Envia o e-mail 
				$enviado = $mail->Send(); 

// Exibe uma mensagem de resultado 
				if ($enviado){
					$query = mysqli_query($con,"SELECT id FROM tbl_professor WHERE login = '$l'");
					$row= mysqli_fetch_object($query);
					$id = $row->id;
					?>
					<script type="text/javascript">
                    window.location.assign('codigo.php?id=<?=$id?>')
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
					alert('Erro ao cadastrar usuário. Tente novamente. Erro: 1')
					window.location.assign('./cadp.php')
				</script>
				<?php
			}

		}
		else{
			?>
			<script type="text/javascript">
				alert('Erro ao cadastrar usuário. Tente novamente. Erro: 2')
			window.location.assign('./cadp.php')
			</script>
			<?php
		}
	}
	else{
		?>
		<script type="text/javascript">
			alert('Erro ao cadastrar usuário. Tente novamente. Erro: 3')
			window.location.assign('./cadp.php')
		</script>
		<?php
	}
}
else{
	?>
	<script type="text/javascript">
alert('Erro ao cadastrar usuário. Tente novamente. Erro: 4');
window.location.assign('./cadp.php')
	</script>
	<?php
}

?>