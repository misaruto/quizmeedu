<?php 
if ((!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
if (isset($_COOKIE['admid'])) {
	$id = $_COOKIE['admid'];
}
if (isset($_COOKIE['rootid'])) {
	$id = $_COOKIE['rootid'];
}
include '../../../configs.php';

if (!isset($_REQUEST['id'])) {
	header('location:./');
}
$id = $_REQUEST['id'];
if (!isset($_COOKIE['id'])) {
	setcookie('id',$id);
}
?>
<title></title>
<link rel="shortcut icon" href="../../../imagens/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta charset="utf-8">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" type="text/css" href="../../../style.css">
<meta charset="utf-8">
<script type="text/javascript">
	alert('Digite um motivo por não aceitar esse usuário');
</script>
<body>
	<div>
		<img src="" id="title">
	</div>
	<center>
		<div>
			<center>
				<div class="alert alert-info">
					O usuário será apagado após enviar o motivo.
				</div>
			</center>
			<br>
			<form action="negar2.php">
				<textarea name="motivo" placeholder="Digite um motivo" row="5" cols="30"></textarea>
				<br>
				<input type="submit" class="btn btn-primary">
			</form>
		</div>
	</center>
	<script src="../../../js_imagens.js"></script>
</body>
</html>