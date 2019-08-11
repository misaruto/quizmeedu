<?php 
if ((!isset($_COOKIE['profid']))&&(!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}

if (isset($_COOKIE['idseq'])) {
	$seq = $_COOKIE['idseq'];
}

include '../../../configs.php';
if (!isset($_REQUEST['id'])) {
	header('location:./');
}

$id = $_REQUEST['id'];
$sql = 	"SELECT * FROM tbl_perguntas,tbl_destinos WHERE tbl_perguntas.id_pergunta_seq = '$id' AND tbl_perguntas.id_destino = tbl_destinos.id AND id_sequencia = '$seq'";

$query = mysqli_query($con, $sql);
$row = mysqli_fetch_object($query);
$cad = 0;
if (empty($row)) {
	$sql = 	"SELECT * FROM tbl_perguntas,tbl_destinos WHERE tbl_perguntas.id = '$id' AND tbl_perguntas.id_destino = tbl_destinos.id";

	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_object($query);
}
if ($row->id_pergunta_seq == 1) {
	$anterior = $id;
}

if ($row->id_pergunta_seq > 1){
	$anterior = $id - 1;
}

if ($row->destino_1 != 'Fim') {
	$sql1 = "SELECT tbl_perguntas.id_pergunta_seq FROM tbl_perguntas, tbl_destinos WHERE tbl_perguntas.id_destino = tbl_destinos.id AND tbl_destinos.codigo = '$row->destino_1' AND tbl_perguntas.id_sequencia = '$seq'";
	$query = mysqli_query($con,$sql1);
	$row1 = mysqli_fetch_object($query);
	if ($row1 != "") {
		$d1 = $row1->id_pergunta_seq;
	}
	else{ 
		$cad = $cad + 1;
	}

	$sql2 = "SELECT tbl_perguntas.id_pergunta_seq FROM tbl_perguntas, tbl_destinos WHERE tbl_perguntas.id_destino = tbl_destinos.id AND tbl_destinos.codigo = '$row->destino_2' AND tbl_perguntas.id_sequencia = '$seq'";

	$query = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_object($query);

	if ($row2 != "") {
		$d2 = $row2->id_pergunta_seq;
	}
	else{ 
		$cad = $cad + 1;
	}

	$sql3 = "SELECT tbl_perguntas.id_pergunta_seq FROM tbl_perguntas, tbl_destinos WHERE tbl_perguntas.id_destino = tbl_destinos.id AND tbl_destinos.codigo = '$row->destino_3' AND tbl_perguntas.id_sequencia = '$seq'";
	$query = mysqli_query($con,$sql3);
	$row3 = mysqli_fetch_object($query);
	
	if ($row3 != "") {
		$d3 = $row3->id_pergunta_seq;
	}
	else{ 
		$cad = $cad + 1;
	}
}

?>
<table class="table table-striped" style="background-color: #fff;">
	<thead>
		<tr>
			<td colspan="5">
				<center>
					<div style="font-size: 20px; font-weight: bold;">
						Ver pergunta
					</div>
				</center>
			</td>
		</tr>
		<tr>
			<td>
				# 
			</td>
			<td width="50%">
				Pergunta
			</td>
			<td>
				1º resposta
			</td>
			<td>
				2º Resposta
			</td>
			<td>
				3º Resposta
			</td>
		</tr>
	</thead>
	<tr>
		<td>
			<?=$row->id_pergunta_seq?>
		</td>
		<td>
			<?=$row->pergunta?>
		</td>
		<td>
			<?=$row->resposta1?>
		</td>
		<td>
			<?=$row->resposta2?>
		</td>
		<td>
			<?=$row->resposta3?>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			Pontos
		</td>
		<td>
			<?=$row->pontos_1?>
		</td>
		<td>
			<?=$row->pontos_2?>
		</td>
		<td>
			<?=$row->pontos_3?>
		</td>
	</tr>
	<?php 
	if ($row->destino_1 != 'Fim' && $cad != 3) {
		?>
		<tr>
			<td colspan="2">
				Destino
			</td>
			<td>
				<a href="./?opt=10&id=<?=$d1?>">Pergunta <?=$d1?></a>
			</td>
			<td>
				<a href="./?opt=10&id=<?=$d2?>">Pergunta <?=$d2?></a>
			</td>

			<td>
				<a href="./?opt=10&id=<?=$d3?>">Pergunta <?=$d3?></a>
			</td>
		</tr>
		<?php
	}
	else{
		?>
		<tr>
			<td colspan="5">
				<div class="alert alert-warning" role="alert">
					Acabaram as perguntas da avaliação.
					<a href="./?opt=10x&id=<?=$anterior?>" class="alert-link">Clique aqui</a>
					para ir a pergunta anterior 
					<a href="./?opt=8" class="alert-link">Clique aqui</a> para ver a avaliação
				</div>
			</td>
		</tr>
		<?php
	}
	if ($cad == 3) {
		?>
		<tr>
			<td colspan="5">
				<center>
					<a href="./?opt=5&idseq=<?=$seq?>">Cadastrar uma nova pergunta</a>
				</center>
			</td>
		</tr>
		<?php
	}
	?>
	<tr>
		<td colspan="5">
			<center>
				<div class="alert alert-primary" role="alert">
					Opções:
					<a class="alert-link" href="./?opt=9&id=<?=$row->id?>">Editar</a>
				</div>
			</center>
		</td>
	</tr>
</table>