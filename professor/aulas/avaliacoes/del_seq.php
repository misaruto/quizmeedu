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
?>
<div class="d-flex">
	<div style="width: 500px" class="p-2">
		<table class="table table-hover" style="background-color: #fff;">		
			<thead class="thead thead-dark">
				<th>
					N°
				</th>
				<th>
					Nome
				</th>
				<th>
					Apagar
				</th>
			</thead>
			<?php 
			include '../../../configs.php';
			if (isset($_REQUEST['nv'])) {
				$nv = $_REQUEST['nv'];
			}
			else{
				$nv = 1;
			}
			$sql = "SELECT * FROM tbl_sequencia_perguntas WHERE id_professor = '$id'";
			$query = mysqli_query($con, $sql);
			$i = mysqli_num_rows($query);
			while ($row = mysqli_fetch_object($query)) {
				?>
				<tr onclick="showHint(<?=$row->id?>)" style="cursor: pointer;">
					<td>
						<?=$row->id?>
					</td>
					<td>
						<?=$row->nome?>
					</td>
					<td>
						<button type="button" id="del<?=$row->id?>" value="<?=$row->id?>" class="btn btn-danger" onclick="apagar(<?=$row->id?>)">Apagar</button>
					</td>
				</tr>
				<?php
			}
			?>
		</table> 	
	</div>
	<div class="p-2">
		<div id="txtHint">
			
		</div>
	</div>
</div>
<script type="text/javascript">
	function showHint(str) {
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
			xmlhttp.open("GET", "perguntas.php?id_seq=" + str, true);
			xmlhttp.send();
		}
	}
	function apagar(id){
		var c = confirm('Tem certeza que deseja apagar a avaliação N°'+id+' ?');
		if (c) {
			window.location.assign('./del_seq2.php?id='+id);
		}
	}
</script>