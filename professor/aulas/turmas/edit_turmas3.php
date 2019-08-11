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
if ((isset($_REQUEST['ida']))&&(isset($_REQUEST['opt']))&&(isset($_REQUEST['tid']))) {
	$opt = $_REQUEST['opt'];
	$ida = $_REQUEST['ida'];
	$tid = $_REQUEST['tid'];

	if ($opt == 0) {
		$query = "DELETE FROM tbl_usuario_turma WHERE id_aluno = '$ida' AND id_turma = '$tid'";
		if (mysqli_query($con, $query)) {
			?>
			<script type="text/javascript">
				alert('Aluno removido com sucesso!!!');
				window.location.assign('./?opt=4&id='+<?=$tid?>);
			</script>
			<?php
		}
		else{
			?>
			<script type="text/javascript">
				alert('Não foi possive remover o aluno.');
				window.location.assign('./?opt=4&id='+<?=$tid?>);
			</script>
			<?php
		}
	}
	if ($opt == 1) {
		$query = "INSERT INTO tbl_usuario_turma (`id_aluno`, `id_turma`) VALUES('$ida','$tid')";
		if (mysqli_query($con, $query)) {
			?>
			<script type="text/javascript">
				alert('Aluno adcionado com sucesso!!!');
				window.location.assign('./?opt=4&id='+<?=$tid?>);
			</script>
			<?php
		}
		else{
			?>
			<script type="text/javascript">
				alert('Não foi possive adcionar o aluno.');
				window.location.assign('./?opt=4&id='+<?=$tid?>);
			</script>
			<?php
		}
	}
}
if ((isset($_REQUEST['opt']))&&(isset($_REQUEST['tid']))&&(isset($_REQUEST['nome']))) {
	$n = $_REQUEST['nome'];
	$opt = $_REQUEST['opt'];
	$tid = $_REQUEST['tid'];

	if ($opt == 2) {
		$query = "UPDATE tbl_turma SET nome = '$n' WHERE id = '$tid'";
		if (mysqli_query($con, $query)) {
			?>
			<script type="text/javascript">
				alert('Nome da turma atualiado com sucesso!!!');
				window.location.assign('./?opt=4&id='+<?=$tid?>);
			</script>
			<?php
		}
		else{
			?>
			<script type="text/javascript">
				alert('Não foi possive atualizar o nome da turma.');
				window.location.assign('./?opt=4&id='+<?=$tid?>);
			</script>
			<?php
		}
	}
}
?>