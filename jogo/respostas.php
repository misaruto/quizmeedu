<?php 
if ((!isset($_REQUEST['resposta']))&&(!isset($_COOKIE['userid']))&&(!isset($_COOKIE['pergunta']))&&(!isset($_COOKIE['idaula']))&&(!isset($_COOKIE['seq']))&&(!isset($_COOKIE['pid']))) {
	header('location:./jogo.php');
}
if (isset($_REQUEST['resposta'])) {
	$r = $_REQUEST['resposta'];
	$u = $_COOKIE['userid'];
	$p = $_COOKIE['pergunta'];
	$a = $_COOKIE['idaula'];
	$seq = $_COOKIE['seq'];
	$pid = $_COOKIE['pid'];

	if ($r == 1) {
		$rf = 0;
	}
	if ($r == 2) {
		$rf = 50;
	}
	if ($r == 3) {
		$rf = 100;
	}

	include '../configs.php';
	if ($p == '1P') {
		$sql = "SELECT *,tbl_perguntas.id FROM tbl_perguntas, tbl_destinos WHERE tbl_perguntas.id = '$pid' AND tbl_perguntas.id_destino = tbl_destinos.id";
	}
	else{
		$sql = "SELECT *,tbl_perguntas.id FROM tbl_perguntas, tbl_destinos,tbl_sequencia_perguntas WHERE tbl_perguntas.id = '$pid' AND tbl_perguntas.id_destino = tbl_destinos.id AND tbl_sequencia_perguntas.id = '$seq'";
	}
	$row = mysqli_fetch_array(mysqli_query($con,$sql));
	$id = $row[0];
	$query = "INSERT INTO tbl_respostas(`resposta`, `id_usuario`, `id_pergunta`,`id_aula`) VALUES ('$rf','$u','$id','$a')";
	$d = $row['destino_'.$r];
	if (mysqli_query($con, $query)) {
		if ($row['numero_pergunta'] == 40) {
			header('location:fim.php');
			setcookie('maf',$d);
		}
		else{
			
			$query = "SELECT *,tbl_perguntas.id FROM tbl_perguntas, tbl_destinos WHERE tbl_destinos.id = tbl_perguntas.id_destino AND tbl_destinos.codigo = '$d'";
			$result = mysqli_query($con,$query);
			$row = mysqli_fetch_object($result);
			setcookie('pergunta',$d);
			setcookie('pid',$row->id);
			header('location:jogo.php');
		}
	}
}
else{
	header('location:./');
}

?>