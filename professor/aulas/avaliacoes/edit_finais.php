<?php 
if ((!isset($_COOKIE['profid']))&&(!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
if (!isset($_REQUEST['id'])) {
	header('location:./?opt=17');
}
	include '../../../configs.php';
$id = $_REQUEST['id'];
$sql = "SELECT * FROM tbl_finais WHERE id = '$id'";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_object($query);
?>
<form action="edit_finais2.php">
	<table class="table table-striped" style="background-color: #ededed;">
		<tr>
			<td colspan="3">
				<div style="font-weight: bold; font-size: 20px;">
					<center>
						Editar final
					</center>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<textarea name="f" id="f" class="form-control" placeholder="DIGITE AQUI O FINAL..."><?=$row->final?></textarea>
				<input type="hidden" name="id" value="<?=$id?>">
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<center>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</center>
			</td>
		</tr>
	</table>
</form>