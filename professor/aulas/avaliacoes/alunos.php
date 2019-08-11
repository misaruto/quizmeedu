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
$c =0;
if (isset($_COOKIE['idaula'])) {
	include '../../../configs.php';
	$sql = "SELECT * FROM tbl_turma WHERE id_professor  = '$id'";
	$query = mysqli_query($con, $sql);

	?>
	<table class="table table-bordered table-hover" style="background-color: #fff;">
		<thead>
			<tr>
				<td colspan="2">
					<center>
						Selecione abaixo as turmas que participarão da aula:
						&emsp; &emsp;	
					</center>
				</td>
				<td>
					<center>
						<button onclick="window.location.assign('./alunos2.php?opt=1')" class="btn btn-primary" id="btn" disabled>Confirmar</button>
					</center>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<center>
						<?php 
						$e = 0;
						$query_t = "SELECT * FROM tbl_turma";
						$result_t = mysqli_query($con, $query_t);
						while ($row_t = mysqli_fetch_object($result_t)) {

							if (isset($_COOKIE['tid'.$row_t->id])) {
								?>
								<script type="text/javascript">
									document.getElementById('btn').disabled = false;	
								</script>
								<div class="badge badge-primary" style="font-size: 12px;">
									<center>
										<?=$row_t->nome?> 
										<a href="alunos2.php?opt=3&id=<?=$row_t->id?>">
											<button type="button" class="close" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>	
										</a>
									</center>
								</div>
								<?php
								$e = 1;
							}
							
						}
						if ($e == 0) {
							?>
							Nenhuma turma selecionada
							<?php
						}
						?>
					</center>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<div>
						<input  placeholder="PESQUISE POR NOMES DAS TURMAS" type="text" onkeyup="showHint(this.value)" id="input" class="form-control">

					</div>
				</td>
			</tr>
			<tr>
				<th>
					<center>
						N° Turma
					</center>
				</th>
				<th>
					<center>
						Nome Turma
					</center>
				</th>
			</tr>
		</thead>
		<tbody id="txtHint" hidden></tbody>
		<tbody id="tbody">
			<?php
			while($row = mysqli_fetch_object($query)){
				if (!isset($_COOKIE['tid'.$row->id])) {
					?>
					<tr onclick="showAlunos(<?=$row->id?>)" style="cursor: pointer;">
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
								<button class="btn btn-secondary" onclick="seleciona(<?=$row->id?>)">Selecionar</button>
							</center>
						</td>
					</tr>
					<?php
				}
			}
			?>
		</tbody>
	</table>
	<table class="table table-striped" style="background-color: #ffffff;">
		<thead class="thead thead-dark">
			<tr>
				<th colspan="2">
					<center>
						Alunos da turma <output id="out"></output>
					</center>
				</th>
			</tr>
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
	<tbody id="txtHint2">

	</tbody>
</table>
<script type="text/javascript">
	function showHint(str) {
		if (document.getElementById('tbody').hidden == false) {
			document.getElementById('tbody').hidden = true;
			document.getElementById('txtHint').hidden = false;
		}
		if (str.length == 0){
			document.getElementById('tbody').hidden =false;
			document.getElementById('txtHint').hidden = true;
		}
		if (str.length == 0) { 
			document.getElementById("txtHint").innerHTML = "";
			return;
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("txtHint").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "getTurmas.php?q=" + str, true);
			xmlhttp.send();
		}
	}
	function seleciona(id){

		window.location.assign('alunos2.php?opt=2&id='+id);

	}
	function showAlunos(str) {
		if (str.length == 0) { 
			document.getElementById("txtHint2").innerHTML = "";
			return;
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("txtHint2").innerHTML = this.responseText;
					document.getElementById('out').value = str;
					window.scrollTo(0,400);
				}
			};
			xmlhttp.open("GET", "../turmas/getAlunos.php?q=" + str, true);
			xmlhttp.send();
		}
	}
</script>
<?php
}
if (!isset($_COOKIE['idaula'])) {
	?>
	<script type="text/javascript">
		alert('Nenhuma aula detectada. Tente novamente');
		window.location.assign('./opt=3');
	</script>
	<?php
}
?>