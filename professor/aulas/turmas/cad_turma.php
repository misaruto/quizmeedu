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
<div class="alert alert-info">
	<center>
		As turmas criadas aqui só poderão ser vistas e usadas por você
	</center>
</div>
<form action="cad_turma2.php">
	<table class="table table-striped">
		<tr>
			<td>
				<center>
					Nome da Turma
				</center>
			</td>
			<td>
				<center>
					<input type="text" name="nome" class="form-control">
				</center>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<center>
					<input type="submit" value="Cadastrar" class="btn btn-primary">
				</center>
			</td>
		</tr>
	</table>
</form>