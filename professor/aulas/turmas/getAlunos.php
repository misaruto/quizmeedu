<?php 
if(isset($_REQUEST['q'])){
	$q = $_REQUEST['q'];
	include '../../../configs.php';
	$query = "SELECT * FROM tbl_usuarios,tbl_usuario_turma WHERE id_turma = '$q' AND tbl_usuario_turma.id_aluno = tbl_usuarios.id";
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
			</tr>
			<?php
		}
	}
}
?>
