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
if (!isset($_COOKIE['id_turma'])) {
	?>
	<script type="text/javascript">
		alert('Nenhuma turma detectada.');
		window.location.assign('./?opt=0');
	</script>
	<?php
}
$tid = $_COOKIE['id_turma'];
if (isset($_REQUEST['uid'])) {
	$uid = $_REQUEST['uid'];

}
if (!isset($_REQUEST['opt'])) {
	?>
	<script type="text/javascript">
		alert('Nenhuma opção detectada.');
		window.location.assign('./?opt=3');
	</script>
	<?php
}
$opt = $_REQUEST['opt'];


switch ($opt) {
	
	//salva um cookie do usuário
	case 1:
	$x = 1;
	for ($i=0; $i <= $x; $i++) { 
		if (!isset($_COOKIE['uid'.$i])) {
			setcookie('uid'.$uid, $uid);
			header('location:./?opt=3');
			$i = $x +20;
		}
		else{
			$x = $i + 20;
		}
	}
	break;

	//apagar o usuário correspondente ao numero eniado
	case 2:

	if (!isset($_REQUEST['i'])) {
		?>
		<script type="text/javascript">
			alert('Numero do usuário não detectada.');
			window.location.assign('./?opt=3');
		</script>
		<?php	
	}
	$i = $_REQUEST['i'];
	setcookie('uid'.$i,'');
	header('location:./?opt=3');
	break;

	//salva a turma
	case 3:
	$x = 20;
	$s = 0;
	for ($i=0; $i <= $x; $i++) { 
		if (isset($_COOKIE['uid'.$i])) {
			$uid = $_COOKIE['uid'.$i];
			$query = "INSERT INTO `tbl_usuario_turma`(`id_aluno`, `id_turma`) VALUES('$uid','$tid')";

			if (mysqli_query($con, $query)) {
				$s = $s +1;
				setcookie('uid'.$uid, "");	
			}
			else{
				?>
				<script type="text/javascript">
					alert('Erro ao adcionar o aluno <?=$uid?>.');
					window.location.assign('./?opt=3');
				</script>
				<?php
			}
			$x= $i +20;

		}

	}
	if ($s <= $i) {
		?>
		<script type="text/javascript">
			alert('Alunos salvos com sucesso.');
			window.location.assign('./?opt=0');
		</script>
		<?php
	}
	break;


	default:
	?>
	<script type="text/javascript">
		alert('Nenhuma opção detectada.');
		window.location.assign('./?opt=0');
	</script>
	<?php
	break;
}
?>