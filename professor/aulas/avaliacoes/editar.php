<?php 
if ((!isset($_COOKIE['profid']))&&(!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
	include '../../../configs.php';
if (!isset($_REQUEST['id'])) {
	header('location:./');
}
$id = $_REQUEST['id'];
$sql = "SELECT * FROM tbl_perguntas WHERE id = '$id'";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_object($query);
if ($row->n_p_destino == 41) {
	$hidden = "hidden";
	$p = "mensagem final";
}
else{
	$hidden = "";
	$p = "pergunta";
}
?>
<form action="editar.2.php">
	<table class="table">
		<tr>
			<td colspan="2">
				<center>
					<div style="font-size: 20px; font-weight: bold;">
						Editar <?=$p?> 
					</div>
				</center>
			</td>
		</tr>
		<tr>
			<td>
				<?=$p?>
			</td>
			<td>
				<textarea name="pergunta" class="form-control" autofocus><?=$row->pergunta?></textarea>
			</td>
		</tr>
		<tr <?=$hidden?>>
			<td>
				Resposta
			</td>
			<td>
				<textarea name="r1" class="form-control"><?=$row->resposta1?></textarea>
			</td>
		</tr>
		<tr <?=$hidden?>>
			<td>
				Resposta 2
			</td>
			<td>
				<textarea name="r2" class="form-control" <?=$hidden?>><?=$row->resposta2?></textarea>
			</td>
		</tr>
		<tr <?=$hidden?>>
			<td>
				Resposta 3
			</td>
			<td>
				<textarea name="r3" class="form-control" <?=$hidden?>><?=$row->resposta3?></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<center>
					<input type="hidden" name="id" value="<?=$id?>">
					<button type="submit" class="btn btn-primary">Editar</button>
				</center>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">

	document.getElementById('p1<?=$row->pontos1?>').selected = true;
	document.getElementById('p2<?=$row->pontos2?>').selected = true;
	document.getElementById('p3<?=$row->pontos3?>').selected = true;
	document.getElementById('d1<?=$row->destino1?>').selected = true;
	document.getElementById('d2<?=$row->destino2?>').selected = true;
	document.getElementById('d3<?=$row->destino3?>').selected = true;
	document.getElementById('n<?=$row->nivel?>').selected = true;
</script>