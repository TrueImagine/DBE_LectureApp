<?php
	require_once("../includes/koneksi.php");
	if(isset($_GET['idKelas']) && $_GET['idKelas'] == true){
		$query="UPDATE kelas SET statusKelas=0
				WHERE idKelas=$_GET[idKelas]";
		mysqli_query($k, $query);
		header('Location:kelas_dosen.php');
	}

?>