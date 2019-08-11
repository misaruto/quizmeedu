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
if ((isset($_REQUEST['data']))&&(isset($_REQUEST['seq']))) {
	$data = $_REQUEST['data'];
	$seq = $_REQUEST['seq'];
	if (($data != "")&&($seq != "")) {
		$sql = "INSERT INTO `tbl_aulas`(`id_professor`, `data`, `id_sequencia`,`id_turma`) VALUES ('$id','$data','$seq','0')";
		if (mysqli_query($con,$sql)) {
			$row = mysqli_fetch_array(mysqli_query($con,"SELECT max(id) FROM `tbl_aulas`"));
			setcookie('idaula',$row['max(id)']);
			header('location:./?opt=4');
		}
		echo "Erro no sql";
	}
	else{
		echo "Alguma variavel ta vazia";
	}
}
else{
	echo "n recebeu nada";
}

?>
