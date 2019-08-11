<?php 
//Pagian que recebe uma variavel e pesquisa em uma tabela do bd e realiza uma busca textual sobre o que foi digitado;
include '../../../configs.php';

if (isset($_REQUEST['q'])) {
	$q = $_REQUEST['q'];
	$query = "SELECT * FROM tbl_usuarios WHERE tbl_usuarios.id NOT IN(SELECT id_aluno FROM tbl_usuario_turma)  AND nome like '$q%'";
	$result = mysqli_query($con, $query);
	$r = mysqli_num_rows($result);
	if ($r < 1) {
		$query = "SELECT * FROM tbl_usuarios WHERE tbl_usuarios.id NOT IN(SELECT id_aluno FROM tbl_usuario_turma) AND email like '%$q%'";
		$result = mysqli_query($con,$query);

	}
	$hint = '';
	while ($row = mysqli_fetch_object($result)) {
		if (!isset($_COOKIE['uid'.$row->id])) {
			$hint = $hint.'<tr style="cursor: pointer;" onclick="select('.$row->id.')">
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
			'.$row->email.'
			</center>
			</td>
			</tr>';
		}
	}
}
echo "$hint";
?>