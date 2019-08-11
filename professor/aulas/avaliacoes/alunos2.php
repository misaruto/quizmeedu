<?php 
if ((!isset($_COOKIE['profid']))&&(!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
include '../../../configs.php';
if (!isset($_COOKIE['idaula'])) {
	header('location:./?opt=7');
}
if (isset($_COOKIE['profid'])) {
	$pid = $_COOKIE['profid'];
	
}
if (isset($_COOKIE['rootid'])) {
	$pid = $_COOKIE['rootid'];
}
if (isset($_COOKIE['admid'])){
	$pid = $_COOKIE['admid'];
}
$id = $_COOKIE['idaula'];
if (isset($_REQUEST['opt'])) {
	$opt = $_REQUEST['opt'];

	if ($opt == 1) {
		$query_t = "SELECT * FROM tbl_turma";
		$result_t = mysqli_query($con, $query_t);
		$s = 0;
		$e = 0;
		while ($row_t = mysqli_fetch_object($result_t)) {
			if (isset($_COOKIE['tid'.$row_t->id])) {
				$tid = $_COOKIE['tid'.$row_t->id];
				setcookie('tid'.$tid,'');

				$q = "INSERT INTO `tbl_turmas_aula`(`id_aula`, `id_turma`, `completa`) VALUES ('$id','$tid','0')";
				if (mysqli_query($con,$q)) {

					$query = "SELECT tbl_usuarios.id FROM tbl_usuario_turma, tbl_usuarios WHERE tbl_usuario_turma.id_turma = '$tid' AND tbl_usuarios.id = tbl_usuario_turma.id_aluno";
					$result = mysqli_query($con, $query);
					while ($row = mysqli_fetch_object($result)) {
						$uid = $row->id;
						$query = "INSERT INTO `tbl_usuario_aula`(`id_aula`, `id_usuario`, `completa`) VALUES('$id','$uid','0')";
						if (mysqli_query($con,$query)) {
							$s = $s +1;

						}
						else{
							$e = $e +1;
						}
					}
				}
				else{
					echo "Error ao adcionar turma a aula.";
				}
			}
		}
		if ($e == 0) {
			setcookie('idaula','');
			?>
			<script type="text/javascript">
				alert('Aulas agendada com sucesso!!!');
				window.location.assign('../');
			</script>
			<?php
		}
	}
	if ($opt == 2) {
		if (isset($_REQUEST['id'])) {
			$idt = $_REQUEST['id'];
			setcookie('tid'.$idt,$idt);
			header('location:./?opt=4');	
		}
	}
	if ($opt == 3) {
		if (isset($_REQUEST['id'])) {
			$idt = $_REQUEST['id'];
			setcookie('tid'.$idt,'');
			header('location:./?opt=4');	
		}
	}
}





?>