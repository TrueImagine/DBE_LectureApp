<?php
	require_once("../includes/koneksi.php");
	if(isset($_POST['idkelas']) && $_POST['idkelas'] == true){
		if(isset($_POST['idmateri']) && $_POST['idmateri'] == true){
			$idkelas=$_POST['idkelas'];
			$idmateri=$_POST['idmateri'];
			
			$sql="DELETE FROM materi WHERE idMateri=$idmateri";
			$query=mysqli_query($k, $sql);
			
			header('Location:kelas_dosen_materi.php?idkelas='.$idkelas);
		}
	}

?>