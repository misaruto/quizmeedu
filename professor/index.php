<?php
if ((isset($_COOKIE['profid']))||(isset($_COOKIE['admid']))||(isset($_COOKIE['rootid']))) {
	header('location:./aulas');
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta charset="utf-8">
</head>
<style type="text/css">
	.form-control{
		box-shadow: 2px 2px 4px #636363;
	}
	.btn:hover{
		box-shadow: 2px 2px 4px #636363;
	}
</style>
<body style="background-color: rgb(190, 190,190);" id="body-background">
	<center>
		<div style="margin-top: 13%; width: 350px; background-color: rgb(222,222,222); box-shadow: 2px 4px 4px #000000;">
			<div style="width: 300px">
				<center>
					<form action="./loginadm.php">
						<p style="color: rgb(121,146,166); font-weight: bold; font-size: 20px;">Professor/Administrador</p>
						<div class="form-group">
							<label for="login" style="font-size: 20px; font-weight: bold; color: rgb(121,146,166); ">Login</label>
							<input type="text" name="login" id="login" class="form-control" placeholder="Login" style="background-color: #fff; font-weight: bold;">
						</div>
						<div class="form-group">
							<label for="pass" style=" font-size: 20px; font-weight: bold; color: rgb(121,146,166); ">Senha</label>
							<input type="password" name="pass" class="form-control" id="pass" placeholder="Senha" style="background-color: #fff; font-weight: bold;">
						</div>
						<button type="submit" class="btn" style="color: #fff; background-color: rgb(58,65,73);">Entrar</button>
						<br>
					</form>
					<a href="cadp.php" style="color: rgb(121,146,166);">
						Cadastre-se
					</a>
				</center>
			</div>
		</div>
		<div>
			<div>
				<i id="button" class="fa fa-volume-off" style="font-size:48px;color:red" onclick="pause()"></i>
			</div>
		</div>
	</center>
	<audio src="../audios/inicial_professor.mpeg" autoplay loop id="audio"></audio>
	<script src="../js_imagens.js"></script>
	<script type="text/javascript">
		var button = document.getElementById('button');
		var audio = document.getElementById('audio');
		function pause() {
			audio.pause();
			button.className = "fa fa-volume-up";
			button.setAttribute('onclick','play()');
		}
		function play(argument) {
			audio.play();
			button.className = "fa fa-volume-off";
			button.setAttribute('onclick', 'pause()');
		}
	</script>
</body>
</html>