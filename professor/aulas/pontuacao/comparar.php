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
if (!isset($_GET['aula'])||($_GET['aula']=="")) {
	?>
	<script type="text/javascript">
		alert('Nenhuma aula selecionada!!!');
		window.location.assign('./?opt=3&turma=<?=$turma?>');
	</script>
	<?php
}

include '../../../configs.php';

$aulas =$_GET['aula'];
$n_aln = 0;
$query = "SELECT * FROM tbl_usuario_turma,tbl_usuarios WHERE tbl_usuario_turma.id_turma = '$turma' AND tbl_usuarios.id = tbl_usuario_turma.id_aluno order by nome asc";
$result = mysqli_query($con, $query);
$a = 0;
while ($row = mysqli_fetch_object($result)) {
	$query1 = "SELECT * FROM `tbl_respostas`,`tbl_usuario_turma` WHERE tbl_usuario_turma.id_turma = '$turma' AND tbl_respostas.id_usuario = '$row->id_aluno' AND tbl_usuario_turma.id_aluno='$row->id_aluno' AND (tbl_respostas.id_aula = '$aulas[0]' or tbl_respostas.id_aula = '$aulas[1]')";
	$result1 = mysqli_query($con,$query1);
	$i = 0;
	while ($row1 = mysqli_fetch_object($result1)) {
		$i = $i +1;
		if ($i == 20) {
			$alunos1[$a] = $row->id_aluno;
			$a = $a +1;
			$n_aln = $n_aln+1;
		}
	}
}


for ($x=0; $x < 2; $x++) { 
	$numero_alunos[$x] = 0;
	$query = "SELECT * FROM tbl_usuario_turma,tbl_usuarios WHERE tbl_usuario_turma.id_turma = '$turma' AND tbl_usuarios.id = tbl_usuario_turma.id_aluno order by nome asc";
	$result = mysqli_query($con, $query);
	

	$a = 0;
	while ($row = mysqli_fetch_object($result)) {

		$i =0;
	//inicia todas as matrizes com 0
		//matrizes das frequencias
		$frequencia1[$x][$row->id_aluno] = 0;
		$frequencia2[$x][$row->id_aluno] = 0;
		

		$query1= "SELECT * FROM `tbl_respostas` WHERE id_usuario = '$row->id_aluno' AND id_aula = '$aulas[$x]' ";
		$result1 = mysqli_query($con,$query1);

		while ($row1 = mysqli_fetch_object($result1)) {
			$i = $i+1; 

			if ($row1->resposta == 50) {

				$frequencia1[$x][$row->id_aluno] = $frequencia1[$x][$row->id_aluno] +1;


			}
			if ($row1->resposta == 100) {

				$frequencia2[$x][$row->id_aluno] = $frequencia2[$x][$row->id_aluno] +1;	

			}	
			if ($i == 10) {
				$numero_alunos[$x] = $numero_alunos[$x] +1;
				
				$alunos[$x][$a] = $row->id_aluno;
				$a = $a +1;
			}
		}
		$i = 0;
	}

}


//pegar o numero de perguntas da avaliação.

for ($i=0; $i <2 ; $i++) { 
	$query_np = "SELECT np FROM tbl_aulas, tbl_sequencia_perguntas WHERE tbl_aulas.id = '$aulas[$i]' and tbl_sequencia_perguntas.id = tbl_aulas.id_sequencia";
	$result_np = mysqli_query($con,$query_np);
	$row_np = mysqli_fetch_object($result_np);
	$np[$i] = $row_np->np;

}

 ////pega as frequencias para todos os alunos da turma.
$i = 0;


for ($x=0; $x < 2; $x++) { 
	for ($i=0; $i < $numero_alunos[$x]; $i++) { 
		$query_p = "SELECT * FROM tbl_perguntas,tbl_respostas WHERE tbl_respostas.id_pergunta = tbl_perguntas.id AND tbl_respostas.id_aula = '$aulas[$x]' AND tbl_respostas.id_usuario= '".$alunos[$x][$i]."'";
		$result_p = mysqli_query($con,$query_p);
		
		while ($row_p = mysqli_fetch_object($result_p)) {
			$pe = $row_p->n_p_destino;
			
			if ($pe != 1) {

				$pe = 41 - $pe;
				$pe = $np[$x] - $pe +1;

			}
			
			if ($i ==0) {
				
				$frequencia_total1[$x][$pe] = 0;
				$frequencia_total2[$x][$pe] = 0;

			}
			
			if ($row_p->resposta == 50) {
				$frequencia_total1[$x][$pe] = $frequencia_total1[$x][$pe] + 1;
			}
			
			if ($row_p->resposta == 100) {

				$frequencia_total2[$x][$pe] = $frequencia_total2[$x][$pe]  + 1;

			}

		}
	}
}


for ($x=0; $x < 2; $x++) { 

	for ($i=1; $i <= $np[$x] ; $i++) { 

		$fP1[$x][$i] = $frequencia_total1[$x][$i] / $numero_alunos[$x];
		$fP2[$x][$i] = $frequencia_total2[$x][$i] / $numero_alunos[$x];

	}
}

//declara a soma das media individual dos alunos
$medias_individuais[0] = 0;
$medias_individuais[1] = 0;
for ($x=0; $x <2 ; $x++) { 
	for ($i=0; $i < $numero_alunos[$x]; $i++) {
		$aluno = $alunos[$x][$i]; 
		if ($i == 0) {
			$fA1[$x][$aluno] = 0;
			$fA2[$x][$aluno] = 0;
		} 
		//faz as medias das frequencias dos alunos
		$fA1[$x][$aluno] = $frequencia1[$x][$aluno]/ $np[$x];
		$fA2[$x][$aluno] = $frequencia2[$x][$aluno]/ $np[$x];
		
	}
}

for ($x=0; $x < 2; $x++) { 
	
	for ($i=0; $i < $numero_alunos[$x]; $i++) {
		$y =1;
		if (isset($alunos1[$i])) {

			$aluno = $alunos1[$i]; 
			if ($y ==1) {
				$media[$x][$aluno] = 0;
			}
			$query1= "SELECT * FROM `tbl_respostas` WHERE id_usuario = '$aluno' AND id_aula = '$aulas[$x]'";
			$result1 = mysqli_query($con,$query1);
			//matriz das medias individuais
			$media_individual_aula[$x][$aluno] = 0;

			while ($row1 = mysqli_fetch_object($result1)) {
				//faz a soma das notas de todos os alunos das turmas
				$media_individual_aula[$x][$aluno] = $media_individual_aula[$x][$aluno] + $row1->resposta;
				if ($y == 1) {
					$media[$x][$aluno]=0;
				}
				if ($row1->resposta == 0) {
					$mc = 0;
				}
				if ($row1->resposta == 50) {
					$mc = (($fA1[$x][$aluno] + $fP1[$x][$y])/2)*50;
				}
				if ($row1->resposta == 100) {
					$mc = (($fA2[$x][$aluno] + $fP2[$x][$y])/2)*100;
				}
				$media[$x][$aluno] = $media[$x][$aluno] + $mc;
				$y = $y +1;
			}			
		}

	}
}

for ($x=0; $x < 2; $x++) { 
	for ($i=0; $i < $n_aln; $i++) { 
		$aluno = $alunos1[$i];
		$media[$x][$aluno] = $media[$x][$aluno]/$np[$x]; 
		//faz a media individual por aluno, e ja soma a da sua turma
		$medias_individuais[$x] = $medias_individuais[$x] + $media_individual_aula[$x][$aluno]/$np[$x];
	}
}

$l = 0;
$a = 0;
//inicia as medias coletivas
$medias_coletivas[0] = 0;
$medias_coletivas[1] = 0;

for ($i=0; $i < $n_aln; $i++) { 
	if ($a == 10) {
		$l = $l+1;
		$a = 0;
	}
	if ($a == 0) {
		$link[$l] = '';
		$link[1] = '';
	}

	$aluno = $alunos1[$i];
	$query_n = "SELECT nome FROM tbl_usuarios WHERE id = '$aluno'";
	$result__n = mysqli_query($con,$query_n);
	$row_n = mysqli_fetch_object($result__n);
	$nome = $row_n->nome;
	$link[$l] = $link[$l].'nome[]='.$nome.'&media1[]='.$media[0][$aluno].'&media2[]='.$media[1][$aluno
	].'&';

	$medias_coletivas[0] = $medias_coletivas[0] + $media[0][$aluno];
	$medias_coletivas[1] = $medias_coletivas[1] + $media[1][$aluno];

	$a = $a+1;

}
//divide todas as somas das notas individuais e coletivas de todos os alunos pelo numero de alunos
$medias_coletivas[0] = $medias_coletivas[0]/$n_aln;
$medias_coletivas[1] = $medias_coletivas[1]/$n_aln;
$medias_individuais[0] = $medias_individuais[0]/$n_aln;
$medias_individuais[1] = $medias_individuais[1]/$n_aln;

$link_medias = "nome[]=Porcentagem individual média de pontuação da turma&nome[]=Porcentagem individual média de pontuação da turma&medias_individuais[]=".$medias_individuais[0]."&medias_individuais[]=".$medias_individuais[1]."&medias_coletivas[]=".$medias_coletivas[0]."&medias_coletivas[]=".$medias_coletivas[1]."&aulas[]=".$aulas[0]."&aulas[]=".$aulas[1];

for ($i=0; $i <=$l ; $i++) { 
	if ($i == 0) {
		$na = 10;
	}
	else{
		$na = $n_aln-(10 * $i);
	}
	$link[$i] = $link[$i].'n_alunos='.$na.'&aula[]='.$aulas[0].'&aula[]='.$aulas[1];
}

?>
<center>
	<br>
	<div>
		<button onclick="voltar()" class="btn btn-primary">
			Volar
		</button>
		<button onclick="show()" class="btn btn-primary" id="btn">
			Medias dos Alunos
		</button>
	</div>
	<br>
	<div id="medias_turmas">
		<img src="graficoMedias.php?<?=$link_medias?>">
	</div>

	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" hidden>
		<div class="carousel-inner">
			<?php 
			for ($i=0; $i <=$l ; $i++) { 
				if ($i ==0) {

					?>
					<div class="carousel-item active" data-interval="0">	
						<img style="width: 80%" class="d-block " src="graficosComparacao.php?<?=$link[$i]?>">
					</div>  
					<?php
				}
				else{
					?>
					<div class="carousel-item ">	
						<img class="d-block " src="graficosComparacao.php?<?=$link[$i]?>">
					</div>  
					<?php
				}
			}

			?>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

</center>
<br>
<br>
<script type="text/javascript">
	function voltar(){
		window.location.assign('./?opt=3&turma=<?=$turma?>');
	}
	$('.carousel').carousel({
		pause: true,
		interval: false
	});


	function show(){
		var btn = document.getElementById('btn');
		var medias_alunos = document.getElementById('carouselExampleControls');
		var medias_turmas = document.getElementById('medias_turmas');
		if (medias_alunos.hidden == true) {
			btn.textContent = "Media das Turmas";
			medias_turmas.hidden = true;
			medias_alunos.hidden = false;
		}
		else{
			btn.textContent = "Medias dos Alunos";
			medias_turmas.hidden = false;
			medias_alunos.hidden = true;
		}
	}

</script>



