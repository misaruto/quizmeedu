<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="shortcut icon" href="./imagens/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="style.css">


	<style>
		/* Center the loader */
		#loader {
			position: absolute;
			left: 50%;
			top: 50%;
			z-index: 1;
			width: 150px;
			height: 150px;
			margin: -75px 0 0 -75px;
			border: 16px solid #f3f3f3;
			border-radius: 50%;
			border-top: 16px solid #3498db;
			width: 120px;
			height: 120px;
			-webkit-animation: spin 2s linear infinite;
			animation: spin 2s linear infinite;
		}

		@-webkit-keyframes spin {
			0% { -webkit-transform: rotate(0deg); }
			100% { -webkit-transform: rotate(360deg); }
		}

		@keyframes spin {
			0% { transform: rotate(0deg); }
			100% { transform: rotate(360deg); }
		}

		/* Add animation to "page content" */
		.animate-bottom {
			position: relative;
			-webkit-animation-name: animatebottom;
			-webkit-animation-duration: 1s;
			animation-name: animatebottom;
			animation-duration: 1s
		}

		@-webkit-keyframes animatebottom {
			from { bottom:-100px; opacity:0 } 
			to { bottom:0px; opacity:1 }
		}

		@keyframes animatebottom { 
			from{ bottom:-100px; opacity:0 } 
			to{ bottom:0; opacity:1 }
		}

		#myDiv {
			display: none;
			text-align: center;
		}


		<style type="text/css">
		#button{
			width: 30px;
			height:  30px;	
			cursor: pointer;
		}
		#button: hover{
			cursor: pointer;
			width: 35px;
			height:  35px;
			box-shadow: 2px 2px 4px #000;
		}
		.fa .fa-pause-circle: hover{
			box-shadow: 2px 4px 8px #000;
		}
	</style>
	<script type="text/javascript">
		var id = "";
		<?php 
		if (isset($_REQUEST['e'])) {
			?>
			window.onload = function(){
				showLogin();
				cadastro();
			}
			<?php	
		}
		?>
		function showLogin(argument) {
			var login = document.getElementById('login');
			var p2 = document.getElementsByClassName('p-2');
			var menu = document.getElementById('menu');
			var i;
			if (login.hidden == true) {
				login.hidden = false;
				menu.hidden = true;
				for (i = 0; i < p2.length; i++) {
					p2[i].hidden = true;
				}
			}
			else{
				login.hidden = true;
				menu.hidden = false;
				for (i = 0; i < p2.length; i++) {
					p2[i].hidden = false;
				}
			}
		}
		function cadastro(){
			var login = document.getElementById('login');
			var b = document.getElementById('body-background');
			var cad = document.getElementById('c');
			if (login.hidden == false) {
				login.hidden = true;
			}
			if (cad.hidden == true) {
				cad.hidden = false;
			}
			else{
				cad.hidden = true;
				showLogin();
			}
		}
		function senha(argument) {
			var login = document.getElementById('login');
			var div_senha = document.getElementById('rec_senha');
			if (div_senha.hidden == true) {
				div_senha.hidden = false;

			}
			if (login.hidden == false) {
				login.hidden = true;
			}
			else{
				div_senha.hidden = true;
				showLogin();
			}
		}
		function SomenteNumero(e){
			var tecla=(window.event)?event.keyCode:e.which;   
			if((tecla>47 && tecla<58)) return true;
			else{
				if (tecla==8 || tecla==0) return true;
				else  return false;
			}
		}

		function verificar_email(argument) {
			var str = document.getElementById('rec_email').value; 
			document.getElementById('cont').hidden = true;
			document.getElementById('loader').hidden = false;
			if (str.length == 0) { 
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						if (this.responseText == "1") {
							document.getElementById('rec_senha').hidden = true;
							document.getElementById('verifica_codigo').hidden = false;
						}
						else{
							document.getElementById('cont').hidden = false;
							document.getElementById('loader').hidden = true;
							document.getElementById('alert').hidden = false;
						}
					}
				};
				xmlhttp.open("GET", "verificaEmail.php?email=" + str, true);
				xmlhttp.send();
			}
		}
		function verificar_codigo(argument) {
			var str = document.getElementById('codigo').value; 
			if (str.length == 0) { 
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						if (this.responseText == "0") {
							document.getElementById('alert2').hidden = false;
						}
						else{
							document.getElementById('verifica_codigo').hidden = true;
							document.getElementById('digitar_senhas').hidden = false;
						}
					}
				};
				xmlhttp.open("GET", "verificarCodigo.php?codigo=" + str, true);
				xmlhttp.send();
			}
		}


		function vsenha(){
			var s1 = document.getElementById('senha1').value;
			var s2 = document.getElementById('senha2').value;
			if (s1 == s2) {
				document.getElementById('senhas-corretas').hidden = false;
				document.getElementById('senhas-erradas').hidden = true;
				document.getElementById('submit').disabled = false;
			}
			else{
				document.getElementById('senhas-erradas').hidden = false;
			}
		}

		function verificar_senhas(){
			var s1 = document.getElementById('senha1').value;
			var s2 = document.getElementById('senha2').value;
			if (s1 == s2) {

				document.getElementById('senhas-container').hidden = true;
				document.getElementById('loader').hidden = false;
				var str = s1;
				if (str.length == 0) { 
					document.getElementById("txtHint").innerHTML = "";
					return;
				} else {
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							if (this.responseText == "0") {
								document.getElementById('senhas-container').hidden = false;
								document.getElementById('loader').hidden = true;
								alert('Senha não alterada, tente novamente');
								senha();

							}
							else{
								document.getElementById('senhas-container').hidden = true;
								document.getElementById('loader').hidden = true;
								document.getElementById('digitar_senhas').hidden = true;
								alert('Senha alterada');
								showLogin();
							}
						}
					};
					xmlhttp.open("GET", "alteraSenhas.php?senha=" + str, true);
					xmlhttp.send();
				}

			}
			else{
				document.getElementById('senhas-erradas').hidden = false;
			}
		}

	</script>
</head>
<body style="background-color: rgb(190, 190,190);" id="body-background">
	<div class="container">
		<center>



			<div class="d-flex" id="menu" style="margin-top: 40%">
				<div class="p-2" style="margin-left: 6%">
					<button class="btn btn-primary">
						Curso
					</button>
				</div>
				<div class="p-2" style="margin-left: 33%">
					<button class="btn btn-primary" onclick="showLogin()" id="l">
						Login
					</button>
				</div>
				<div class="p-2" style="margin-left: 32%">
					<button class="btn btn-primary">
						Sobre
					</button>
				</div>
			</div>

			<div style="margin-top: -20%; height: 400px; width: 350px; background-color: rgb(222,222,222); box-shadow: 2px 4px 4px #000000;" id="login" hidden>
				<div style="width: 250px;">
					<form action="login.php">
						<p style="font-size: 20px; font-weight: bold; color: rgb(121,146,166); ">Aluno já cadastrado?
							<button type="button" class="close" aria-label="Close" onclick="showLogin()">
								<span aria-hidden="true">&times;</span>
							</button>
							<br>
							Faça o login
						</p>
						<div class="form-group">
							<label for="email" style="font-size: 20px; font-weight: bold; color: rgb(121,146,166); ">
								E-mail
							</label>
							<input type="Email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="E-mail" autofocus style="background-color: #fff; font-weight: bold;">
						</div>
						<div class="form-group">
							<label for="p" style="font-size: 20px; font-weight: bold; color: rgb(121,146,166); ">
								Senha
							</label>
							<input type="password" name="senha" class="form-control" id="p" style="background-color: #fff; font-weight: bold;" placeholder="Senha">
						</div>
						<button type="submit" class="btn"  style="color: #fff; background-color: rgb(58,65,73);">
							Entrar
						</button>
						<br>
						<br>
						<a href="#" class="link" style="color: rgb(121,146,166);" onclick="senha()">
							Esqueceu a Senha
						</a>
						<br>
						<a href="#" class="link" style="color: rgb(121,146,166);" onclick="cadastro()">Cadastre-se</a>

					</form>
				</div>
			</div>



			<div id="rec_senha" hidden style="margin-top: -20%; height: 400px; width: 350px; background-color: rgb(222,222,222); box-shadow: 2px 4px 4px #000000;">
				<div id="cont">
					<div class="form-group" style="font-size: 20px; font-weight: bold; color: rgb(121,146,166);">
						Recuperação de Senha
						<button type="button" class="close" aria-label="Close" onclick="senha()">
							<span aria-hidden="true">&times;</span>
						</button>
					</div> 

					<br>
					<div class="form-group">
						<label for="rec_email" style="font-size: 20px; font-weight: bold; color: rgb(121,146,166); ">
							Digite seu e-mail
						</label>
						<input type="Email" name="email" class="form-control" id="rec_email" aria-describedby="emailHelp" placeholder="E-mail" autofocus style="background-color: #fff; font-weight: bold; width: 80%;" required oninput="document.getElementById('sub').disabled = false">
						<br>
						<br>
						<button class="btn btn-primary" type="submit" id="sub" disabled onclick="verificar_email()">
							Enviar
						</button>
						<div class="alert alert-danger" hidden id="alert"> 
							Nenhum usuário encontrado.
						</div>
					</div>
				</div>
				<div id="loader" hidden></div>	
			</div>



			<div id="verifica_codigo" hidden style="margin-top: -20%; height: 400px; width: 350px; background-color: rgb(222,222,222); box-shadow: 2px 4px 4px #000000;">
				<div class="form-group" style="font-size: 20px; font-weight: bold; color: rgb(121,146,166);">
					Recuperação de Senha
				</div>
				<div class="form-group">
					<label for="email" style="font-size: 20px; font-weight: bold; color: rgb(121,146,166); ">
						Digite o código
					</label>
					<input type="text" autofocus size="6" name="codigo" id="codigo" required onkeypress='return SomenteNumero(event)' maxlength="6" class="form-control" style="background-color: #fff; font-weight: bold; width: 23%;">
					<br>
					<br>
					<button class="btn btn-primary" type="submit" onclick="verificar_codigo()">
						Verificar
					</button>
					<br>
					<div class="alert alert-danger" hidden>
						O codigo digitado não confere.
					</div>
				</div>	
			</div>



			<div id="digitar_senhas" hidden style="margin-top: -20%; height: 400px; width: 350px; background-color: rgb(222,222,222); box-shadow: 2px 4px 4px #000000;">
				<div id="senhas-container">
					<div class="form-group" style="font-size: 20px; font-weight: bold; color: rgb(121,146,166);">
						Recuperação de Senha
					</div>
					<div class="form-group">
						<label for="senha1" style="font-size: 20px; font-weight: bold; color: rgb(121,146,166); ">
							Digite a nova senha
						</label>
						<input type="password" onchange="vsenha()" oninput="vsenha()" name="senha1" id="senha1" class="form-control" style="background-color: #fff; font-weight: bold; width: 80%;">
						<br>
						<label for="senha2" style="font-size: 20px; font-weight: bold; color: rgb(121,146,166); ">
							Digite a senha novamente
						</label>
						<input type="password" onchange="vsenha()" oninput="vsenha()" name="senha2" id="senha2" class="form-control" style="background-color: #fff; font-weight: bold; width: 80%;">
						<br>
						<div id="senhas-erradas" class="alert alert-danger" hidden>
							As senhas não coincidem
						</div>
						<div id="senhas-corretas" class="alert alert-success" hidden>
							As senhas coincidem
						</div>

						<br>
						<button class="btn btn-primary" type="submit" onclick="verificar_senhas()" disabled id="submit">
							Verificar
						</button>
					</div>	
				</div>
				<div id="loader" hidden></div>
			</div>



			<div id="c" style="margin-top: -20%; width: 300px; width: 450px; background-color: rgb(222,222,222); box-shadow: 2px 4px 4px #000000;" hidden="">
				<div style="width: 250px;">
					<button type="button" class="close" aria-label="Close" onclick="cadastro()">
						<span aria-hidden="true">&times;</span>
					</button> <br>
					<form action="cadastro.php">
						<p style="font-size: 20px; font-weight: bold; color: rgb(121,146,166); ">
							Aluno cadastre-se
						</p>
						<div class="form-group">
							<label for="nome" style="font-size: 20px; font-weight: bold; color: rgb(121,146,166); ">
								Nome
							</label>
							<input type="text" required name="nome" id="nome" class="form-control" placeholder="Nome" style="background-color: #fff; font-weight: bold;">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1" style="font-size: 20px; font-weight: bold; color: rgb(121,146,166);">
								E-mail
							</label>
							<input type="email" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail" style="background-color: #fff; font-weight: bold;">
						</div>
						<div class="form-group">
							<label for="s1" style="font-size: 20px; font-weight: bold; color: rgb(121,146,166);">
								Senha
							</label>
							<input type="password" name="senha" required class="form-control" id="s1" style="background-color: #fff; font-weight: bold;" oninput="vSenha();" placeholder="Senha">
						</div>
						<div class="form-group" >
							<label for="s2" style="font-size: 20px; font-weight: bold; color: rgb(121,146,166);">
								Digite a senha novamente
							</label>
							<div style="display: flex;">
								<center>
									<input type="password" name="senha2" required class="form-control" id="s2" style="background-color: #fff; font-weight: bold;" oninput="vSenha()" placeholder="Senha">

									<img src="./imagens/ver.png" id="img" onclick="ver() " width="24" height="24" style="cursor: pointer;">
								</center>
							</div>
						</div>
						<output id="msg"></output>
						<br>
						<button type="submit" class="btn btn-primary" disabled id="btn" style="color: #fff; background-color: rgb(58,65,73);">
							Cadastrar
						</button>
						<br>
						<br>
						<br>
					</form>
				</div>
			</div>
			<div>
				<div style="margin-top: 4%;">
					<i id="button" class="fa fa-volume-off" style="font-size:48px;color:red" onclick="pause()"></i>
				</div>
			</div>
		</center>
	</div>
	<audio src="./audios/inicial.mpeg" autoplay loop id="audio"></audio>
	<script src="./js_imagens.js"></script>
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
			img.src="./imagens/nao.ver.png"
		}
		function nVer() {

			s1.type = 'password';
			s2.type = 'password';
			img.setAttribute('onclick','ver()');
			img.src="./imagens/ver.png";
		}
		<?php 
		if (isset($_REQUEST['l'])) {
			?>
			document.getElementById('l').onclick(event);
			<?php
		}
		?>
	</script>
</body>
</html>
