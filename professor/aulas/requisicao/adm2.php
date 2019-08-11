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
include '../../configs.php';
if ((isset($_REQUEST['p']))&&(isset($_REQUEST['pq']))) {
	$p = $_REQUEST['p'];
	$pq = $_REQUEST['pq'];
	$sql = "INSERT INTO `tbl_requisicoes`(`posicao`, `porque`, `id_user`, `atendida`, `aprovada_adm`, `id_adm`, `aprovada_root`, `id_root`) VALUES('$p','$pq','$id','0','0','0','0','0')";
	if (mysqli_query($con, $sql)) {
		?>
		<script type="text/javascript">
			alert('Solitação realizada com sucesso, aguardar resposta dos administradores');
			window.location.assign('./');
		</script>
		<?php
	}
}


?>