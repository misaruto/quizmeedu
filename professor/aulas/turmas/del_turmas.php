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

$query = "SELECT * FROM tbl_turma WHERE id_professor = '$id'";
$result  = mysqli_query($con,$query);
?>

<table class="table table-hover" style="background-color: #ffffff;">
	<thead class="thead thead-dark">
		<tr>
			<th colspan="3">
				<center>
					Clique na turma para ver os alunos
				</center>
			</th>
		</tr>
		<tr>
			<th>
				<center>
					N°
				</center>
			</th>
			<th>
				<center>
					Nome
				</center>
			</th>
			<th>
				<center>
					Apagar
				</center>
			</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		while ($row = mysqli_fetch_object($result)) {
			?>
			<tr style="cursor: pointer;" onclick="showAlunos(<?=$row->id?>)" class="tr">
				<td>
					<center>
						<?=$row->id?>
					</center>
				</td>
				<td>
					<center>
						<?=$row->nome?>
					</center>
				</td>
				<td>
					<center>
						<button onclick="seleciona(<?=$row->id?>)" class="btn btn-danger">Clique para apagar</button>
					</center>
				</td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
<table class="table table-stripped" style="background-color: #ffffff;">
	<thead class="thead thead-dark">
		<tr>
			<th colspan="2">
				<center>
					Alunos da turma <output id="out"></output>
				</center>
			</th>
		</tr>
		<tr>
			<th>
				<center>
					N°
				</center>
			</th>
			<th>
				<center>
					Nome
				</center>
			</th>
		</tr>
	</thead>
	<tbody id="txtHint">

	</tbody>
</table>
<script type="text/javascript">
	function seleciona(id){
		var d = confirm('Tem certeza que deseja apagar essa turma?');
		if (d) {
			window.location.assign('del_turmas2.php?id='+id);
		}
		else{

		}
	}
	function showAlunos(str) {
		if (str.length == 0) { 
			document.getElementById("txtHint").innerHTML = "";
			return;
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("txtHint").innerHTML = this.responseText;
					document.getElementById('out').value = str;
					window.scrollTo(0,400);
				}
			};
			xmlhttp.open("GET", "getAlunos.php?q=" + str, true);
			xmlhttp.send();
		}
	}
</script>