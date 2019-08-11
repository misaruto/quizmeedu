<?php 
if ((!isset($_COOKIE['profid']))&&(!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
include '../../../configs.php';
if (!isset($_REQUEST['nv'])) {
	$n=""; 
}
else{
	$n = $_REQUEST['nv'];
}
if ((isset($_REQUEST['idseq']))) {
	$id = $_REQUEST['idseq'];
}
else{
	if (isset($_COOKIE['idseq'])) {
		$id = $_COOKIE['idseq'];
	}
}
//Descobre de qual sequencia se trata
$query = "SELECT * FROM tbl_sequencia_perguntas where id = '$id'";
$sql = mysqli_query($con, $query);
$row= mysqli_fetch_object($sql);
$max_perguntas = $row->np;
?>
<form action="cadastro.2.php" method="POST">
	<?php
	
	$sql_pa = "SELECT max(id_pergunta_seq),max(id_destino),max(n_p_destino) FROM tbl_perguntas WHERE id_sequencia = '$id'";
	$query_pa = mysqli_query($con,$sql_pa);
	$row_pa = mysqli_fetch_array($query_pa);
	$npa = $row_pa['max(n_p_destino)'];
	//declara o identificador do ultimo destino usado nessa sequencia
	$id_d = $row_pa['max(id_destino)'];
	
	$sql_dest = "SELECT numero_pergunta FROM tbl_destinos WHERE id = '$id_d'";
	$query_dest = mysqli_query($con,$sql_dest);
	$row_dest = mysqli_fetch_array($query_dest);
	$npd = $row_dest['numero_pergunta'] + 1;
	if($npa != 1){
		$npa = 40 - $npa;
		$npa = $max_perguntas - $npa;
		$npd = $npa +1;
	}
	if (($row_pa["max(id_pergunta_seq)"] == NULL)) {
		?>
		<table class="table">
			<tr>
				<td colspan="5">
					<div style="font-weight: bold; font-size: 20px;">
						<center>
							Cadastro de perguntas
						</center>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<input type="hidden" name="id" value="<?=$id?>">
					<table class="table table-striped">
						<tr>
							<td>
								Pergunta: 1
							</td>
						</tr>
						<tr>
							<td>
								<label for="pergunta">
									Pergunta
								</label>
								<textarea name="pergunta" id="pergunta" class="form-control" placeholder="DIGITE AQUI A PERGUNTA..." autofocus required oninput="contador()"></textarea> <span></span>
							</td>
						</tr>
						<tr>
							<td>
								<label for="r1">
									Resposta: 1  Pontuação 0
								</label>
								<textarea name="r1" id="r1" class="form-control" placeholder="DIGITE AQUI A RESPOSTA..." required></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<label for="r2">
									Resposta: 2 Pontuação 1 
								</label>
								<textarea name="r2" id="r2" class="form-control" placeholder="DIGITE AQUI A RESPOSTA..." required></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<label for="r3">
									Resposta: 3 Pontuação 2
								</label>
								<textarea name="r3" id="r3" class="form-control" placeholder="DIGITE AQUI A RESPOSTA..." required ></textarea>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<center>
						<button type="submit" class="btn btn-primary">Cadastrar</button>
					</center>
				</td>
			</tr>
		</table>
		<?php
	}
	else{
		?>
		<table class="table " style="font-size: 20px;">
			<tr>
				<td colspan="5">
					<div style="font-weight: bold; font-size: 20px;">
						<center>
							Cadastro de perguntas
						</center>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<table class="table table-striped" style="background-color: #bfbfbf;">
						<tr>
							<td>
								<center>
									Pergunta:
									<?php 
									if (!empty($row_pa)) {
										echo "$npd";
									}
									?>
								</center>
								<br>
								<center>
									Pergunta para a resposta <br> de valor 0 da pergunta <?=$npa?>
								</center>
							</td>
						</tr>
						<tr>
							<td>
								<label for="pergunta_1">
									Pergunta
								</label>
								<textarea name="pergunta_1" id="pergunta_1" class="form-control" placeholder="DIGITE AQUI A PERGUNTA..." required autofocus oninput="contador()"></textarea> <span></span>
							</td>
						</tr>
						<tr>
							<td>
								<label for="r1_1">
									Resposta: 1 Pontuação: 0
								</label>
								<textarea name="r1_1" id="r1_1" class="form-control" placeholder="DIGITE AQUI A RESPOSTA..." required></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<label for="r2_1">
									Resposta: 2 Pontuação: 1
								</label>
								<textarea name="r2_1" id="r2_1" class="form-control" placeholder="DIGITE AQUI A RESPOSTA..." required></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<label for="r3_1">
									Resposta: 3 Pontuação: 2
								</label>
								<textarea name="r3_1" id="r3_1" class="form-control" placeholder="DIGITE AQUI A RESPOSTA..." required></textarea>
							</td>
						</tr>
					</table>
				</td>
				<td>
					<table class="table table-striped" style="background-color: #bfbfbf;">

						<tr>
							<td>
								<center>
									Pergunta:
									<?php 
									if (!empty($row_pa)) {
										echo "$npd";
									}
									?>
								</center>
								<br>
								<center>
									Pergunta para a resposta <br> de valor 1 da pergunta <?=$npa?>
								</center>
							</td>
						</tr>
						<tr>
							<td>
								<label for="pergunta_2">
									Pergunta
								</label>
								<textarea name="pergunta_2" id="pergunta_2" class="form-control" placeholder="DIGITE AQUI A PERGUNTA..." required oninput="contador()"></textarea> <span></span>
							</td>
						</tr>
						<tr>
							<td>
								<label for="r1_2">
									Resposta: 1 Pontuação: 0
								</label>
								<textarea name="r1_2" id="r1_2" class="form-control" placeholder="DIGITE AQUI A RESPOSTA..." required></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<label for="r2_2">
									Resposta: 2 Pontuação: 1
								</label>
								<textarea name="r2_2" id="r2_2" class="form-control" placeholder="DIGITE AQUI A RESPOSTA..." required></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<label for="r3_2">
									Resposta: 3 Pontuação: 2
								</label>
								<textarea name="r3_2" id="r3_2" class="form-control" placeholder="DIGITE AQUI A RESPOSTA..." required ></textarea>
							</td>
						</tr>
					</table>
				</td>
				<td>
					<table class="table table-striped" style="background-color: #bfbfbf;">
						<tr>
							<td>
								<center>
									Pergunta:
									<?php 
									if (!empty($row_pa)) {
										echo "$npd";
									}
									?>
								</center>
								<br>
								<center>
									Pergunta para a resposta <br> de valor 2 da pergunta <?=$npa?>
								</center>
							</td>
						</tr>
						<tr>
							<td>
								<label for="pergunta_3">
									Pergunta
								</label>
								<textarea name="pergunta_3" id="pergunta_3" class="form-control" placeholder="DIGITE AQUI A PERGUNTA..." required oninput="contador()"></textarea> <span></span>
							</td>
						</tr>
						<tr>
							<td>
								<label for="r1_3">
									Resposta: 1 Pontuação: 0
								</label>
								<textarea name="r1_3" id="r1_3" class="form-control" placeholder="DIGITE AQUI A RESPOSTA..." required></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<label for="r2_3">
									Resposta: 2 Pontuação: 1
								</label>
								<textarea name="r2_3" id="r2_3" class="form-control" placeholder="DIGITE AQUI A RESPOSTA..." required></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<label for="r3_3">
									Resposta: 3 Pontuação: 2
								</label>
								<textarea name="r3_3" id="r3_3" class="form-control" placeholder="DIGITE AQUI A RESPOSTA..." required></textarea>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<center>
						<button type="submit" class="btn btn-primary">Cadastrar</button>
					</center>
				</td>
			</tr>
		</table>
		<?php
	}
	?>
</form>
<script type="text/javascript">
	window.scrollTo(0,400);
	function contador(argument) {
		var p = document.getElementById('pergunta');
		var t = document.getElementById('tamanho');
		t.value = p.length +"/300";
		;	}
	</script>	