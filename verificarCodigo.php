<?php 
if ((isset($_REQUEST['codigo']))&& (isset($_COOKIE['uid']))) {
	include 'configs.php';
	$codigo = $_REQUEST['codigo'];
	$id = $_COOKIE['uid'];
	$query = "SELECT codigo FROM tbl_usuarios WHERE id = '$id'";

	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_object($result);
	if ($row->codigo == $codigo) {
		?>
		1
		<?php
	}
	else{
		?>
		0
		<?php
	}
}
?>