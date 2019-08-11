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
if (!isset($_REQUEST['turma'])||($_REQUEST['turma']=="")) {
	?>
	<script type="text/javascript">
		alert('Nenhuma turma selecionada!!!');
		window.location.assign('./?opt=1');
	</script>
	<?php
}
$turma = $_REQUEST['turma'];
?>
<table class="table table-hover" style="background-color: #fff;">
	<thead class="thead-dark">
		<tr>
			<th scope="col">
				<center>
					N° Aula
				</center>
			</td>
			<th scope="col">
				<center>
					Data
				</center>
			</th>
			<th>
				<center>
					Avaliação
				</center>
			</th>
			<th>
				<center>
					Selecionar
				</center>
			</th>
		</tr>
	</thead>
	<?php 
	include '../../../configs.php';
	$sql = "SELECT tbl_aulas.id,tbl_sequencia_perguntas.nome,tbl_aulas.data FROM tbl_aulas,tbl_sequencia_perguntas WHERE tbl_aulas.id_professor = '$id' AND tbl_aulas.id_turma = '$turma' AND tbl_aulas.id_sequencia = tbl_sequencia_perguntas.id";

	$query = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_object($query)) {
		$data = date('d/m/Y', strtotime($row->data));
		?>
		<tr>
			<td>
				<center>
					<?=$row->id?>
				</center>
			</td>
			<td>
				<center>
					<?=$data?>
				</center>
			</td>
			<td>
				<center>
					<?=$row->nome?>
				</center>
			</td>
			<td>
				<center>
					<button class="btn btn-primary" id="<?=$row->id?>" onclick="seleciona_turma(<?=$row->id?>)">
						Selecionar
					</button>
				</center>
			</td>
		</tr>
		<?php
	}

	?>
</table>
</div>
<script type="text/javascript">
	var turma = "<?=$turma?>"
	var link = "";
	var i=0;
	var ids = [];

	function seleciona_turma(id){
		var decision = confirm('Deseja comparar duas turmas?');
		if (decision) {
			document.getElementById(id).disabled = true;
			link = link+'&aula[]='+id;
			ids[i] = id;
			i = i +1;

			if (i == 2) {
				link = './?opt=5&turma='+turma+link;
				var d = confirm('Tem certeza que deseja comparar essas turmas?');
				if (d) {
					window.location.assign(link);
				}
				else{
					i =0;
					link = '';
					document.getElementById(ids[1]).disabled =false;
					document.getElementById(ids[0]).disabled = false;
				}
			}
		}
		else{
			link = link+'&aula='+id;
			link = './?opt=4&turma='+turma+link;
			window.location.assign(link);
		}
	}
</script>