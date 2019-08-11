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
if ((isset($_REQUEST['pergunta']))&&(isset($_REQUEST['r1']))&&(isset($_REQUEST['r2']))&&(isset($_REQUEST['r3']))&&(isset($_REQUEST['id']))) {
	$p = $_REQUEST['pergunta'];
	$r1 = $_REQUEST['r1'];
	$r2 = $_REQUEST['r2'];
	$r3 = $_REQUEST['r3']; 
	$id = $_REQUEST['id'];
	if (($p != "")&&($r1!= "")&&($r2!= "")&&($r3!= "")) {
		$sql = "UPDATE `tbl_perguntas` SET `pergunta`='$p',`resposta1`='$r1',`resposta2`='$r2',`resposta3`='$r3' WHERE id = '$id'";
		if (mysqli_query($con,$sql)) {
			?>
			<script type="text/javascript">
				alert('Editado com sucesso!!!');
				window.location.assign('./?opt=10&id=<?=$id?>');
			</script>
			<?php
		}
		else{
			?>
			<script type="text/javascript">
				alert('Houve um erro ao editar');
				window.location.assign('./?opt=9&id=<?=$id?>');
			</script>
			<?php

		}
	}
	else{
		?>
		<script type="text/javascript">
			alert('Houve um erro ao editar');
			window.location.assign('./?opt=9&id=<?=$id?>');
		</script>
		<?php
	}
}
else{
	?>
	<script type="text/javascript">
		alert('Houve um erro ao editar');
		window.location.assign('./?opt=9&id=<?=$id?>');
	</script>
	<?php
}
?>
