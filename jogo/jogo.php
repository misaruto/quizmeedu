<?php 
if (!isset($_COOKIE['userid'])) {
	header('location:../');
}
$uid = $_COOKIE['userid'];
include '../configs.php';
if ((!isset($_REQUEST['seq']))&&(!isset($_COOKIE['seq']))) {
	header('location:./');
}
else{
	if (isset($_REQUEST['seq'])) {
		$seq = $_REQUEST['seq'];
	}
}
if (isset($_COOKIE['seq'])) {
	$seq = $_COOKIE['seq'];
}
setcookie('seq',$seq);

$sql = "SELECT * FROM tbl_sequencia_perguntas WHERE id = '$seq'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_object($query);
$np = $row->np;
$titulo = $row->nome;

if (isset($_REQUEST['aula'])) {
	setcookie('idaula',$_REQUEST['aula']);
}

if (!isset($_COOKIE['pergunta'])) {
	$p = 1;
	setcookie('pergunta','1P');
	$query = "SELECT *,tbl_perguntas.id FROM tbl_perguntas,tbl_destinos WHERE id_pergunta_seq = '1' and tbl_destinos.id = tbl_perguntas.id_destino and '$seq' = tbl_perguntas.id_sequencia";
}

else{
	$p=$_COOKIE['pergunta'];
	$query = "SELECT *,tbl_perguntas.id FROM tbl_perguntas,tbl_destinos WHERE codigo = '$p' and tbl_destinos.id = tbl_perguntas.id_destino and '$seq' = id_sequencia";
}

$sql = mysqli_query($con, $query);
$row = mysqli_fetch_array($sql);

setcookie('pid',$row['id']);

$pe = $row['numero_pergunta'];
if ($pe != 1) {
	$pe = 41 - $pe;
	$pe = $np - $pe +1;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta name="viewport" content="width=device-width">
</head>
<style type="text/css">
.intput{
	color: #000;
}
.intput:hover{
	color: #e42020 ;
}
</style>
<body>
	<div class="container">
		<center>
			<div>
				<img src="" id="title">
			</div>	
		</center>

		<?php 
		$query_name = mysqli_query($con, "SELECT * FROM tbl_usuarios WHERE id = '$uid'");
		$row_name = mysqli_fetch_object($query_name);
		$name = $row_name->nome;
		?>
		<p class="text-capitalize">
			<?=$name?>
		</p>
		<p class="text-info">Pergunta: <?=$pe?>/<?=$np?></p>
		<form action="respostas.php">
			<div class="d-flex flex-row" class="p-2">
				<div style="font-size: 24px; width: 70%">
					<?=nl2br($row['pergunta'])?>
				</div>
				<div class="p-2" style="width: 30%;" >
				</div>
			</div>
			<br>
			<?php
			$n1 = rand(1,3);
			$n2 = rand(1,3);
			while ($n1 == $n2){
				if ($n1 == $n2) {
					$n2 = rand(1,3);
				}
			}
			$n3 = 6 - ($n1 + $n2);
			$resposta[$n1] = $row['resposta'.$n1];
			$resposta[$n2] = $row['resposta'.$n2];
			$resposta[$n3] = $row['resposta'.$n3];
			?>	
			<div style="font-size: 18px">
				<label class="intput">
					<input type="radio" name="resposta" onclick="button()" value="<?=$n1?>" required > <?=nl2br($resposta[$n1])?>
				</label>
				<br>
				<label class="intput">
					<input type="radio" name="resposta" onclick="button()" value="<?=$n2?>" required> <?=nl2br($resposta[$n2])?>
				</label>
				<br>	<label class="intput">
					<input type="radio" name="resposta" onclick="button()" value="<?=$n3?>" required> <?=nl2br($resposta[$n3])?>
				</label>
			</div>
			<button type="submit" class="btn btn-primary" id="btn" disabled>Enviar</button>
		</form>
		<br>
		<br>
		<br>
	</div>
</body>
</html>
<script type="text/javascript">
	function button(argument) {
		document.getElementById('btn').disabled = false;
	}
</script>
<script src="../js_imagens.js"></script>