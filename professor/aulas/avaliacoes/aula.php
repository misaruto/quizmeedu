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
include '../../../configs.php';
?>
<form action="aula2.php">
	<table class="table" style="background-color: #fff;">
		<tr>
			<td colspan="2">
				<center>
					Crie e marque sua aula
				</center>
			</td>
		</tr>
		<tr>
			<td>
				Data da aula
			</td>
			<td>
				<input type="date" name="data" id="data" onchange="date()" class="form_control" required>
			</td>
			<td>
				<center>
					<button type="submit" class="btn btn-primary">Confirmar</button>
				</center>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<center>
					Selecione abaixo qual sequência de perguntas será usada na aula:
				</center>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<div>
					<input  placeholder="PESQUISE POR NOMES DAS TURMAS" type="text" onkeyup="showHint(this.value)" id="input" class="form-control">

				</div>
			</td>
		</tr>
	</table>
	<table class="table" style="background-color: #fff;">
		<tbody id="txtHint"></tbody>
		<tbody id="tbody">
			<?php 
			$i = 0;
			$sql = "SELECT * FROM `tbl_sequencia_perguntas` WHERE `id_professor` = '$id'";
			$query = mysqli_query($con, $sql);
			while($row = mysqli_fetch_object($query)){
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

			?>
		</tbody>
	</table>
</form>
<script type="text/javascript">
	function showHint(str) {
		if (document.getElementById('tbody').hidden == false) {
			document.getElementById('tbody').hidden = true;
			document.getElementById('txtHint').hidden = false;
		}
		if (str.length == 0){
			document.getElementById('tbody').hidden =false;
			document.getElementById('txtHint').hidden = true;
		}
		if (str.length == 0) { 
			document.getElementById("txtHint").innerHTML = "";
			return;
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("txtHint").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "getAvaliacoes.php?q=" + str, true);
			xmlhttp.send();
		}
	}

	function date() {
		var data = document.getElementById('data');
		now = new Date;
		var m = now.getMonth()+1;
		if(m<10 && now.getDate() < 10){
			var a = now.getFullYear() +'-'+0+ m +'-'+0+ now.getDate();
		}
		if(m<10 && now.getDate() > 10){
			var a = now.getFullYear() +'-'+0+ m +'-'+ now.getDate();
		}
		if(m>10 && now.getDate() < 10){
			var a = now.getFullYear() +'-'+ m +'-'+0+ now.getDate();
		}
		if(m>10 && now.getDate() > 10){
			var a = now.getFullYear() +'-'+ m +'-'+ now.getDate();
		}
		if (data.value < a)  {
			alert('A data da aula não pode ser anterior ao dia de hoje');
			data.value = a;
		}
	}
</script>