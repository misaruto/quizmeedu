<?php 
if ((!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
include '../../../configs.php';
if ((isset($_REQUEST['id']))&&(isset($_REQUEST['nome']))&&(isset($_REQUEST['email']))&&(isset($_REQUEST['p']))) {
	$id = $_REQUEST['id'];
	$n = $_REQUEST['nome'];
	$m = $_REQUEST['email'];
	$p = $_REQUEST['p'];
	if ((!empty($n))&&(!empty($m))&&(!empty($p))) {
		$sql = "UPDATE `tbl_professor` SET `nome`='$n',`email`='$m', `adm`='$p' WHERE id = '$id'";
		if (mysqli_query($con, $sql)) {
			?>
			<!DOCTYPE html>
			<html>
			<head>
				<title></title>
			</head>
			<script type="text/javascript">
				alert('Professor atualizado com sucesso');
				window.location.assign('./');
			</script>
			<body>

			</body>
			</html>
			<?php
		}
	}
}

?>