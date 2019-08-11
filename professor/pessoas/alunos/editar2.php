<?php 
if ((!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
include '../../../configs.php';
if ((isset($_REQUEST['id']))&&(isset($_REQUEST['nome']))&&(isset($_REQUEST['email']))) {
	$id = $_REQUEST['id'];
	$n = $_REQUEST['nome'];
	$m = $_REQUEST['email'];
	if ((!empty($n))&&(!empty($m))) {
		$sql = "UPDATE `tbl_usuarios` SET `nome`='$n',`email`='$m' WHERE id = '$id'";
		if (mysqli_query($con, $sql)) {
			?>
			<!DOCTYPE html>
			<html>
			<head>
				<title></title>
			</head>
			<script type="text/javascript">
				alert('Usuario atualizado com sucesso');
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