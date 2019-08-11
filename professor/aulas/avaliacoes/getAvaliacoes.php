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
//Pagian que recebe uma variavel e pesquisa em uma tabela do bd e realiza uma busca textual sobre o que foi digitado;
include '../../../configs.php';

if (isset($_REQUEST['q'])) {
	$q = $_REQUEST['q'];
	$query = "SELECT * FROM tbl_sequencia_perguntas WHERE `id_professor` = '$id' and (nome like '$q%' or np like '$q%' or id like '$q%')";
	$result = mysqli_query($con, $query);
	if (mysqli_num_rows($result) == 0) {
		$query = "SELECT * FROM tbl_sequencia_perguntas WHERE `id_professor` = '$id' and np like '$q%'";
		$result = mysqli_query($con, $query);
	}
	$hint = '';
	$i =0;
	if (mysqli_num_rows($result) == 0) {
		?>
		<div class="alert alert-info">
			<center>
				Nenhuma avaliação encontrada.
			</center>
		</div>
		<?php
		die();
	}
	while ($row = mysqli_fetch_object($result)) {
		if ($i == 0) {
			echo "<tr>";
		}
		if($i == 3){
			echo "</tr>";
			$i=0;
		}
		$i = $i +1;

		?>
		<td>
			<label>
				<input type="radio" required name="seq" value="<?=$row->id?>">
				Sequencia: <b><?=$row->id?></b>
				<br>
				Primeira pergunta: <br>
				<div>
					<?=$row->nome?>
				</div>
			</label>
		</td>
		<?php
	}
}
?>