<?php 
if ((isset($_GET['nome']))&&(isset($_GET['media1']))&&(isset($_GET['media2']))&&(isset($_GET['aula']))) {
$aulas = $_GET['aula'];
$n = $_GET['nome'];
$m1 = $_GET['media1'];
$m2 = $_GET['media2'];
$a = $_GET['n_alunos'];

include '../../../configs.php';
for ($i=0; $i < 2; $i++) { 
	$query_n = "SELECT nome FROM tbl_sequencia_perguntas,tbl_aulas WHERE tbl_aulas.id = '$aulas[$i]' AND tbl_sequencia_perguntas.id = tbl_aulas.id_sequencia";
	$result__n = mysqli_query($con,$query_n);
	$row_n = mysqli_fetch_object($result__n);
	$nome[$i] = $row_n->nome;

}


	require 'phplot/phplot.php';

//Define o Objeto da Classe
	$data  = array();
	$graph = new PHPlot(1080,600);
	for ($i=0; $i < $a ; $i++) { 
		$data[] =   array($n[$i],substr($m1[$i], 0, 5),substr($m2[$i], 0, 5));
	}
//Define quais valores serão mostrados

$graph->SetImageBorderType('plain');
$graph->SetDataValues($data);
#$graph->SetTitle('Janeiro'); // seta o nome do grafico
#$graph->SetXGridLabelType("time"); // seta o label no eixo x usa "time", "title", "none", "default" or "data".
//$graph->SetXTitle('Alunos'); // seta o eixo X e seu nome
$graph->SetYTitle('Comparação das porcentagens coletivas (%)'); // seta o einxo Y e seu nome
$graph->SetPlotType('bars'); // essa função serve para escolher o tipo do grafico que pode ser: bars, lines, linepoints, area, points e pie.
$graph->SetLegend(utf8_decode($nome[0])); // gera as legendas do grafico
$graph->SetLegend(utf8_decode($nome[1]));
$graph->SetLegendStyle('left','left');
$graph->SetDataType("text-data"); // nescessario usar esse parametro no grafico com barras
#$graph->SetVertTickIncrement(5); // espaçamento entre os pontos na regua vertical
$graph->SetHorizTickIncrement(1); // espaçamento entre os pontos na regua horizontal
$graph->SetLegendPixels(100,10); // muda a legenda de lugar
$graph->SetFileFormat('PNG'); // cria o arquivo no formato especificado GIF, JPG e PNG
$graph->SetBackgroundColor('#ededed'); // muda a cor de fundo do grafico
#$graph->SetDataColors('green'); // seta as cores utilizads pelo grafico
#$graph->SetPlotAreaWorld(0, null, null, null);
$graph->SetXDataLabelAngle(90);
$graph->SetYDataLabelPos('plotin');
#$teste = array('blue', 'red', 'black');
#$graph->SetRGBArray($teste);
$graph->SetFontTTF('x_label', 'arial.ttf', 12);
$graph->SetFontTTF('y_label', 'arial.ttf', 12);
$graph->SetFontTTF('y_title', 'arial.ttf', 12);
$graph->SetFontTTF('x_title', 'arial.ttf', 12);
$graph->SetDrawXGrid(True);
$graph->SetDrawYGrid(True);

$graph->DrawGraph(); // gera o gráfico.
}
?>