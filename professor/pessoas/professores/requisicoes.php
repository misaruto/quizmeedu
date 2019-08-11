	<table class="table table-striped">
		<thead class="thead-dark">
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
						Posição
					</center>
				</th>
				<th>
					<center>
						Posição atual
					</center>
				</th>
				<th>
					<center>
						Porque
					</center>
				</th>
				<th>
					<center>
						Aprovar
					</center>
				</th>
				<th>
					<center>
						Negar
					</center>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			include '../../../configs.php';
			$query = "SELECT adm FROM tbl_professor WHERE id = '$id'";
			$sql = mysqli_query($con, $query);
			$adm = mysqli_fetch_object($sql);
			$sql = "SELECT *, tbl_requisicoes.id FROM tbl_requisicoes, tbl_professor where id_user = tbl_professor.id AND adm < '$adm->adm' AND `atendida` = '0'";
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
							<?php 
							if ($row->posicao ==0) {
								echo "Professor";
							}
							if ($row->posicao == 1) {
								echo "Administrador";
							}
							if ($row->posicao == 2) {
								echo "Root";
							}
							?>
						</center>
					</td>
					<td>
						<center>
							<?php 
							if ($row->adm ==0) {
								echo "Professor";
							}
							if ($row->adm == 1) {
								echo "Administrador";
							}
							?>
						</center>
					</td>
					<td>
						<center>
							<textarea cols="20"><?=$row->porque?></textarea>
						</center>
					</td>
					<td>
						<center>
						    <?php 
						       if($row->confirmado == '0'){
						           ?>
						           <div style="cursor: pointer;" onclick="aprovar(<?=$row->id_user?>,<?=$row->posicao?>)">
								<button type="button"  class="btn btn-success">Aprovar</button>
							</div>
						           <?php
						       }
						       else{
						           ?>
						           <div style="cursor: pointer;" onclick="aprovar2(<?=$row->id_user?>,<?=$row->posicao?>)">
								<button type="button"  class="btn btn-success">Aprovar</button>
							</div>
						           <?php
						       }
						    ?>
							
						</center>
					</td>
					<td>
						<center>
							<div style="cursor: pointer;" onclick="negar(<?=$row->id_user?>)">
								<button type="button" class="btn btn-danger">Reprovar</button>
							</div>
						</center>
					</td>
				</tr>
				<?php
			}

			?>
		</tbody>
	</table>
	<script type="text/javascript">
		function negar(id) {
			var d = confirm('Tem certeza que quer negar essa requisição?');
			if (d) {
				window.location.assign('negar3.php?id='+id);
			}
			else{
				return 0;
			}
		}
		function aprovar2(id,p) {
			var d = confirm('Tem certeza que quer aprovar essa requisição?');
			if (d) {
				window.location.assign('aprovar2.php?id='+id+'&p='+p);
			}
			else{
				return 0;
			}
		}
		
			function aprovar(id,p) {
			var d = confirm('Tem certeza que quer aprovar essa requisição?');
			if (d) {
				window.location.assign('aprovar.php?id='+id+'&p='+p);
			}
			else{
				return 0;
			}
		}
	</script>