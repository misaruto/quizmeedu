<?php 
if ((!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
if (isset($_COOKIE['admid'])) {
	$id = $_COOKIE['admid'];
	$t ='adm'; 
}
if (isset($_COOKIE['rootid'])) {
	$id = $_COOKIE['rootid'];
	$t ='root'
}
include '../../../configs.php';

if (isset($_REQUEST['id'])) {
	$idp = $_REQUEST['id'];
	$p = $_REQUEST['p'];
	$query = "UPDATE `tbl_requisicoes` SET `atentida`= '1' , aprovada_".$t." = '-1', id_".$t."='$id' WHERE id = '$idp'";
	if (mysqli_query($con, $query)) {	
		?>
		<script type="text/javascript">
			alert('Requisição negada');
			window.location.assign('./');
		</script>
		<?php

	}
	else{
		?>
		<script type="text/javascript">
			alert('Não foi possivel negar a requisição. Tente novamente');
			window.location.assign('./?opt=2');
		</script>
		<?php
	}
}
?>
<script type="text/javascript">
	alert('Não detectado nenhum professor. Tente novamente');
	window.location.assign('./?opt=2');
</script>
<?php
?>