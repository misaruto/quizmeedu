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
if (isset($_COOKIE['idseq'])){
	$idseq = $_COOKIE['idseq'];
}
else{
	if (isset($_POST['idseq'])) {
		$idseq = $_POST['idseq'];
	}
}
	include '../../../configs.php';
$sql_max = "SELECT np FROM `tbl_sequencia_perguntas` WHERE id = '$idseq'";
$query_max = mysqli_query($con, $sql_max);
$row_max = mysqli_fetch_object($query_max);
$max = $row_max->np;
if ((isset($_POST['pergunta']))&&(isset($_POST['r1']))&&(isset($_POST['r2']))&&(isset($_POST['r3']))) {
	$p = $_POST['pergunta'];
	$r1 = $_POST['r1'];
	$r2 = $_POST['r2'];
	$r3 = $_POST['r3'];
	if (($p != "")&&($r1!= "")&&($r2!= "")&&($r3!= "")) {
		$query = mysqli_query($con, "SELECT max(`id_pergunta_seq`),max(`n_p_destino`) FROM `tbl_perguntas` where id_sequencia = '$idseq'");
		$row = mysqli_fetch_array($query);
		$p = str_replace("'","\"",$p);
		$r1 = str_replace("'","\"",$r1);
		$r2 = str_replace("'","\"",$r2);
		$r3 = str_replace("'","\"",$r3);
		if ($row['max(`id_pergunta_seq`)'] == NULL) {
			$npd = 1;
			//descobri qual o id do destino da primeira pergunta
			$sql_d = "SELECT id FROM tbl_destinos WHERE quantidade_perguntas = '$max'";
			$query_d = mysqli_query($con,$sql_d);
			$row_d = mysqli_fetch_object($query_d);
			$id_d = $row_d->id;
			$idpn = 1;
			$sql = "INSERT INTO `tbl_perguntas`( `pergunta`, `resposta1`, `resposta2`, `resposta3`, `id_professor`, `id_sequencia`,`id_pergunta_seq`,`id_destino`,`n_p_destino`) VALUES ('$p','$r1','$r2','$r3','$id','$idseq','$idpn','$id_d','$npd')";
			if (mysqli_query($con,$sql)) {
				if ($max == $id_d) {
					header('location:./?opt=6');
				}
				else{
					header('location:./?opt=5');
				}
			}
		}

	}
}
else{
	$stop = 0;
	$idpn = 0;

	#descobre o registro da ultima pergunta adcionada

	for ($i=1; $i < 4 ; $i = $i +1) { 
		if ((isset($_POST['pergunta_'.$i]))&&(isset($_POST['r1_'.$i]))&&(isset($_POST['r2_'.$i]))&&(isset($_POST['r3_'.$i]))) {
			$p = $_POST['pergunta_'.$i.''];
			$r1 = $_POST['r1_'.$i.''];
			$r2 = $_POST['r2_'.$i.''];
			$r3 = $_POST['r3_'.$i.''];
			if (($p != "")&&($r1 != "")&&($r2 != "")&&($r3 != "") && $stop == 0) {
				if ($i == 1) {
					$sql = "SELECT `id_pergunta_seq`,`destino_".$i."` FROM tbl_perguntas, tbl_destinos WHERE tbl_destinos.id = tbl_perguntas.id_destino AND id_sequencia = ".$idseq." AND numero_pergunta <> '1' ORDER BY id_pergunta_seq DESC LIMIT 1";	
				}
				if ($i == 2) {
					$sql = "SELECT `id_pergunta_seq`,`destino_".$i."` FROM tbl_perguntas, tbl_destinos WHERE tbl_destinos.id = tbl_perguntas.id_destino AND id_sequencia = ".$idseq." AND numero_pergunta <> '1' ORDER BY id_pergunta_seq DESC LIMIT 1,1";
				}
				if ($i == 3) {
					$sql = "SELECT `id_pergunta_seq`,`destino_".$i."` FROM tbl_perguntas, tbl_destinos WHERE tbl_destinos.id = tbl_perguntas.id_destino AND id_sequencia = ".$idseq." AND numero_pergunta <> '1' ORDER BY id_pergunta_seq DESC LIMIT 2,1";
				}

				$query = mysqli_query($con, $sql);
				$row = mysqli_fetch_array($query);
				#caso seja a 2 pergunta, as sql acima n funcionam, o if abaixo e para separar esse caso

				if ($row == NULL) {	
					#nesse caso o sistema funciona independente do for que ocorre do lado de fora desse if.
					for ($i=1; $i < 4 ; $i = $i +1) { 
						$p = $_POST['pergunta_'.$i.''];
						$r1 = $_POST['r1_'.$i.''];
						$r2 = $_POST['r2_'.$i.''];
						$r3 = $_POST['r3_'.$i.''];
						if ($i == 1) {
							$sql = "SELECT `id_pergunta_seq`,`destino_".$i."` FROM tbl_perguntas, tbl_destinos WHERE tbl_destinos.id = tbl_perguntas.id_destino AND id_sequencia = ".$idseq." ORDER BY id_pergunta_seq DESC";	
						}
						if ($i == 2) {
							$sql = "SELECT `id_pergunta_seq`,`destino_".$i."` FROM tbl_perguntas, tbl_destinos WHERE tbl_destinos.id = tbl_perguntas.id_destino AND id_sequencia = ".$idseq." ORDER BY id_pergunta_seq DESC";
						}
						if ($i == 3) {
							$sql = "SELECT `id_pergunta_seq`,`destino_".$i."` FROM tbl_perguntas, tbl_destinos WHERE tbl_destinos.id = tbl_perguntas.id_destino AND id_sequencia = ".$idseq." ORDER BY id_pergunta_seq DESC ";
						}
						$query = mysqli_query($con, $sql);
						$row = mysqli_fetch_array($query);
						$idpn = $row['id_pergunta_seq'] + 1;

					#Seleciona os id's das proximas perguntas que serão adcionadas
						$sql = "SELECT id, numero_pergunta FROM tbl_destinos WHERE codigo = '".$row['destino_'.$i]."'";
						$query = mysqli_query($con,$sql);
						$row_d = mysqli_fetch_object($query);
						$id_d = $row_d->id;
						$npd = $row_d->numero_pergunta;
						if ($i == 2) {
							$id_d = $row_d->id - 3;
							$npd = $row_d->numero_pergunta - 1;  
						}
						if ($i == 3) {
							$npd = $row_d->numero_pergunta - 1;  
							$id_d = $row_d->id - 3;
						}
						#substitui todas as aspas simples por aspas duplas
						$p = str_replace("'","\"",$p);
						$r1 = str_replace("'","\"",$r1);
						$r2 = str_replace("'","\"",$r2);
						$r3 = str_replace("'","\"",$r3);

						$sql = "INSERT INTO `tbl_perguntas`( `pergunta`, `resposta1`, `resposta2`, `resposta3`, `id_professor`, `id_sequencia`,`id_pergunta_seq`,`id_destino`,`n_p_destino`) VALUES ('$p','$r1','$r2','$r3','$id','$idseq','$idpn','$id_d','$npd')";
						if (mysqli_query($con,$sql)) {

						}
						else{
							echo "erro1";
						}


					}
					$stop = 1;

				}


				if ($stop == 0) {
					
					$idpn =   $row['id_pergunta_seq'] + $i;

					//Seleciona os id's das proximas perguntas que serão adcionadas
					$sql = "SELECT id, numero_pergunta FROM tbl_destinos WHERE codigo = '".$row['destino_'.$i]."'";

					$query = mysqli_query($con,$sql);
					$row_d = mysqli_fetch_object($query);
					$id_d = $row_d->id;
					
					$npd = $row_d->numero_pergunta;

					$p = str_replace("'","\"",$p);
					$r1 = str_replace("'","\"",$r1);
					$r2 = str_replace("'","\"",$r2);
					$r3 = str_replace("'","\"",$r3);

					$sql = "INSERT INTO `tbl_perguntas`( `pergunta`, `resposta1`, `resposta2`, `resposta3`, `id_professor`, `id_sequencia`,`id_pergunta_seq`,`id_destino`,`n_p_destino`) VALUES ('$p','$r1','$r2','$r3','$id','$idseq','$idpn','$id_d','$npd')";
					if (mysqli_query($con,$sql)) {

					}
					else{
						echo "erro2";
					}
				}

			}

		}

	}
	if ($i >= 3) {
		if ($npd == 40) {
			header('location:./?opt=6');
		}
		else{
			header('location:./?opt=5');
		}
	}

}

?>
