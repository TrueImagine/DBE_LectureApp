<?php
	$idDosen=4;
	require_once('../includes/const.php');
	
	$idmateri=$_GET['idmateri'];
	$idkelas=$_GET['idkelas'];
	
	$sql="DELETE FROM materi WHERE idMateri=$idmateri";
	$hasil=mysqli_query($k, $sql);
	
	header('Location:kelas_materi.php?idkelas='.$idkelas);
?>