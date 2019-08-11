<div hidden id="nav" style="position: sticky; top: 0; z-index: 11;">
		<div class="pos-f-t">
			<div class="collapse" id="navbarToggleExternalContent">
				<div class="bg-dark p-4">
					<nav class="navbar navbar-expand-xl navbar-dark"  style="background-color: #000; font-size: 22px; position: sticky; top: 0; width: 100%; z-index: 11;">
						<ul class="navbar-nav mr-auto" style="width: 100%;">
							<div class="p-2">
								<li class="nav-item active">
									<a class="nav-link" href="./">Home</a>
								</li>
							</div>
							<div class="p-2">
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Avaliações
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="./avaliacoes/?opt=0">Criar</a>
										<a class="dropdown-item" href="./avaliacoes/?opt=1">Deletar</a>
										<a class="dropdown-item" href="./avaliacoes/?opt=2">Editar</a>
										<a class="dropdown-item" href="./avaliacoes/?opt=3">Agendar</a>
									</div>
								</li>
							</div>
							<div class="p-2">
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Turmas
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="./turmas/?opt=0">Criar</a>
										<a class="dropdown-item" href="./turmas/?opt=1">Deletar</a>
										<a class="dropdown-item" href="./turmas/?opt=2">Editar</a>
									</div>
								</li>
							</div>
							<div class="p-2">
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Pontuações
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="./pontuacao/?opt=0">Alunos</a>
										<a class="dropdown-item" href="./pontuacao/?opt=1">Turmas</a>
									</div>
								</li>
							</div>
							<?php	

							if (isset($_COOKIE['admid'])||isset($_COOKIE['rootid'])) {
								include 'menu_adm.php';
							}
							else{
								?>
								<div class="p-2">
									<li class="nav-item">
										<a class="nav-link" href="./requisicao">Requisição</a>
									</li>
								</div>
								<?php
							}
							if (isset($_REQUEST['opt'])){ ?>
								<div class="p-2">
									<li class="nav-item ">
										<a class="nav-link" href="./">Voltar</a>
									</li>
								</div>
								<?php
							}
							else{
								echo "<div class=p-2>
								<li class=nav-item active>
								<a class=nav-link href=../>Voltar</a>
								</li>
								</div>";
							}
							?>
							<div class="p-2">
								<li class="nav-item ">
									<a class="nav-link" href="sair.php">Sair</a>

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