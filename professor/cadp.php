<?php 
if (isset($_REQUEST['l'])&&isset($_REQUEST['m'])&&isset($_REQUEST['n'])) {
	$l = $_REQUEST['l'];
	$m = $_REQUEST['m'];
	$p = $_REQUEST['p'];
	$n = $_REQUEST['n'];
	$e = 1;
}
else{
	$l = "";
	$m = "";
	$n = "";
	$e = 0;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta name="viewport" content="width=device-width">
</head>
<body style="background-color: #ededed;">
	<center>
		<div>
			<img src="" id="title">
		</div>
	</center>
	<div class="container" style="width: 500px;">
		<center>
			<table class="table" style="background-color: #fff;">
				<form action="cadp2.php">
					<tr>
						<td colspan="2">
							<center>
								<div style="font-size: 20px; font-weight: bold;">
									Cadastro de professor	
								</div>
							</center>
						</td>
					</tr>
					<tr>
						<td>
							<label for="n">Nome</label>
						</td>
						<td>
							<input type="text" name="n" required id="n" class="form-control" value="<?=$n?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="mail">E-mail</label>
						</td>
						<td>
							<input type="email" name="m" id="mail" required class="form-control" value="<?=$m?>">
						</td>
					</tr>
					<tr>
						<td>
							<label >
								Descrição:
							</label>
						</td>
						<td>
							<div id="opt">
								<label>
									<input type="radio" onclick="show1()" name="opt"> Link do Lattes
								</label>
								&emsp;
								<label>
									<input type="radio" onclick="show2()" name="opt"> Pequena biografia
								</label>
							</div>
							<div id="opt1" hidden>
								<input type="link" name="lattes" class="form-control" id="lattes">
							</div>
							<div id="opt2" hidden>
								<textarea name="desc" rows="2" cols="28" class="form-control" id="desc"></textarea>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<label for="l">Login</label>
						</td>
						<td>
							<?php 
							if ($e == 1) {?>
								<div class="alert alert-danger" role="alert" >
									O usuário digitado já existe.
								</div>
								<?php
							}

							?>
							<input type="text" name="l" id="l" class="form-control" value="<?=$l?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="s1">Senha</label>
						</td>
						<td>
							<input type="password" name="senha" id="s1" class="form-control" placeholder="******" oninput="pLength()"  onchange="vSenha()" oninput="vSenha()">
							<img src="../imagens/ver.png" id="img" onclick="ver() " width="24" height="24" style="cursor: pointer;">
						</td>
					</tr>
					<tr>
						<td>
							<label for="s">Digite a senha novamente</label>
						</td>
						<td>
							<input type="password" id="s2" class="form-control" onchange="vSenha()" oninput="vSenha()">
							<br>
							<output id="msg"></output>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<center>
								<button type="submit" class="btn btn-primary" disabled id="btn">Salvar</button>
							</center>
						</td>
					</tr>
				</form>
			</table>
		</center>
		<br><br><br><br>
	</div>
	<script src="../js_imagens.js"></script>
	<script type="text/javascript">

		function vSenha() {
			var s1 = document.getElementById('s1');
			var s2 = document.getElementById('s2');
			var msg = document.getElementById('msg');
			var s1l = document.getElementById('s1').value;
			var s2l = document.getElementById('s2').value;
			if (s1l.length >7 || s2l.length > 7) {
				msg.value="";
				msg.className="";
				if (s1.value == s2.value) {
					msg.value="A senhas coincidem";
					msg.className="alert alert-success";
					document.getElementById('btn').disabled = false;
				}
				else{
					msg.value="A senhas não coincidem";
					msg.className="alert alert-danger";
				}
			}
			else{
				msg.value="Senha muito curta";
				msg.className="alert alert-warning";
			}
		}

		function ver() {
			var s1 = document.getElementById('s1');
			var s2 = document.getElementById('s2');
			var img = document.getElementById('img');
			s1.type = 'text';
			s2.type = 'text';
			img.setAttribute('onclick','nVer()');
			img.src="../imagens/nao.ver.png"
		}
		function nVer() {

			s1.type = 'password';
			s2.type = 'password';
			img.setAttribute('onclick','ver()');
			img.src="../imagens/ver.png";
		}
		function show1() {
			document.getElementById('opt1').hidden = false;
			document.getElementById('opt2').hidden = true;
		}
		function show2(){
			document.getElementById('opt1').hidden = true;
			document.getElementById('opt2').hidden = false;
		}
	</script>
</body>
</html>