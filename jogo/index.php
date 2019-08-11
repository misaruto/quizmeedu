<?php 
if (!isset($_COOKIE['userid'])) {
	header('location:../');
}
include '../configs.php';
$uid = $_COOKIE['userid'];
$sql = "SELECT * FROM `tbl_usuario_aula`, `tbl_aulas`, `tbl_professor`, `tbl_sequencia_perguntas` WHERE tbl_usuario_aula.id_aula = tbl_aulas.id AND tbl_aulas.id_professor = tbl_professor.id AND tbl_usuario_aula.id_aula = tbl_aulas.id AND tbl_usuario_aula.id_usuario = '$uid' AND tbl_aulas.id_sequencia = tbl_sequencia_perguntas.id";

$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta name="viewport" content="width=device-width">
</head>
<style type="text/css">

.table-bordered td{
	border-color: #000;
}
.table-bordered thead{
	background-color: #ededed;
}
table{
	font-size: 22px;
}
</style>
<body>
	<div>
		<img src="" id="title">
	</div>
	<div class="container">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<td colspan="2">
						<center>
							Selecione abaixo qual aula você deseja participar
						</center>
					</td>
					<td colspan="1">
						<center>
							<a href="../sair.php" class=" text-danger">Sair 
								<img src="../imagens/logout.png" style="width:24px; height:24px;">
							</a>
						</center>
					</td>
				</tr>
				<tr>
					<td>
						<center>
							Nome
						</center>
					</td>
					<td>
						<center>
							Data
						</center>
					</td>
					<td>
						<center>
							Começar
						</center>
					</td>
				</tr>
			</thead>
			<?php
			$i = 1;
			while($row = mysqli_fetch_object($query)){
				$ano= substr($row->data, 0, 4);
				$mes= substr($row->data, 5,2);
				$dia= substr($row->data, 8,2);
				$data = $dia ."/".$mes."/".$ano;
				?>
				<tr id="tr<?=$i?>">
					<td>
						<center>
							<?php 
							$sql_seq = "SELECT * FROM tbl_sequencia_perguntas  WHERE id = '$row->id_sequencia'";
							$query_seq = mysqli_query($con, $sql_seq);
							$row_seq = mysqli_fetch_object($query_seq);
							echo $row_seq->nome;
							?>
						</center>
					</td>
					<td>
						<center>
							<?=$data?>
						</center>
					</td>
					<td>
						<center>
							<?php 
							if ($row->completa == 1) {
								?>
								<style type="text/css">
								#tr<?=$i?>{
									background-color: #b5e2bf;
								}
							</style>	
							Aula completa
							<?php
						}
						else{
							?>
							<style type="text/css">
							#tr<?=$i?>{
								background-color: #7c90de;
							}
						</style>
						<a class="btn btn-success" href="jogo.php?seq=<?=$row->id_sequencia?>&aula=<?=$row->id_aula?>">
							<center>
								Entrar
							</center>
						</a>

						<?php
					}
					?>
				</center>
			</td>
		</tr>
		<?php
	}
	?>	
</table>
</div>
<script src="../js_imagens.js"></script>
</body>
</html>