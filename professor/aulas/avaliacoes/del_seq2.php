<?php 
if (isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
	if ($id != NULL) {
			include '../../../configs.php';
		$sql = "SELECT id FROM tbl_perguntas WHERE id_sequencia = '$id'";

		$query = mysqli_query($con, $sql);
		$l = mysqli_num_rows($query);

		$i = 1;
		while ($row = mysqli_fetch_object($query)) {

			$query1 = "DELETE FROM tbl_perguntas WHERE id = '$row->id'";
			if (mysqli_query($con, $query1)) {
				echo "<center>pergunta $i deletada com sucesso</center>";
				$i = $i +1;
			}
		}

		$sql = "SELECT id FROM tbl_finais WHERE id_sequencia = '$id'";

		$query = mysqli_query($con, $sql);
		$l1 = mysqli_num_rows($query);
		$i1 = 1;
		while ($row = mysqli_fetch_object($query)) {

			$query1 = "DELETE FROM tbl_finais WHERE id = '$row->id'";
			echo "$query1";
			if (mysqli_query($con, $query1)) {
				echo "<center>final $i1 deletado com sucesso</center>";
				$i1 = $i1 +1;
			}
		}
		$query = "DELETE FROM tbl_sequencia_perguntas WHERE id = '$id'";
		if (mysqli_query($con, $query)) {
			?>
			<!DOCTYPE html>
			<html>
			<head>
				<title></title>
			</head>
			<body>
				<script type="text/javascript">
					alert('Sequencia de perguntas <?=$id?> e suas perguntas foram apagadas');
					
						window.location.assign('./?opt=1');
				</script>
			</body>
			</html>
			<?php
		}

	}

}
?>