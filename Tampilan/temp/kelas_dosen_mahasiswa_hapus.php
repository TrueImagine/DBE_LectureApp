<?php
	session_start();
if(isset($_GET['idMhs']) && $_GET['idMhs'] == true && isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Dosen"){
	require_once('../includes/koneksi.php');
	
	$idKelas=$_GET['idkelas'];		
	$idMhs = $_GET['idMhs'];
		$sql3 = "DELETE FROM kelasdtl WHERE idKelas=$idKelas&&idMhs=$idMhs";
		mysqli_query($k, $sql3);		
	
	header('Location: kelas_dosen_mahasiswa.php?idkelas='.$idKelas);
	
}
else{
	header("Location:../index.php");
}
?>