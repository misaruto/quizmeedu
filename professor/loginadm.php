<?php 
if ((isset($_REQUEST['login']))&&(isset($_REQUEST['pass']))) {
	$l = $_REQUEST['login'];
	$s = $_REQUEST['pass'];
	if ($l != "" && $s != "") {
		$p = md5($s);
		include '../configs.php';
		$sql = "SELECT * FROM tbl_professor WHERE login = '$l' and senha = '$p'";
		$query = mysqli_query($con,$sql);
		$row = mysqli_fetch_object($query);
		if (!empty($row)) {
			if ($row->verificado == 0) {
				?>
				<script type="text/javascript">
					alert('E-mail não verificado, por favor verifique e tente novamente.');
					window.location.assign('./codigo.php');
				</script>
				<?php
			}
			else{
				if ($row->confirmado == 0) {
					?>
					<script type="text/javascript">
						alert('Seu login ainda não foi aprovado. Caso esteja demorando muito envie um FeedBack aos administradores para verificarem seu login. Lembrando que você receberá um e-mail te informando se foi aprovado ou não');
						window.location.assign('./codigo.php');
					</script>
					<?php
				}
				else{
					if (!empty($query)) {
						if ($row->adm == 0) {
							setcookie('profid',$row->id);
							header('location:./aulas');
						}
						if ($row->adm == 1) {
							setcookie('admid',$row->id);
							header('location:./aulas');
						}
						if ($row->adm == 2) {
							setcookie('rootid',$row->id);
							header('location:./aulas');
						}
					}
					else{
						header('location:./?l='.$l.'&p='.$p);
					}
				}
			}
		}
		else{
			?>
			<script type="text/javascript">
				alert('Nenhum usuário encontrado. Tente novamente.');
				window.location.assign('./codigo.php');
			</script>
			<?php
		}
	}
	else{
		header('location:./');
	}
}
else{ 
	header('location:./');
}

?>