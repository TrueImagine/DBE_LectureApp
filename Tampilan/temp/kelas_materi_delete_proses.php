<?php
	require_once("../includes/koneksi.php");
	session_start();
	if(isset($_POST['idkelas']) && $_POST['idkelas'] == true){
		if(isset($_POST['idmateri']) && $_POST['idmateri'] == true){
			$idkelas=$_POST['idkelas'];
			$idmateri=$_POST['idmateri'];
			
			$sql="SELECT * FROM materi WHERE idMateri=$idmateri";
			$qry = mysqli_query($k, $sql);
			$materi = mysqli_fetch_assoc($qry);
			
			$sql="DELETE FROM materi WHERE idMateri=$idmateri";
			$query=mysqli_query($k, $sql);
			
			$sql ="SELECT namaUser FROM user WHERE idUser=$_SESSION[user]";
			$hasil2 = mysqli_query($k, $sql);
			$dos = mysqli_fetch_assoc($hasil2);
			$sql = "INSERT INTO pesan (isiPesan, idJenispsn, idKelas, tglPesan) VALUES ('$dos[namaUser] telah menghapus materi $materi[namaMateri]', 1, $idkelas, '".date("Y-m-d")."')";
			mysqli_query($k, $sql);
			
			header('Location:kelas_dosen_materi.php?idkelas='.$idkelas);
		}
	}

?>