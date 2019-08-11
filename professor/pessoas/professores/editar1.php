<?php 
if ((!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
$show = 0;
if (isset($_COOKIE['admid'])) {
	$id = $_COOKIE['admid'];
}
if (isset($_COOKIE['rootid'])) {
	$id = $_COOKIE['rootid'];
	$show = 1;
}
include '../../../configs.php';
if (isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
	?>
	<table class="table">
		<form action="editar2.php">
			<?php
			$id = $_REQUEST['id'];
			$sql = "SELECT * FROM tbl_professor WHERE id = '$id'";
			$query = mysqli_query($con, $sql);
			$row = mysqli_fetch_object($query);
			?>
			<tr>
				<td>
					Nome:
				</td>
				<td>
					<input type="text" name="nome" class="form-control" value="<?=$row->nome?>">
				</td>
			</tr>
			<tr>
				<td>
					Email:
				</td>
				<td>
					<input type="email" name="email" class="form-control" value="<?=$row->email?>">
				</td>
			</tr>
			<tr>
				<td>
					Permissões:
				</td>
				<td>
					<select name="p">
						<option value="0">Professor</option>
						<option value="1">Administrador</option>
						<?php if ($show == 1) {
							?>
							<option value="2">Root</option>
							<?php
						} ?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<center>
						<button type="submit" class="btn btn-primary">Salvar</button>
					</center>
				</td>
			</tr>
			<?php
		}
		?>
		<input type="hidden" name="id" value="<?=$id?>">
	</form>
</table>