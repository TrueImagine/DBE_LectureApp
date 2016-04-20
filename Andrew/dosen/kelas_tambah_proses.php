<?php
	require_once("../includes/const.php");
	if(isset($_GET['idDosen']) && $_GET['idDosen'] == true){
		$namaKelas = $_POST['namaKelas'];
		$idDosen = $_GET['idDosen'];
		$deskripsiKelas = $_POST['deskripsiKelas'];
		
		$query="INSERT into kelas(namaKelas, idDosen, deskripsiKelas, statusKelas) 
				VALUES('$namaKelas', $idDosen, '$deskripsiKelas', 1)";
		echo $query;
		mysqli_query($k, $query);
		header('Location:kelas.php');
	}

?>