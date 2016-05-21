<?php
	session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['role'] == "Dosen"){
	require_once('../includes/koneksi.php');
	
	$id = $_GET['idkelas'];
	$sql1 = "SELECT * FROM kelasdtl WHERE idKelas='$id'";
	$hasil1 = mysqli_query($k,$sql1);
	$a = mysqli_fetch_assoc($hasil1);
	$idmhs = $a['idMhs'];
	//query nama kelas
	$sql2="DELETE FROM kelasdtl WHERE idMhs='$idmhs'";
	$hasil2=mysqli_query($k, $sql2);
	
	header("Location: kelas_dosen_mahasiswa.php?idkelas=$id" );
}
else{
	header("Location:../index.php");
}
?>