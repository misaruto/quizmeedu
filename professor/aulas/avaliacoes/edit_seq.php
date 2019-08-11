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
?>
<table class="table table-hover" style="background-color: #fff;">	
	<thead class="thead thead-dark">
		<tr>
			<th colspan="2">
				<center>
					Escolha uma para editar.
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
	<?php 
	$sql = "SELECT * FROM tbl_sequencia_perguntas WHERE id_professor = '$id'";
	$query = mysqli_query($con, $sql);
	$i = mysqli_num_rows($query);
	while ($row = mysqli_fetch_object($query)) {
		$max[] = $row->np;
		?>
		<tr style="cursor: pointer;" onclick="showHint(<?=$row->id?>)">
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
		</tr>
		<?php
	}
	?>
</table> 
<script type="text/javascript">
	function showHint(id) {
		window.location.assign('./?opt=11&id_seq='+id);
	}
</script>