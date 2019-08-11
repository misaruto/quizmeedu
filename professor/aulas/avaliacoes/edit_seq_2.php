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

include '../../../configs.php';


if (!isset($_REQUEST['id_seq'])) {
	?>
	<script type="text/javascript">
		alert('Nenhuma avaliação selecionada.');
		window.location.assign('./opt=8');
	</script>
	<?php
}
$idseq = $_REQUEST['id_seq'];
$query  = "SELECT * FROM tbl_sequencia_perguntas WHERE id = '$idseq'";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_object($result);
$queryp  = "SELECT *,max(id_pergunta_seq) FROM tbl_perguntas WHERE id_sequencia = '$idseq'";

$resultp = mysqli_query($con, $queryp);
$rowp = mysqli_fetch_array($resultp);

$p = $row->np - 1;
$p = $p*3;
$p = $p +1;
//mensagens antes do final
$pmf = $p + 3;

$pp = $rowp['max(id_pergunta_seq)'];

?>
<form action="edit_seq_3.php">
	<input type="hidden" name="idseq" value="<?=$idseq?>">
	<table class="table table-striped" style="background-color: #ffffff;">
		<tr>
			<td>
				N°
			</td>
			<td>
				<?=$row->id?>
			</td>
		</tr>
		<tr>
			<td>
				<label for="nome">
					Nome
				</label>
			</td>
			<td>
				<input type="text" name="nome" id="nome" value="<?=$row->nome?>">
			</td>
		</tr>
		<tr>
			<td>
				<label for="np">
					Quantidade de perguntas (Respondidas pelo aluno):
				</label>
			</td>
			<td>
				<select id="np" name="np" oninput="recomender()">
					<?php
					$i = 1;
					while ($i <= 40) {
						echo "<option value=".$i." id=".$i.">".$i."</option>";	
						$i = $i + 3;
					}

					?>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<center>
					Quantidade de perguntas que o professor terá que fazer:
					<output id="recomendacao" style="color: #f00;"></output>
					<input type="hidden" name="pontuacao" id="in" value="0">
				</center>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php 
				if ($pmf > $pp) {
					?>
					<div class="alert alert-danger">
						<center>
							Nem todas as perguntas foram cadastradas. <a href="./?opt=5&idseq=<?=$idseq?>" class="alert-link">Clicque aqui para continuar cadastrando</a>
						</center>
					</div>
					<?php
				}
				if ($pp == $pmf) {
					?>
					<div class="alert alert-success">
						<center>
							Todas as perguntas foram cadastradas. <a href="?opt=8&id_seq=<?=$idseq?>" class="alert-link">Clique aqui para vê-las
							</a>
						</center>
					</div>
					<?php
				}
				?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<center>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</center>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	function recomender(argument) {
		var	np = document.getElementById('np');
		var r = document.getElementById('recomendacao');
		var result = np.value * 2;
		result2 = (np.value - 1) *3;
		result2 = result2 +1; 
		r.value = result2;
		document.getElementById('in').value = result;
	}
	document.getElementById('<?=$row->np?>').selected = true;
	recomender();
</script>