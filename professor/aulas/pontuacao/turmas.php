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
 ?>
<div>
	<table class="table table-hover" style="background-color: #fff;">
		<thead class="thead-dark">
			<tr>
				<th scope="col">
					<center>
						N° Turma
					</center>
				</td>
				<th scope="col">
					<center>
						Nome
					</center>
				</td>
				<th>
					<center>
						Selecionar
					</center>
				</th>
			</tr>
		</thead>
		<?php 
		include '../../../configs.php';
		$sql = "SELECT * FROM tbl_turma WHERE tbl_turma.id_professor = '$id'";
		$query = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($query)) {
			?>
			<tr style="cursor: pointer;" onclick="seleciona(<?=$row['0']?>)">
				<td>
					<center>
						<?=$row['0']?>
					</center>
				</td>
				<td>
					<center>
						<?=$row['1']?>
					</center>
				</td>
				<td>
					<center>
						<a href="./?opt=3&turma=<?=$row['0']?>">
							<div class="btn btn-primary">
								Selecionar
							</div>
						</a>
					</center>
				</td>
			</tr>
			<?php
		}

		?>
	</table>
	<table id="txtHint" class="table table-striped" style="background-color: #fff;">
	</table>
</div>
<script type="text/javascript">
	function seleciona(turma) {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("txtHint").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "getAlunos.php?q=" + turma, true);
		xmlhttp.send();
	}
</script>