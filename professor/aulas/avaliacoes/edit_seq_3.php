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

if ((isset($_REQUEST['idseq']))&&(isset($_REQUEST['nome']))&&(isset($_REQUEST['np']))) {
	$idseq = $_REQUEST['idseq'];
	$n = $_REQUEST['nome'];
	$np = $_REQUEST['np'];

	$query = "UPDATE `tbl_sequencia_perguntas` SET `nome`='$n',`np`='$np' WHERE id = '$idseq'";
	if (mysqli_query($con, $query)) {
		?>
		<script type="text/javascript">
			alert('A avaliação foi editada com sucesso!!');
			window.location.assign('../');
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
			alert('Não foi possivel editar a avaliação, tente novamente.');
			window.location.assign('./opt=2');
		</script>
		<?php
	}
}

?>