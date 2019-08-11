<?php 
if ((!isset($_COOKIE['profid']))&&(!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}

if (!isset($_REQUEST['id'])) {
	header('location:./');
}
$id = $_REQUEST['id'];
include '../../configs.php';
$sql = "DELETE FROM `tbl_perguntas` WHERE id = '$id'";
if (mysqli_query($con, $sql)) {
	?>
	<script type="text/javascript">
		alert('A pergunta foi apagada com sucesso');
		window.location.assign('./');
	</script>
	<?php
}
?>