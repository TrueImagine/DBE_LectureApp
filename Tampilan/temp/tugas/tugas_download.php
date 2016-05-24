<?php
//materi_download.php
require_once("../../includes/koneksi.php");
if(isset($_GET['idtugas']) && $_GET['idtugas'] == true){
	$gambar = $_GET['idtugas'];
	
	$sql="SELECT * FROM tugas where idTugas=$gambar";
	$hasil=mysqli_query($k, $sql);
	$tugas=mysqli_fetch_assoc($hasil);
	$source = $tugas['fileTugas'];
	echo $sql;
	///*
	if (file_exists($source)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.str_replace(" ","_",basename($source)));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($source));
		ob_clean();
		flush();
		readfile($source);
		exit;
	}
//*/	
}
