<?php 
if ((isset($_REQUEST['email']))&&(isset($_REQUEST['senha']))) {
	include './configs.php';
	$m = $_REQUEST['email'];
	$s = $_REQUEST['senha'];
	if (($m == "p@p") &&( $s == 'p')) {
		header('location:./professor');
		
	}
	else{
		if ((!empty($m))&&(!empty($s))) {
			$s = md5($s);
			$query  = "SELECT id FROM tbl_usuarios WHERE email = '$m' AND senha = '$s'";
			$sql = mysqli_query($con,$query);
			$row = mysqli_fetch_object($sql);
			if (!empty($row)) {
				setcookie('userid',$row->id);
				?>
				<script type="text/javascript">
					alert('Login efetuado com sucesso');
					window.location.assign('./jogo/')
				</script>
				<?php
			}
			else{
				?>
				<script type="text/javascript">
					alert('E-mail ou senha incorretos');
					window.location.assign('./?l=1')
				</script>
				<?php
			}
		}
		else{
			?>
			<script type="text/javascript">
				alert('Faltou algo tente novamente');
				window.location.assign('./?l=1')
			</script>
			<?php
		}
	}
}
?>