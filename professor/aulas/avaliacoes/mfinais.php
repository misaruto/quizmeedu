<?php 
if ((!isset($_COOKIE['profid']))&&(!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
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
	include '../../../configs.php';
$idseq = $_COOKIE['idseq'];
$sql = "SELECT * FROM tbl_perguntas, tbl_destinos  WHERE tbl_perguntas.id_sequencia = '$idseq' AND tbl_perguntas.id_destino = tbl_destinos.id AND tbl_destinos.numero_pergunta = '40'";
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
	?>
	<form action="cad_mfinal.php">
		<table class="table table-striped" style="background-color: #ededed;">
			<tr>
				<td colspan="3">
					<div style="font-weight: bold; font-size: 20px;">
						<center>
							Cadastro de Mensagens Antes do Final
						</center>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<label for="mfa">
						Mensagem para resposta de valor 0
					</label>
				</td>
			</tr>
			<tr>
				<td>
					<textarea name="mfa" id="mfa" class="form-control" placeholder="DIGITE AQUI A MENSAGEM..."></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label for="mfb">
						Mensagem para resposta de valor 1
					</label>
				</td>
			</tr>
			<tr>
				<td>
					<textarea name="mfb" id="mfb" class="form-control" placeholder="DIGITE AQUI A MENSAGEM..."></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label for="mfc">
						Mensagem para resposta de valor 2
					</label>
				</td>
			</tr>
			<tr>
				<td>
					<textarea name="mfc" id="mfc" class="form-control" placeholder="DIGITE AQUI A MENSAGEM..."></textarea>
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