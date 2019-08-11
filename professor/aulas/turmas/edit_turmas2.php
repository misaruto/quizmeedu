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
if (!isset($_REQUEST['id'])) {
	?>
	<script type="text/javascript">
		alert('Nenhuma turma selecionada.');
		window.location.assign('./?opt=2');
	</script>
	<?php
	die();
}
$tid = $_REQUEST['id'];
$query = "SELECT * FROM tbl_turma WHERE id_professor = '$id' AND id = '$tid'";
$result  = mysqli_query($con,$query);
$row = mysqli_fetch_object($result);
?>
<script type="text/javascript">
	var str = <?=$tid?>;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("txtHint").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "getAlunos_edit.php?q=" + str, true);
	xmlhttp.send();
	function start(){
		var str = <?=$tid?>;
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("txtHint").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "getAlunos_edit.php?q=" + str, true);
		xmlhttp.send();
	}
</script>

<table class="table table-striped" style="background-color: #fff;">
	<div class="alert alert-info">
		<center>
			Modificações salvas automaticamente.
		</center>
	</div>
	<form action="edit_turmas3.php">
		<tr>
			<td>
				<center>
					Nome da Turma
				</center>
			</td>
			<td colspan="2">
				<center>
					<input type="text" name="nome" class="form-control" value="<?=$row->nome?>">
					<input type="hidden" name="tid" value="<?=$tid?>">
					<input type="hidden" name="opt" value="2">
				</center>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<center>
					<input type="submit" value="salvar" class="btn btn-primary">
				</center>
			</td>
		</tr>
	</form>
	<tbody id="txtHint">
	</tbody>
</table>
<script type="text/javascript">
	function remover(id){
		var str = id;
		var tid = <?=$tid?>;
		var d = confirm('Tem certeza que deseja remover o aluno '+id+' ?');
		if (d) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					start();
				}
			};
			xmlhttp.open("GET", "edit_turmas3.php?opt=0&ida=" + str +'&tid=' + tid, true);
			xmlhttp.send();
			
		}
	}
	function add(id) {
		var str = id;
		var tid = <?=$tid?>;
		var d = confirm('Tem certeza que deseja adcionar o aluno '+id+' ?');
		if (d) {

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					start();
				}
			}

			xmlhttp.open("GET", "edit_turmas3.php?opt=1&ida=" + str +'&tid=' + tid, true);
			xmlhttp.send();
			start();
		}
	}

</script>