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
if (!isset($_REQUEST['id'])) {
	?>
	<script type="text/javascript">
		alert('Selecione uma turma antes');
		window.location.assign('./?opt=1');
	</script>
	<?php
}
$idt = $_REQUEST['id'];
$query ="DELETE FROM tbl_usuario_turma WHERE id_turma = '$idt'";
if (mysqli_query($con, $query)) {
	$query ="DELETE FROM tbl_turma WHERE id = '$idt'";
	if (mysqli_query($con, $query)) {
		?>
		<script type="text/javascript">
			alert('Turma apagada com sucesso!!!');
			window.location.assign('./?opt=1');
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
			alert('Não foi possivel apagar a turma.');
			window.location.assign('./?opt=1');
		</script>
		<?php
	}
}
else{
	?>
	<script type="text/javascript">
		alert('Não foi possivel apagar os alunos da turma.');
		window.location.assign('./?opt=1');
	</script>
	<?php
}

?>