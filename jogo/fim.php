<?php 
if (!isset($_COOKIE['userid'])) {
	header('location:../');
}
include '../configs.php';
if ((!isset($_COOKIE['seq']))||(!isset($_COOKIE['maf']))||(!isset($_COOKIE['idaula']))) {
	header('location:./jogo.php');
}
else{
	$seq = $_COOKIE['seq'];
	$maf = $_COOKIE['maf'];
	$id = $_COOKIE['userid'];
	$a = $_COOKIE['idaula'];

	include '../configs.php';
	$sql = "UPDATE `tbl_usuario_aula` SET completa = '1' WHERE id_usuario = '$id' AND id_aula = '$a'";
	if (mysqli_query($con,$sql)) {

		$sql = "SELECT * FROM tbl_perguntas, tbl_destinos WHERE tbl_destinos.codigo = '$maf' AND tbl_perguntas.id_destino = tbl_destinos.id AND id_sequencia = '$seq'";
		
		$query = mysqli_query($con,$sql);
		$row = mysqli_fetch_object($query);
		$msg = $row->pergunta; 

	//apaga todos os cookies referente a avaliação
		setcookie('idaula','');
		setcookie('seq','');
		setcookie('maf','');
		setcookie('pergunta','');
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Quiz-Me EDU</title>
			<link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon" />
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
			<meta charset="utf-8">
			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
			<meta name="viewport" content="width=device-width">
		</head>
		<body>
			<div  id="msg">
				<div style="padding: 100px; font-size: 40px;" >
					<center>
						<?=nl2br($msg)?>
					</center>
				</div>
				<br>
				<center>
					<div class="progress" style="width: 400px;" id="progress-container">
						<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" aria-valuemin="0" aria-valuemax="100" id="progress"></div>
					</div>
				</center>
			</div>
			<?php 
			$sql = "SELECT * FROM `tbl_respostas`, tbl_perguntas WHERE tbl_respostas.id_pergunta = tbl_perguntas.id AND id_usuario = '$id' AND tbl_respostas.id_aula = '$a'";
			$query = mysqli_query($con, $sql);
			$total = 0;

			while ($row = mysqli_fetch_object($query)) {
				$r = $row->resposta;
				$p = $row->resposta;

				$sql_pontos = "SELECT resposta_$row->resposta, pontos_$row->resposta FROM tbl_perguntas,tbl_destinos WHERE tbl_perguntas.id = '$row->id' AND tbl_perguntas.id_destino = tbl_destinos.id";
				$query_pontos = mysqli_query($con, $sql_pontos);
				$row_pontos = mysqli_fetch_array($query_pontos);

				$resposta = $row_pontos['resposta_'.$r];
				$pontos = $row_pontos['pontos_'.$p];
				$total = $total + $pontos;
			}

			$sql = "SELECT * FROM tbl_finais WHERE pontuacao_min <= '$total' AND pontuacao_max >= '$total' AND id_sequencia = '$seq'";
			$query = mysqli_query($con,$sql);
			$row = mysqli_fetch_object($query);
			$final = $row->final;
			?>
			<center>
				<button type="button" onclick="showFin()" id="btn" class="btn btn-primary" hidden>
					Mostrar Final
				</button>
			</center>
			<div id="pontos" hidden>
				<div style="padding: 100px; font-size: 40px;" >
					<center>
						<?=nl2br($final)?>
						<br>
						<button type="button" class="btn btn-primary" onclick="voltar()">Voltar</button>
					</center>
				</div>
			</div>
			<script type="text/javascript">
				var i = 1;
				var loop = setInterval(function(){ 
					document.getElementById('progress').style = "width: "+i+"%; z-index:0;"; 
					if(i == 108){
						document.getElementById('btn').hidden = false;
					}
					i++;
				}, 100);
				function voltar(){
					window.location.assign('./');
				}
				function showFin(){
					document.getElementById('msg').hidden = true;
					document.getElementById('btn').hidden = true;
					document.getElementById('pontos').hidden = false;
					document.getElementById('progress-container').hidden = true;
				}
			</script>
		</body>
		</html>
		<?php 
	}
}
?>





