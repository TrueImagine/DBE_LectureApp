<?php
	require_once("../../includes/koneksi.php");
	
	//query hasiltugas perkelas
	$idkelas=$_POST['idkelas'];
	$idtugas=$_POST['idtugas'];
	
	$sql="SELECT fileHasiltgs FROM hasiltgs WHERE idKelas=$idkelas";
	$hasil=mysqli_query($k, $sql);
	$i=0;
	while($a=mysqli_fetch_assoc($hasil)){
		$files[$i]=$a['fileHasiltgs'];
	$i++;
	}
	
	//query namakelas
	$sql2="SELECT namaKelas FROM kelas WHERE idKelas=$idkelas";
	$hasil2=mysqli_query($k, $sql2);
	$namaKelas=mysqli_fetch_assoc($hasil2);
	
	//query namatugas
	$sql3="SELECT namaTugas FROM tugas WHERE idTugas=$idtugas";
	$hasil3=mysqli_query($k, $sql3);
	$namaTugas=mysqli_fetch_assoc($hasil3);
	
	//print_r($files);
	$zipname = $namaKelas['namaKelas'].'_'.$namaTugas['namaTugas'].'.zip';
	$zip = new ZipArchive;
	$zip->open($zipname, ZipArchive::CREATE);
	foreach ($files as $file) {
	  $zip->addFile($file);
	}
	$zip->close();
	
	header('Content-Type: application/zip');
	header('Content-disposition: attachment; filename='.$zipname);
	header('Content-Length: ' . filesize($zipname));
	readfile($zipname);
	unlink($zipname);
	
?>