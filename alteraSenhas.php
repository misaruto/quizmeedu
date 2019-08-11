<?php 
if ((isset($_REQUEST['senha']))&&(isset($_COOKIE['uid']))) {
	include 'configs.php';
	$s = $_REQUEST['senha'];
	$id = $_COOKIE['uid'];
	$senha = md5($s);
	$query = "UPDATE tbl_usuarios SET senha = '$senha' WHERE id = '$id'";

	if (mysqli_query($con,$query)) {
		setcookie('uid','');
		?>
		<div class="alert alert-success">
			Senha alterada com sucesso.
		</div>
		<?php
	}
	else{
		?>
		0
		<?php
	}
}
?>

 ?>