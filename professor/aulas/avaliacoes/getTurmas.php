<?php 
//Pagina que recebe uma variavel e pesquisa em uma tabela do bd e realiza uma busca textual sobre o que foi digitado;
include '../../../configs.php';

if (isset($_REQUEST['q'])) {
	$q = $_REQUEST['q'];
	$query = "SELECT * FROM tbl_turma WHERE  nome like '$q%'";
	$result = mysqli_query($con, $query);
	$hint = '';
	while ($row = mysqli_fetch_object($result)) {
		if (!isset($_COOKIE['tid'.$row->id])) {
			$hint = $hint.'<tr onclick="showAlunos('.$row->id.')" style="cursor: pointer;">
			<td>
			<center>
			'.$row->id.'
			</center>
			</td>
			<td class="nome">
			<center>
			'.$row->nome.'
			</center>
			</td>
			<td>
			<center>
			<button class="btn btn-secondary" onclick="seleciona('.$row->id.')">Selecionar</button>
			</center>
			</td>
			</tr>';
		}
	}
}
echo "$hint";
?>