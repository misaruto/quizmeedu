<?php 
if ((!isset($_COOKIE['profid']))&&(!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
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
	include '../../../configs.php';
if (isset($_REQUEST['n'])){
	$n = $_REQUEST['n'];
	if (isset($_REQUEST['np'])) {
		$np = $_REQUEST['np'];
	}
	include '../configs.php';
	$pontuacao = $np * 2;
	$sql = "INSERT INTO tbl_sequencia_perguntas(`id_professor`,`np`,`nome`,`pontuacao`) VALUES ('$pid','$np','$n','$pontuacao')";
	if (mysqli_query($con,$sql)) {
		$sql = "SELECT MAX(id) FROM `tbl_sequencia_perguntas`";
		$query = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($query);
		$id = $row['MAX(id)'];
		setcookie('idseq',$id);
		header('location:./?opt=5&idseq='.$id);
	}
	else{
		echo "erro ao add";
	}
}
?>