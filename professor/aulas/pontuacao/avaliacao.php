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

if (!isset($_REQUEST['turma'])||($_REQUEST['turma']=="")) {
	?>
	<script type="text/javascript">
		alert('Nenhuma turma selecionada!!!');
		window.location.assign('./?opt=1');
	</script>
	<?php
}
$turma = $_REQUEST['turma'];
if (!isset($_REQUEST['aula'])||($_REQUEST['aula']=="")) {
	?>
	<script type="text/javascript">
		alert('Nenhuma aula selecionada!!!');
		window.location.assign('./?opt=3&turma=<?=$turma?>');
	</script>
	<?php
}

include '../../../configs.php';



$aula =$_REQUEST['aula'];

$numero_alunos = 0;


$query = "SELECT * FROM tbl_usuario_turma,tbl_usuarios WHERE tbl_usuario_turma.id_turma = '$turma' AND tbl_usuarios.id = tbl_usuario_turma.id_aluno order by nome asc";
$result = mysqli_query($con, $query);
$i =0;
$a = 0;
while ($row = mysqli_fetch_object($result)) {
	
	//inicia todas as matrizes com 0
	$frequencia[$row->id_aluno][0] = 0;
	$frequencia[$row->id_aluno][1] = 0;
	$frequencia[$row->id_aluno][2] = 0;
	$fA[$row->id_aluno][0] = 0;
	$fA[$row->id_aluno][1] = 0;
	$fA[$row->id_aluno][2] = 0;
	
	$query1= "SELECT * FROM `tbl_respostas` WHERE id_usuario = '$row->id_aluno' AND id_aula = '$aula'";
	$result1 = mysqli_query($con,$query1);
	while ($row1 = mysqli_fetch_object($result1)) {
		$i = $i+1;
		if ($row1->resposta == 0) {
			$frequencia[$row->id_aluno][0]= $frequencia[$row->id_aluno][0] +1;
		}
		if ($row1->resposta == 50) {
			$frequencia[$row->id_aluno][1] = $frequencia[$row->id_aluno][1] +1;

		}
		if ($row1->resposta == 100) {
			$frequencia[$row->id_aluno][2] = $frequencia[$row->id_aluno][2] +1;	
		}	
		if ($i == 10) {
			$numero_alunos = $numero_alunos +1;
			$alunos[$a] = $row->id_aluno;
			$a = $a +1;
		}		
	}
	$i = 0;
}

//pegar o numero de perguntas da avaliação.

$query_np = "SELECT np FROM tbl_aulas, tbl_sequencia_perguntas WHERE tbl_aulas.id = '$aula' and tbl_sequencia_perguntas.id = tbl_aulas.id_sequencia";
$result_np = mysqli_query($con,$query_np);
$row_np = mysqli_fetch_object($result_np);
$np = $row_np->np;


 ////pega as frequencias para todos os alunos da turma.
$i = 0;

for ($i=0; $i < $a; $i++) { 
	$query_p = "SELECT * FROM tbl_perguntas,tbl_respostas WHERE tbl_respostas.id_pergunta = tbl_perguntas.id AND tbl_respostas.id_aula = '$aula' AND tbl_respostas.id_usuario= '$alunos[$i]'";
	$result_p = mysqli_query($con,$query_p);
	while ($row_p = mysqli_fetch_object($result_p)) {
		$pe = $row_p->n_p_destino;
		if ($pe != 1) {
			$pe = 41 - $pe;
			$pe = $np - $pe +1;
		}
		if ($i ==0) {
			$frequencia_total[$pe][0] = 0;
			$frequencia_total[$pe][1] = 0;
			$frequencia_total[$pe][2] = 0;
		}
		if ($row_p->resposta == 0) {
			$frequencia_total[$pe][0] = $frequencia_total[$pe][0] + 1;
		}
		if ($row_p->resposta == 50) {
			$frequencia_total[$pe][1] = $frequencia_total[$pe][1] + 1;
		}
		if ($row_p->resposta == 100) {
			$frequencia_total[$pe][2] = $frequencia_total[$pe][2] + 1;
		}

	}
}
for ($i=1; $i <= $np ; $i++) { 
	$fP[$i][0] = $frequencia_total[$i][0]/$numero_alunos;
	$fP[$i][1] = $frequencia_total[$i][1]/$numero_alunos;
	$fP[$i][2] = $frequencia_total[$i][2]/$numero_alunos;
}
for ($i=0; $i < $a; $i++) { 
	$fA[$alunos[$i]][0] = $frequencia[$alunos[$i]][0]/ $np; 
	$fA[$alunos[$i]][1] = $frequencia[$alunos[$i]][1]/ $np;
	$fA[$alunos[$i]][2] = $frequencia[$alunos[$i]][2]/ $np;
}

?>

<script type="text/javascript">
	function show() {
		var tb = document.getElementById('tb');
		var	gr = document.getElementById('gr');
		var table = document.getElementById('table');
		var graph = document.getElementById('grafico');
		if (table.hidden == true) {
			gr.disabled = false;
			tb.disabled = true;
			table.hidden = false;
			graph.hidden = true;
		}
		else{
			gr.disabled = true;
			tb.disabled = false;
			table.hidden = true;
			graph.hidden = false;
		}
	}
	function voltar(){
		window.location.assign('./?opt=3&turma=<?=$turma?>');
	}
</script>

<center>
	<br>
	<div>
		<button onclick="show()" id="tb" class="btn btn-primary">Ver Tabela</button>
		<button onclick="show()" id="gr" disabled class="btn btn-primary">Ver Gráfico</button>
		<button onclick="voltar()" class="btn btn-primary">Voltar</button>
	</div>
	<br>
	<table class="table table-striped" style="background-color: #fff;"id="table" hidden>
		<thead class="thead thead-dark" >
			<th>
				N° Aluno
			</th>
			<th>
				Aluno
			</th>
			<?php 
			for ($i=1; $i <=  $np; $i++) { 
				echo "<th>
				<center>Pergunta ".$i."</center>
				</th>";	
			}
			?>
		</thead>	
		<?php
		$query = "SELECT * FROM tbl_usuario_turma,tbl_usuarios WHERE tbl_usuario_turma.id_turma = '$turma' AND tbl_usuarios.id = tbl_usuario_turma.id_aluno ";
		$result = mysqli_query($con, $query);
		while ($row = mysqli_fetch_object($result)) {
			?>
			<tr>
				<td>
					<?=$row->id_aluno?>
				</td>
				<td>
					<?=$row->nome?>
				</td>
				<?php
				$i = 1;
				$query1= "SELECT * FROM `tbl_respostas` WHERE id_usuario = '$row->id_aluno' AND id_aula = '$aula'";
				$result1 = mysqli_query($con,$query1);
				while ($row1 = mysqli_fetch_object($result1)) {
					if ($i == 1) {
						$graph[$row->id_aluno][0] = 0;
					}
					if ($row1->resposta == 0) {
						$mc = 0;
						?>
						<td>
							<center>
								0
							</center>
						</td>
						<?php
					}
					if ($row1->resposta == 50) {

						$mc = ((($fA[$row->id_aluno][1] + $fP[$i][1]) / 2)*50);
						?>
						<td>
							<center>
								50  <br>
								<?=substr($mc, 0, 5)?>
								<br>
							</center>
						</td>
						<?php
					}
					if ($row1->resposta == 100) {
						$mc = (($fA[$row->id_aluno][2] + $fP[$i][2]) / 2)*100;
						?>
						<td>
							<center>
								100 <br>
								<?=substr($mc, 0, 5)?>
								<br>
							</center>
						</td>
						<?php

					}
					$mc = substr($mc, 0, 5);
					$graph[$row->id_aluno][0] = $graph[$row->id_aluno][0] + $mc; 

					$i = $i +1;
				}
				$graph[$row->id_aluno][1] = $row->nome;
				?>
			</tr>
			<?php
		}
		$link = '';
		for ($i=0; $i < $a; $i++) { 
			$media = $graph[$alunos[$i]][0] / $np;
			$media = substr($media, 0, 5);
			$link = $link.'nome[]='.$graph[$alunos[$i]][1].'&media[]='.$media.'&';
		}
		$link = $link.'n_alunos='.$numero_alunos;
		?>
	</table>

	<img id="grafico" src="graficos.php?<?=$link?>">
</center>





