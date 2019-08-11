<?php 
if (isset($_REQUEST['q'])) {
	?>
	<thead class="thead thead-dark">
		<tr>
			<th colspan="3">
				<center>
					Alunos que fazem parte da turma
				</center>
			</th>
		</tr>
	</thead>
	<?php
	$q = $_REQUEST['q'];
	include "../../../configs.php";
	$query = "SELECT * FROM tbl_usuario_turma WHERE tbl_usuario_turma.id_turma = '$q'";
	$result = mysqli_query($con,$query);
	$i = 0;
	while ($row = mysqli_fetch_object($result)) {
		$query2 = "SELECT nome FROM tbl_usuarios WHERE id = '$row->id_aluno'";
		$result2 = mysqli_query($con,$query2);
		$row2 = mysqli_fetch_object($result2);
		if (mysqli_num_rows($result2) == 0) {
	
		}
		else{
			if($i==0){
				echo "<tr>";
			}
			?>
			<td>
				<?=$row2->nome?>
			</td>
			<?php
			$i = $i+1;
			if ($i == 3) {
				echo "</tr>";
				$i =0;
			}
		}
	}
}

?>