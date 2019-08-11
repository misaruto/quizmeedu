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
$pg = array('cadastro.php','ver.php','editar.php','apagar.php','home.php','destinos.php','seqp.php','aula.php','alunos.php','cad.midias.php','pontuacao.php','pontuacao2.php','adm.php','del_seq.php','edit_seq.php','mfinais.php','finais.php','perguntas.php','edit_finais.php','cad_turma.php','del_turma.php','edit_turma.php','select_alunos.php');
if (isset($_REQUEST['opt'])) {
	$opt = $_REQUEST['opt']; 
}
else{
	$opt = 4;
}
$pag = $pg[$opt];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="shortcut icon" href="../../imagens/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="../../style.css">
	<meta charset="utf-8">
</head>
<body style="background-color: rgb(209, 218, 226);">
	<div>
		<img src="" id="title">
	</div>
	
		<?php include 'menu.php'; include 'menu_mobile.php'; ?>
		<div class="container">
			<div>
				<?php 
				include $pag;
				?>
			</div>
		</div>
		<script src="../../js_imagens.js"></script>
	</body>
	</html>