<?php
	$idDosen=4;
	require_once('../includes/const.php');
	
	$id=$_GET['idkelas'];
	
	//query nama kelas
	$sql="SELECT * FROM kelas WHERE idKelas=$id";
	$hasil=mysqli_query($k, $sql) ;
	$kelas=mysqli_fetch_assoc($hasil);
	
	//query materi kelas
	$sql2="SELECT * FROM materi WHERE idKelas=$id";
	$hasil2=mysqli_query($k, $sql2);
	
	//query tugas kelas
	$sql3="SELECT * FROM tugas WHERE idKelas=$id";
	$hasil3=mysqli_query($k, $sql3);
	
	echo $kelas['namaKelas'];
	echo "</br></br>";
	
	echo "============================Materi============================";
	echo "</br>";
	WHILE($materi=mysqli_fetch_assoc($hasil2)){
		echo $materi['namaMateri'];
		echo "</br>";
	}
	echo "============================Tugas=============================";
	echo "</br>";
	WHILE($tugas=mysqli_fetch_assoc($hasil3)){
		echo $tugas['namaTugas'];
		echo "</br>";
		echo "Deskripsi : ".$tugas['deskripsiTugas'];
		echo "</br>";
		echo "Tanggal : ".$tugas['tglMulaiTugas']." SAMPAI ".$tugas['tglSelesaiTugas'];
		echo "</br>";
	}	
	





?>