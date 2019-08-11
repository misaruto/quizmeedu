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
if (isset($_COOKIE['idseq'])){
	$idseq = $_COOKIE['idseq'];
}

	include '../../../configs.php';

if ((isset($_REQUEST['f1']))&&(isset($_REQUEST['f2']))&&(isset($_REQUEST['f3']))) {

	$f[1] = $_REQUEST['f1'];
	$f[2] = $_REQUEST['f2'];
	$f[3] = $_REQUEST['f3'];
	
	//remove as aspas simples para evitar erros com as clausula sql
	$f[1] = str_replace("'","\"",$f[1]);
	$f[2] = str_replace("'","\"",$f[2]);
	$f[3] = str_replace("'","\"",$f[3]);
	
	$sql = "SELECT * FROM tbl_sequencia_perguntas WHERE id = '$idseq'";
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_object($query);

	$pontos = $row->pontuacao;
	$np = $row->np;
	$pontos = ($pontos + 1)/3;

	$min[1] = 0;
	$max[1] = (((((($np * 2)+1)/3)-1)/2)/$np)*100;

	$min[2] = $max[1] + ((0.5 / $np)*100);
	$max[2] = ($max[1]*2) + ((0.5 / $np)*100);

	$min[3] = $max[2] + ((0.5 / $np)*100);;
	$max[3] = (($max[1]+$max[2]) + ((0.5 / $np)*100));

	if (($f[1] != "")&&($f[2] != "")&&($f[3] != "")) {
		for ($i= 1; $i <= 3 ; $i++) { 

			//insere os finais
			$sql = "INSERT INTO `tbl_finais`(`id_professor`, `id_sequencia`, `final`, `pctg_min`, `pctg_max`) VALUES ('$id','$idseq','".$f[$i]."','".$min[$i]."','".$max[$i]."')";

			if (mysqli_query($con, $sql)) {

			}
			else{
				$erro[] = "$i";
			}
		}
	}
	if ($i >= 3) {
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title></title>
		</head>
		<body>
			<script type="text/javascript">
				alert('Finais cadastrados com sucesso, você será redirecionado à página de ver as avaliações');
				window.location.assign('./?opt=8');
			</script>
		</body>
		</html>
		<?php
	}
	else{
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title></title>
		</head>
		<body>
			<script type="text/javascript">
				alert('Alguns dos finais não foram cadastrados. Por favor envie um FeedBack aos desenvolvedores');
				window.location.assign('./?opt=8');
			</script>
		</body>
		</html>
		<?php
	}
}
else{
			?>
		<!DOCTYPE html>
		<html>
		<head>
			<title></title>
		</head>
		<body>
			<script type="text/javascript">
				alert('Alguns dos finais não foram recebidos. Por favor envie um FeedBack aos desenvolvedores');
				window.location.assign('./?opt=8');
			</script>
		</body>
		</html>
		<?php
}
?>