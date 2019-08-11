<?php 
if ((!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
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
	<table class="table">
		<thead>
			<tr>
				<td>
					N°
				</td>
				<td>
					Nome
				</td>
				<td>
					Email
				</td>
				<td>
					Editar
				</td>
				<td>
					Excluir
				</td>
			</tr>
		</thead>
		<tbody>
			<?php 
			$sql = "SELECT * FROM tbl_professor";
			$query = mysqli_query($con, $sql);
			while ($row = mysqli_fetch_object($query)) {
				?>
				<tr>
					<td>
						<?=$row->id?>
					</td>
					<td>
						<?=$row->nome?>
					</td>
					<td>
						<?=$row->email?>
					</td>
					<td>
						<a href="./?opt=1&id=<?=$row->id?>">
							<img src="../../imagens/editar.png" width="50" height="50">
						</a>
					</td>
					<td>
						<a href="#" onclick="options(id = <?=$row->id?>,nome = '<?=$row->nome?>')">
							<img src="../../imagens/excluir.png" width="50" height="50">
						</a>
					</td>
				</tr>
				<?php				
			}
			?>
		</tbody>
	</table>
</div>