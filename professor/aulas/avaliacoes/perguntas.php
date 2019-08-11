<?php 
if ((!isset($_COOKIE['profid']))&&(!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	?>
	<script type="text/javascript">
		alert('Faça login primeiro');
		window.location.assign('../../');
	</script>
	<?php
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
include '../../../configs.php';
if (!isset($_REQUEST['id_seq'])) {
	if (!isset($_COOKIE['idseq'])) {
		?>
		<script type="text/javascript">
			alert('Nenhhma sequência detectada');
			window.location.assign('../../');
		</script>
		<?php
	}
	else{
		$seq = $_COOKIE['idseq'];
	}
}
else{
	$seq = $_REQUEST['id_seq'];
}
?>
<br>
<br>
<style type="text/css">
	.table td {
		border-top: 1px solid #000;"
	} 
</style>
<table class="table table-striped" style="background-color: #dcdcdcdc;">
	<?php 
	$total = 0;
	$stop = 0;
	$st = 0;
	$sql = "SELECT *, tbl_perguntas.id FROM tbl_sequencia_perguntas, tbl_perguntas, tbl_destinos WHERE tbl_perguntas.id_professor = '$id' AND id_sequencia = '$seq' AND tbl_sequencia_perguntas.id = '$seq' AND tbl_perguntas.id_destino = tbl_destinos.id";
	$query = mysqli_query($con, $sql);
	$max = mysqli_num_rows($query);
	while ($row = mysqli_fetch_array($query)) {
		$total = $row[3];
		if ($row['codigo']== 'mFa') {
			?>
			<tr>
				<td colspan="5" style="background-color: #ff9c9c">
					<center>
						<h3>Mensagens antes do final</h3>
					</center>
				</td>
			</tr>
			<?php
		}
		if (($row['codigo'] == 'mFa')||($row['codigo'] == 'mFb')||($row['codigo'] == 'mFc')) {
			$back = "style='background-color: #67bb91dc;'";
		}
		else{
			$back ="";
		}
		?>
		<tr class="tr<?=$row['id_sequencia']?>" <?=$back?>>
			<td width="10">
				<?=$row['id_pergunta_seq']?>
			</td>
			<td colspan="2">
				<?=$row['pergunta']?>
			</td>
			<td width="250px">
				<a href="./?opt=10&id=<?=$row['id_pergunta_seq']?>"><img src="../../imagens/ver.png" width="30"></a>
			</td>
			<td width="250px">
				<a href="./?opt=9&id=<?=$row['id']?>"><img src="../../imagens/editar.png" width="30"></a>	
			</td>
		</tr>
		<?php	
	}
	//verifica se todas as perguntas foram cadastradas
	//max é o maximo que ja foi cadastradas
	//total é o total que a avalição aceita
	$max = $max - 3;
	$total = $total - 1;
	$total = $total *3;
	$total = $total +1;
	$hidden2 = "";
	$hidden = "";
	if ( $max > $total && $stop == 0) {
		$stop = 1;
		$hidden = "";
	}
	if($max == $total && $stop == 0){
		$hidden = "hidden";
	}
	$max1 = $max + 3;
	$total1 = $total + 3;
	if ($max1 == $total1 && $st == 0) {
		$hidden2 = "hidden";

	}
	else{
		$hidden2 = "";
	}
	?>
	<tr class="tr<?=$seq?>" <?=$hidden?>>
		<td colspan="5">
			<center>
				<a href="./?opt=5&idseq=<?=$seq?>">Cadastrar uma nova pergunta</a>
			</center>
		</td>
	</tr>
	<tr class="tr<?=$seq?>" <?=$hidden2?>>
		<td colspan="5">
			<center>
				<a href="./?opt=7&idseq=<?=$seq?>">Cadastrar mensagens finais </a>	
			</center>
		</td>
	</tr>

	<tr>
		<td colspan="5" style="background-color: #ff9c9c">
			<center>
				<h3>Finais</h3>
			</center>
		</td>
	</tr>
	<?php 
	$sql = "SELECT * FROM `tbl_finais` WHERE id_professor = '$id' AND id_sequencia = '$seq'";
	$query = mysqli_query($con, $sql);

	if (mysqli_num_rows($query)< 3) {
		?>
		<tr>
			<td colspan="5">
				<div class="alert alert-warning" role="alert">
					<center>
						<a href="./?opt=8" class="alert-link">Nenhum final cadastrado ou nem todos foram cadastrados, clique para acessar a pagina de cadastro de finais.</a>.
					</center>
				</div>
			</td>
		</tr>
		<?php
	}
	else{
		while ($row = mysqli_fetch_object($query)) {
			?>
			<tr style='background-color: #67bb91dc;'>
				<td colspan="3">
					<?=$row->final?>
				</td>
				<td>
					<center>
						<?=$row->pctg_min."% e ".$row->pctg_max?>%
					</center>
				</td>
				<td>
					<a href="./?opt=12&id=<?=$row->id?>"><img src="../../imagens/editar.png" width="30"></a>
				</td>
			</tr>
			<?php
		}
		?>
		<div class="alert alert-success" role="alert" style="z-index: 0;">
			<center>
				Parabéns, sua avaliação está completa <a href="./?opt=3" class="alert-link">Clique aqui</a> Para agendar uma aula com ela para seus alunos.
			</center>
		</div>
		<?php
	}
	?>
</table>