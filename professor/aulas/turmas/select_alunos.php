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
if (!isset($_COOKIE['id_turma'])) {
	?>
	<script type="text/javascript">
		alert('Nenhuma turma detectada.');
		window.location.assign('./opt=19');
	</script>
	<?php
}
include '../../../configs.php';
?>
<script type="text/javascript">
	function save() {
		var opt = confirm('Tem certeza que desejar salvar estes alunos?');
		if (opt) {
			window.location.assign('seleciona.php?opt=3');
		}
		else{
			
		}
	}
</script>
<table class="table table-hover" style="background-color: #fff;">
	<thead class="thead thead-dark">
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
					E-mail
				</center>
			</th>
		</tr>
		<tr>
			<td colspan="4">
				<center>
					Alunos selecionados
				</center>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<center>
					<?php 
					$query_u = "SELECT * FROM tbl_usuarios";
					$result_u = mysqli_query($con, $query_u);
					while ($row_u = mysqli_fetch_object($result_u)) {

						if (isset($_COOKIE['uid'.$row_u->id])) {
							?>

							<div class="badge badge-primary" style="font-size: 12px;">
								<center>
									<?=$row_u->nome?> 
									<a href="seleciona.php?i=<?=$row_u->id?>&opt=2">
										<button type="button" class="close" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>	
									</a>
								</center>
							</div>
							<?php
						}
					}
					?>
				</center>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<center>
					<button onclick="save()" class="btn btn-primary">Salvar</button>
				</center>
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<div>
					<input  placeholder="PESQUISE POR NOMES E E-MAILS" type="text" onkeyup="showHint(this.value)" id="input" class="form-control">

				</div>
			</td>
		</tr>
	</thead>
	<tbody hidden id="txtHint">
	</tbody>
	<tbody id="tbody">
		
		<?php 
		$uid = 0;
		$query = "SELECT * FROM tbl_usuarios WHERE tbl_usuarios.id NOT IN(SELECT id_aluno FROM tbl_usuario_turma)";
		$result = mysqli_query($con, $query);
		while ($row = mysqli_fetch_object($result)) {	
			if (!isset($_COOKIE['uid'.$row->id])) {
				?>
				<tr style="cursor: pointer;" onclick="select(<?=$row->id?>)">
					<td>
						<center>
							<?=$row->id?>
						</center>
					</td>
					<td class="nome">
						<center>
							<?=$row->nome?>
						</center>
					</td>
					<td>
						<center>
							<?=$row->email?>
						</center>
					</td>
				</tr>
				<?php
			} 
		}
		?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="4">
				<center>
					<button onclick="save()" class="btn btn-primary">Salvar</button>
				</center>
			</td>
		</tr>
	</tfoot>
</table>
<script type="text/javascript">
	function select(id) {
		window.location.assign('seleciona.php?uid='+id+'&opt=1');
	}
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
			xmlhttp.open("GET", "gethint.php?q=" + str, true);
			xmlhttp.send();
		}
	}
</script>
