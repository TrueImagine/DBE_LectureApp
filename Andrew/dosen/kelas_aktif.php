<?php
	require_once("../includes/const.php");
	if(isset($_GET['idKelas']) && $_GET['idKelas'] == true){
		$query="UPDATE kelas SET statusKelas=1
				WHERE idKelas=$_GET[idKelas]";
		mysqli_query($k, $query);
		header('Location:kelas.php');
	}

?>