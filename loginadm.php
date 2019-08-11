<?php 
if ((isset($_REQUEST['login']))&&(isset($_REQUEST['pass']))) {
	$l = $_REQUEST['login'];
	$p = $_REQUEST['pass'];
	if ($l != "" && $p != "") {
		include '../configs.php';
		$sql = "SELECT * FROM tbl_professor WHERE login = '$l' and senha = '$p'";
		$query = mysqli_query($con,$sql);
		if (!empty($query)) {
			$row = mysqli_fetch_object($query);
			if ($row->adm == 0) {
				setcookie('profid',$row->id);
				header('location:./professor');
			}
		}
	}
	else{
		header('location:./');
	}
}
else{
	header('location:./');
}

 ?>