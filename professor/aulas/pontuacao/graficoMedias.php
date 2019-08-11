<?php 
if ((isset($_GET['nome']))&&(isset($_GET['medias_individuais']))&&(isset($_GET['medias_coletivas']))&&(isset($_GET['aulas']))) {

	$nomes = $_GET['nome'];
	$media_coletiva = $_GET['medias_coletivas'];
	$media_individual = $_GET['medias_individuais'];
	$aulas = $_GET['aulas'];

	include '../../../configs.php';
	for ($i=0; $i < 2; $i++) { 
		$query_n = "SELECT nome FROM tbl_sequencia_perguntas,tbl_aulas WHERE tbl_aulas.id = '$aulas[$i]' AND tbl_sequencia_perguntas.id = tbl_aulas.id_sequencia";
		$result__n = mysqli_query($con,$query_n);
		$row_n = mysqli_fetch_object($result__n);
		$nome[$i] = $row_n->nome;

	}

	require 'phplot/phplot.php';
	$graph = new PHPlot(1080,500);
	$media_individual[0]= substr($media_individual[0],0,5);
	$media_individual[1]= substr($media_individual[1],0,5);
	$media_coletiva[0]= substr($media_coletiva[0],0,5);
	$media_coletiva[1]= substr($media_coletiva[1],0,5);
	$data = array(
		array($nome[0],$media_individual[0],$media_individual[1]),
		array($nome[1],$media_coletiva[0],$media_coletiva[1]) );		
	
	$graph->SetImageBorderType('plain');
	$graph->SetDataValues($data);
#$graph->SetTitle('Janeiro'); // seta o nome do grafico
#$graph->SetXGridLabelType("time"); // seta o label no eixo x usa "time", "title", "none", "default" or "data".
//$graph->SetXTitle('Alunos'); // seta o eixo X e seu nome
$graph->SetYTitle('Comparação das medias das porcentagens coletivas (%)'); // seta o einxo Y e seu nome
$graph->SetPlotType('bars'); // essa função serve para escolher o tipo do grafico que pode ser: bars, lines, linepoints, area, points e pie.
$graph->SetLegend(utf8_decode($nome[0])); // gera as legendas do grafico
$graph->SetLegend(utf8_decode($nome[1]));
$graph->SetLegendStyle('left','left');
//$graph->SetDataType("text-data"); // nescessario usar esse parametro no grafico com barras
#$graph->SetVertTickIncrement(5); // espaçamento entre os pontos na regua vertical
$graph->SetHorizTickIncrement(1); // espaçamento entre os pontos na regua horizontal
$graph->SetLegendPixels(470,10); // muda a legenda de lugar
$graph->SetFileFormat('PNG'); // cria o arquivo no formato especificado GIF, JPG e PNG
$graph->SetBackgroundColor('#ededed'); // muda a cor de fundo do grafico
#$graph->SetDataColors('green'); // seta as cores utilizads pelo grafico
#$graph->SetPlotAreaWorld(0, null, null, null);

$graph->SetYDataLabelPos('plotin');
#$teste = array('blue', 'red', 'black');
#$graph->SetRGBArray($teste);
$graph->SetFontTTF('x_label', 'arial.ttf', 12);
$graph->SetFontTTF('y_label', 'arial.ttf', 12);
$graph->SetFontTTF('y_title', 'arial.ttf', 12);
$graph->SetFontTTF('x_title', 'arial.ttf', 12);
$graph->SetDrawXGrid(True);
$graph->SetDrawYGrid(True);
$graph->SetDrawXGrid(True);
$graph->SetDrawYGrid(True);

$graph->DrawGraph(); // gera o gráfico.
}
?>