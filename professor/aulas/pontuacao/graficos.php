<?php 
if ((isset($_GET['nome']))&&(isset($_GET['media']))) {

$n = $_GET['nome'];
$m = $_GET['media'];
$a = $_GET['n_alunos'];

	require 'phplot/phplot.php';

//Define o Objeto da Classe
	$data  = array();
	$graph = new PHPlot(1080,600);
	for ($i=0; $i < $a ; $i++) { 
		$data[] =   array($n[$i],$m[$i]);
	}
//Define quais valores serão mostrados

$graph->SetImageBorderType('plain');
$graph->SetDataValues($data);
#$graph->SetTitle('Janeiro'); // seta o nome do grafico
#$graph->SetXGridLabelType("time"); // seta o label no eixo x usa "time", "title", "none", "default" or "data".
//$graph->SetXTitle('Alunos'); // seta o eixo X e seu nome
$graph->SetYTitle('Media Coletiva(%)'); // seta o einxo Y e seu nome
$graph->SetPlotType('bars'); // essa função serve para escolher o tipo do grafico que pode ser: bars, lines, linepoints, area, points e pie.
#$graph->SetLegend('leg'); // gera as legendas do grafico
$graph->SetDataType("text-data"); // nescessario usar esse parametro no grafico com barras
#$graph->SetVertTickIncrement(5); // espaçamento entre os pontos na regua vertical
$graph->SetHorizTickIncrement(1); // espaçamento entre os pontos na regua horizontal
#$graph->SetLegendPixels(0,0,0); // muda a legenda de lugar
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