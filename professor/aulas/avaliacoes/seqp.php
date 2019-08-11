<?php 
if ((!isset($_COOKIE['profid']))&&(!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
if (isset($_COOKIE['profid'])) {
	$pid = $_COOKIE['profid'];
}
if (isset($_COOKIE['rootid'])) {
	$pid = $_COOKIE['rootid'];
}
if (isset($_COOKIE['admid'])){
	$pid = $_COOKIE['admid'];
}
	include '../../../configs.php';
?>
<center>
	<br>
	<table class="table" style="background-color: #fff;">
		<form action="seqp2.php">
			<tr>
				<td>
					<label for="nome">
						Nome:
					</label>
				</td>
				<td colspan="2">
					<input type="text" name="n" class="form-control" id="nome">
				</td>
			</tr>
			<tr>
				<td>
					<label for="np">
						Quantidade de perguntas (Respondidas pelo aluno):
					</label>
				</td>
				<td>
					<select id="np" name="np" oninput="recomender()">
						<option disabled selected></option>
						<?php
						$i = 4;
						while ($i <= 40) {
							echo "<option value=".$i.">".$i."</option>";	
							$i = $i + 3;
						}

						?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<center>
						Quantidade de perguntas que o professor terá que fazer:
						<output id="recomendacao" style="color: #f00;"></output>
						<input type="hidden" name="pontuacao" id="in" value="0">
					</center>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<center>
						<br>
						<button type="submit" class="btn btn-primary">Salvar</button>
					</center>
				</td>
			</tr>
		</form>
	</table>
</center>
<script type="text/javascript">
	function recomender(argument) {
		var	np = document.getElementById('np');
		var r = document.getElementById('recomendacao');
		var result = np.value * 2;
		result2 = (np.value - 1) *3;
		result2 = result2 +1; 
		r.value = result2;
		document.getElementById('in').value = result;
	}
</script>