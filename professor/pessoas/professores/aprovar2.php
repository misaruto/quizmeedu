<?php 
if ((!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
if (isset($_COOKIE['admid'])) {
	$id = $_COOKIE['admid'];
}
if (isset($_COOKIE['rootid'])) {
	$id = $_COOKIE['rootid'];
}
include '../../../configs.php';

if ((isset($_REQUEST['id']))&&(isset($_REQUEST['p']))) {
	$idd = $_REQUEST['id'];
	$p = $_REQUEST['p'];
	$query = "UPDATE `tbl_professor` SET `adm`= '$p' WHERE id = '$idd'";
	if (mysqli_query($con, $query)) {	
		?>
		<script type="text/javascript">
			alert('Posição do usuário alterado com sucesso');
			window.location.assign('./');
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
			alert('Não foi possivel alterar posição do usuário. Tente novamente.');
			window.location.assign('./');
		</script>
		<?php
	}
}
else{
	?>
	<script type="text/javascript">
		alert('Nenhum usuário ou posição detectados.');
		window.location.assign('./?opt=2');
	</script>
	<?php
}


?>