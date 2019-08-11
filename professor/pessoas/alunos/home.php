<?php 
if ((!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
if (isset($_COOKIE['admid'])) {
	$id = $_COOKIE['admid'];
}
if (isset($_COOKIE['rootid'])) {
	$id = $_COOKIE['rootid'];
}
include '../../../configs.php';
?>
<script type="text/javascript">
	function options(id, nome) {
		var opt = confirm("Tem certeza que quer apagar o usuário "+nome);
		if (opt == true) {
			window.location.assign('./excluir.php?id='+id);
		}
		else{
			return 0;
		}
	}
</script>
<div>
	<table class="table" style="background-color: #ececec;">
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
						Email
					</center>
				</th>
				<th>
					<center>
						Editar
					</center>
				</th>
				<th>
					<center>
						Excluir
					</center>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$sql = "SELECT * FROM tbl_usuarios";
			$query = mysqli_query($con, $sql);
			while ($row = mysqli_fetch_object($query)) {
				?>
				<tr>
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
							<?=$row->email?>
						</center>
					</td>
					<td>
						<center>
							<a href="./?opt=1&id=<?=$row->id?>">
								<img src="../../imagens/editar.png" width="50" height="50">
							</a>
						</center>
					</td>
					<td>
						<center>
							<a href="#" onclick="options(id = <?=$row->id?>,nome = '<?=$row->nome?>')">
								<img src="../../imagens/excluir.png" width="50" height="50">
							</a>
						</center>
					</td>
				</tr>
				<?php				
			}
			?>
		</tbody>
	</table>
</div>