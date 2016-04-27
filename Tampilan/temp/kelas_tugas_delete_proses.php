<?php
	require_once("../includes/koneksi.php");
	if(isset($_POST['idkelas']) && $_POST['idkelas'] == true){
		if(isset($_POST['idtugas']) && $_POST['idtugas'] == true){
			$idkelas=$_POST['idkelas'];
			$idtugas=$_POST['idtugas'];
			
			$sql="DELETE FROM tugas WHERE idTugas=$idtugas";
			echo $sql;
			$query=mysqli_query($k, $sql);
			
			header('Location:kelas_dosen_tugas.php?idkelas='.$idkelas);
		}
	}

?>