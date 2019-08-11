<div>
	<table class="table table-hover" style="background-color: #fff;">
		<thead class="thead-dark">
			<tr>
				<th scope="col">
					<center>
						N° Aula
					</center>
				</th>
				<th scope="col">
					<center>
						N° aluno
					</center>
				</td>
				<th scope="col">
					<center>
						Nome do aluno
					</center>
				</td>
				<th scope="col">
					<center>
						Data
					</center>
				</td>
				<th scope="col">
					<center>
						Sequência usada
					</center>
				</td>
			</tr>
		</thead>
		<?php 
		include '../../../configs.php';
		$sql = "SELECT tbl_aulas.id,tbl_usuarios.id, tbl_usuarios.nome, tbl_sequencia_perguntas.nome, tbl_usuarios.id, tbl_aulas.data FROM `tbl_usuarios`, `tbl_aulas`, `tbl_sequencia_perguntas`, `tbl_usuario_aula` WHERE tbl_usuario_aula.id_aula = tbl_aulas.id AND tbl_aulas.id_sequencia = tbl_sequencia_perguntas.id AND tbl_usuario_aula.id_usuario = tbl_usuarios.id AND tbl_aulas.id_professor = '$id' order by tbl_usuarios.id ASC";
		$query = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($query)) {
			$ano= substr($row['data'], 0, 4);
			$mes= substr($row['data'], 5,2);
			$dia= substr($row['data'], 8,2);
			$data = $dia ."/".$mes."/".$ano;
			?>
			<tr style="cursor: pointer;" onclick="selciona(<?=$row['0']?>,<?=$row['1']?>)">
				<td>
					<center>
						<?=$row['0']?>
					</center>
				</td>
				<td>
					<center>
						<?=$row['1']?>
					</center>
				</td>
				<td>
					<center>
						<?=$row['2']?>
					</center>
				</td>
				<td>
					<center>
						<?=$data?>
					</center>
				</td>
				<td>
					<center>
						<?=$row['3']?>
					</center>
				</td>
			</tr>
			<?php
		}

		?>
	</table>
</div>
<script type="text/javascript">
	function selciona(id_aula,id_aluno) {
		window.location.assign('./?opt=2&idaula='+id_aula+'&userid='+id_aluno);
	}
</script>