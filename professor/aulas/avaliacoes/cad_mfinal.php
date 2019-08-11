<?php 
if ((!isset($_COOKIE['profid']))&&(!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
if (isset($_COOKIE['profid'])) {
	$id = $_COOKIE['profid'];
}
if (isset($_COOKIE['rootid'])) {
	$id = $_COOKIE['rootid'];
}
if (isset($_COOKIE['admid'])){
	$id = $_COOKIE['admid'];
}
if (isset($_COOKIE['idseq'])){
	$idseq = $_COOKIE['idseq'];
}

include '../../../configs.php';

if ((isset($_REQUEST['mfa']))&&(isset($_REQUEST['mfb']))&&(isset($_REQUEST['mfc']))) {
	
	$mf[1] = $_REQUEST['mfa'];
	$mf[2] = $_REQUEST['mfb'];
	$mf[3] = $_REQUEST['mfc'];
	
	$cod[1] = "mFa";
	$cod[2] = "mFb";
	$cod[3] = "mFc";
	//Retira todas as aspas simples da mensagem para evitar erros com a clausula sql
	$mf[1] = str_replace("'","\"",$mf[1]);
	$mf[2] = str_replace("'","\"",$mf[2]);
	$mf[3] = str_replace("'","\"",$mf[3]);
	if (($mf[1] != "")&&($mf[2] != "")&&($mf[3] != "")) {
		for ($i= 1; $i <= 3 ; $i++) { 
			
			//descobre o id da ultima pergunta adcionada
			$sql = "SELECT max(`id_pergunta_seq`) FROM `tbl_perguntas` where id_sequencia = '$idseq'";
			$query = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($query);
			$idp = $row['max(`id_pergunta_seq`)'] + 1;


			//descobre o id e o numero da tabela destinos referente a mensagem final em questão
			$sql = "SELECT id, numero_pergunta FROM tbl_destinos WHERE codigo = '".$cod[$i]."'";
			$query = mysqli_query($con, $sql);
			$row = mysqli_fetch_object($query);
			$destino = $row->id;
			$np = $row->numero_pergunta;

			//insere a mensagem final
			$sql = "INSERT INTO `tbl_perguntas`(`id_sequencia`, `pergunta`, `resposta1`, `resposta2`, `resposta3`, `id_professor`, `id_pergunta_seq`, `id_destino`, `n_p_destino`) VALUES ('$idseq', '".$mf[$i]."','-', '-', '-', '$id', '$idp', '$destino', '$np')";

			if (mysqli_query($con, $sql)) {

			}
			else{
				$erro[] = "$i";
			}
		}
		if ($i >= 3) {
			?>
			<!DOCTYPE html>
			<html>
			<head>
				<title></title>
			</head>
			<body>
				<script type="text/javascript">
					alert('Mensagens cadastradas com sucesso, você será redirecionado à página de cadastro dos finais');
					window.location.assign('./?opt=7');
				</script>
			</body>
			</html>
			<?php
		}
		else{
			?>
			<!DOCTYPE html>
			<html>
			<head>
				<title></title>
			</head>
			<body>
				<script type="text/javascript">
					alert('Algumas das mensagens não foram cadastradas. Por favor envie um FeedBack aos desenvolvedores');
					window.location.assign('./?opt=6');
				</script>
			</body>
			</html>
			<?php
		}
	}
}
else{
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<script type="text/javascript">
			alert('Algumas das mensagens não recebidas. Por favor envie um FeedBack aos desenvolvedores');
			window.location.assign('./?opt=6');
		</script>
	</body>
	</html>
	<?php
}
?>