<?php
	require_once("../includes/koneksi.php");
	session_start();
	if(isset($_POST['idkelas']) && $_POST['idkelas'] == true){
		if(isset($_POST['idtugas']) && $_POST['idtugas'] == true){
			$idkelas=$_POST['idkelas'];
			$idtugas=$_POST['idtugas'];
			
			$sql = "SELECT * FROM tugas WHERE idTugas = $idtugas";
			$a = mysqli_query($k, $sql);
			$nama = mysqli_fetch_assoc($a);
			
			$sql="DELETE FROM tugas WHERE idTugas=$idtugas";
			echo $sql;
			$query=mysqli_query($k, $sql);
			
			$sql ="SELECT namaUser FROM user WHERE idUser=$_SESSION[user]";
			$hasil2 = mysqli_query($k, $sql);
			$dos = mysqli_fetch_assoc($hasil2);
			$sql = "INSERT INTO pesan (isiPesan, idJenispsn, idKelas, tglPesan) VALUES ('$dos[namaUser] telah menghapus tugas $nama[namaTugas]!', 1, $idkelas, '".date("Y-m-d")."')";
			mysqli_query($k, $sql);
			
			header('Location:kelas_dosen_tugas.php?idkelas='.$idkelas);
		}
	}

?>