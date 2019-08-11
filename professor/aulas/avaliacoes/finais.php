<?php 
if ((!isset($_COOKIE['profid']))&&(!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
include '../../../configs.php';
if (!isset($_COOKIE['idseq'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<script type="text/javascript">
		var alert = confirm('Nenhuma avaliação detectada. Voce será redirecionado à pagina inicial.');
		if (alert) {
			window.location.assign('./');
		}
		else{
			window.location.assign('./');
		}
	</script>
	<body>

	</body>
	</html>
	<?php
}
$idseq = $_COOKIE['idseq'];
$sql = "SELECT * FROM tbl_perguntas, tbl_destinos  WHERE tbl_perguntas.id_sequencia = '$idseq' AND tbl_perguntas.id_destino = tbl_destinos.id AND tbl_destinos.numero_pergunta = '41'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_object($query);
if ($row == NULL) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<script type="text/javascript">
		alert('A avaliação detectada não está completa. Complete-a antes de acessar essa área. você será redirecionado para a pagina de cadastro de perguntas.');

		window.location.assign('./?opt=5');

	</script>
	<body>

	</body>
	</html>i
	<?php
}
else{
	$sql = "SELECT * FROM tbl_sequencia_perguntas WHERE id = '$idseq'";
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_object($query);
	$pontos = $row->pontuacao;
	$np = $row->np;
	$pontos = ($pontos + 1)/3;
	$min = 0;
	$max = $pontos -1;
	$min1 = $pontos;
	$max1 = ($pontos*2) -1;
	$min2 = $pontos *2;
	$max2 = ($pontos *3) - 1;
	?>
	<form action="cad_finais.php">
		<table class="table table-striped" style="background-color: #ededed;">
			<tr>
				<td colspan="3">
					<div style="font-weight: bold; font-size: 20px;">
						<center>
							Cadastro dos Finais
						</center>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<label for="f1">
						Final para pontuações entre: <?=$min." e ".$max?>
					</label>
				</td>
			</tr>
			<tr>
				<td>
					<textarea name="f1" id="f1" class="form-control" placeholder="DIGITE AQUI O FINAL..."></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label for="f2">
						Final para pontuações entre: <?=$min1." e ".$max1?>
					</label>
				</td>
			</tr>
			<tr>
				<td>
					<textarea name="f2" id="f2" class="form-control" placeholder="DIGITE AQUI AQUI O FINAL..."></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label for="f3">
						Final para pontuações entre: <?=$min2." e ".$max2?>
					</label>
				</td>
			</tr>
			<tr>
				<td>
					<textarea name="f3" id="f3" class="form-control" placeholder="DIGITE AQUI AQUI O FINAL..."></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<center>
						<button type="submit" class="btn btn-primary">Cadastrar</button>
					</center>
				</td>
			</tr>
		</table>
	</form>
	<?php 

}
?>