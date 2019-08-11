<?php 
if ((!isset($_COOKIE['profid']))&&(!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
	include '../../../configs.php';
error_reporting(0);
ini_set(“display_errors”, 0 );
if ((isset($_REQUEST['userid']))&&(isset($_REQUEST['idaula']))) {
	$id = $_REQUEST['userid'];
	$a = $_REQUEST['idaula'];
	?>
		<table class="table table-hover table-bordered" style="background-color: #fff;" >
			<thead>
				<tr>
					<td>
						Pergunta
					</td>
					<td>
						Resposta
					</td>
					<td>
						Pontuação
					</td>
				</tr>
			</thead>
			<?php 
			$sql = "SELECT * FROM `tbl_respostas`, tbl_perguntas WHERE tbl_respostas.id_pergunta = tbl_perguntas.id AND id_usuario = '$id' AND tbl_respostas.id_aula = '$a'";
			$query = mysqli_query($con, $sql);
			$total = 0;
			$np = 0;
			while ($row = mysqli_fetch_object($query)) {
				$sql_pontos = "SELECT resposta_".$row->resposta.", pontos_".$row->resposta." FROM tbl_perguntas,tbl_destinos WHERE tbl_perguntas.id = '$row->id' AND tbl_destinos.id = tbl_perguntas.id_destino ";
				$query_pontos = mysqli_query($con, $sql_pontos);
				$row_pontos = mysqli_fetch_array($query_pontos);
				$r = $row->resposta;
				$p = $row->resposta;
				$np = $np +1;
				$resposta = $row->resposta;
				$pontos = $row_pontos[1];
				$total = $total + $pontos;
				?>
				<tr>
					<td>
						<?=$row->pergunta?>
					</td>
					<td>
						<center>
							<?=$resposta?>
						</center>
					</td>
					<td>
						<center>
							<?=$pontos?>
						</center>
					</td>
				</tr>
				<?php	
			}
			$total = $total/$np;
			?>
			<tfoot>
				<tr>
					<td>
						Porcentagem total de acertos
					</td>
					<td colspan="2">
						<div class="text-primary">
							<center>
								<?=$total?>%
							</center>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<center>
							<a href="./">Voltar</a>
						</center>
					</td>
				</tr>
			</tfoot>
		</table>
	<?php 
}
?>








