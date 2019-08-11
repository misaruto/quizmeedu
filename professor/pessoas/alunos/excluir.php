<?php 
if ((!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}

if (isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
	include '../../../configs.php';;
	$sql = "DELETE FROM tbl_usuarios WHERE id = '$id'";
	if (mysqli_query($con, $sql)) {
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title></title>
		</head>
		<script type="text/javascript">
			alert('Usuario deletado com sucesso');
			window.location.assign('./');
		</script>
		<body>

		</body>
		</html>
		<?php
	}
}

?>