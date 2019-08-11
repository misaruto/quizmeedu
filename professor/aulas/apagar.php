<?php 
if ((!isset($_COOKIE['profid']))&&(!isset($_COOKIE['admid']))&&(!isset($_COOKIE['rootid']))) {
	header('location:../');
}
if (!isset($_REQUEST['id'])) {
	header('location:./');
}
$id = $_REQUEST['id'];
?>
<form action="apagar.2.php">
	<center>
		<table class="table">
			<tr>
				<td>
					<center>
						Você tem ceteza de que deseja apagar esta pergunta permanentemente?
					</center>
				</td>
			</tr>
			<tr>
				<td>
					<center>
						<a href="./" class="btn btn-primary">
							Não
						</a>
						&emsp;&emsp;&emsp;
						<a href="apagar.2.php?id=<?=$id?>" class="btn btn-danger">
							Sim
						</a>
					</center>
				</td>
			</tr>
		</table>
	</center>
</form>