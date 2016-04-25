<?php
	require_once("../includes/koneksi.php");
	if(isset($_POST['idkelas']) && $_POST['idkelas'] == true){
		$idkelas=$_POST['idkelas'];
		$namakelas=$_POST['namakelas'];
		$deskripsikelas=$_POST['deskripsikelas'];
		
		$sql="UPDATE kelas SET namaKelas='$namakelas', deskripsiKelas='$deskripsikelas' WHERE idKelas=$idkelas";
		$query=mysqli_query($k, $sql);
		
		header('Location:kelas_dosen_detail.php?idkelas='.$idkelas);

	}

?>