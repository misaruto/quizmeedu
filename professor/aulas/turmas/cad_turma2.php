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
if (isset($_REQUEST['nome'])) {
	$nome = $_REQUEST['nome'];
	$query = "SELECT * FROM tbl_turma WHERE nome = '$nome' and id_professor = '$id'";
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_object($result);
	if (empty($row->nome)) {
		$query = "INSERT INTO tbl_turma(`nome`, `id_professor`) VALUES ('$nome', '$id')";
		if (mysqli_query($con, $query)) {
			$query = "SELECT max(id) FROM tbl_turma WHERE id_professor = '$id'";
			$result = mysqli_query($con,$query);
			$row = mysqli_fetch_array($result);
			setcookie('id_turma',$row['max(id)']);
			?>
			<script type="text/javascript">
				alert('Turma cadastrada com sucesso. Agora escolha os alunos que farão parte dela.');
				window.location.assign('./?opt=3');
			</script>
			<?php
		}
		else{
			?>
			<script type="text/javascript">
				alert('Erro ao cadastrar turma');
				window.location.assign('./?opt=0');
			</script>
			<?php
		}
	}
	else{
		?>
		<script type="text/javascript">
			alert('Você já tem uma turma com esse nome. Escolha um nome diferente e tente novamente');
			window.location.assign('./?opt=0');
		</script>
		<?php
	}
}

else{
	?>
	<script type="text/javascript">
		window.location.assign('./?opt=0');
	</script>
	<?php
}
?>