<form action="cad.midia2.php" method="post" enctype="multipart/form data">
	<table class="table">
		<tr>
			<td>
				Tipo
			</td>
			<td>
				<select name="tipo" id="tipo" onchange="selectTipo()">
					<option disabled selected ></option>
					<option value="imagem">Imagem</option>
					<option value="video">Video</option>
					<option value="musica">Música</option>
					<option value="cor">Cor</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				Selecione o arquivo:
			</td>
			<td>
				<input type="file" name="midia" >
			</td>
		</tr>
		<tr>
			<td>
				Posição
			</td>
			<td>
				<select name="posicao">
					<option disabled selected ></option>
					<optgroup id="op1" hidden> <!--Imagens -->
						<option value="1">Topo Direito</option>
						<option value="2">Roda-pé</option>
						<option value="3">Background</option>
					</optgroup>
					<optgroup id="op2" hidden> <!--Videos -->
						<option value="1">Topo Direito</option>
						<option value="2">Roda-pé</option>
					</optgroup>
					<optgroup id="op3" hidden> <!-- Cores -->
						<option value="1">Topo Direito</option>
						<option value="2">Roda-pé</option>
						<option value="3">Background</option>
					</optgroup>
					<optgroup id="op4" hidden> <!-- musica -->
						<option value="1">Topo Direito</option>
						<option value="2">Roda-pé</option>
					</optgroup>
				</select>
				<a href="#" id="mapa">Ver mapa</a>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	var tipo = document.getElementById('tipo');
	var op1 = document.getElementById('op1');
	var op2 = document.getElementById('op2');
	var op3 = document.getElementById('op3');
	var op4 = document.getElementById('op4');

	function selectTipo() {
		switch(tipo.value){	
			case 'imagem':
			op1.hidden = false;
			op2.hidden = true;
			op3.hidden = true;
			op4.hidden = true;
			break;

			case 'video':
			op2.hidden = false;
			op1.hidden = true;
			op3.hidden = true;
			op4.hidden = true;
			break;

			case 'cores':
			op3.hidden = false;
			op1.hidden = true;
			op2.hidden = true;
			op4.hidden = true;
			break;

			case 'musica':
			op4.hidden = false;
			op1.hidden = true;
			op2.hidden = true;
			op3.hidden = true;
			break;cad.midias.php
		}
	}
</script>