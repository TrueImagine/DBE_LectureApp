<?php
	require_once("../../includes/koneksi.php");
	
	$idkelas=$_POST['idkelas'];
	$sql="SELECT fileMateri FROM materi WHERE idKelas=$idkelas";
	$hasil=mysqli_query($k, $sql);
	$i=0;
	while($a=mysqli_fetch_assoc($hasil)){
		$files[$i]=$a['fileMateri'];
	$i++;
	}
	//print_r($files);
	$zipname = 'Materi.zip';
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