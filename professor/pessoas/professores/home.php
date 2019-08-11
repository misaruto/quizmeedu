<?php 
if ((!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
include '../../../configs.php';
?>
<script type="text/javascript">
	function options(id, nome) {
		var opt = confirm("Tem certeza que quer apagar o usuário "+nome);
		if (opt == true) {
			window.location.assign('./negar.php?id='+id);
		}
		else{
			return 0;
		}
	}
	function aprovar(id,nome) {
		var decisao = confirm('Tem certeza que deseja aprovar o usuário '+nome);
		if (decisao == true) {
			window.location.assign('aprovar.php?id='+id);
		}
		else{
			return 0;
		}
	}
</script>
<div>
	<table class="table table-striped">
		<thead class="thead-dark">
			<tr>
				<th colspan="7">
					<center>
						Professores aguardando aprovação.
					</center>
				</th>
			</tr>
			<tr>
				<th>
					<center>
						N°
					</center>
				</th>
				<th>
					<center>
						Nome
					</center>
				</th>
				<th>
					<center>
						Email
					</center>
				</th>
				<th id="desc">
					<center>
						Descrição
					</center>
				</th>
				<th id="lattes">
					<center>
						Lattes
					</center>
				</th>
				<th>
					<center>
						Editar
					</center>
				</th>
				<th>
					<center>
						Excluir
					</center>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$sql = "SELECT * FROM tbl_professor where verificado = '0'";
			$query = mysqli_query($con, $sql);
			while ($row = mysqli_fetch_object($query)) {
				?>
				<tr>
					<td>
						<center>
							<?=$row->id?>
						</center>
					</td>
					<td>
						<center>
							<?=$row->nome?>
						</center>
					</td>
					<td>
						<center>
							<?=$row->email?>
						</center>
					</td>
					<td id="descc">
						<center>
							<textarea rows="2" cols="10"><?=$row->descricao?></textarea>
						</center>
					</td>
					<td>
						<center>
							<?php 
							if ($row->lattes == "") {
								echo "Não informado";
							}
							else{
																?>
								<script type="text/javascript">
									document.getElementById('desc').hidden = true;
									document.getElementById('descc').hidden = true
								</script>
								<a target="_BLANK" href="<?=$row->lattes?>">
									<div class="btn btn-primary">
										Ver
									</div>
								</a>
								<?php
							}
							?>
						</center>
					</td>
					<td>
						<center>
							<div style="cursor: pointer;" class="btn btn-success" onclick="aprovar(<?=$row->id?>,'<?=$row->nome?>')">
								Aprovar
							</div>
						</center>
					</td>
					<td>
						<center>
							<div style="cursor: pointer;" class="btn btn-danger" onclick="options(<?=$row->id?>,'<?=$row->nome?>')">
								Negar
							</div>
						</center>
					</td>
				</tr>
				<?php				
			}
			?>
		</tbody>
	</table>
</div>