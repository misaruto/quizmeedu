<?php 
if (isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
	setcookie('id',$id);
}
else{
	?>
	<script type="text/javascript">
		alert('houve um erro ao cadastrar. Por favor voltar e refazer cadastro.');
		window.location.assign('./?pg=3');
	</script>
	<?php
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="../imagens/favicon.ico" type="image/x-icon" />
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<center>
		<center>
			<div>
				<img src="" id="title">
			</div>
		</center>
		<table class="table table-striped">
			<form action="verifica-codigo.php">
				<div style="font-size: 24px;">
					Digite o código de 6 digítos enviado para o seu email: <br>
				</div>
				<input type="text" size="6" name="codigo" id="codigo" oninput="VerificaTamanho()" required required onkeypress='return SomenteNumero(event)' maxlength="6">
				<br>
				<br>
				<input type="submit" class="btn btn-primary">
				<br>
				<a href="reenviar.php">
					Reenviar o codigo de confirmação
				</a>
			</form>
		</table>
	</center>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
	<script type="text/javascript">
		function SomenteNumero(e){
			var tecla=(window.event)?event.keyCode:e.which;   
			if((tecla>47 && tecla<58)) return true;
			else{
				if (tecla==8 || tecla==0) return true;
				else  return false;
			}
		}
	</script>
	<script src="../js_imagens.js"></script>
</body>
</html>