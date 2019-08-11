<?php 
if ((!isset($_COOKIE['profid']))&&(!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
if ((!isset($_REQUEST['id']))&&(!isset($_REQUEST['f']))) {
	header('location:./?opt=18');
}
$id = $_REQUEST['id'];
$f = $_REQUEST['f'];
$f = str_replace("'","\"",$f);
	include '../../../configs.php';
$sql = "UPDATE `tbl_finais` SET `final`= '$f' WHERE id = '$id'";
if (mysqli_query($con, $sql)) {
	?>
	<script type="text/javascript">
		alert('Final atualizado com sucesso. Você será redirecionado à página de visualizar as avaliações');
		window.location.assign('./?opt=8');
	</script>
	<?php
}
?>