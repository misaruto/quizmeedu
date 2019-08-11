<?php 
if ((isset($_REQUEST['email']))&&(isset($_REQUEST['nome']))&&(isset($_REQUEST['senha']))&&(isset($_REQUEST['senha2']))) {
	$m = $_REQUEST['email'];
	$n = $_REQUEST['nome'];
	$s = $_REQUEST['senha'];
	$s2 = $_REQUEST['senha2'];

	if ($s == $s2) {
		if ((!empty($m))&&(!empty($n))&&(!empty($s))){
			include 'configs.php';
			$query = "SELECT * FROM tbl_usuarios WHERE email = '$m'";
			$sql = mysqli_query($con,$query);
			$row = mysqli_fetch_object($sql);
			if (empty($row)) {
				$s = md5($s);
				$query = "INSERT INTO tbl_usuarios(`nome`,`email`,`senha`,`pontos`,`codigo`) VALUES ('$n','$m','$s','0','0')";
				if (mysqli_query($con,$query)) {
					?>
					<script type="text/javascript">
						alert('Cadastro efetuado com sucesso');
						window.location.assign('./login.php?email=<?=$m?>&senha=<?=$s2?>')
					</script>
					<?php
				}
				else{
					?>
					<script type="text/javascript">
					alert('Algo deu errado. Tente novamente.');
					window.location.assign('./?e=1');
				</script>
				<?php
				}
			}
			else{		
				?>
				<script type="text/javascript">
					alert('O e-mail digitado já exite');
					window.location.assign('./?e=1');
				</script>
				<?php
			}
		}
		else{
			?>
			<script type="text/javascript">
				alert('Faltou algo tente novamente');
				window.location.assign('./?e=1')
			</script>
			<?php
		}
	}
	else{
		?>
		<script type="text/javascript">
			alert('As senhas não coincidem');
			window.location.assign('./?e=1');
		</script>
		<?php
	}
}
else{
	?>
	<script type="text/javascript">
		alert('Faltou algo tente novamente');
		window.location.assign('./e=1');
	</script>
	<?php
}
?>