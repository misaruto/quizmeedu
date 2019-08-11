<?php 
if(isset($_REQUEST['q'])){
	$q = $_REQUEST['q'];
	include '../../../configs.php';
	$query = "SELECT * FROM tbl_usuarios";
	$result = mysqli_query($con,$query);
	if (mysqli_num_rows($result) == 0) {
		?>
		<tr>
			<td colspan="2">
				<center>
					<div class="alert alert-info">
						Não há alunos nessa turma.
					</div>
				</center>
			</td>
		</tr>
		<?php
	}
	else{
		while ($row = mysqli_fetch_object($result)) {
			$query = "SELECT *,tbl_usuarios.id FROM tbl_usuarios,tbl_usuario_turma WHERE id_turma = '$q' AND tbl_usuario_turma.id_aluno = tbl_usuarios.id";
			$result2 = mysqli_query($con,$query);
			$td = '<td>
			<center>
			<button class="btn btn-success"  onclick="add('.$row->id.')">
			Adcionar
			</button>
			</center>
			</td>';
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
				
				<?php
				while ($row2 = mysqli_fetch_object($result2)) {
					if ($row2->id == $row->id) {
						$td = '<td>
						<center>
						<button class="btn btn-danger" onclick="remover('.$row->id.')">
						Remover
						</button>
						</center>
						</td>';

					} 
				}
				echo "$td";
				?>
			</tr>
			<?php
		}
	}
}
?>
