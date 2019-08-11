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
include '../../../configs.php';
$pg = array('cad_turma.php','del_turma.php','edit_turmas.php','select_alunos.php');
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
	<link rel="shortcut icon" href="../../../imagens/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<meta charset="utf-8">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="../../../style.css">
	<meta charset="utf-8">
</head>
<body style="background-color: rgb(209, 218, 226);">
	<div>
		<img src="" id="title">
	</div>
	<div hidden id="nav" style="position: sticky; top: 0; z-index: 11;">
		<div class="pos-f-t">
			<div class="collapse" id="navbarToggleExternalContent">
				<div class="bg-dark p-4">
					<nav class="navbar navbar-expand-xl navbar-dark"  style="background-color: #000; font-size: 22px; position: sticky; top: 0; width: 100%; z-index: 11;">
						<ul class="navbar-nav mr-auto" style="width: 100%;">
							<div class="p-2">
								<li class="nav-item ">
									<a class="nav-link" href="../">Home</a>
								</li>
							</div>
							<div class="p-2">
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Avaliações
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="../avaliacoes/?opt=0">Criar</a>
										<a class="dropdown-item" href="../avaliacoes/?opt=1">Deletar</a>
										<a class="dropdown-item" href="../avaliacoes/?opt=2">Editar</a>
										<a class="dropdown-item" href="../avaliacoes/?opt=3">Agendar</a>
									</div>
								</li>
							</div>
							<div class="p-2">
								<li class="nav-item dropdown active">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Turmas
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="../turmas/?opt=0">Criar</a>
										<a class="dropdown-item" href="../turmas/?opt=1">Deletar</a>
										<a class="dropdown-item" href="../turmas/?opt=2">Editar</a>
									</div>
								</li>
							</div>
							<div class="p-2">
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Pontuações
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="../pontuacao/?opt=0">Alunos</a>
										<a class="dropdown-item" href="../pontuacao/?opt=1">Turmas</a>
									</div>
								</li>
							</div>
							<?php	

							if (isset($_COOKIE['admid'])||isset($_COOKIE['rootid'])) {
								?>
								<div class="p-2">
									<li class="nav-item ">
										<a class="nav-link" href="../">Aulas</a>
									</li>
								</div>
								<div class="p-2">
									<li class="nav-item">
										<a class="nav-link" href="../../pessoas/">Usuários</a>
									</li>
								</div>
								<?php
							}
							else{
								?>
								<div class="p-2">
									<li class="nav-item active">
										<a class="nav-link" href="./">Requisição</a>
									</li>
								</div>
								<?php
							}
							?>
							<div class="p-2">
								<li class="nav-item ">
									<a class="nav-link" href="../">Voltar</a>
								</li>
							</div>
							<div class="p-2">
								<li class="nav-item ">
									<a class="nav-link" href="../sair.php">Sair</a>

								</li>
							</div>
						</ul>
					</div>
				</div>
				<nav class="navbar navbar-dark bg-dark"  style="background-color: #000; font-size: 22px; position: sticky; top: 0; width: 100%; z-index: 11;">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</nav>
			</div>
		</div>
		<div id="nav2" style="position: sticky; top: 0; z-index: 11;">
			<nav class="navbar navbar-expand-xl navbar-dark"  style="background-color: #000; font-size: 22px; position: sticky; top: 0; width: 100%; z-index: 11;">
				<ul class="navbar-nav mr-auto" style="width: 100%;">
					<div class="d-flex justify-content-xl-center" style="width: 100%;">
						<div class="p-2">
							<li class="nav-item ">
								<a class="nav-link" href="../">Home</a>
							</li>
						</div>
						<div class="p-2">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Avaliações
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="../avaliacoes/?opt=0">Criar</a>
									<a class="dropdown-item" href="../avaliacoes/?opt=1">Deletar</a>
									<a class="dropdown-item" href="../avaliacoes/?opt=2">Editar</a>
									<a class="dropdown-item" href="../avaliacoes/?opt=3">Agendar</a>
								</div>
							</li>
						</div>
						<div class="p-2">
							<li class="nav-item dropdown ">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Turmas
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="../turmas/?opt=0">Criar</a>
									<a class="dropdown-item" href="../turmas/?opt=1">Deletar</a>
									<a class="dropdown-item" href="../turmas/?opt=2">Editar</a>
								</div>
							</li>
						</div>
						<div class="p-2">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Pontuações
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="../pontuacao/?opt=0">Alunos</a>
									<a class="dropdown-item" href="../pontuacao/?opt=1">Turmas</a>
								</div>
							</li>
						</div>
						<?php	

						if (isset($_COOKIE['admid'])||isset($_COOKIE['rootid'])) {
							?>
							<div class="p-2">
								<li class="nav-item active">
									<a class="nav-link" href="../">Aulas</a>
								</li>
							</div>
							<div class="p-2">
								<li class="nav-item">
									<a class="nav-link" href="../../pessoas/">Usuários</a>
								</li>
							</div>
							<?php
						}
						else{
							?>
							<div class="p-2">
								<li class="nav-item active">
									<a class="nav-link" href="./">Requisição</a>
								</li>
							</div>
							<?php
						}
						?>
						<div class="p-2">
							<li class="nav-item ">
								<a class="nav-link" href="../">Voltar</a>
							</li>
						</div>
						<div class="p-2">
							<li class="nav-item ">
								<a class="nav-link" href="sair.php">Sair</a>

							</li>
						</div>
					</div>
				</ul>
			</nav>
		</div>
		<div class="container">
			<div>
				<table class="table table-striped">
					<form action="adm2.php">
						<tr>
							<td colspan="2">
								<center>
									<h3>Requisição administrador</h3>
								</center>
							</td>
						</tr>
						<tr>
							<td>
								Posição:
							</td>
							<td>
								<select name="p">
									<option value="0">Professor</option>
									<option value="1">Administrador</option>
									<option value="2">Root</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								Por que:
							</td>
							<td>
								<textarea name="pq" cols="40" rows="4" placeholder="Escrevao o porque você quer essa posição. 	"></textarea>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<center>
									<button type="submit" class="btn btn-primary">Enviar</button>
								</center>
							</td>
						</tr>
					</form>
				</table>
			</div>
		</div>
		<script src="../../../js_imagens.js"></script>
	</body>
	</html>