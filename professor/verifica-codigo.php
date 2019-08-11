<?php 
if ((isset($_REQUEST['codigo']))&& (isset($_COOKIE['id']))) {
	include '../configs.php';
	$codigo = $_REQUEST['codigo'];
	$id = $_COOKIE['id'];
	$query = "SELECT codigo FROM tbl_professor WHERE id = '$id'";

	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_object($result);
	if ($row->codigo == $codigo) {
		$query = "UPDATE tbl_professor SET verificado = 1 WHERE id = '$id'";
		if (mysqli_query($con, $query)) {
			setcookie('id','');
			?>
			<script type="text/javascript">
				alert('E-mail verificado com sucesso. Aguarde até uma administrador aprovar seu login, você receberá um e-mail avisando a aprovação.');
				window.location.assign('./');
			</script>
			<?php
		}
		else{
			?>
			<script type="text/javascript">
				alert('Não foi possivel atualizar informações do usuário. Tente novamente.');
				window.location.assign('./codigo.php?id=<?=$id?>');
			</script>
			<?php
		}
	}
	else{
		?>
		<script type="text/javascript">
			alert('O codigo informado não confere, tente novamente.');
			window.location.assign('./codigo.php?id=<?=$id?>');
		</script>
		<?php
	}
}
else{
	?>
	<script type="text/javascript">
		window.location.assign('./codigo.php');
	</script>
	<?php
}
?>